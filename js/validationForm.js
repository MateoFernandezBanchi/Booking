
// Variables para campos
const email = document.querySelector('#correo');
const nombre = document.querySelector('#nombre');
const telefono = document.querySelector('#telefono');
const form = document.querySelector('#formPersonal');
const btnSubmit = document.querySelector('#btnSubmit');
const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regexPhone = /^[0-9()-]+$/;
btnSubmit.disabled = true;



eventListeners ();
function eventListeners () {
    email.addEventListener('blur', validarFormulario);
    nombre.addEventListener('blur', validarFormulario);
    telefono.addEventListener('blur', validarFormulario)
}

function validarFormulario (e) {
    if (e.target.value.length > 0) {
        const error = document.querySelector('p.errorMessage');
        if (error){
            error.remove();
        };

        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid', 'valid');

    } else {
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        showError ('Ese campo es obligatorio');
        btnSubmit.disabled = true;
    }
    if (e.target.type === 'email') {
     

        if (er.test(e.target.value)) {
            const error = document.querySelector('p.errorMessage');
            if (error){
                error.remove();
            };
            
    
            e.target.classList.add('is-valid', 'valid');
            e.target.classList.remove('is-invalid');
        } else {
            e.target.classList.remove('is-valid', 'valid');
            e.target.classList.add('is-invalid');
            showError ('El email no es valido');
            btnSubmit.disabled = true;

        }
    }
    if (e.target.type === 'tel') {
        if (regexPhone.test(e.target.value)) {
            const error = document.querySelector('p.errorMessage');
            if (error){
                error.remove();
            };
    
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid', 'valid');
        } else {
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            showError ('El telefono no es valido');
            btnSubmit.disabled = true;
        }
    }
    if (er.test(email.value) && telefono.value !=='' && nombre.value !=='') {
        btnSubmit.disabled = false;
        console.log('pasaste la validacion');
    } else {
        console.log('hay campos por validar');
        btnSubmit.disabled = true;
    }

}

function showError (message) {
    const errorMessage = document.createElement('p');
    errorMessage.textContent = message;
    errorMessage.classList.add('errorMessage');

    const error = document.querySelectorAll('.errorMessage')
    if (error.length === 0) {
        form.appendChild(errorMessage);
    }
    
}