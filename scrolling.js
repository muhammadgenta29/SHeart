$(window).scroll(function(){
	var scroll=$(window).scrollTop();
	
    console.log

   if(scroll>=300){
   	$("#myNav").addClass("bg-dark");
   } else {
   		$("#myNav").removeClass("bg-dark");
   }
});
