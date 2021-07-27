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
