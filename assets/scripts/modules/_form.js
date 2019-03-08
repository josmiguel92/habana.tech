
class UpdatePrice{
    constructor(){
        this.price = 153;
        this.passengerControl = document.querySelector('#booking_peopleCount');
        this.priceNumber = document.querySelector('#priceNumber');
        this.priceText = document.querySelector('#priceText');
        this.priceTextNegotiation = document.querySelector('#priceTextNegotiation');
        this.pricePlus = 0;
        this.events();
        this.init();
    }

    init(){
        this.priceNumber.innerHTML = this.price+'.00';
    }

    events(){
        this.passengerControl.addEventListener('input', this.updatePrice.bind(this));
    }

    updatePrice(){
        let passengerNumber = this.passengerControl.value;
        if (passengerNumber <= 5) {
            if (passengerNumber >= 1 && passengerNumber <= 3)
                this.price = 153;
            else if (passengerNumber == 4)
                this.price = 165;
            else
                this.price = 177;

            this.price += this.pricePlus;

            this.priceNumber.innerHTML = this.price+'.00';

            this.priceTextNegotiation.classList.remove('price_text_negotiation--is-visible');
            this.priceText.classList.add('price_text--is-visible');
        }
        else{
            this.priceText.classList.remove('price_text--is-visible');
            this.priceTextNegotiation.classList.add('price_text_negotiation--is-visible');
        }

    }
}

export default UpdatePrice;