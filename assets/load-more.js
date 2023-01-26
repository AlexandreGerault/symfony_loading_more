document.addEventListener('DOMContentLoaded', async function () {
    const $buttons = document.querySelectorAll('.load-more');

    await $buttons.forEach(async function ($button) {
        $button.addEventListener('click', async function (event) {
            const destinationId = event.target.dataset.destination;

            const $destination = document.getElementById(destinationId);

            const url = event.target.dataset.url.replace('__page__', Number(event.target.dataset.currentPage) + 1);

            const response = await fetch(url);

            const data = await response.json();

            $destination.insertAdjacentHTML('beforeend', data.html);

            event.target.dataset.currentPage = parseInt(event.target.dataset.currentPage) + 1;

            if (!data.hasMore) {
                event.target.remove();
            }
        });
    });
});
