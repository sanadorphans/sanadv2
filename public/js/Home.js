new Glide('.slider', {
    type: 'carousel',
    perView: 1
}).mount()

new Glide('.slider-numbers', {
    type: 'carousel',
    autoplay: 4000,
    perView: 1
}).mount()

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

setTimeout(() => {
   document.querySelector('.slider').style="opacity: 1;"
}, 500);

new Glide('.partners', {
    type: 'carousel',
    startAt: 0,
    autoplay: 2000,
    perView: 3,
    touchAngle:0,
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
