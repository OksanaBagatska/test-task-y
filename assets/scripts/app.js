document.addEventListener('DOMContentLoaded', function () {
    let form = document.querySelector('.js-subscribe-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        if (validateForm()) {
            let formData = new FormData(form);
            formData.append('action', 'subscribe');

            let responseMessage = document.querySelector('.js-response-message');

            fetch(ajax_object.ajax_url, {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    form.style.display = 'none';
                    responseMessage.style.display = 'flex';

                    form.reset();
                })
                .catch(error => console.error('Error:', error));
        }
    });

    function validateForm() {
        const email = document.getElementById('email').value,
            checkbox = document.getElementById('agree'),
            checkmark = document.getElementById('checkmark'),
            emailError = document.getElementById('emailError'),
            checkboxError = document.getElementById('checkboxError');

        emailError.textContent = '';
        checkboxError.textContent = '';

        if (email === '' || !isValidEmail(email)) {
            emailError.textContent = 'The e-mail is not valid.';
            document.getElementById('email').classList.add('error');
        }

        if (!checkbox.checked) {
            checkboxError.textContent = 'Please select checkbox.';
            checkmark.classList.add('error');
        }

        return emailError.textContent === '' && checkboxError.textContent === '';
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
