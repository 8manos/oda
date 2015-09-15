jQuery(document).ready(function() {
				if (window.sliderID == undefined) {
 					sliderID='';
				}
				if (window.huge_it_obj == undefined) {
 					huge_it_obj='';
				}
				if (window.huge_video_playing == undefined) {
 					huge_video_playing='';
				}
				if (window.huge_interval == undefined) {
 					huge_interval='';
				}
				console.log(huge_it_obj);
			  	var _this = jQuery("ul[class^='huge_it_slideshow_thumbs_"+sliderID+"']").bxSlider({

			    	slideWidth: huge_it_obj.width_thumbs,
				    minSlides: huge_it_obj.slideCount,
				    maxSlides:huge_it_obj.slideCount,
				    moveSlides: 1,
				    auto: false,
				    pause: +huge_it_obj.pauseTime,
				    pager: false,
				    controls: false,
				    mode: 'horizontal',
				    infiniteLoop:true,
				    speed: +huge_it_obj.speed
			    });
	  	  jQuery(".huge_it_slideshow_thumbs_"+sliderID).find('li').on('click',function(){
	  	  		window.clearInterval(huge_interval['huge_it_playInterval_'+sliderID]);
	  	  		//jQuery(this).parent().unbind();
	  	  		_this.stopAuto();
	  	  })

	  	  jQuery(".huge_it_slideshow_thumbs_container_"+sliderID).find("a[class^='bx-']").on('click',function(){
	  	  		window.clearInterval(huge_interval['huge_it_playInterval_'+sliderID]);
	  	  		//jQuery("ul[class^='huge_it_slideshow_thumbs_"+sliderID+"']").unbind();
	  	  		_this.stopAuto();


	  	  })



	  	   jQuery("#huge_it_slideshow_left_"+sliderID).on('click',function(){

	  	  		_this.goToPrevSlide();
	  	  		//jQuery("ul[class^='huge_it_slideshow_thumbs_"+sliderID+"']").unbind();
	  	  		//jQuery("ul[class^='huge_it_slider_"+sliderID+"']").unbind();
	  	  		//_this.stopAuto();

	            _this.stopAuto();
	            restart=setTimeout(function(){
	                _this.startAuto();
	                },+huge_it_obj.speed)
	  	  })
	  	    jQuery("#huge_it_slideshow_right_"+sliderID).on('click',function(){
	  	    	_this.goToNextSlide()
	  	    	//jQuery("ul[class^='huge_it_slideshow_thumbs_"+sliderID+"']").unbind();
	  	    	//jQuery("ul[class^='huge_it_slider_"+sliderID+"']").unbind();
	  	  		//_this.stopAuto();

            _this.stopAuto();
            restart=setTimeout(function(){
                _this.startAuto();
                },+huge_it_obj.speed)
	  	  })

//////////////////////////

	jQuery(".huge_it_slideshow_thumbs_container_"+sliderID).find("a[class^='bx-']").hover(function(){
  	  		window.clearInterval(huge_interval['huge_it_playInterval_'+sliderID]);

	  		_this.stopAuto();
			},function(){
				//var interval = huge_it_playInterval_1;
				window.clearInterval(huge_interval['huge_it_playInterval_'+sliderID]);
				huge_play['function play_'+sliderID]();


					_this.startAuto();
			})


})





