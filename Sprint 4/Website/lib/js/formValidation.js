document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                localStorage.setItem(input.id, input.value);
                validateInput(input);
            });
            input.addEventListener('click', () => {
                localStorage.setItem(input.id, input.value);
                validateInput(input);
            });
        });

        form.addEventListener('submit', (event) => {
            let valid = true;
            inputs.forEach(input => {
                if (!validateInput(input)) {
                    valid = false;
                }
            });
            if (!valid) {
                event.preventDefault();
            } else {
                inputs.forEach(input => {
                    localStorage.removeItem(input.id);
                });
            }
        });

        inputs.forEach(input => {
            if (localStorage.getItem(input.id)) {
                input.value = localStorage.getItem(input.id);
            }
        });
    });
});

function validateInput(input) {
    if (input.validity.valid) {
        input.classList.remove('invalid');
        return true;
    } else {
        input.classList.add('invalid');
        return false;
    }
}