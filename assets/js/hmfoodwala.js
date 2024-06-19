// Rating slider JS Start
$(document).ready(function () {
  var ratingSlider = new Swiper(".rating-slider", {
    slidePerView: 1,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
    },
  });
});
// Rating slider JS End
// Masonary Layout JS Start
$(".grid").isotope({
  itemSelector: ".grid-item",
});
// Masonary Layout JS End
// Initialize Venobox Start
$(document).ready(function () {
  $(".venobox").venobox();
});
// Initialize Venobox End
// $('.grid-item').first().addClass('active');
var counter = 1;
$(".grid-item").eq(0).addClass("active");
setInterval(function () {
  var c = counter % $(".grid-item").length;
  $(".grid-item").removeClass("active");
  $(".grid-item").eq(c).addClass("active");
  ++counter;
}, 5000);
//form positioning
$(function () {
  $(window).on("load resize scroll", function (e) {
    var elements = $(".pos-tracker");
    if (elements.length > 0) {
      var element = elements[0];
      var coords = element.getBoundingClientRect();
      var bodyCoords = document.body.getBoundingClientRect();
      if (bodyCoords.width > 991) {
        $(".contact-form-wrapper").css(
          "width",
          bodyCoords.width - coords.left - 45
          );
      } else {
        $(".contact-form-wrapper").css("width", "");
      }
    }
  });
});
// ===== Hamburger JS Start====
$(".hamburger").click(function (e) {
  e.preventDefault();
  $(this).toggleClass("is-active");
});
$(document).ready(function () {
  var imgwidth = $(".how-it-image-blk img").outerWidth();
  $(".how-it-image-slider").css({width: imgwidth});
});
$(window).resize(function(){
  var imgwidth = $(".how-it-image-blk img").outerWidth();
  $(".how-it-image-slider").css({width: imgwidth});
})
