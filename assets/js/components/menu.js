const menuButton =  document.querySelector('header .container .menu-area button.mobile');
if(menuButton) {
    menuButton.addEventListener('click', () => {
        document.querySelector('body').classList.toggle('openedMenu');
    })
}