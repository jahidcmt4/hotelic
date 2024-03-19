;
(function ($) {
    "use strict";

    $(document).ready(function () {

        // search click prevent
        $('.hotelic-header-search a').on('click', function (e) {
            e.preventDefault();
        });

        // Stiky Menu
        $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('.has_stiky').addClass("navbar-shrink");
            } else {
                $('.has_stiky').removeClass("navbar-shrink");
            }
        });

        //Header Search Bar
        $('.hotelic-search-icon').on('click', function (e) {
            $(this).toggleClass('active-search-icon');
            $('.hotelic-header-search').toggleClass('active-search');
            e.stopPropagation();
        });

        //Header Search Bar
        $('#search_header').on('click', function (event) {
            event.stopPropagation();
        });

        // Header mobile menu
        $('.tft-mobile_menubar').on('click', function (e) {
            e.preventDefault();
            $('.tft-mobile_menubar').toggleClass('hotelic-mobile-menu-icon');
            $('.tft-mobile-main-menu').toggleClass('hotelic-active-mobile')
        });

        /**
         * Single Form date picker
         */
        if ($("#tour-booking-date").length) {
            $("#tour-booking-date").flatpickr({
                minDate: "today"
            });
        }

        /**
         * Accordion singnle tour
         */

        $(function () {
            $(".hotelic-single-accordion:not(:first-of-type) .hotelic-accordion-details").css("display", "none");
            $(".hotelic-single-accordion:not(:first-of-type) .hotelic-accordion-details").addClass("open");

            $(".hotelic-accordion-heading").click(function () {
                $(".open").not(this).removeClass("open").next().slideUp(600);
                $(this).toggleClass("open").next().slideToggle(600);
                $(this).find('span').toggleClass('active-icon');
            });
        });

        /**
         * Keybord navigation 
         */
        $(document).on('focus', '.tft-header-desktop .tft-site-navigation ul li a', function (e) {      
            $(this).parents('ul').addClass('show');
            $(this).siblings('ul').addClass('show');
            $(this).closest('li').siblings().find('ul').removeClass('show');
        });
        
        /**
         * Mobile Menu drop Down
         */
        $(document).on('click', '.hotelic-dropdown button ', function (e) {     
            $(this).addClass('active');
            $(this).closest('li').find(' > .sub-menu').addClass('show');
        });
        $(document).on('click', '.hotelic-dropdown button.active ', function (e) {     
            $(this).removeClass('active');
            $(this).closest('li').find(' > .sub-menu').removeClass('show');
        });

        if ($("body").hasClass("tf_tours-template-default")) {
            $("body").removeClass("hotelic-customizer-typography");
        }

    });

}(jQuery));