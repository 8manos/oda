jQuery(function($){
	isMenuShow = false ;
	$(".clsMenu").click(function(){
		if(!isMenuShow){
			$(".withBg").animate({width:'toggle'},350,'',function(){
					$(".clsMenu2").show();
					
			});
			isMenuShow = true ;
		}else{
			isMenuShow = false;
			$(".clsMenu2").hide();
			$(".withBg").animate({width:'toggle'},350,'',function(){
				
				
			});
		}
	})
	
	$('.grid').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.grid-item',
	 //columnWidth: 200,
  // use element for option
  })

	$('.recmd').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.recmd-item',
   })
			var fan=$(".fancybox").fancybox({
					openEffect	: 'none',
					closeEffect	: 'none'
			})
	$(".wp-posts-carousel-image img.owl-lazy").click(function(event){

			console.log($(".fancybox:first",$(this).parent()).length);
			$(".fancybox:first",$(this).parent()).fancybox().trigger('click');
			event.stopPropagation();
	});
 
});