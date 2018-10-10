export default class Links {
    constructor() {
        this.anchorLinks = document.querySelectorAll('a[href^="#"');

        this.handleClicks();
    }

    handleClicks() {
        this.anchorLinks.forEach((link) => {
            const divId = link.getAttribute('href').replace('#', '');
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const div = document.getElementById(divId);

                if (div) {
                    div.scrollIntoView({
                        behavior: 'smooth',
                    });
                }
            });
        });
    }
}
