document.addEventListener('DOMContentLoaded', function() {
  const burgerMenu = document.querySelector('.burger-menu');
  const mobileMenu = document.querySelector('.mobile-menu');

  burgerMenu.addEventListener('click', function() {
      mobileMenu.classList.toggle('open');
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const sliderContainer = document.querySelector('.slider-wrapper');
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');
  let slideIndex = 0;
  let slideWidth;
  let slidesPerPage = 4;
  let interval;

  console.log('Слайдер: DOMContentLoaded');

  function calculateSlideWidth() {
      if (slides.length > 0) {
          slideWidth = slides[0].offsetWidth;
          slidesPerPage = Math.floor(sliderContainer.offsetWidth / slideWidth);
          if(slidesPerPage === 0){
              slidesPerPage = 1;
          }
          console.log('Слайдер: Ширина слайда', slideWidth);
          console.log('Слайдер: Слайдов на экране', slidesPerPage);
      }
  }
  calculateSlideWidth();

  function updateSlider() {
      const translateXValue = -slideIndex * slideWidth;
      sliderContainer.style.transform = `translateX(${translateXValue}px)`;
      console.log('Слайдер: Трансформация', translateXValue);
  }

  function nextSlide() {
      slideIndex += slidesPerPage;
      if (slideIndex >= slides.length) {
          slideIndex = 0;
      }
      updateSlider();
      console.log('Слайдер: след слайд. slideIndex', slideIndex);
  }

  function prevSlide() {
      slideIndex -= slidesPerPage;
      if (slideIndex < 0) {
          slideIndex = slides.length - slidesPerPage;
      }
      updateSlider();
      console.log('Слайдер: пред слайд. slideIndex', slideIndex);
  }

  function startSlider() {
      interval = setInterval(nextSlide, 5000);
      console.log('Слайдер: автоматическое перелистывание запущено')
  }

  function stopSlider() {
      clearInterval(interval);
      console.log('Слайдер: автоматическое перелистывание остановлено');
  }

  prevBtn.addEventListener('click', () => {
      stopSlider();
      prevSlide();
      startSlider();
      console.log('Слайдер: Клик на пред слайд');
  });

  nextBtn.addEventListener('click', () => {
      stopSlider();
      nextSlide();
      startSlider();
      console.log('Слайдер: Клик на след слайд');
  });

  window.addEventListener('resize', () => {
      calculateSlideWidth();
      updateSlider();
      console.log('Слайдер: Изменение размера окна');
  });

  startSlider();
});