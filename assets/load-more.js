document.addEventListener('DOMContentLoaded', async function () {
    const $buttons = document.querySelectorAll('.load-more');

    await $buttons.forEach(async function ($button) {
        $button.addEventListener('click', async function (event) {
            const destinationId = event.target.dataset.destination;

            const $destination = document.getElementById(destinationId);

            const url = event.target.dataset.url.replace('__page__', event.target.dataset.currentPage);

            const response = await fetch(url);

            const html = await response.text();

            $destination.insertAdjacentHTML('beforeend', html);

            event.target.dataset.currentPage = parseInt(event.target.dataset.currentPage) + 1;
        });
    });
});
