class SmoothScrooll{
    constructor(){
        this.offset = -10;
        this.call = null;
        this.links = document.querySelectorAll(".nav a[href^='#']");
        console.log(this.links);
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

        console.log(document.documentElement.scrollTop);
    };

     reply_click(event) {
        event.preventDefault();
        this.call = setInterval(this.scroll.bind(this), 10);
        let targetElement = event.target.getAttribute('href');
        this.offset = document.querySelector(targetElement).offsetTop;
    }
}

export default SmoothScrooll;



