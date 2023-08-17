
// Add Image Popuup Class To Gallery Image Link
document.addEventListener('DOMContentLoaded', function() {
    var galleryOne = document.querySelectorAll('.gallery-icon.landscape a img');
    galleryOne.forEach(function(image) {
        var popupLink = image.closest('a');
        if (popupLink && popupLink.getAttribute('data-elementor-open-lightbox') === 'yes') {
            popupLink.classList.add('saaspricing-image-popup');
        }
    });
});

// Creating Popup 
jQuery(document).ready(function($) {
    $('.saaspricing-image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
});