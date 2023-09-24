const loadMore =  document.querySelector('.load-more a');
if(loadMore) {
    loadMore.addEventListener('click', (e) => {
        e.preventDefault();
        
        const actualPage = loadMore.getAttribute('data-atual');
        const next = parseInt(actualPage) + 1;
        const totalPages = loadMore.getAttribute('data-total');

        loadMore.setAttribute('data-atual', next);

        if(next >= totalPages) {
            document.querySelector('.load-more').remove();
        }

        const data = new FormData();
        data.append( 'action', 'loadMore' );
        data.append('paged', next)

        fetch(ajaxURL, {
            method: "POST",
            credentials: 'same-origin',
            body: data
        })
        .then((response) => response.text())
        .then((data) => {
            document.querySelector('.container-news').insertAdjacentHTML('beforeend', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });

    })
}