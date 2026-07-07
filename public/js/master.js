
// Define a function called toggleNavActive
function toggleNavActive() {
    // Get the 'classList' property of the first element with the class 'navbar-nav' in the document
    const { classList } = document.querySelector('.navbar-nav');
    // Toggle the 'active' class in the 'classList'
    classList.toggle('active');
}

// Hover-based dropdown: open on mouseenter, close on mouseleave
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('nav .navItem').forEach(function (li) {
        var dropdown = li.querySelector('.dropdownMenu');
        if (!dropdown) return;

        li.addEventListener('mouseenter', function () {
            // Close all other open dropdowns
            document.querySelectorAll('nav .dropdownMenu.active').forEach(function (d) {
                if (d !== dropdown) d.classList.remove('active');
            });
            dropdown.classList.add('active');
        });

        li.addEventListener('mouseleave', function () {
            dropdown.classList.remove('active');
        });
    });
});

// if scroll y in 50px then make nav fixed
window.addEventListener('scroll', function() {
    if (window.scrollY > 52) {
        document.querySelector('nav').classList.add('fixed');
    } else {
        document.querySelector('nav').classList.remove('fixed');
    }
})

// var isDirty = function() { return false; }

// window.onload = function() {
//     window.addEventListener("beforeunload", function (e) {
//         if (formSubmitting || !isDirty()) {
//             return undefined;
//         }

//         var confirmationMessage = 'It looks like you have been editing something. '
//                                 + 'If you leave before saving, your changes will be lost.';

//         (e || window.event).returnValue = confirmationMessage; //Gecko + IE
//         return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
//     });
// };
// const dropdownMenus = document.querySelectorAll(".dropdownMenu");

// // Add a click event listener to each menu
// dropdownMenus.forEach(menu => { menu.addEventListener("click", e => {
//     // Remove the active class from all menus except the clicked one
//     dropdownMenus.forEach(other => {
//         if (other !== menu) { other.classList.remove("active"); }
//     });
//     // Toggle the active class on the clicked menu
//     menu.classList.toggle("active");
// });
// });
