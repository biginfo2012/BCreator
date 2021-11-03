jQuery(function($) {
	
	$(window).scroll(function() {
		$('.sc-anime').each(function(index) {
			var $self = $(this);
			var offsetCoords = $self.offset();
			var $aType = $self.attr("data-anime");
			
			//スクロール用遅延
			var $delay = $self.attr("data-delay");
			if(!$delay){
				$delay = 450
			}
			var nowScroll = $(window).scrollTop() + $(window).height() - $delay;
			
			//アクション用遅延
			var $op_dly = $self.attr("data-dly");
			if($op_dly){
				var $dly = $op_dly;
			}else{
				var $dly = 0;
			}
			
			if (nowScroll > offsetCoords.top  && ((offsetCoords.top + $self.height()) > $(window).scrollTop())) {
				$effect = selectAnime($aType);
				$($self).velocity($effect,{delay: $dly});
				$($self).removeClass('sc-anime');
			}
		});		
	});	


	/*-----------------------
	アニメーション
	-----------------------*/
	//その他ページ用OPアニメ
	$i = 1;
	$('.op-anime').each(function(index) {
		var $self = $(this);
		//var $offsetCoords = $self.offset();
		var $aType = $self.attr("data-anime");
		var $op_dly = $self.attr("data-dly");
		if($op_dly){
			var $dly = $op_dly;
		}else{
			var $dly = $i * 300;
		}
		
		$effect = selectAnime($aType);
		
		$($self).velocity($effect,{delay: $dly});
		$i += 1;
	});
	
	//
	function selectAnime($aType){
		if($aType == 'down'){
			$effect = "transition.slideDownBigIn";

            
		}else if($aType == 'left'){
			$effect = "transition.slideLeftBigIn";

		}else if($aType == 'right'){
			$effect = "transition.slideRightBigIn";
            
		}else if($aType == 'slideUpIn'){
			$effect = "transition.slideUpIn";

		}else if($aType == 'slideUpBigIn'){
			$effect = "transition.slideUpBigIn";

		}else if($aType == 'type_1'){
			$effect = "transition.flipBounceXIn";

		}else if($aType == 'fadeIn'){
			$effect = "transition.fadeIn";
            
		}else{
			$effect = "transition.slideUpBigIn";
		}
		
		return $effect;
	}	

	
});
