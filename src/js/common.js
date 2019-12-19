'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Rellax = require('rellax');

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
      scrolllock: true,
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  new Rellax('.parallax', {});

  // Youtube Video Lazy Load
  function findVideos() {
    var videos = document.querySelectorAll('.video');

    for (var i = 0; i < videos.length; i++) {
      setupVideo(videos[i]);
    }
  }

  function setupVideo(video) {
    var link = video.querySelector('.video__link');
    var button = video.querySelector('.video__button');
    var text = video.querySelector('p');
    var id = parseMediaURL(link);

    video.addEventListener('click', function() {
      if (!this.classList.contains('video--dummy')) {
        var iframe = createIframe(id);

        link.remove();
        button.remove();
        if (text) {
          text.remove();
        }
        video.appendChild(iframe);
      }
    });

    var source = "https://img.youtube.com/vi/"+ id +"/sddefault.jpg";

    if (!video.querySelector('.video__media')) {
      var image = new Image();
      image.src = source;
      image.classList.add('video__media');

      image.addEventListener('load', function() {
        link.append( image );
      } (video) );
    }

    link.removeAttribute('href');
    video.classList.add('video--enabled');
  }

  function parseMediaURL(media) {
    var regexp = /^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/;
    var url = media.href;
    var match = url.match(regexp);

    return match[5];
  }

  function createIframe(id) {
    var iframe = document.createElement('iframe');

    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay');
    iframe.setAttribute('src', generateURL(id));
    iframe.classList.add('video__media');

    return iframe;
  }

  function generateURL(id) {
    var query = '?rel=0&showinfo=0&autoplay=1';

    return 'https://www.youtube.com/embed/' + id + query;
  }

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

  fixedHeader($(this));
  toggleNav();
  initModal();
  findVideos();

  $(window).scroll(function() {
    fixedHeader($(this));
  });

  // SVG
  svg4everybody({});
});