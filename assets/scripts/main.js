import Typed from 'typed.js'

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
                strings: ["return  URLSession\n .shared\n .rx\n .response(method: .get, u\n", "Hello", "I am Hugo Lantillon, I am 19 years old, I live and work in Lyon.\n" +
                "I started at Ynov Campus University after a Technical Bachelor's degree in Computer Science,\n" +
                "I am currently in the 2nd year of my Bachelor's degree where I specialized in programming,\n" +
                "I quickly developed this passion following a project that was carried out both at the university and outside."]
            });
    }
});