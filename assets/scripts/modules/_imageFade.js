class ImageFade {
    constructor(slides, time=3000){
        this.current = 0;
        this.time = time;
        this.slides = slides;
        console.log(this.slides);
        this.event();
    }

    event(){
        setInterval(this.transition.bind(this), this.time);
    }

    transition() {
        for (let i = 0; i < this.slides.length; i++) {
            this.slides[i].style.opacity = 0;
        }
        this.current = (this.current != this.slides.length - 1) ? this.current + 1 : 0;
        this.slides[this.current].style.opacity = 1;
    }
}

export default ImageFade;
