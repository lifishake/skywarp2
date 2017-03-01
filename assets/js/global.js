/* global sw2ScreenReaderText */
(function( $ ) {

	// Variables and DOM Caching.
	var $body = $( 'body' ),
		$navigation = $body.find( '.navigation-top' ),
		$menuScrollUp = $body.find( '.menu-scroll-up' ),
		navigationFixedClass = 'site-navigation-fixed';

	// Ensure the sticky navigation doesn't cover current focused links.
	$( 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex], [contenteditable]', '.site-content-contain' ).filter( ':visible' ).focus( function() {
		if ( $navigation.hasClass( 'site-navigation-fixed' ) ) {
			var windowScrollTop = $( window ).scrollTop(),
				fixedNavHeight = $navigation.height(),
				itemScrollTop = $( this ).offset().top,
				offsetDiff = itemScrollTop - windowScrollTop;

			// Account for Admin bar.
			if ( $( '#wpadminbar' ).length ) {
				offsetDiff -= $( '#wpadminbar' ).height();
			}

			if ( offsetDiff < fixedNavHeight ) {
				$( window ).scrollTo( itemScrollTop - ( fixedNavHeight + 50 ), 0 );
			}
		}
	});

	// Make navigation 'stick'.
	function adjustScrollClass() {

		if ( $( window ).scrollTop() >= $('#content').offset().top ) {
			$navigation.addClass( navigationFixedClass );
		} else {
			$navigation.removeClass( navigationFixedClass );
		}
	}

	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	/**
	 * Test if an iOS device.
	*/
	function checkiOS() {
		return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
	}

	$(document).on('click', '.show-form', function() {
		$('#author_info').toggle(300);
	});

	// Fire on document ready.
	$( document ).ready( function() {

		// If navigation menu is present on page, setNavProps and adjustScrollClass.
		if ( $navigation.length ) {
			adjustScrollClass();
		}

		// If 'Scroll Down' arrow in present on page, calculate scroll offset and bind an event handler to the click event.
		if ( $menuScrollUp.length ) {

			$menuScrollUp.click( function( e ) {
				e.preventDefault();
				$( window ).scrollTo( '#masthead', {
					duration: 800,
					offset: { bottom: 10 }
				});
			});
		}

		if ( true !== supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)svg(\s*)/, '$1no-svg$2' );
			$('#svg-warnning').removeClass('hidden');
			$('#svg-warnning').fadeOut(5000, function(){
				$('#svg-warnning').addClass('hidden');
			});
		}

		if ( $('.show-form').length > 0 ){
			$('#author_info').toggle(10);
		}

	});

	// If navigation menu is present on page, adjust it on scroll and screen resize.
	if ( $navigation.length ) {

		// On scroll, we want to stick/unstick the navigation.
		$( window ).on( 'scroll', function() {
			adjustScrollClass();
		});

		// Also want to make sure the navigation is where it should be on resize.
		$( window ).resize( function() {
			setTimeout( adjustScrollClass, 500 );
		});
	}

})( jQuery );
