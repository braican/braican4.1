export default function contactform() {
    const $form = document.getElementById('contact-braican');

    if (!$form || !window.FormData) {
        return false;
    }

    const messageEl = document.createElement('p');
    const message = {
        success: "Thanks for the note! I'll get back to you as soon as I can.",
        error:
            'There was an error submitting the form. You can always send me a note at <a href="mailto:nick.braica@gmail.com">nick.braica@gmail.com</a>, or try again later.',
    };

    messageEl.classList.add('submission__message');

    $form.addEventListener('submit', (e) => {
        e.preventDefault();
        const request = new XMLHttpRequest();
        const formData = new FormData($form);

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
                messageEl.innerHTML =
                    request.status == 200 && request.status < 300 ? message.success : message.error;
                $form.parentNode.appendChild(messageEl);
            }
        };
    });
}
