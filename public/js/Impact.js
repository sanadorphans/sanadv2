new Glide('.AllImpacts', {
    type: 'carousel',
    startAt: 0,
    perView: 3,
    peek: {
        before: 0,
        after: 0
    },
    breakpoints: {
        800: {
          perView: 1,
          peek: {
            before: 0,
            after: 0
          },
        }
    }

}).mount()

new Glide('.slider-numbers', {
    type: 'carousel',
    autoplay: 4000,
    perView: 1
}).mount()

// use Impact.getBoundingClientRect() to make animation fide when scroll
let ImpactElements = document.querySelectorAll('.Impact');

ImpactElements.forEach((element) => {
  window.addEventListener('scroll', () => {
    let rect = element.getBoundingClientRect();

    if (rect.top < window.innerHeight - 100 && rect.bottom > 0) {
      // Add animation class to the element
      element.classList.remove('fade');
    } else {
      // Remove animation class from the element
      element.classList.add('fade');
    }
  });
});
