var counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 4){
        counter = 1;
    }
}, 5000);

// Countdown
var countDownDate = new Date("Oct 22, 2023 00:00:00").getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var showHour = document.getElementById("hours");
    var showMinutes = document.getElementById("minute");
    var showSeconds = document.getElementById("second");
    var endCountdown = document.querySelector(".countdown");

    showHour.innerHTML = hours;
    showMinutes.innerHTML = minutes;
    showSeconds.innerHTML = seconds;
    if (distance < 0) {
        clearInterval(x);
        endCountdown.innerHTML = "Het thoi gian";
    }
}, 1000);

// Slideshow
$(".carousel").owlCarousel({
    margin: 20,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items:2,
            nav: false
        },
        600:{
            items:3,
            nav: false
        },
        1000:{
            items:5,
            nav: false
        }
    }
});
// News
$(".news-carousel").owlCarousel({
    margin: 20,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items:2,
            nav: false
        },
        600:{
            items:3,
            nav: false
        },
        1000:{
            items:4,
            nav: false
        }
    }
});

