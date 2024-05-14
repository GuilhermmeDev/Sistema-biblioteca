var swiper1 = new Swiper(".mySwiper", {
    slidesPerView: 8,
    centeredSlides: false,
    spaceBetween: 90,
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    initialSlide: 3,
  });

  