console.log('viewed hidden');
const recentlyViewed = document.querySelector('#recently-viewed');

function viewedHidden (  ) {
    let scrollBottom = (document.documentElement.scrollTop + document.documentElement.clientHeight >= document.documentElement.scrollHeight -120);
    if ( scrollBottom ) {
        recentlyViewed.classList.add('recently-viewed--hidden');
    } else {
        recentlyViewed.classList.remove('recently-viewed--hidden');
    }
}

window.addEventListener('scroll', viewedHidden, false);
