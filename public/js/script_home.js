// Função para calcular o número de slides visíveis com base no tamanho da tela
function calcularSlidesVisiveis() {
  if (window.innerWidth >= 1600) {
      return 8; // 8 slides visíveis para telas grandes
  } else if (window.innerWidth >= 1000) {
      return 6; // 6 slides visíveis para telas médias
  } else if (window.innerWidth >= 700) {
      return 4; // 4 slides visíveis para telas pequenas
  } else {
      return 2; // 2 slides visíveis para dispositivos móveis
  }
}

// Inicializar o Swiper com as configurações responsivas
var swiper1 = new Swiper(".mySwiper", {
  slidesPerView: calcularSlidesVisiveis(),
  centeredSlides: false,
  spaceBetween: 20,
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

// Atualizar o número de slides visíveis quando a janela for redimensionada
window.addEventListener("resize", function () {
  swiper1.params.slidesPerView = calcularSlidesVisiveis();
  swiper1.update();
});
