function toggleForm() {
    var loginForm = document.getElementById('login-form');
    var registerForm = document.getElementById('register-form');
    var toggleText = document.getElementById('toggle-text');
    var toggleLink = document.getElementById('toggle-link');

    if (loginForm.style.display === 'none') {
        registerForm.style.display = 'none';
        loginForm.style.display = 'block';
        toggleText.textContent = '¿No tienes una cuenta?';
        toggleLink.textContent = ' Regístrate aquí';
        toggleLink.onclick = toggleForm;
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        toggleText.textContent = '¿Ya tienes cuenta?';
        toggleLink.textContent = ' Inicia sesión';
        toggleLink.onclick = toggleForm;
    }
}