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
    let interval;

    function calculateSlideWidth() {
      if (slides.length > 0) {
          slideWidth = slides[0].offsetWidth;
        }
    }
    calculateSlideWidth();

    function updateSlider() {
      sliderContainer.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    }

    function nextSlide() {
      slideIndex = (slideIndex + 1) % slides.length;
      updateSlider();
    }

    function prevSlide() {
       slideIndex = (slideIndex - 1 + slides.length) % slides.length;
       updateSlider();
    }

    function startSlider() {
       interval = setInterval(nextSlide, 5000);
    }

   function stopSlider() {
         clearInterval(interval);
    }
    prevBtn.addEventListener('click', () => {
        stopSlider();
        prevSlide();
        startSlider();
    });

     nextBtn.addEventListener('click', () => {
        stopSlider();
        nextSlide();
         startSlider();
    });

   window.addEventListener('resize', () => {
        calculateSlideWidth();
        updateSlider();
   });
  startSlider();

});