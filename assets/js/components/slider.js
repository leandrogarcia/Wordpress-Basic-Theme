import Swiper from 'swiper';

const slider =  document.querySelector('.slider .swiper');
if(slider) {
    const swiper = new Swiper('.slider .swiper', {
        loop: true
    });
}