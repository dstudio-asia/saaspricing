window.addEventListener("load", function () {

  "use strict";


//  Countdown timer function  
  
  let countDownDate = [new Date("2023/12/28 17:37"), new Date("2023/01/28 18:37"), new Date("2023/06/28 14:37")]

    
let x = setInterval(function () {
  // Get today's date and time
  let now = new Date().getTime();

  let countdowns = document.querySelectorAll(".saaspricing-countdown");

  // Find the distance between now and the count down date
  countdowns.forEach((countdown, i) => {
    
    let countdownIndex = countdown.dataset.countdownIndex;
    let distance = countDownDate[countdownIndex] - now;
      

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdown.innerHTML = days + "d: " + hours + "h: "
                + minutes + "m: " + seconds + "s ";

    if (distance < 0) {
      clearInterval(x);
      countdown.innerHTML = "EXPIRED";
    }
  });
}, 1000);



  // review star rating function

  // let stars = document.querySelectorAll(".star-icon span");

  // stars.forEach((star, index) => {
  //   star.addEventListener("click", () => {
  //     stars.forEach((star) => {
  //       star.classList.remove("yellow");
  //     });
  //     for (let i = 0; i <= index; i++) {
  //       stars[i].classList.add("yellow");
  //     }
  //   });
  // });

  // table sticky header function

  window.onscroll = function () { myFunction() };

  let header = document.getElementById("myHeader");
  let sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("saaspricing-sticky");
    } else {
      header.classList.remove("saaspricing-sticky");
    }
  }

  // tooltip trigger function 

  let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
});


$(document).ready(function() {

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});
});