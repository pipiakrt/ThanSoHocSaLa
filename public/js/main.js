$('#sliders').owlCarousel({
    loop: true,
    margin:0,
    nav: false,
    dots: false,
    items:1,
})

$('#khachhang').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    items:1
})

$('#sanpham1').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: false,
    items:1
})

$('#sanpham2').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: false,
    items:1
})

$('#chiso').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: false,
    items:1
})

$('#spchung').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ["<img class='sp-prev' src='data:image/svg+xml;utf8, %3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2023%2039%22%20style%3D%22filter%3A%20drop-shadow(0%201px%20.15px%20%23B2B2B2)%3B%22%20fill%3D%22%23fff%22%3E%3Cpath%20d%3D%22M2%2C3l1.5-1.5l18.1%2C18l-18.1%2C18L2%2C36l16.6-16.5L2%2C3z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E'>","<img class='sp-next' src='data:image/svg+xml;utf8, %3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2023%2039%22%20style%3D%22filter%3A%20drop-shadow(0%201px%20.15px%20%23B2B2B2)%3B%22%20fill%3D%22%23fff%22%3E%3Cpath%20d%3D%22M2%2C3l1.5-1.5l18.1%2C18l-18.1%2C18L2%2C36l16.6-16.5L2%2C3z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E'>"],
    dots: false,
    items:1
})

$('#ketqua').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    items:1
})

$('#logo').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: false,
    items: 8,
    responsive:{
        0 :{
            items: 2
        },
        600:{
            items: 3
        },
        700:{
            items: 5
        },
        1200:{
            items: 8
        }
    }
})

// $(function() {
//     $('.lazy').lazy({
//         effect: "fadeIn",
//         effectTime: 1000,
//         threshold: 0,
//     });
// });

$('#menu-icon').click(function () {
    $(this).addClass("open-menu");
    $('#menu-mobile').removeClass("hide-menu")
})

$('#menu-done').click(function () {
    $("#menu-icon").removeClass("open-menu");
    $('#menu-mobile').addClass("hide-menu")
})

$('.eventItem').hover(function () {
    $('.eventItem').removeClass("active")
    $(this).addClass("active");
    $(this).click();
    if (screen.width < 1200) {
        location.href = "#carouselExampleCaptions";
    }
})

$('.D0MFfU3').hover(function () {
    $('.D0MFfU3').removeClass("active")
    $(this).addClass("active");
})

$('.eventItem2').hover(function () {
    $('.eventItem2').removeClass("active")
    $(this).addClass("active");
    $(this).click();
    if (screen.width < 1200) {
        location.href = "#carouselExampleCaptions2";
    }
})

$('.eventItem3').click(function () {
    $('.eventItem3').removeClass("active")
    $(this).addClass("active");
    if (screen.width < 1200) {
        location.href = "#carouselExampleCaptions";
    }
})

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('header .dropdown').forEach(function(everyitem){

        everyitem.addEventListener('mouseover', function(e){

            let el_link = this.querySelector('a[data-bs-toggle1]');

            if(el_link != null){
                let nextEl = el_link.nextElementSibling;
                el_link.classList.add('show');
                    nextEl.classList.add('show');
            }

        });
        everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle1]');

            if(el_link != null){
                let nextEl = el_link.nextElementSibling;
                el_link.classList.remove('show');
                    nextEl.classList.remove('show');
            }
        })
    });
});


$(window).on( "load", () => {
    var result = detect.parse(navigator.userAgent);
    $.ajax({
        url : "/checking",
        type : "post",
        data : {
            browser: `${result.browser.family} v${result.browser.version}`,
            device: `${result.os.family} - ${result.device.type}`,
            screen: `${screen.width}px - ${screen.height}px`,
            url: window.location.href
        }
    });
});
