document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.querySelector('.burger-menu');
    const mobileMenu = document.querySelector('.mobile-menu');

    burgerMenu.addEventListener('click', function() {
        mobileMenu.classList.toggle('open');
    });
});

document.addEventListener('DOMContentLoaded', function () {
  const sliderContainer = document.querySelector('.slider-wrapper');
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');
  let slideIndex = 0;
  let slideWidth = 0;
  let slidesPerPage = 4;
  let interval;

  function showSlide(index) {
    if (index < 0) {
      slideIndex = numSlides - 1;
    } else if (index >= numSlides) {
      slideIndex = 0;
    }
    slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  }

  prevBtn.addEventListener('click', () => {
    slideIndex--;
    showSlide(slideIndex);
  });

  nextBtn.addEventListener('click', () => {
    slideIndex++;
    showSlide(slideIndex);
  });
});