;(function($) {
    "use strict";
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/saasp-horizontal.default", function (scope, $) {

          let saaspExpire = setInterval(function() {
  
            let saaspMainClass = $(scope).find(".saaspricing-countdown");
            let saaspDate = saaspMainClass.data('expire-date');
            
            let saaspCountDownDate = [new Date(saaspDate)];
            let saaspCurrentTime = new Date().getTime();
            let saaspCountdowns = $(scope).find(".saaspricing-countdown");
          
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
             
        });
    })
  })(jQuery);