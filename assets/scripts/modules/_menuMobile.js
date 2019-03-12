class MobileMenu{
    constructor(){
        this.menuIcon = document.querySelector('.menu-icon');
        this.logo = document.querySelector('.logo');
        this.menu = document.querySelector('.nav');
        this.siteHeader = document.querySelector('.header');
        this.links = document.querySelectorAll('nav ul li a');
        this.events();
    }

    //link the events with the functions
    events(){
        this.menuIcon.addEventListener('click', this.toggleTheMenu.bind(this));
        for (let link of this.links)
            link.addEventListener("click", this.toggleTheMenu.bind(this));
    }

    toggleTheMenu(){
        this.logo.classList.toggle('logo--is-visible');
        this.menu.classList.toggle('nav--is-visible');
        this.menuIcon.classList.toggle('menu-icon--close-x');
        this.siteHeader.classList.toggle('header--is-visible');
    }
}

export default MobileMenu;