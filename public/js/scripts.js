const burgerMenu = document.getElementById('mobile-menu-btn');
const mobileNav = document.querySelector('.mobile-nav');
const selectedLang = JSON.parse(localStorage.getItem('lang')) || "en";
burgerMenu.addEventListener('click', toggleMenu)

function toggleMenu(){
    document.querySelector('header').classList.toggle('active')
    mobileNav.classList.toggle('active')
    burgerMenu.classList.toggle('active')
}
mobileNav.querySelectorAll("ul li").forEach(e => {
    e.addEventListener('click', function(){
        toggleMenu();
    })
})

const programmeCards = document.querySelectorAll('.programme-grid article')
programmeCards.forEach(e => {
    e.querySelector('.title')?.addEventListener('click', function(){e.classList.toggle('active')})
})

