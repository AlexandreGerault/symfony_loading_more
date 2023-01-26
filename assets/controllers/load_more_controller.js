import {Controller} from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["button", "destination"];

    static values = {
        url: String,
        currentPage: Number,
    }

    initialize() {
        console.log({url: this.urlValue, currentPage: this.currentPageValue});
    }

    async loadMore() {
        const url = this.urlValue.replace('__page__', Number(this.currentPageValue) + 1);

        const response = await fetch(url);

        const data = await response.json();

        this.destinationTarget.insertAdjacentHTML('beforeend', data.html);

        this.currentPageValue++;

        if (!data.hasMore) {
            this.buttonTarget.remove();
        }
    }
}
