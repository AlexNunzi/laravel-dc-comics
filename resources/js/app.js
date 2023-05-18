import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteButtons = document.querySelectorAll('.form_delete');

deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();
        const formId = event.target.form.id;

        const deleteModal = document.getElementById('confirmDeleteModal');

        const bootstrapModal = new bootstrap.Modal('#confirmDeleteModal');
        bootstrapModal.show();

        const confirmDeleteButton = deleteModal.querySelector('.confirmDelete');

        confirmDeleteButton.addEventListener('click', () => {
            const submitForm = document.getElementById(formId);
            submitForm.submit();
        });
    })
});