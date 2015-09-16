jQuery(function($){
	isMenuShow = false ;
	$(".clsMenu").click(function(){
		if(!isMenuShow){
			$(".withBg").show();
			isMenuShow = true ;
		}else{
			isMenuShow = false;
			$(".withBg").hide();
		}
	})
});