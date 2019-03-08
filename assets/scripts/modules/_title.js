class ChangeTitle{
    constructor(){
        this.labelText = document.querySelector('label[for="booking_pickupDetails"]');
        this.radios = document.querySelectorAll('input[type="radio"]');
        this.events();
    }

    events(){
        for (let radio of this.radios)
            radio.addEventListener('change', this.updateTitle.bind(this));
    }

    updateTitle(event){
        let option = event.target.id;;
        let text = '';
        if (option=='booking_pickupPlace_0')
            text = 'Flight number';
        else if (option=='booking_pickupPlace_1')
            text = 'Cruise name';
        else
            text = 'Hotel or casa address';

        this.labelText.innerHTML = text;
    }
}

export default ChangeTitle;