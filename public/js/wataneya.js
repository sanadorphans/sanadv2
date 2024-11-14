let btn = document.querySelector(".read-more");
let aside = document.querySelector(".aside");
btn.addEventListener("click", () => {
    aside.classList.toggle("open");
    btn.classList.add("d-none");
}) ;

// body
let read = document.querySelector(".read");
let readMore = document.querySelector(".read-more");
readMore.addEventListener("click", () => {
    read.classList.toggle("open");
})


