let nav = document.querySelector('#offer');
let pageheader = document.querySelector('.page-header');



function menus(){
    let Desplazamiento_Actual = window.pageYOffset;

    if(Desplazamiento_Actual <= 50){
        nav.classList.remove('offer-header2');
        nav.className = ('offer-header');
        nav.style.transition = '1s';
        pageheader.style.position = 'relative';
        pageheader.style.boxShadow = 'none';
    }else{
        nav.classList.remove('offer-header');
        nav.className = ('offer-header2');
        nav.style.transition = '1s';
        pageheader.style.position = 'fixed';
        pageheader.style.boxShadow = '0 20px 30px 0 rgba(0, 0, 0, 0.05)';
        pageheader.style.top = '0';   
     
    }
}

window.addEventListener('scroll', function(){
    console.log(window.pageYOffset);
    menus();
});