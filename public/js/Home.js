
new Glide('.slider-numbers', {
    type: 'carousel',
    autoplay: 4000,
    perView: 1
}).mount()

// new Glide('.news', {
//     type: 'carousel',
//     autoplay: 4000,
//     perView: 3
// }).mount()

// new Glide('.news', {
//     type: 'carousel',
//     startAt: 0,
//     autoplay: 4000,
//     perView: 3,
//     touchAngle:0,
//     peek: {
//         before: 0,
//         after: 0
//     },
//     breakpoints: {
//         800: {
//           perView: 1,
//           peek: {
//             before: 0,
//             after: 0
//           },
//         }
//     }

// }).mount()


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


function setLang(lang){
  var body=document.body,html=document.getElementById('htmlRoot');
  if(lang==='ar'){
    body.classList.add('ar');
    html.setAttribute('lang','ar');
    html.setAttribute('dir','rtl');
    document.getElementById('btnAr').classList.add('active');
    document.getElementById('btnEn').classList.remove('active');
  } else {
    body.classList.remove('ar');
    html.setAttribute('lang','en');
    html.setAttribute('dir','ltr');
    document.getElementById('btnEn').classList.add('active');
    document.getElementById('btnAr').classList.remove('active');
  }
}
function setD(el){document.querySelectorAll('.dtyp').forEach(b=>b.classList.remove('active'));el.classList.add('active');}
function setA(el,v){document.querySelectorAll('.abtn').forEach(b=>b.classList.remove('active'));el.classList.add('active');document.getElementById('cWrap').style.display=v==='custom'?'block':'none';}
function toggleVF(){var f=document.getElementById('vf');f.style.display=f.style.display==='block'?'none':'block';}
document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',e=>{var t=document.querySelector(a.getAttribute('href'));if(t&&a.getAttribute('href').length>1){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}});});
