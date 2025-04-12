var swiper = new Swiper(".clientSwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    lazy: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        1366: {
            slidesPerView: 7,
            spaceBetween: 20,
        },
        1920: {
            slidesPerView: 9,
            spaceBetween: 20,
        },
    },
});
