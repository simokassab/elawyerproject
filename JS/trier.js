function trierOl(){
	$('#techofficeDrive > #rightPanel > ol li.deleted').hide();

	var nb_recherche_delete =  $('#techofficeDrive > #rightPanel > ol li').length;
	var nb_recherche = $('#techofficeDrive > #rightPanel > ol li').length - $('#techofficeDrive > #rightPanel > ol li.deleted').length;
	
	if($('#techofficeDrive > #rightPanel > table #actions .trash').hasClass('open')){
		$('#techofficeDrive > #rightPanel > ol li.deleted').show();
		
		if(nb_recherche_delete == 0){
			$('#techofficeDrive > #rightPanel > table #left-search span').html(langue_45);
		}
		else{
			$('#techofficeDrive > #rightPanel > table #left-search span').html(langue_88+' - '+nb_recherche_delete+' '+langue_89);
		}	
	}
	else{
		if(nb_recherche == 0){
			$('#techofficeDrive > #rightPanel > table #left-search span').html(langue_45);
		}
		else{
			$('#techofficeDrive > #rightPanel > table #left-search span').html(langue_88+' - '+nb_recherche+' '+langue_89);
		}
	}
}