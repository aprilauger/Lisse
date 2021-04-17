/**
 * Scroll Animation
 *
 * Adds animation to the front page when the user scrolls the page.
 */
jQuery(document).ready(function ($) {
    // Hide elements on page load
    $('.img-1').css('opacity', 0);
    $('.img-2').css('opacity', 0);
    $('.img-3').css('opacity', 0);
    $('.img-4').css('opacity', 0);
    $('.img-5').css('opacity', 0);
    $('.img-6').css('opacity', 0);
    $('.fade-in-left').css('opacity', 0);
    $('.fade-in-right').css('opacity', 0);
    $('.fade-in-up').css('opacity', 0);
    $('.fade-in-down').css('opacity', 0);
    $('.fade-in-contact').css('opacity', 0);
    $('.cta-left-wrapper').css('opacity', 0);
    $('.cta-right-wrapper').css('opacity', 0);

    $('.jumbotron').waypoint(
        function () {
            $('.jumbotron').addClass('fadeIn slow delay-1s');
        },
        { offset: '70%' }
    );

    $('.img-1').waypoint(
        function () {
            $('.img-1').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.img-2').waypoint(
        function () {
            $('.img-2').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.img-3').waypoint(
        function () {
            $('.img-3').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.img-4').waypoint(
        function () {
            $('.img-4').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.img-5').waypoint(
        function () {
            $('.img-5').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.img-6').waypoint(
        function () {
            $('.img-6').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.fade-in-right').waypoint(
        function () {
            $('.fade-in-right').addClass('fadeInRight slower');
        },
        { offset: '70%' }
    );

    $('.fade-in-left').waypoint(
        function () {
            $('.fade-in-left').addClass('fadeInLeft slow');
        },
        { offset: '70%' }
    );

    $('.fade-in-up').waypoint(
        function () {
            $('.fade-in-up').addClass('fadeInUp slower');
        },
        { offset: '70%' }
    );

    $('.fade-in-down').waypoint(
        function () {
            $('.fade-in-down').addClass('fadeInDown slow');
        },
        { offset: '70%' }
    );

    $('.fade-in-contact').waypoint(
        function () {
            $('.fade-in-contact').addClass('fadeIn slow');
        },
        { offset: '70%' }
    );

    $('.cta-left-wrapper').waypoint(
        function () {
            $('.cta-left-wrapper').addClass('fadeIn slower');
        },
        { offset: '70%' }
    );
    $('.cta-right-wrapper').waypoint(
        function () {
            $('.cta-right-wrapper').addClass('fadeIn slower');
        },
        { offset: '70%' }
    );

    $('.scroll-on').removeClass('scroll-on');
});
