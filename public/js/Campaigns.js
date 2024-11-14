new Glide('.AllCampaigns', {
    type: 'carousel',
    startAt: 0,
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


if(window.innerWidth <= 800){

    document.querySelector('.details img').src = document.querySelector('.glide__slide--active h1').dataset.image
    document.querySelector('.details img').alt = document.querySelector('.glide__slide--active h1').dataset.title
    document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide--active h1').dataset.details
    document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide--active h1').dataset.title
    document.querySelector('.details section a').href = document.querySelector('.glide__slide--active h1').dataset.link

    document.querySelector('.glide__arrow--left').addEventListener('click', ()=>{
        document.querySelector('.details img').src = document.querySelector('.glide__slide:has(+ .glide__slide--active) h1').dataset.image
        document.querySelector('.details img').alt = document.querySelector('.glide__slide:has(+ .glide__slide--active) h1').dataset.title
        document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide:has(+ .glide__slide--active) h1').dataset.details
        document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide:has(+ .glide__slide--active) h1').dataset.title
        document.querySelector('.details section a').href = document.querySelector('.glide__slide:has(+ .glide__slide--active) h1').dataset.link
    })

    document.querySelector('.glide__arrow--right').addEventListener('click', ()=>{
        document.querySelector('.details img').src = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.image
        document.querySelector('.details img').alt = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.title
        document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.details
        document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.title
        document.querySelector('.details section a').href = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.link
    })

}else{

    document.querySelector('.details img').src = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.image
    document.querySelector('.details img').alt = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.title
    document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.details
    document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.title
    document.querySelector('.details section a').href = document.querySelector('.glide__slide--active + .glide__slide h1').dataset.link

    document.querySelector('.glide__arrow--left').addEventListener('click', ()=>{
        document.querySelector('.details img').src = document.querySelector('.glide__slide--active h1').dataset.image
        document.querySelector('.details img').alt = document.querySelector('.glide__slide--active h1').dataset.title
        document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide--active h1').dataset.details
        document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide--active h1').dataset.title
        document.querySelector('.details section a').href = document.querySelector('.glide__slide--active h1').dataset.link
    })

    document.querySelector('.glide__arrow--right').addEventListener('click', ()=>{
        document.querySelector('.details img').src = document.querySelector('.glide__slide--active + .glide__slide + .glide__slide h1').dataset.image
        document.querySelector('.details img').alt = document.querySelector('.glide__slide--active + .glide__slide + .glide__slide h1').dataset.title
        document.querySelector('.details .info').innerHTML = document.querySelector('.glide__slide--active + .glide__slide + .glide__slide h1').dataset.details
        document.querySelector('.details section h1').innerHTML = document.querySelector('.glide__slide--active + .glide__slide + .glide__slide h1').dataset.title
        document.querySelector('.details section a').href = document.querySelector('.glide__slide--active + .glide__slide + .glide__slide h1').dataset.link
    })

}
