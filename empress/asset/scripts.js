$(function () {
	var sidenavInst = undefined;
	var sideNav = $("#the-mobile-sidebar").sidenav({
			edge: window.sideNavEdge,
			menuWidth: 300,
			onCloseStart: function (el) {
//				$('#the-mobile-sidebar').hide();
				$('.mobile-button').removeClass('open');
			},
			onOpenStart: function (el) {
				$('.mobile-button').addClass('open');
//				$('#the-mobile-sidebar').show();
			}
		}
	);

	sidenavInst = M.Sidenav.getInstance(sideNav);

	$('.mobile-button').click(function () {
			console.log('mobile-button clicked');
			if (sidenavInst.isOpen) {
				console.log('sidenav is open');
				M.Sidenav.getInstance(sideNav).close();
			} else {
				console.log('sidenav is not open');
				M.Sidenav.getInstance(sideNav).open();
			}
		}
	);

	//$('#post-list > .row > .col').each(function (index, elem) {
	//	setTimeout(function () {
	//		$(elem).addClass('animated bounceInRight delay-500ms');
	//			}, 1000
	//		);
	//	}
	//);

	// Bind to scroll
	$(window).scroll(function() {
		//Display or hide scroll to top button
		if ($(this).scrollTop() > 100) {
			$('.back-to-top-wrapper').removeClass('bounceOut').addClass('bounceIn');
		} else {
			$('.back-to-top-wrapper').removeClass('bounceIn').addClass('bounceOut');
		}
	});

	$('.back-to-top-wrapper').click(function() {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
});

$(window).on('load', function () {
		$('#post-list > .row').masonry({
				// options
				itemSelector: '.col'
			}
		);
	}
);