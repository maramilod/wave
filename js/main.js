


console.log("مرحباً بالعالم");
const wrapper = document.querySelector('.wrapper');
const iconClose = document.querySelector('.icon-close');
const btnP = document.querySelector('.btnLogin-popup');

btnP.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});
iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

console.log(wrapper);
console.log(iconClose);
console.log(btnP);

var menulist = document.getElementById('menulist');
menulist.style.maxHeight = "0px";

function menutoggle() {
if(menulist.style.maxHeight == "0px") {
    menulist.style.maxHeight = "100vh";
}else {
    menulist.style.maxHeight = "0px";
}
}
$(window).on('load', function(){
    $('.level-slider').slick({
        lazyLoad: 'ondemand',
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
    });
});

$(window).on('load', function(){
    $('.star-places-body').slick({
        lazyLoad: 'ondemand',
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
         vertical: true, 
    });
 });
 


$(".col-md-4").slice(0, 6).show();
if($(".col-md-4").length <=6)
    {
        $(".loadMore").fadeOut();
    }

$(".loadMore").on("click",function(){
    $(".col-md-4:hidden").slice(0, 3).show();

    if($(".col-md-4:hidden").length ==0)
    {
        $(".loadMore").fadeOut();
    }
})




const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}

$(document).ready(function () {

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });


    // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();

});