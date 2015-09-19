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
});