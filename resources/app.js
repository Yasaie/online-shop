// SCSS
require('./app.scss');


// JavaScript Libraries
require('../node_modules/node-waves/dist/waves.min');
import Vue from './library/vue';

$(document).on('click', 'a[href^="#"]', function(e) {
    e.preventDefault();
    var target = $(this).attr('href');
    $('html, body').animate({scrollTop: $(target).offset().top}, 'slow', 'swing', function() {});
});

// Header
require('./js/header');

// Home
require('./js/home');

// Gallery
require('./js/gallery');