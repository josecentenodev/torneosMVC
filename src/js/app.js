document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    // console.log(prefiereDarkMode.matches);

    const botonDarkMode = document.querySelector('.dark-mode-btn');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });

}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive)

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {
    // console.log('Desde ANVORGUESA');

    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');

    // if (navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar');
    // }
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    // contactoDiv.textContent = 'Diste Click';
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <label for="telefono">Telefono</label>
        <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]" required>
        `;
    } else {
        contactoDiv.innerHTML = `
        <label for="email">Email</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
}