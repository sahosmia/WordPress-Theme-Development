// Header Functionality
jQuery(document).ready(function($) {
    // Mobile Menu Toggle
    $('.mobile-menu-toggle').click(function() {
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('active');
        $('.mobile-menu-overlay').toggleClass('active');
        $('body').toggleClass('menu-open');
    });
    
    // Close mobile menu on overlay click
    $('.mobile-menu-overlay').click(function() {
        $('.mobile-menu-toggle').removeClass('active');
        $('.main-navigation').removeClass('active');
        $(this).removeClass('active');
        $('body').removeClass('menu-open');
    });
    
    // Search Toggle
    $('.search-toggle').click(function() {
        $('.search-overlay').toggleClass('active');
        $(this).toggleClass('active');
        if ($('.search-overlay').hasClass('active')) {
            $('.search-overlay input[type="search"]').focus();
        }
    });
    
    $('.close-search').click(function() {
        $('.search-overlay').removeClass('active');
        $('.search-toggle').removeClass('active');
    });
    
    // Dark Mode Toggle
    $('.dark-mode-toggle').click(function() {
        $('body').toggleClass('dark-mode');
        localStorage.setItem('darkMode', $('body').hasClass('dark-mode'));
        
        // Toggle icons
        $('.dark-mode-toggle .fa-moon, .dark-mode-toggle .fa-sun').toggle();
    });
    
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'true') {
        $('body').addClass('dark-mode');
        $('.dark-mode-toggle .fa-moon').hide();
        $('.dark-mode-toggle .fa-sun').show();
    }
    
    // Header Scroll Effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });
    
    // Reading Progress Bar
    $(window).scroll(function() {
        var winScroll = $(this).scrollTop();
        var height = $(document).height() - $(window).height();
        var scrolled = (winScroll / height) * 100;
        $('.reading-progress-bar').css('width', scrolled + '%');
    });
    
    // Dropdown Menu for Mobile
    $('.nav-menu .menu-item-has-children > a').click(function(e) {
        if ($(window).width() <= 768) {
            e.preventDefault();
            $(this).siblings('.sub-menu').toggleClass('active');
            $(this).toggleClass('dropdown-active');
        }
    });
    
    // Close menus when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.main-navigation').length && 
            !$(event.target).closest('.mobile-menu-toggle').length) {
            $('.main-navigation').removeClass('active');
            $('.mobile-menu-toggle').removeClass('active');
            $('.mobile-menu-overlay').removeClass('active');
        }
        
        if (!$(event.target).closest('.search-overlay').length && 
            !$(event.target).closest('.search-toggle').length) {
            $('.search-overlay').removeClass('active');
            $('.search-toggle').removeClass('active');
        }
    });
});