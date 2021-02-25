const navSlide = ()=>{
    const menu_barre = document.querySelector('.menu_barre');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.navLinks li');

    menu_barre.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');

        menu_barre.classList.toggle('toggle');
    });
}
navSlide();