// slider

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
slides[slideIndex-1].style.display = "block";
}

// console.log(document.querySelectorAll('button'));

// to show payment code
// let btns = document.querySelectorAll('.way p');
//     btns.forEach(btn => {
//         btn.onclick = ()=>{
//             btn.classList.add('active');
//             let copyNum = btn.dataset.number;
//             if(btn.active != " "){
//                 btn.innerText = copyNum;
//             };
//         }
//     });
