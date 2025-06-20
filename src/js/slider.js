import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
const $ = $ => document.querySelector($)
const $$ = $$ => document.querySelectorAll($$)

document.addEventListener('DOMContentLoaded', () => {
    if ($('.slider')) {
        const opciones = {
            slidesPerView: 1,
            spaceBetween: 15,
            FreeMode: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            }
        }
        Swiper.use([Navigation])
        new Swiper('.slider', opciones)
    }
});