'use strict';

let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Rellax = require('rellax'),
  Swiper = require('swiper');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.header__nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');
    let body = $('body');

    toggle.on('click', function (e) {
      e.preventDefault();
      nav.toggleClass('open');
      overlay.toggleClass('active');
      body.toggleClass('nav-open');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      overlay.removeClass('active');
      body.removeClass('nav-open');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      $(this).removeClass('active');
      body.removeClass('nav-open');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      keepfocus: false,
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  new Rellax('.parallax', {});

  let fixedHeader = function(e) {
    let header = $('.header');
    let h = header.outerHeight();

    if (e.scrollTop() > 200) {
      $('body').css('padding-top', h);
      header.addClass('fixed');
    }
    else {
      $('body').css('padding-top', 0);
      header.removeClass('fixed');
    }
  };

  // Hide Header on on scroll down
  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let navbarHeight = $('.header').outerHeight();

  $(window).scroll(function(event){
    didScroll = true;
  });

  setInterval(function() {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    let st = $(window).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
      return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
      // Scroll Down
      $('.header').removeClass('nav-down').addClass('nav-up');
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
        $('.header').removeClass('nav-up').addClass('nav-down');
      }
    }

    lastScrollTop = st;
  }

  new Swiper('.give-slider', {
    spaceBetween: 60,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $('body').on('click', '.load-more', function(e) {
    e.preventDefault();

    let btnText = $(this).text();
    $(this).text('Loading...');

    let data = {
      'action': 'load_more_post',
      'query': true_posts,
      'page' : current_page
    };
    $.ajax({
      url: window.wp_data.ajax_url,
      data: data,
      type: 'POST',
      success: function(data) {
        if ( data ) {
          $('.load-more').text(btnText);
          $('#response').append(data);
          current_page++;
          if (current_page == max_pages) $('.load-more').parent().remove();
        } else {
          $('.load-news').parent().remove();
        }
      }
    });
  });

  fixedHeader($(this));
  toggleNav();
  initModal();

  $(window).scroll(function() {
    fixedHeader($(this));
  });

  // SVG
  svg4everybody({});
});