$('#context-menu > ul > li').mouseup(function(e){
	var action = $(this).attr('id');
	
	switch(action){
		case 'menu-نقلt':
			$('#techofficeDrive > #rightPanel > table #actions .upload').click();
			break;
		case 'menu-new-folder':
			$('#techofficeDrive > #rightPanel > table #actions .add-folder').click();
			break;
		case 'menu-partage-folder':
			console.log("partage folder");
			break;
		case 'menu-trash1':
			$('#techofficeDrive > #rightPanel > table #actions .trash').click();
			break;
		case 'menu-trash2':
			$('#techofficeDrive > #rightPanel > table #actions .trash').click();
			break;
		case 'menu-option-partage':
			console.log("option partage");
			break;
		case 'menu-lien':
			$('#techofficeDrive > #rightPanel > table #action > .lien').mouseup();
			break;
		case 'menu-download':
			$('#techofficeDrive > #rightPanel > table #action > .download').mouseup();
			break;
		case 'menu-delete':
			$('#techofficeDrive > #rightPanel > table #action > .delete').mouseup();
			break;
		case 'menu-edit':
			var montrer = true;
			$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
				montrer = true;
				if($(this).find('.col-nom > input').css('display') == 'inline-block' || verifUpdate($(this).attr('data-id_repertoire')) == false){
					montrer = false;
				}
			});

			if(montrer == true){
				$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
					$(this).find('.col-nom > input').show();
					$(this).find('.col-nom > input').focus();
					$(this).find('.col-nom > span').hide();
					return;
				});
			}
			break;
		case 'menu-move':
			$('#techofficeDrive > #rightPanel > table #action > .move').mouseup();
			break;
		case 'menu-copy':
			console.log("copy");
			break;
		case 'menu-version':
			$('#techofficeDrive > #rightPanel > table #action > .versions').mouseup();
			break;
		case 'menu-restaure':
			$('#techofficeDrive > #rightPanel > table #action > .restore').mouseup();
			break;
		case 'menu-delete-perm':
			$('#techofficeDrive > #rightPanel > table #action > .deletePerm').mouseup();
			break;
		case 'menu-invite':
			console.log("invite");
			break;
	}
});

function loadMenu(){
	$('#menu-نقلt').hide();
	$('#menu-new-folder').hide();
	$('#menu-partage-folder').hide();
	$('#menu-trash1').hide();
	$('#menu-trash2').hide();
	$('#menu-option-partage').hide();
	$('#menu-lien').hide();
	$('#menu-download').hide();
	$('#menu-delete').hide();
	$('#menu-edit').hide();
	$('#menu-move').hide();
	$('#menu-copy').hide();
	$('#menu-restaure').hide();
	$('#menu-delete-perm').hide();
	$('#menu-version').hide();
	$('#menu-invite').hide();
	
	var nb_fichiers = 0;
	var nb_dossiers = 0;
	var deleted = 0;
	var id_repertoire = undefined;
	
	$('#techofficeDrive > #rightPanel > ol li.selected').each(function(){
		if($(this).hasClass('folder')){
			nb_dossiers++;
			id_repertoire = $(this).attr('data-id_repertoire');
		}
		else{
			nb_fichiers++;
		}
		if($(this).hasClass('deleted')){
			deleted++;
		}
	});
	
	if(nb_fichiers == 0 && nb_dossiers == 0){
		$('#menu-نقلt').show();
		$('#menu-new-folder').show();
		if($('#actions .trash > img').hasClass('icon-trash-close')){
			$('#menu-trash1').show();
		}
		else{
			$('#menu-trash2').show();
		}
	}
	else{
		if((parseInt(nb_fichiers) + parseInt(nb_dossiers)) == 1 && deleted == 0){
			$('#menu-lien').show();
			if(nb_dossiers == 0){
				$('#menu-version').show();
			}
			if(verifUpdate(id_repertoire) == true){
				$('#menu-edit').show();
				if(archive != 1){
					$('#menu-move').show();
				}
			}
		}

		if(deleted != 0){
			
			if(deleted == (parseInt(nb_fichiers) + parseInt(nb_dossiers))){
				$('#menu-restaure').show();
				$('#menu-delete-perm').show();
				
				if(nb_dossiers == 0){
					$('#menu-version').show();
				}
			}
			else{
				return;
			}
		}
		else{
			$('#menu-download').show();
			if($('#techofficeDrive > #rightPanel > ol').attr('data-id_repertoire') != 0){
				$('#menu-delete').show();
			}
		}
	}
	$('#context-menu').show();
}
