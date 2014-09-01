
/* =========================================================
hover images
============================================================ */
$(document).ready(function(){          
  $('#protfolios-2 li a').mouseenter(function(){
    jQuery(this).find('.caption').animate({bottom:'0'});
  });
  $('#protfolios-2 li a') .mouseleave(function(){
    jQuery(this).find('.caption').animate({bottom:'-200px'})
  });
});
$(document).ready(function(){          
  $('#protfolios-3 li a').mouseenter(function(){
    jQuery(this).find('.caption').animate({bottom:'0'});
  });
  $('#protfolios-3 li a') .mouseleave(function(){
    jQuery(this).find('.caption').animate({bottom:'-200px'})
  });
});

/* =========================================================
prettyPhoto
==========================================================*/
$(document).ready(function(){          
  $("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
});

/* =========================================================
flexslider
============================================================ */

$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    auto: 'false',
    start: function(slider){
      $('body').removeClass('kp-home');
    },
  });
    $('.flexslider ol') .addClass('container');
});

/* =========================================================
related-articles
==========================================================*/
$(function() {
  //  Responsive layout, resizing the items
  $('#foo4').carouFredSel({
    responsive: true,
    width: '100%',
    prev: '#prev3',
    next: '#next3',
    auto: false,
    scroll: 1,
    items: {
      width: 320,
    //  height: '30%',  //  optionally resize item-height
      visible: {
        min: 1,
        max: 6
      }
    }
  });

});



/* =========================================================
 menu
==========================================================*/
(function($){
  $(document).ready(function(){    
    var example = $('#menu-top').superfish({
    });
  });
})(jQuery);
/* =========================================================
mobile menu
==========================================================*/




jQuery(document).ready(function () {
     
    jQuery('#mobile-menu > span').click(function () {
 
        var mobile_menu = jQuery('#toggle-view-menu');
 
        if (mobile_menu.is(':hidden')) {
            mobile_menu.slideDown('300');
            jQuery(this).children('span').html('-');    
        } else {
            mobile_menu.slideUp('300');
            jQuery(this).children('span').html('+');    
        }
    
    jQuery(this).toggleClass('active');
         
    });
  
  jQuery('#toggle-view-menu li').click(function () {
 
        var text = jQuery(this).children('div.menu-panel');
 
        if (text.is(':hidden')) {
            text.slideDown('300');
            jQuery(this).children('span').html('-');    
        } else {
            text.slideUp('300');
            jQuery(this).children('span').html('+');    
        }
         
    });
 
});






/* =========================================================
validate form
============================================================ */


$(document).ready(function(){	
 
  if(jQuery("#form-cm").length > 0){
  // Validate the contact form
    jQuery('#form-cm').validate({
  
    // Add requirements to each of the fields
    rules: {
      name: {
        required: true,
        minlength: 2
      },
      email: {
        required: true,
        email: true
      },
      message: {
        required: true,
        minlength: 10
      }
    },
    
    // Specify what error messages to display
    // when the user does something horrid
    messages: {
      name: {
        required: "Please enter your name.",
        minlength: jQuery.format("At least {0} characters required.")
      },
      email: {
        required: "Please enter your email.",
        email: "Please enter a valid email."
      },
      message: {
        required: "Please enter a message.",
        minlength: jQuery.format("At least {0} characters required.")
      }
    },
    
    // Use Ajax to send everything to processForm.php
    submitHandler: function(form) {
      jQuery("#submit-comment").attr("value", "Sending...");
      jQuery(form).ajaxSubmit({
        success: function(responseText, statusText, xhr, $form) {
          jQuery("#response").html(responseText).hide().slideDown("fast");
          jQuery("#submit-comment").attr("value", "Comment");
        }
      });
      return false;
    }
    });
  }

  // form-ct
  if(jQuery("#form-ct").length > 0){
  // Validate the contact form
    jQuery('#form-ct').validate({
  
    // Add requirements to each of the fields
    rules: {
      name: {
        required: true,
        minlength: 2
      },
      email: {
        required: true,
        email: true
      },
      message: {
        required: true,
        minlength: 10
      }
    },
    
    // Specify what error messages to display
    // when the user does something horrid
    messages: {
      name: {
        required: "Please enter your name.",
        minlength: jQuery.format("At least {0} characters required.")
      },
      email: {
        required: "Please enter your email.",
        email: "Please enter a valid email."
      },
      message: {
        required: "Please enter a message.",
        minlength: jQuery.format("At least {0} characters required.")
      }
    },
    
    // Use Ajax to send everything to processForm.php
    submitHandler: function(form) {
      jQuery("#submit-contact").attr("value", "Sending...");
      jQuery(form).ajaxSubmit({
        success: function(responseText, statusText, xhr, $form) {
          jQuery("#response").html(responseText).hide().slideDown("fast");
          jQuery("#submit-contact").attr("value", "Comment");
        }
      });
      return false;
    }
    });
  }


});

  

  