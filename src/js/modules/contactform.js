export default function contactform() {
    const $form = document.getElementById('contact-braican');

    if (!$form || !window.FormData) {
        return false;
    }

    const messageEl = document.createElement('p');
    const statusMessage = {
        success: "Thanks for the note! I'll be in touch as soon as I can.",
        error:
            'There was an error submitting the form. You can always send me a note at <a href="mailto:nick.braica@gmail.com">nick.braica@gmail.com</a>, or try again later.',
    };

    messageEl.classList.add('submission__message');

    $form.addEventListener('submit', (e) => {
        e.preventDefault();

        const request = new XMLHttpRequest();
        const formName = $form.id;
        const name = encodeURIComponent($form.name.value);
        const email = encodeURIComponent($form.email.value);
        const message = encodeURIComponent($form.message.value);
        const formData = `form-name=${formName}&bot-field=&name=${name}&email=${email}&message=${message}`;

        request.open('POST', $form.getAttribute('action'), true);
        request.setRequestHeader(
            'Content-Type',
            'application/x-www-form-urlencoded; charset=UTF-8'
        );

        request.send(formData);

        // remove the message
        if (messageEl.parentNode) {
            messageEl.parentNode.removeChild(messageEl);
        }

        request.onreadystatechange = () => {
            if (request.readyState === 4) {
                // 200 - 299 = successful
                const isSuccess = request.status == 200 && request.status < 300;

                messageEl.innerHTML = isSuccess ? statusMessage.success : statusMessage.error;
                $form.parentNode.appendChild(messageEl);

                if (isSuccess) {
                    $form.reset();
                }
            }
        };
    });
}
