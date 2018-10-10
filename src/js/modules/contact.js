export default class Contact {
    constructor() {
        this.$form = document.getElementById('contact-braican');

        if (!this.$form || !window.FormData) {
            return false;
        }

        this.messageEl = document.createElement('p');
        this.messageEl.classList.add('submission__message');

        this.statusMessage = {
            success: "Thanks for the note! I'll be in touch as soon as I can.",
            error:
                'There was an error submitting the form. You can always send me a note at <a href="mailto:nick.braica@gmail.com">nick.braica@gmail.com</a>, or try again later.',
        };

        this.handleSubmission();
    }

    /**
     * Remove the form message, if there is one.
     *
     * @return void
     */
    removeCurrentMessage() {
        if (this.messageEl.parentNode) {
            this.messageEl.parentNode.removeChild(this.messageEl);
        }
    }

    /**
     * Handle the submission of the form.
     *
     * @return void
     */
    handleSubmission() {
        this.$form.addEventListener('submit', (e) => {
            e.preventDefault();

            const request = this.getRequest();
            const formData = this.getFormData();

            this.removeCurrentMessage();

            request.send(formData);
            request.onreadystatechange = () => {
                if (request.readyState === 4) {
                    // 200 - 299 = successful
                    const isSuccess = request.status == 200 && request.status < 300;

                    this.messageEl.innerHTML = isSuccess
                        ? this.statusMessage.success
                        : this.statusMessage.error;
                    this.$form.parentNode.appendChild(this.messageEl);

                    if (isSuccess) {
                        this.$form.reset();
                    }
                }
            };
        });
    }

    /**
     * Get the Http request object.
     *
     * @return XMLHttpRequest
     */
    getRequest() {
        const req = new XMLHttpRequest();
        req.open('POST', this.$form.getAttribute('action'), true);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        return req;
    }

    /**
     * Gets the form data.
     *
     * @return string
     */
    getFormData() {
        const formName = this.$form.id;
        const name = encodeURIComponent(this.$form.name.value);
        const email = encodeURIComponent(this.$form.email.value);
        const message = encodeURIComponent(this.$form.message.value);
        return `form-name=${formName}&bot-field=&name=${name}&email=${email}&message=${message}`;
    }
}
