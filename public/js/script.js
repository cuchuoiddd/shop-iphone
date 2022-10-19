$(document).ready(function(){
    // $(".owl-carousel").owlCarousel();
    $('.owl-carousel').owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:0,
        autoWidth:true,
        nav:true,
        responsive:{
            600:{
                items:2
            }
        }
    });
});