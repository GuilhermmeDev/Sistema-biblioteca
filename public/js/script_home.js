var swiper1 = new Swiper(".mySwiper", {
  slidesPerView: 8,
  centeredSlides: false,
  spaceBetween: 40,
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  initialSlide: 0,
});


