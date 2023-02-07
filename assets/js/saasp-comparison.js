;(function($) {
    "use strict";
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/saasp-comparison.default", function (scope, $) {
  
          let saaspExpire = setInterval(function() {
  
            let saaspMainClass = $(scope).find(".saaspricing-ribbon-wrapper");
            let saaspDateOne = saaspMainClass.data('exp-date-one');
            let saaspDateTwo = saaspMainClass.data('exp-date-two');
            let saaspDateThree = saaspMainClass.data('exp-date-three');
  
            let saaspCountDownDate = [new Date(saaspDateOne), new Date(saaspDateTwo), new Date(saaspDateThree)];
            let saaspCurrentTime = new Date().getTime();
            let saaspCountdowns = $(scope).find(".saaspricing-show-expire-date");
          
            // Find the distance between now and the count down date
            
            saaspCountdowns.each(function() {
              let saaspCountDownIndex = $(this).data("countdown-index");
              let saaspDistance = saaspCountDownDate[saaspCountDownIndex] - saaspCurrentTime;
          
              let saaspDays = Math.floor(saaspDistance / (1000 * 60 * 60 * 24));
              let saaspHours = Math.floor((saaspDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              let saaspMinutes = Math.floor((saaspDistance % (1000 * 60 * 60)) / (1000 * 60));
              let saaspSeconds = Math.floor((saaspDistance % (1000 * 60)) / 1000);
              
              $(this).html(saaspDays + "d: " + saaspHours + "h: " + saaspMinutes + "m: " + saaspSeconds + "s ");
          
              if (saaspDistance < 0) {
                clearInterval(saaspExpire);
                $(this).html("0d: 0h: 0m: 0s");
              }
            });
          }, 1000);
  
          // Tooltip Trigger Function
          
          let saaspTooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          let saaspTooltipList = saaspTooltipTriggerList.map(function (saaspTooltipTriggerEl) {
            return new bootstrap.Tooltip(saaspTooltipTriggerEl)
          })
  
          // Image Popup

          $('.saaspricing-image-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
              verticalFit: true
            }
          });
             
        });
    })
  })(jQuery);