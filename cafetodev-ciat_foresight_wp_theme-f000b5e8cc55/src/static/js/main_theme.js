jQuery( 'body' ).ready( function ( $ ) {

  if ( $( 'div#wpadminbar' ).length === 1 ) {
    $( '#theme-main-menu' ).css( 'top', '32px' );
  }

  $( '#theme-masthead' ).ready( function () {
    var nav = $( '.fixed-top' );
    var homeSection = $( '.theme-header-scroll' );

    if ( homeSection.length ) {
      $( document ).scroll( function () {
        nav.toggleClass( 'scrolled', $( this ).scrollTop() > homeSection.height() );
      } );
    }
  } );

  if ( $( '#theme-main-menu' ).length ) {
    $('#foresight-main-menu-items li.menu-item a').on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== '') {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  }

  if ( $('.foresight-participation-content-icons').length > 0 ) {
    $( '.foresight-participation-content-icons' ).slick({
      dots: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      speed: 2000,
      autoplaySpeed: 2000,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 783,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 567,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 496,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
  }
  $('.foresight-card-slick').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
    ]
  });
} );
