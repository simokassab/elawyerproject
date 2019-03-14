

// Empty JS for your own code to be here
 function togle(first, second){
  $("#"+first).css("cursor","pointer");
$("#"+first).click(function() {
		  $("#"+second).slideToggle();
	  });  
}