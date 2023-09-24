const cancelar = document.querySelector('.form-search form button.close-search');
const formSearch = document.querySelector('.form-search');
const searchButton = document.querySelector('header .container .menu-area .mnu .search');

if(searchButton) {
    searchButton.addEventListener('click', () => {
        formSearch.classList.toggle('active');
    })
}

if(cancelar){
    cancelar.addEventListener('click', (e) => {
        e.preventDefault();
        formSearch.classList.toggle('active');
    })
}