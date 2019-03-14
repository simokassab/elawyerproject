(function addXhrProgressEvent($) {
    var originalXhr = $.ajaxSettings.xhr;
    $.ajaxSetup({
        xhr: function() {
            var req = originalXhr(), that = this;
            if (req) {
                if (typeof req.addEventListener == "function" && that.progress !== undefined) {
                    req.addEventListener("progress", function(evt) {
                        that.progress(evt);
                    }, false);
                }
                if (typeof req.upload == "object" && that.progressUpload !== undefined) {
                    req.upload.addEventListener("progress", function(evt) {
                        that.progressUpload(evt);
                    }, false);
                }
            }
            return req;
        }
    });
})(jQuery);

var id_fichier = 0;
var fichier_restant = 0;

function initUpload(){
	var dropzone = $(document);
	dropzone.on('dragover', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#techofficeDrive > #uploadOver p').show();
		$('#techofficeDrive > #rightPanel > ol > li.dropzone').addClass('highlight');
	});
	dropzone.on('dragleave', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#techofficeDrive > #rightPanel > ol > li.dropzone').removeClass('highlight');
	});
	dropzone.on('drop', function(e){
		e.preventDefault();
		e.stopPropagation();
		
		var id_repertoire = $('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire');

		if(id_repertoire != 0){
			var files = e.originalEvent.dataنقل.files;
			fichier_restant += files.length;

			for(var i=0; i<files.length; i++){
				file = files[i];
				if(file['size'] > 0){
					$('#techofficeDrive > #نقلt-list').addClass('show');
					$('#techofficeDrive > #rightPanel > #upload-status').show();
					setBarreUpload(fichier_restant,files.length,'progress',files[i]['name']);
					var formData = new FormData();
					formData.append('myfile', file); 
					formData.append('id_repertoire', id_repertoire);
					formData.append('nom', files[i]['name']);

					var id_courant = id_fichier;

					if(file['size'] >= 262144000){ // 256Mo
						fichier_restant --;
						setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
						setنقلt(file,id_repertoire,id_fichier,'reverse',1);
						setنقلt(file,id_repertoire,id_courant,'refuse');
						return;
					}
					
					var ajax_upload = $.ajax({
						type: 'POST',
						url: 'ajax/upload/upload.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {
							setنقلt(file,id_repertoire,id_fichier,'reverse');
							id_fichier ++;
						},
						progressUpload: function(e){
						   var percentComplete = Math.round((e.loaded / e.totalSize) * 100);
						   var percentVal = percentComplete + '%';

						   $('#techofficeDrive > .popup > #نقلt > ol > li').each(function(){
								if($(this).attr('data-id_fichier') == id_courant){
									$(this).find('.progress-bar').width(percentVal);
									$(this).find('img').click(function(){
										 ajax_upload.abort();
										 fichier_restant --;
										 setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
										 setنقلt(file,id_repertoire,id_courant,'refuse');
									});
									return false;
								}
						   });
						   if(percentComplete == 100){
							   setنقلt(file,id_repertoire,id_courant,'progress');
						   }
						},
						success: function(jqXHR){
							if(jqXHR == true){
								loadOl(id_repertoire);
								fichier_restant --;
								setBarreUpload(fichier_restant,files.length,'complete');
								setنقلt(file,id_repertoire,id_courant,'complete');
							}
							else{
								fichier_restant --;
								setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
								setنقلt(file,id_repertoire,id_courant,'refuse');
							}
						}
					});
				}
			}
		}
	});
}

function initUploadLi(objet){
	var dropzone = objet;
	dropzone.on('dragover', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#techofficeDrive > #rightPanel > ol > li.dropzone').addClass('highlight');
		objet.addClass('hover');
	});
	dropzone.on('dragleave', function(e){
		e.preventDefault();
		e.stopPropagation();
		objet.removeClass('hover');
	});
	dropzone.on('drop', function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#techofficeDrive > #rightPanel > ol > li.dropzone').removeClass('highlight');
		objet.removeClass('hover');
		var files = e.originalEvent.dataنقل.files;
		fichier_restant += files.length;

		for(var i=0; i<files.length; i++){
			file = files[i];
			if(file['size'] > 0){
				$('#techofficeDrive > #نقلt-list').addClass('show');
				$('#techofficeDrive > #rightPanel > #upload-status').show();
				
				setBarreUpload(fichier_restant,files.length,'progress',files[i]['name']);
				var formData = new FormData(),
					id_repertoire = objet.attr('data-id_repertoire'),
					id_parent = $('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire');
				if(id_repertoire != 0){
					formData.append('myfile', file); 
					formData.append('id_repertoire', id_repertoire);
					formData.append('nom', files[i]['name']);

					var id_courant = id_fichier;

					if(file['size'] >= 262144000){ // 250Mo
						fichier_restant --;
						setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
						setنقلt(file,id_repertoire,id_fichier,'reverse',1);
						setنقلt(file,id_repertoire,id_courant,'refuse');
						return;
					}

					var ajax_upload = $.ajax({
						type: 'POST',
						url: 'ajax/upload/upload.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {
							setنقلt(file,id_repertoire,id_fichier,'reverse');
							id_fichier ++;
						},
						progressUpload: function(e){
						   var percentComplete = Math.round((e.loaded / e.totalSize) * 100);
						   var percentVal = percentComplete + '%';

						   $('#techofficeDrive > .popup > #نقلt > ol > li').each(function(){
								if($(this).attr('data-id_fichier') == id_courant){
									$(this).find('.progress-bar').width(percentVal);
									$(this).find('img').click(function(){
										 ajax_upload.abort();
										 fichier_restant --;
										 setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
										 setنقلt(file,id_repertoire,id_courant,'refuse');
									});
									return false;
								}
						   });
						   if(percentComplete == 100){
							   setنقلt(file,id_repertoire,id_courant,'progress');
						   }
						},
						success: function(jqXHR){
							if(jqXHR == true){
								loadOl(id_parent);
								fichier_restant --;
								setBarreUpload(fichier_restant,files.length,'complete');
								setنقلt(file,id_repertoire,id_courant,'complete');
							}
							else{
								fichier_restant --;
								setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
								setنقلt(file,id_repertoire,id_courant,'refuse');
							}
						}
					});
				}
			}
		}
	});
}

// Fonction permettant l'affichage de la barre lors de l'upload de fichiers
function setBarreUpload(fichier_restant,nb_file,action,nom){
	
	if(action == 'progress'){
		$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-complete');
		$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-refuse');
		$('#techofficeDrive > #rightPanel > #upload-status').addClass('upload-progress');
		$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-Timer-16');
		$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-annule-16');
		$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').addClass('icon-progress-16');

		if(nb_file == 1){
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > span').first().html(langue_140+' '+nom);
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > .details > a').html(langue_141);
		}
		else{
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > span').first().html(langue_140+' '+nom);

			if(fichier_restant == 1){
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > .details > a').html(fichier_restant+' '+langue_142);
			}
			else{
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > .details > a').html(fichier_restant+' '+langue_143);
			}
		}		
	}
	else{
		if(action == 'refuse'){
			$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-progress');
			$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-complete');
			$('#techofficeDrive > #rightPanel > #upload-status').addClass('upload-refuse');
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-Timer-16');
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-progress-16');
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').addClass('icon-annule-16');
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > .details > a').html(langue_141);
			$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > span').first().html(langue_140+' '+nom+' '+langue_144);
		}
		else{
			if(fichier_restant == 0){
				$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-progress');
				$('#techofficeDrive > #rightPanel > #upload-status').removeClass('upload-refuse');
				$('#techofficeDrive > #rightPanel > #upload-status').addClass('upload-complete');
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-annule-16');
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').removeClass('icon-progress-16');
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > img').addClass('icon-Timer-16');
				$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > .details > a').html(langue_141);
				if(nb_file == 1){
					$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > span').first().html(nb_file+' '+langue_145);
				}
				else{
					$('#techofficeDrive > #rightPanel > #upload-status > .upload-info > span').first().html(nb_file+' '+langue_145);
				}
			}
		}
		
	}
}

function setنقلt(file,id_repertoire,id_fichier,action,refuser){
	if(action == 'reverse'){
		$.ajax({
			type: 'POST',
			url: 'ajax/upload/uploadLi.php',
			data: {
				id_repertoire: id_repertoire,
				id_fichier: id_fichier,
				file_name: file['name'],
				file_size: file['size']
			},
			success: function(jqXHR){
				var nb_li = $('#techofficeDrive >  #نقلt-list > ol > li').length;
				if(nb_li != 0){
					$('#techofficeDrive > #نقلt-list > ol > li').last().after(jqXHR);
				}
				else{
					$('#techofficeDrive > #نقلt-list > ol').html(jqXHR);
				}
				
				$('#techofficeDrive > .popup > #نقلt').html($('#techofficeDrive > #نقلt-list').html());
	
				$('#techofficeDrive > .popup > #نقلt > ol > li .resizeStr4').each(function(){
					resizeStr4($(this));
				});
				$('#techofficeDrive > .popup > #نقلt > ol > li .resizeStr2').each(function(){
					resizeStr2($(this));
				});
				
				if(refuser == 1){
					setنقلt(file,id_repertoire,id_fichier,'refuse');
				}
			}
		});
	}
	else{
		if(action == 'progress'){
			$('#techofficeDrive > #نقلt-list > ol > li').each(function(){
				if($(this).attr('data-id_fichier') == id_fichier){
					$(this).removeClass('reverse');
					$(this).removeClass('complete');
					$(this).removeClass('refuse');
					$(this).addClass('progress');
					$(this).find('.file-info > img').removeClass('img2');
					$(this).find('.file-info > img').attr('src', 'ressources/css/icons/loading.gif');
				}
			});
		}
		else{
			if(action == 'refuse'){
				$('#techofficeDrive > #نقلt-list > ol > li').each(function(){
					if($(this).attr('data-id_fichier') == id_fichier){
						$(this).removeClass('reverse');
						$(this).removeClass('complete');
						$(this).removeClass('progress');
						$(this).addClass('refuse');
						$(this).find('.progress-bar').css('width','0px');
						$(this).find('.file-info > img').removeClass('img2');
						$(this).find('.file-info > img').attr('src', 'ressources/css/icons/croix-annule.png');
					}
				});
			}
			else{
				$('#techofficeDrive > #نقلt-list > ol > li').each(function(){
					if($(this).attr('data-id_fichier') == id_fichier){
						$(this).removeClass('reverse');
						$(this).removeClass('progress');
						$(this).removeClass('refuse');
						$(this).addClass('complete');
						$(this).find('.progress-bar').css('width','0px');
						$(this).find('.file-info > img').removeClass('img2');
						$(this).find('.file-info > img').attr('src', 'ressources/css/icons/icon_vide.gif');
						$(this).find('.file-info > img').addClass('icon icon-Timer-16');
					}
				});
			}
		}
	}
	
	$('#techofficeDrive > .popup > #نقلt').html($('#techofficeDrive > #نقلt-list').html());
	
	$('#techofficeDrive > .popup > #نقلt > ol > li .resizeStr4').each(function(){
		resizeStr4($(this));
	});
	$('#techofficeDrive > .popup > #نقلt > ol > li .resizeStr2').each(function(){
		resizeStr2($(this));
	});
}

function نقلt_file(objet){
	var id_repertoire = $('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire');

	if(id_repertoire != 0){
		var files = objet[0]['files'];
		fichier_restant += files.length;

		for(var i=0; i<files.length; i++){
			file = files[i];
			if(file['size'] > 0){
				$('#techofficeDrive > #نقلt-list').addClass('show');
				$('#techofficeDrive > #rightPanel > #upload-status').show();
				setBarreUpload(fichier_restant,files.length,'progress',files[i]['name']);
				var formData = new FormData();
				formData.append('myfile', file); 
				formData.append('id_repertoire', id_repertoire);
				formData.append('nom', files[i]['name']);

				var id_courant = id_fichier;

				if(file['size'] >= 262144000){ // 256Mo
					fichier_restant --;
					setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
					setنقلt(file,id_repertoire,id_fichier,'reverse',1);
					setنقلt(file,id_repertoire,id_courant,'refuse');
					return;
				}

				var ajax_upload = $.ajax({
					type: 'POST',
					url: 'ajax/upload/upload.php',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function() {
						setنقلt(file,id_repertoire,id_fichier,'reverse');
						id_fichier ++;
					},
					progressUpload: function(e){
					   var percentComplete = Math.round((e.loaded / e.totalSize) * 100);
					   var percentVal = percentComplete + '%';

					   $('#techofficeDrive > .popup > #نقلt > ol > li').each(function(){
							if($(this).attr('data-id_fichier') == id_courant){
								$(this).find('.progress-bar').width(percentVal);
								$(this).find('img').click(function(){
									 ajax_upload.abort();
									 fichier_restant --;
									 setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
									 setنقلt(file,id_repertoire,id_courant,'refuse');
								});
								return false;
							}
					   });
					   if(percentComplete == 100){
						   setنقلt(file,id_repertoire,id_courant,'progress');
					   }
					},
					success: function(jqXHR){
						if(jqXHR == true){
							loadOl(id_repertoire);
							fichier_restant --;
							setBarreUpload(fichier_restant,files.length,'complete');
							setنقلt(file,id_repertoire,id_courant,'complete');
						}
						else{
							fichier_restant --;
							setBarreUpload(fichier_restant,files.length,'refuse',file['name']);
							setنقلt(file,id_repertoire,id_courant,'refuse');
						}
					}
				});
			}
		}
	}
}

