

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 150) {

      jQuery('.bg').fadeOut();
    // jQuery('.bg').addClass('img-up');
    }
    else {
        jQuery('.bg').fadeIn();
        // jQuery('.bg').removeClass('img-up');

    }
  });

  console.log('aaaa');
