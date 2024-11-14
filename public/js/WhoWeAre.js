// remove button when on click to show all text in wataneya story section
var fullText = document.querySelector('.full-text');
fullText.addEventListener('click', function() {
    document.querySelector('.watania-story .container .text P').style.height = "auto";
    document.querySelector('.full-text').style.display = "none";
});

// remove text and imgs when dbclick on window in our values section
window.addEventListener('dblclick', () => document.querySelector('.slider-values').style = "display:none;");
// change text and img when click on values meun
function changeImg(anyColor, anyText) {
    document.querySelector('.slider-values').style = `display: grid;border:2px dotted ${anyColor};`;
    document.querySelector('.slider-values p').innerText = anyText;
};


