// $('.navbar-burger').click(function() {
//     $('#navbarMenuHeroA, .navbar-burger').toggleClass('is-active');
//   });


//

// $(".navbar-burger").click(function () {
//     $("#navbarMenuHeroA").toggle(".is-active");
// });

// $( ".navbar-burger" ).click(function() {
//     $( "#navbarMenuHeroA, .navbar-burger").toggle(".is-active");
//   });


// $(document).ready(function() {

//     // Check for click events on the navbar burger icon
//     $(".navbar-burger").click(function() {

//         // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
//         $(".navbar-burger").toggleClass("is-active");
//         $(".navbar-menu").toggleClass("is-active");

//     });
//   });

// for toggling navbar to a burger icon in responsive way 
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }

});   