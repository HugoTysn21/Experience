import Typed from 'typed.js'
import $ from 'jquery'

document.addEventListener('DOMContentLoaded', () => {

    if (document.body.classList.contains('contact')) {
        new Typed('#typed',
            {
                typeSpeed: 50,
                backSpeed: 15,
                backDelay: 750,
                strings: ["Projects to be defined? ", "Let's talk about them."]
            })
    }

    if (document.body.classList.contains('about')) {
        new Typed('#typed',
            {
                typeSpeed: 45,
                backSpeed: 5,
                backDelay: 150,
                strings: ["return  URLSession\n .shared\n .rx\n .response(method: .get, u\n","Hello","I am Hugo Lantillon, I am 19 years old, I live and work in Lyon.\n" +
                "I started at Ynov Campus University after a Technical Bachelor's degree in Computer Science,\n" +
                "I am currently in the 2nd year of my Bachelor's degree where I specialized in programming,\n" +
                "I quickly developed this passion following a project that was carried out both at the university and outside."]
            });
    }

    // if (document.body.classList.contains('front-page')) {
    //     new Typed('#js_typed_title span', {
    //         loop: true,
    //         strings: ['Human', 'Useful', 'Genuine', 'Obvious', 'Just a developer.'],
    //         typeSpeed: 60,
    //         backSpeed: 40,
    //         backDelay: 2000
    //     });
    // }

    $(".button").click(function(){
        $(".social.twitter").toggleClass("clicked");
        $(".social.facebook").toggleClass("clicked");
        $(".social.google").toggleClass("clicked");
        $(".social.youtube").toggleClass("clicked");
    })
});



// var quadrantItems = document.querySelectorAll('.quadrant__item');
// var svgs = document.querySelectorAll('svg');
// var cube = document.querySelector('.cube');
// var closeButton = document.querySelector('.quadrant__item__content--close');
// var isInside = false;
//
// var tl = new TimelineLite({paused: true});
// tl.timeScale(1.6);
//
// tl.to('.cube', 0.4, {rotation: 45, width: '120px', height: '120px', ease: Expo.easeOut}, 'first');
// tl.to('.plus .plus-vertical', 0.3, {height: '0', backgroundColor: '#f45c41', ease: Power1.easeIn}, 'first');
// tl.to('.plus .plus-horizontal', 0.3, {width: '0', backgroundColor: '#f45c41', ease: Power1.easeIn}, 'first');
// tl.to('.cube', 0, {backgroundColor: 'transparent'});
// tl.to(quadrantItems[0], 0.15, {x: -5, y: -5}, 'seperate');
// tl.to('.arrow-up', 0.2, {opacity: 1, y: 0}, 'seperate+=0.2');
// tl.to(quadrantItems[1], 0.15, {x: 5, y: -5}, 'seperate');
// tl.to('.arrow-right', 0.2, {opacity: 1, x: 0}, 'seperate+=0.2');
// tl.to(quadrantItems[3], 0.15, {x: 5, y: 5}, 'seperate');
// tl.to('.arrow-down', 0.2, {opacity: 1, y: 0}, 'seperate+=0.2');
// tl.to(quadrantItems[2], 0.15, {x: -5, y: 5}, 'seperate');
// tl.to('.arrow-left', 0.2, {opacity: 1, x: 0}, 'seperate+=0.2');
//
// cube.addEventListener('mouseenter', playTimeline);
// cube.addEventListener('mouseleave', reverseTimeline);
//
// function playTimeline(e) {
//     e.stopPropagation();
//     tl.play();
// }
//
// function reverseTimeline(e) {
//     e.stopPropagation();
//     tl.timeScale(1.8);
//     tl.reverse();
// }