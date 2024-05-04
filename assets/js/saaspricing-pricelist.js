(function ($) {
    "use strict";
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/saaspricing-pricelist.default", function (scope, $) {
            const priceListNumElements = $(scope).find('.saasp-pricelist-list-num');
            let getTotalPriceElement = $(scope).find('.saasp-pricelist-total-num');
            let PriceListAmount = 0;
            priceListNumElements.each(function() {
                PriceListAmount += parseInt($(this).text());
            });
            getTotalPriceElement.text(PriceListAmount);
        })   
    });
})(jQuery);


