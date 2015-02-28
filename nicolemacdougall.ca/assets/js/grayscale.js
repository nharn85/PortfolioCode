/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

$(".navbar").hide();

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 150) {
        $(".navbar").fadeIn();
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $("#navLogo").removeClass("hidden-lg hidden-md hidden-sm");
        $(".navbar-nav").removeClass("hidden-lg hidden-md hidden-sm");
    } else {
        $(".navbar").fadeOut();
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $("#navLogo").addClass("hidden-lg hidden-md hidden-sm");
        $(".navbar-nav").addClass("hidden-lg hidden-md hidden-sm");
    }
});