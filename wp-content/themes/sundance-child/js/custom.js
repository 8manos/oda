jQuery(function($){
	isMenuShow = false ;
	$(".clsMenu").click(function(){
		if(!isMenuShow){
			$(".withBg").animate({width:'toggle'},350);
			isMenuShow = true ;
		}else{
			isMenuShow = false;
			$(".withBg").animate({width:'toggle'},350);
		}
	})
	
	$('.grid').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.grid-item',
	 //columnWidth: 200,
  // use element for option
  })

	
});