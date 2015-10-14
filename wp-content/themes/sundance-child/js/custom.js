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

	if($('.grid').length){ //
		//check screen resolution
		if($(window).width() >= 768){ //XS
			$('.grid-item.visible-xs',$('.grid')).remove();//destroy element
		}
	}
	
	$('.grid').masonry({
  // set itemSelector so .grid-sizer is not used in layout
		itemSelector: '.grid-item',
		containerStyle: {position:'relative'},
		/*columnWidth: function( containerWidth ) {
			console.log(containerWidth);
			return containerWidth / 3;
		}
		*/
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
			$(".fancybox:first",$(this).parent()).fancybox().trigger('click');
			event.stopPropagation();
	});

	$(".wp-posts-carousel-container span.guest-title").click(function(event){
			$(".fancybox:first",$(this).parents('.wp-posts-carousel-container')).fancybox().trigger('click');
			event.stopPropagation();
	});
	//Qucksand
	/*
	$('#source1').quicksand( $('#destination1 li') ,{
		name: value
	}, function(){
			console.log('working');
		}
	);
*/
	var $container = $('#destination').isotope({
		itemSelector: '.work-box',
	})
  $('#source').on( 'click', 'li', function() {

    var filterValue = $( this ).attr('data-filter');
	//	console.log(filterValue);
    // use filterFn if matches value
    //filterValue = filterFns[ filterValue ] || filterValue;
		//Above line does not needed
    $container.isotope({ filter: filterValue });
  });
	
	  var $li = $('.work-cat li').click(function() {
        $li.removeClass('active_cat');
        $(this).addClass('active_cat');
				$('.all').removeClass('active_cat');
    });

});