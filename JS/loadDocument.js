function loadActions(){
	var ol = $('#techofficeDrive > #rightPanel > ol');
	var nom;
	var nbFolder = ol.find('li.selected.folder').length,
		nbFolderDeleted = ol.find('li.selected.folder.deleted').length,
		nbFile = ol.find('li.selected.file').length,
		nbFileDeleted = ol.find('li.selected.file.deleted').length,
		nbSelected = nbFolder + nbFile;

	$('#techofficeDrive > #rightPanel > table #action').hide();
	$('#techofficeDrive > #rightPanel > table #header').hide();
	$('#techofficeDrive > #rightPanel > table #action > a').hide();

	if(nbSelected == 0){
		$('#techofficeDrive > #rightPanel > table #header').show();
		return;
	}
	$('body > #drag').find("span").html(nbSelected);
	$('#techofficeDrive > #rightPanel > table #action').show();
	
	if(nbFile > 0 && nbFolder == 0){ // Que des fichiers
		
		if(nbFile == 1){ // Un seul fichier
			nom = ol.find('li.selected .col-nom a').html();
			$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nom);
			resizeStr4($('#techofficeDrive > #rightPanel > table #action .nbFolder'));
			
			if(nbFileDeleted == nbFile){ // un seul fichier supprimé
				$('#techofficeDrive > #rightPanel > table #action .restore').show();
				$('#techofficeDrive > #rightPanel > table #action .deletePerm').show();
				getWidthActions();
				return;
			}
			$('#techofficeDrive > #rightPanel > table #action .lien').show();
			$('#techofficeDrive > #rightPanel > table #action .download').show();
			$('#techofficeDrive > #rightPanel > table #action .versions').show();
			if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
				$('#techofficeDrive > #rightPanel > table #action .delete').show();
				$('#techofficeDrive > #rightPanel > table #action .update').show();
				if(archive != 1){
					$('#techofficeDrive > #rightPanel > table #action .move').show();
				}
			}
			getWidthActions();
			return;
		}
		$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFile+" "+langue_85);
		if(nbFileDeleted == 0){ // Aucun fichier supprimé
			$('#techofficeDrive > #rightPanel > table #action .download').show();
			if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
				$('#techofficeDrive > #rightPanel > table #action .delete').show();
				if(archive != 1){
					$('#techofficeDrive > #rightPanel > table #action .move').show();
				}
			}
		}
		if(nbFileDeleted == nbFile){ //Que des fichiers supprimés
			$('#techofficeDrive > #rightPanel > table #action .restore').show();
			$('#techofficeDrive > #rightPanel > table #action .deletePerm').show();
			getWidthActions();
			return;
		}
		$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFile+" "+langue_85+" - "+langue_86);
		getWidthActions();
		return;
	}
	if(nbFolder > 0 && nbFile == 0){ // Que des répertoires
		
		if(nbFolder == 1){ // Un seul répertoire
			nom = ol.find('li.selected .col-nom a').html();
			$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nom);
			resizeStr4($('#techofficeDrive > #rightPanel > table #action .nbFolder'));

			if(nbFolderDeleted == nbFolder){ // un seul répertoire supprimé
				$('#techofficeDrive > #rightPanel > table #action .restore').show();
				$('#techofficeDrive > #rightPanel > table #action .deletePerm').show();
				getWidthActions();
				return;
			}
			
			$('#techofficeDrive > #rightPanel > table #action .partage').show();
			$('#techofficeDrive > #rightPanel > table #action .lien').show();
			$('#techofficeDrive > #rightPanel > table #action .download').show();
			if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
				$('#techofficeDrive > #rightPanel > table #action .delete').show();
				$('#techofficeDrive > #rightPanel > table #action .update').show();
				if(archive != 1){
					$('#techofficeDrive > #rightPanel > table #action .move').show();
				}
			}
			getWidthActions();
			return;
		}
		$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFolder+" "+langue_87);
		if(nbFolderDeleted == 0){ // Aucun répertoire supprimé
			$('#techofficeDrive > #rightPanel > table #action .download').show();
			if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
				$('#techofficeDrive > #rightPanel > table #action .delete').show();
				if(archive != 1){
					$('#techofficeDrive > #rightPanel > table #action .move').show();
				}
			}
			getWidthActions();
			return;
		}
		if(nbFolderDeleted == nbFolder){ //Que des répertoires supprimés
			$('#techofficeDrive > #rightPanel > table #action .restore').show();
			$('#techofficeDrive > #rightPanel > table #action .deletePerm').show();
			getWidthActions();
			return;
		}
		$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFolder+" "+langue_87+" - "+langue_86);
		getWidthActions();
		return;
	}
	
	var sFile = "", sFolder = "";
	if(nbFile > 1){
		sFile = "s";
	}
	if(nbFolder > 1){
		sFolder = "s";
	}
	$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFile+" "+langue_66+sFile+", "+nbFolder+" "+langue_38+sFolder);
	if(nbFileDeleted == 0 && nbFolderDeleted == 0){ // Aucuns supprimés
		$('#techofficeDrive > #rightPanel > table #action .download').show();
		if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
			$('#techofficeDrive > #rightPanel > table #action .delete').show();
		}
		if(archive != 1){
			$('#techofficeDrive > #rightPanel > table #action .move').show();
		}
		return;
	}
	if(nbFileDeleted == nbFile && nbFolderDeleted == nbFolder){ // Que des supprimés
		$('#techofficeDrive > #rightPanel > table #action .restore').show();
		$('#techofficeDrive > #rightPanel > table #action .deletePerm').show();
		return;
	}
	$('#techofficeDrive > #rightPanel > table #action .nbFolder').html(nbFile+" "+langue_66+sFile+", "+nbFolder+" "+langue_38+sFolder+" - "+langue_86);
	return;
}

function getWidthActions(){
	var widthActions = 0;
	var tabActions = new Array();
	var i = 0;
	$('#techofficeDrive > #rightPanel > table #action a').each(function(e){
		if($(this).css('display') == 'inline'){
			widthActions += $(this).width() + 23; 
			if(widthActions > 383){
				$(this).hide();
				tabActions[i] = $(this).attr('class');
				i++;
			}
		}
	});

	if(widthActions > 383){
		$('#techofficeDrive > #rightPanel > table #action .more').show();
		var left = $('#techofficeDrive > #rightPanel > table #action .more').position()['left'];
		$('#techofficeDrive > #rightPanel > table #action > .more > div').css('left',(left-67));
		
		$('#techofficeDrive > #rightPanel > table #action > .more > div > ol > li').hide();
		for(i = 0;i < tabActions.length; i++){
			$('#techofficeDrive > #rightPanel > table #action > .more > div > ol > .'+tabActions[i]).show();
		}
	}
}

var action = 'none', move = false;
// 16 : Maj     17 : Ctrl     65 : a-A
var touches = new Array(); touches[16] = false; touches[17] = false; touches[65] = false;
var pageY, pageX;

$(document).keydown(function(e){
	switch(e.keyCode){
		case 16:
		case 17:
		case 65:
			touches[e.keyCode] = true;
			break;
		case 46: //Touche suppr
			var montrer = true;
			$('#techofficeDrive > #rightPanel > ol li').each(function(){
				if($(this).find('.col-nom > input').css('display') == 'inline-block'){
					montrer = false;
				}
			});
			if(montrer == true){
				$('#techofficeDrive > #rightPanel > table #action > .delete').mouseup();
			}
			break;
		case 113: //Touche f2
			var montrer = true;
			$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
				montrer = true;
				if($(this).find('.col-nom > input').css('display') == 'inline-block' || verifUpdate($(this).attr('data-id_repertoire')) == false){
					montrer = false;
				}
			});

			if(montrer == true){
				var i = 0;
				$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
					if(i == 0){
						$(this).find('.col-nom > input').show();
						$(this).find('.col-nom > input').focus();
						$(this).find('.col-nom > span').hide();
					}
					i++;
				});
			}
			break;
		case 13: //Touche entree
			$('#techofficeDrive > #rightPanel > ol li').each(function(){
				if($(this).find('.col-nom > input').css('display') == 'inline-block'){
					renommer();
					return;
				}
			});
			break;
		case 27: //Touche echap
			$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
				if($(this).find('.col-nom > input').css('display') == 'inline-block'){
					$(this).find('.col-nom > input').hide();
					$(this).find('.col-nom > input').val($(this).find('span a').html());
					$(this).find('.col-nom > span').show();
					return;
				}
			});
			break;
		case 9: //Touche tabulation
			$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
				if($(this).find('.col-nom > input').css('display') == 'inline-block'){
					renommer();
					return;
				}
			});
			break;
	}
	// ctrl + a ou ctrl + maj
	if(touches[17] == true && (touches[65] == true || touches[16] == true)){
		$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
			$(this).addClass('selected');
		});
	}
	loadActions();
});
$(document).keyup(function(e){
	switch(e.keyCode){
		case 16:
		case 17:
		case 65:
			touches[e.keyCode] = false;
		break;
	}
});

function initOl(){
	$('#techofficeDrive > #rightPanel > ol li.needInit.folder .col-nom span a').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var id_repertoire = $(this).parent().parent().parent().attr('data-id_repertoire');
		
		//Pour la recherche
		$('#techofficeDrive > #rightPanel > table #search input').val("");
		$('#techofficeDrive > #rightPanel > table #left').show();
		$('#techofficeDrive > #rightPanel > table #left-search').hide();
		$(this).parent().find('label').show();
		
		loadOl(id_repertoire);
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit .col-emplacement span a').click(function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var id_repertoire = $(this).parent().parent().parent().attr('data-id_repertoire');
		
		//Pour la recherche
		$('#techofficeDrive > #rightPanel > table #search input').val("");
		$('#techofficeDrive > #rightPanel > table #left').show();
		$('#techofficeDrive > #rightPanel > table #left-search').hide();
		$(this).parent().find('label').show();
		
		loadOl(id_repertoire);
	});

	$('#techofficeDrive > #rightPanel > ol li.needInit .resizeStr3').each(function(){
		resizeStr3($(this));
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit .resizeStr').each(function(){
		resizeStr($(this));
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit .resizeStr2').each(function(){
		resizeStr2($(this));
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit').mousedown(function(e){
		pageY = e.pageY;
		pageX = e.pageX;
		
		if($(this).hasClass('selected') && $(this).hasClass('draggable')){
			action = 'drag';
		}
		else{
			action = 'selecting';
			move = false;
		}
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit .col-modifie > a').mousedown(function(e){
		e.stopPropagation();
		var li = $(this).parent().parent();
		var selection;
		if(li.hasClass('file')){
			selection = '1,'+li.attr('data-id_fichier');
		}
		else{
			selection = '2,'+li.attr('data-id_repertoire');
		}
		$.ajax({
			type: 'POST',
			url: 'ajax/ol/popLink.php',
			data:{
				selection: selection
			},
			success: function(jqXHR){
				openPop(jqXHR);
			}
		});
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit.folder').each(function(){
		initUploadLi($(this));
	});
	
	$('#techofficeDrive > #rightPanel > ol li.needInit .col-nom input').mousedown(function(e){
		e.stopPropagation();
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit .col-nom input').mouseup(function(e){
		e.stopPropagation();
	});

	$('#techofficeDrive > #rightPanel > ol li.needInit.file .col-nom').mousedown(function(e){
		if($(this).find('span').css('display') != 'none' && e.button == 0 && !$(this).find('a').hasClass('openLink')){
			e.preventDefault();
			e.stopPropagation();
			var id_fichier = $(this).parent().attr('data-id_fichier');
			$.fileDownload('dl/index.php',{
				httpMethod: 'POST',
				data:{
					id_fichier: id_fichier
				}
			});
		}
		if($(this).find('a').hasClass('openLink')){
			window.open($(this).find('a').attr('href'));
		}
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit.file .col-nom').click(function(e){
		e.preventDefault();
	});
	
	$('#techofficeDrive > #rightPanel > ol li.needInit').dblclick(function(e){

		if($(this).find('.col-nom > input').css('display') == 'inline-block'){
			if(($(this).attr('data-id_repertoire') == e.target.dataset['id_repertoire'] && e.target.localName == 'input') || ($(this).attr('data-id_fichier') == e.target.dataset['id_fichier'] && e.target.localName == 'input')){
				return;
			}
		}
		
		if($(this).hasClass('folder')){
			loadOl($(this).attr('data-id_repertoire'));
		}
		if($(this).hasClass('file')){
			e.preventDefault();
			e.stopPropagation();
			var id_fichier = $(this).attr('data-id_fichier');
			$.fileDownload('dl/index.php',{
				httpMethod: 'POST',
				data:{
					id_fichier: id_fichier
				}
			});
		}
	});
	$('#techofficeDrive > #rightPanel > ol li.needInit').each(function(){
		$(this).removeClass('needInit');
	});	
}

$(document).mousemove(function(e){
	if(e.pageX == pageX && e.pageY == pageY && move == false){
		return;
	}
	switch(action){
		case 'selecting':
			if(move == false){
				$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
					$(this).removeClass('selected');
				});
			}
			move = true;
			var position, positionUp, positionDown, height;
			$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
				position = $(this).position();
				positionUp = position.top;
				height = $(this).height() + 12;
				positionDown = positionUp + height;
				if(touches[16] == false && touches[17] == false){
					if((e.pageY >= positionUp && e.pageY <= positionDown)
					|| (pageY >= e.pageY && e.pageY < positionUp && pageY > positionDown)
					|| (pageY <= e.pageY && e.pageY > positionUp && pageY < positionDown)){
						if($(this).hasClass('dropzone')){
							$(this).removeClass('dropzone');
							$(this).addClass('dropzone-disabled');
						}
						$(this).addClass('selected');
					}
					else if(pageY < positionUp || pageY > positionDown){
						if($(this).hasClass('dropzone-disabled')){
							$(this).removeClass('dropzone-disabled');
							$(this).addClass('dropzone');
						}
						$(this).removeClass('selected');
					}
				}
			});
		break;
		case 'drag':
			move = true;
			$('#drag').css('top', e.pageY+15+'px');
			$('#drag').css('left', e.pageX+15+'px');
			$('#drag').show();
			$('html').removeClass('allowed');
			$('html').addClass('not-allowed');
			var html_drag = '',
				i = 1;
			$('#drag').find('img').each(function(){
				$(this).remove();
			});	
			$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
				html_drag += '<img class="'+$(this).find('img').attr('class')+'" src="ressources/css/icons/icon_vide.gif">';
				if(i == 4){
					return;
				}
				i++;
			});
			$('#drag').find('span').after(html_drag);
			$('#techofficeDrive > #rightPanel li.dropzone').each(function(){
				if(!$(this).hasClass('shared')){
					$(this).addClass('highlight');
				}
			});
			$('#techofficeDrive > #rightPanel li.dropzone').each(function(){
				position = $(this).position();
				positionUp = position.top;
				height = $(this).height() + 12;
				positionLeft = position.left;
				
				if($(this).parent().parent().parent().attr('id') == 'nav-barre2'){
					positionUp = position.top + 40;
					height = $(this).height();
				}
				positionDown = positionUp + height;
				
				if($(this).parent().parent().attr('id') == 'nav-barre1'  || $(this).parent().parent().hasClass('buble-nav') || $(this).parent().attr('id') == 'nav-barre2'){
					positionLeft = position.left + $('#techofficeDrive > #leftPanel').width();
				}
				
				width = $(this).width();
				positionRight = positionLeft + width;
				
				$(this).removeClass('hover');
				if(e.pageY >= positionUp && e.pageY <= positionDown && e.pageX >= positionLeft && e.pageX <= positionRight){
					if(!$(this).hasClass('shared')){
						$(this).addClass('hover');
						$('html').removeClass('not-allowed');
						$('html').addClass('allowed');

						if($(this).parent().attr('id') == 'nav-barre2'){
							if($('#techofficeDrive > #rightPanel > table #left .buble-nav').css('display') == 'none'){
								$('#techofficeDrive > #rightPanel > table #left .buble-nav').show();
							}
						}
					}
				}
			});
		break;
	}
	loadActions();
});

$(document).mousedown(function(e){
	//Pour renommer
	$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
		if($(this).find('.col-nom > input').css('display') == 'inline-block'){
			if(!(($(this).attr('data-id_repertoire') == e.target.dataset['id_repertoire'] && e.target.localName == 'input') || ($(this).attr('data-id_fichier') == e.target.dataset['id_fichier'] && e.target.localName == 'input'))){
				renommer();
			}
			return;
		}
	});
});

var index_debut = "";
$(document).mouseup(function(e){
	if(move == false && (action == 'selecting' || action == 'drag')){
		if(touches[17] == true){
			//CTRL
			$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
				if(($(this).attr('data-id_repertoire') == e.target.dataset['id_repertoire'] && $(this).hasClass('folder')) || ($(this).attr('data-id_fichier') == e.target.dataset['id_fichier'] && $(this).hasClass('file'))){
					index = $(this).index();
				}
			});
			index_debut = index;
			
			$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
				position = $(this).position();
				positionUp = position.top;
				height = $(this).height() + 12;
				positionDown = positionUp + height;
				if(e.pageY >= positionUp && e.pageY <= positionDown){
					if(!$(this).hasClass('selected')){
						if($(this).hasClass('dropzone')){
							$(this).removeClass('dropzone');
							$(this).addClass('dropzone-disabled');
						}
						$(this).addClass('selected');
					}
					else{
						if($(this).hasClass('dropzone-disabled')){
							$(this).removeClass('dropzone-disabled');
							$(this).addClass('dropzone');
						}
						$(this).removeClass('selected');
					}
				}
			});
		}
		else{
			if(touches[16] == true){
				//MAJ
				if(index_debut == ""){
					$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
						index_debut = $(this).index();
						return false;
					});
				}
				
				var index = 0;
				$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
					if(($(this).attr('data-id_repertoire') == e.target.dataset['id_repertoire'] && $(this).hasClass('folder')) || ($(this).attr('data-id_fichier') == e.target.dataset['id_fichier'] && $(this).hasClass('file'))){
						index = $(this).index();
					}
				});
				var index_dernier = index;
				
				if( index_dernier > index_debut){
					$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
						if($(this).index() != index_debut){
							if($(this).index() > index_debut && $(this).index() <= index_dernier){
								if($(this).hasClass('dropzone')){
									$(this).removeClass('dropzone');
									$(this).addClass('dropzone-disabled');
								}
								$(this).addClass('selected');
							}
							else{
								if($(this).hasClass('dropzone-disabled')){
									$(this).removeClass('dropzone-disabled');
									$(this).addClass('dropzone');
								}
								$(this).removeClass('selected');
							}
						}
					});
				}
				else{
					$('#techofficeDrive > #rightPanel > ol li.selectable').each(function() {
						if($(this).index() != index_debut){
							if($(this).index() < index_debut && $(this).index() >= index_dernier){
								if($(this).hasClass('dropzone')){
									$(this).removeClass('dropzone');
									$(this).addClass('dropzone-disabled');
								}
								$(this).addClass('selected');
							}
							else{
								if($(this).hasClass('dropzone-disabled')){
									$(this).removeClass('dropzone-disabled');
									$(this).addClass('dropzone');
								}
								$(this).removeClass('selected');
							}
						}
					});
				}
			}
			else{
				index_debut = "";
				var sup_selected = true;
				$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){
					if($(this).hasClass('selected') && e.button == 2 && (($(this).attr('data-id_repertoire') == e.target.dataset['id_repertoire'] && $(this).hasClass('folder')) || ($(this).attr('data-id_fichier') == e.target.dataset['id_fichier'] && $(this).hasClass('file')))){
						sup_selected = false;
					}
				});
				
				if(sup_selected == true){
					$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
						$(this).removeClass('selected');
					});
					$('#techofficeDrive > #rightPanel > ol li.selectable').each(function(){

						position = $(this).position();
						positionUp = position.top;
						height = $(this).height() + 12;
						positionDown = positionUp + height;

						if(e.pageY >= positionUp && e.pageY <= positionDown){
							if($(this).hasClass('dropzone')){
								$(this).removeClass('dropzone');
								$(this).addClass('dropzone-disabled');
							}
							$(this).addClass('selected');
						}
						else{
							if($(this).hasClass('dropzone-disabled')){
								$(this).removeClass('dropzone-disabled');
								$(this).addClass('dropzone');
							}
							$(this).removeClass('selected');
						}
					});
				}
			}
		}
	}
	else{
		switch(action){
			case 'selecting':
			break;
			case 'drag':
				$('#techofficeDrive > #rightPanel  li.selectable').each(function(){
					position = $(this).position();
					positionUp = position.top;
					height = $(this).height() + 12;
					positionLeft = position.left;
					
					if($(this).parent().parent().hasClass('buble-nav')){
						positionUp = position.top + 40;
						height = $(this).height();
					}
					positionDown = positionUp + height;
					
					if($(this).parent().parent().attr('id') == 'nav-barre1' || $(this).parent().parent().parent().attr('id') == 'nav-barre2'){
						positionLeft = position.left + $('#techofficeDrive > #leftPanel').width();
					}
					
					width = $(this).width();
					positionRight = positionLeft + width;
					
					if(e.pageY >= positionUp && e.pageY <= positionDown && e.pageX >= positionLeft && e.pageX <= positionRight){
					
						if($(this).hasClass('dropzone')){
							var id_destination = $(this).attr('data-id_repertoire');
							var id_repertoire = $('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire');
							var tabSelection = new Array();
							var i = 0;
							$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
								if($(this).hasClass('file')){
									tabSelection[i] = 1+','+$(this).attr('data-id_fichier');
								}
								else{
									tabSelection[i] = 2+','+$(this).attr('data-id_repertoire');
								}
								i++;
							});
							tabSelection = JSON.stringify(tabSelection);

							$.ajax({
								type: 'POST',
								url: 'ajax/ol/drop.php',
								data:{
									id_repertoire: id_repertoire,
									id_destination: id_destination,
									tabSelection: tabSelection
								},
								success: function(jqXHR){
									if(jqXHR == true){
										loadOl(id_repertoire);
									}
									else{
										console.log(jqXHR);
									}
								}
							});
						}
					}
				});

				$('#drag').hide();
				$('#techofficeDrive > #rightPanel > ol li.highlight').each(function(){
					$(this).removeClass('highlight');
				});
				$('html').removeClass('allowed');
				$('html').removeClass('not-allowed');
			break;
			case 'none':
				$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
					$(this).removeClass('selected');
				});
				$('html').removeClass('drag');
				$('#drag').hide();
				$('#techofficeDrive > #rightPanel > table #left .buble-nav').hide();
				$('#techofficeDrive > #rightPanel > table #action > .more > .buble-nav').hide();
		}
	}
	action = 'none';
	move = false;
	loadActions();
	
	if(e.button == 0){
		$('#context-menu').hide();
	}
	else{
		if(e.button == 2){
			// clic droit;
			var left = e.pageX;
			var top = e.clientY - 15;
			$('#context-menu > ul').css('left',left);
			$('#context-menu > ul').css('top',top);
			e.stopPropagation();
			loadMenu();
		}
	}
});

function loadNav(id_repertoire){
	$.ajax({
		type: 'POST',
		url: 'ajax/navigation/loadNavigation.php',
		data:{
			id_repertoire: id_repertoire,
			archive: archive
		},
		success: function(jqXHR){
			$('#techofficeDrive > #rightPanel > table #left').html(jqXHR);
		}
	});					
}

function verifUpdate(id_repertoire){
	var retour = true;
	
	if(id_repertoire != undefined){
		$.ajax({
			async: false,
			type: 'POST',
			url: 'ajax/action/verifUpdate.php',
			data:{
				id_repertoire: id_repertoire
			},
			success: function(jqXHR){
				if(jqXHR != true){
					retour = false;
				}
			}
		});
	} 
	return retour;
}