import Swiper from 'swiper';

const slider =  document.querySelector('.slider .swiper');
if(slider) {
    const interval = slider.getAttribute('data-slide-interval');
    let autoplay;

    if(interval){
        autoplay = {
            delay: parseInt(interval),
        }
    }
    const swiper = new Swiper('.slider .swiper', {
        loop: true,      
        autoplay
    });
}