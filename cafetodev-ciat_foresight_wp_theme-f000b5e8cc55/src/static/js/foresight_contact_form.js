(function ($) {
    var form = document.getElementById('form_contact_foresight');
    'use strict';
  
    if (form) {
      window.addEventListener('load', function () {
        form.addEventListener('submit', function (event) {
          event.preventDefault();
          event.stopPropagation();
  
          $( '#foresight_contact_form_load' ).show();
  
          setTimeout(function(){
              
              grecaptcha.ready(function () {
                grecaptcha.execute(googleRecaptcha.siteKey, { action: 'cafeto_contact_submission' }).then(function (token) {
                  $('#form_contact_foresight').append('<input type="hidden" name="token" value="' + token + '">');
                  $('#form_contact_foresight').append('<input type="hidden" name="action" value="cafeto_contact_submission">');
                  $('#form_contact_foresight').submit();
                });
              });
          }, 300);
  
  
        });
      });
    }
  })(jQuery);