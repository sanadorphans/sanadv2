
if(document.querySelector('.Allpartners')){
    new Glide('.Allpartners', {
        type: 'carousel',
        autoplay: 2000,
        perView: 4,
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

}
