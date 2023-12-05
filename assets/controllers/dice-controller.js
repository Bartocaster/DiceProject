import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.count = 0;

        const DiceNumberElement = this.element.getElementsByClassName('dice-counter')[0];

        this.element.addEventListener('click', () => {
            this.count++;
            DiceNumberElement.innerHTML = this.count;
        });
    }
}