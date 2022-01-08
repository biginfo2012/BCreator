jQuery(function ($) {

	//ヘッダースクロール
	var w = $(window).width();

	$(window).scroll(function(){
		if ($(window).scrollTop() > 300) {
			$('#header').addClass('h-fix');
		} else {
			$('#header').removeClass('h-fix');
		}
	});

	//selectのplaceholder
  const Target = $('.is-empty');
  $(Target).on('change', function(){
    if ($(Target).val() !== ""){
      $(this).removeClass('is-empty');
    } else {
      $(this).addClass('is-empty');
    }
  });


	//checkout-how
    $(function() {
      $('[name="btn"]:radio').change( function() {
        if($('[id=credit]').prop('checked')){
          $('.content-ch').hide();
          $('.how01').show();
        } else if ($('[id=bank]').prop('checked')) {
          $('.content-ch').hide();
          $('.how02').show();
        }
      });
    });

	$(document).on('click',function(e) {
		if(!$(e.target).closest('.wrp_my_head_set').length) {
			// ターゲット要素の外側をクリックした時の操作
			$('.my_head_ab').removeClass('open');
		} else {
			// ターゲット要素をクリックした時の操作
			$('.my_head_ab').addClass('open');
		}
	});

	$(document).on('click',function(e) {
		if(!$(e.target).closest('.wrp_head_notice_box').length) {
			// ターゲット要素の外側をクリックした時の操作
			$('.head_notice_box').removeClass('open');
		} else {
			// ターゲット要素をクリックした時の操作
			$('.head_notice_box').addClass('open');
		}
	});

	//スリック
	$('.ban-slide').slick({
		autoplay: true,
		autoplaySpeed: 4000,
		dots:false,
		swipe:true,
		centerMode: true,
		centerPadding: '0px',
		draggable: true,
		slidesToShow: 3,
		arrows: true,
    responsive: [{
      breakpoint: 767,
      settings: {
				slidesToShow: 1,
      }
    }]
	});

	//スリック
	$('.slide-a').slick({
		autoplay: true,
		autoplaySpeed: 6000,
		dots:false,
		swipe:true,
		centerMode: true,
		centerPadding: '0px',
		draggable: true,
		slidesToShow: 3,
		arrows: true,
		responsive: [{
      breakpoint: 767,
      settings: {
				slidesToShow: 1,
      }
    }]
	});

	//スリック
	$('.voice-slider').slick({
		accessibility:true,
		autoplay:false,
		dots:false,
		swipe:true,
		centerMode: true,
		centerPadding: '80px',
		draggable: true,
		arrows: true,
		asNavFor: '.sli-nav',
		responsive: [{
		breakpoint: 988,　
		settings: {
			autoplay:false,
			dots:false,
			swipe:true,
			centerMode: false,
			draggable: true,
			arrows: true,
			}
	}]
	});

	$('.sli-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.voice-slider',
		dots: false,
		centerMode: true,
		centerPadding: '0px',
		focusOnSelect: true,
		arrows: false,
	});

	// タブ
	$(function() {
		let tabs = $(".tab");
		$(".tab").on("click", function() {
			$(".active").removeClass("active");
			$(this).addClass("active");
			const index = tabs.index(this);
			$(".tab-item").removeClass("show").eq(index).addClass("show");
		})
	})




	//スムーズスクロール
	$('a.move-link').click(function(){
		var speed = 800;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({scrollTop:position}, speed, "swing");

        $('body').removeClass('offcanvas-stop-scrolling');
        $('#sm-offcanvas').removeClass('in');
        $('.m-toggle').removeClass('is-open');

		return false;
	});

	//スクロール用処理
	// var imgPos = $('.scr_tg').offset().top;
	//
	// var bh = $(window).height();
	//
	// $(window).scroll(function() {
	// 	if ($(this).scrollTop() > imgPos) {
	// 		$('.totop').addClass('open');
	// 	}else{
	// 		$('.totop').removeClass('open');
	// 	}
	// });


	/*-----------------------アンケート利用----------------------------------*/
	function mStep_1(tg){
		tg.find('.post-step1').css('display','block');
		tg.find('.post-step2').css('display','none');
		tg.find('.post-step3').css('display','none');
	}
	function mStep_2(tg){
          $('.post-ng_alert').removeClass('show');
		tg.find('.post-step1').css('display','none');
		tg.find('.post-step2').css('display','block');
		tg.find('.post-step3').css('display','none');
	}
	function mStep_3(tg){
		tg.find('.post-step1').css('display','none');
		tg.find('.post-step2').css('display','none');
		tg.find('.post-step3').css('display','block');
	}

    //アンケート送信
    $(document).on('click','.ajax-post',function(){
        var tg = $(this).closest('form');
        var post_id = $('#this_post_id').val();
        var str = tg.serializeArray();
        var ajaxUrl = $('#ajaxurl').val();
        mStep_2(tg);

        $.ajax({
          type: 'POST',
          url: ajaxUrl,
          data: {
            'action' : 'post_ques',
            'post_id': post_id,
            'str': str,
          },
          success: function(response) {
              if(response == 'NG'){
                $('.post-ng_alert').addClass('show');
                mStep_1(tg);

              }else{
                mStep_3(tg);
              }
          }
        });
    });








});
