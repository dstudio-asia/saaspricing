;(function($) {
  "use strict";
  $(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/saasComparison.default", function (scope, $) {

        let saaspExpire = setInterval(function() {

          let saaspMainClass = $(scope).find(".ribbon-wrapper");
          let saaspDateOne = saaspMainClass.data('exp-date-one');
          let saaspDateTwo = saaspMainClass.data('exp-date-two');
          let saaspDateThree = saaspMainClass.data('exp-date-three');

          let saaspCountDownDate = [new Date(saaspDateOne), new Date(saaspDateTwo), new Date(saaspDateThree)];
          let saaspCurrentTime = new Date().getTime();
          let countdowns = $(scope).find(".show-expire-date");
        
          // Find the distance between now and the count down date
          
          countdowns.each(function() {
            let countdownIndex = $(this).data("countdown-index");
            let distance = saaspCountDownDate[countdownIndex] - saaspCurrentTime;
        
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            $(this).html(days + "d: " + hours + "h: " + minutes + "m: " + seconds + "s ");
        
            if (distance < 0) {
              clearInterval(saaspExpire);
              $(this).html("EXPIRED");
            }
          });
        }, 1000);

        //-- Table Sticky Header Function
        window.onscroll = function () { saaspTableSticky() };
        let saaspHeader = document.getElementById("tableHeader");
        let saaspSticky = saaspHeader.offsetTop;
        function saaspTableSticky() {      
          if (window.pageYOffset > saaspSticky) {
            saaspHeader.classList.add("saaspricing-sticky");
          } else {
            saaspHeader.classList.remove("saaspricing-sticky");
          }
        }

        //-- Tooltip Trigger Function 
        let saaspTooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let saaspTooltipList = saaspTooltipTriggerList.map(function (saaspTooltipTriggerEl) {
          return new bootstrap.Tooltip(saaspTooltipTriggerEl)
        })

        //-- Image Popup
        $('.image-popup-vertical-fit').magnificPopup({
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