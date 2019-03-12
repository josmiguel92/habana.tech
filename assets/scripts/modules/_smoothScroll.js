class SmoothScrooll{
    constructor(){
        this.offset = -10;
        this.call = null;
        this.links = document.querySelectorAll(".nav a[href*='#']");
        this.events();
    }

    events(){
        for (let link of this.links)
            link.addEventListener("click", this.reply_click.bind(this));
    }

    scroll() {
        if (Math.abs(this.offset - document.documentElement.scrollTop) < 10)
            clearInterval(this.call);
        else if ((this.offset - document.documentElement.scrollTop) > 0) {
            document.documentElement.scrollTop += 10;
        }
        else {
            document.documentElement.scrollTop -= 10;
        }

    };

     reply_click(event) {
        event.preventDefault();
        this.call = setInterval(this.scroll.bind(this), 10);
        let targetElement = event.target.getAttribute('data-section');
        this.offset = document.querySelector(targetElement).offsetTop;
    }
}

export default SmoothScrooll;



