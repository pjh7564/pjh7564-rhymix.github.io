function toggleMenu() {
	jQuery('.popover-usermenu-wrap').toggleClass('on');
	jQuery('.usermenu-btn').toggleClass('close');
}

(function PopupWindow(trg) {
	(function($) {
		$(trg).on('click', function(event) {
			event.preventDefault();
			$('.loginPop').addClass('on');
		});

		$('.loginPop').on('click', function(event){
			if( $(event.target).is('.loginPop_close') || $(event.target).is('.loginPop') ) {
				event.preventDefault();
				$(this).removeClass('on');
			}
		});

		$('.loginPop_bg').on('click', function(event){
			if( $(event.target).is('.loginPop_close') || $(event.target).is('.loginPop_bg') ) {
				event.preventDefault();
				$(this).removeClass('on');
			}
		});

		$(document).on('keyup', function(event) {
	    if( event.which=='27' ){
	    	$('.loginPop_bg').removeClass('on');
		  }
	  });
	})(jQuery);
})('header .btn_header_login');

(function($) {
	$(document).on('ready', function() {

		$('.navdraw_bar').on('click', function() {
			$('body').addClass('scroll-lock');
			$('.navigation_drawer-wrap').addClass('on');
			$('.navdraw_bar').addClass('close');
		})

		$('.navigation_drawer-bg').on('click', function() {
			$('body').removeClass('scroll-lock');
			$('.navigation_drawer-wrap').removeClass('on');
			$('.navdraw_bar').removeClass('close');

		})

		$('.navdraw_bar.close').on('click', function() {
			$('body').removeClass('scroll-lock');
			$('.navigation_drawer-wrap').removeClass('on');
			$('.navdraw_bar').removeClass('close');
		})


		$('.search_draw-btn').on('click', function() {
			$('body').addClass('scroll-lock');
			$('.search_drawer-wrap').addClass('on');
		})

		$('.search_drawer-bg').on('click', function() {
			$('body').removeClass('scroll-lock');
			$('.search_drawer-wrap').removeClass('on');

		})

		$('.search_draw-close').on('click', function() {
			$('body').removeClass('scroll-lock');
			$('.search_drawer-wrap').removeClass('on');
		})

		$('html').on('click', function() {
			$('.popover-usermenu-wrap').removeClass('on');
			$('.usermenu-btn').removeClass('close');
		})

		$('.usermenu-btn, .popover-usermenu-wrap').on('click', function (e) {
			e.stopPropagation();
		})

		// 로그인 에러메시지 있을 때 팝업창 유지
		if($('.loginPop_window .message.error').length) {
			$('.loginPop_bg').addClass('on');
		}

	});
}) (jQuery);
