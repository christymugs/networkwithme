const wrapper = document.querySelector('.wrapper');
const body = document.body;
const loginLink = document.querySelector('.btnlogin-popup');
const registerLink = document.querySelector('.btnsignup-popup');
const btnPopup = document.querySelector('.btnlogin-popup');
const signPopup = document.querySelector('.btnsignup-popup');
const iconClose = document.querySelector('.icon-close');

// Function to show the login form
function showLoginForm() {
    document.getElementById('loginForm').style.transform = 'translateX(0)';
    document.getElementById('registerForm').style.transform = 'translateX(400px)';
    body.classList.add('blur'); // Add blur to the body
}

// Function to show the register form
function showRegisterForm() {
    document.getElementById('loginForm').style.transform = 'translateX(-400px)';
    document.getElementById('registerForm').style.transform = 'translateX(0)';
    body.classList.add('blur'); // Add blur to the body
}

// Function to hide the forms and remove the blur
function hideForms() {
    wrapper.classList.remove('active-popup');
    body.classList.remove('blur'); // Remove blur from the body
}

registerLink.addEventListener('click', () => {
    showRegisterForm();
});

loginLink.addEventListener('click', () => {
    showLoginForm();
});

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    body.classList.add('blur'); // Add blur to the body
});

signPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    body.classList.add('blur'); // Add blur to the body
});

iconClose.addEventListener('click', () => {
    hideForms();
});

function registerUser() {
    const registerForm = document.getElementById('registerForm');
    const formData = new FormData(registerForm);

    fetch('register.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
        if (data.status === 'success') {
            alert(data.message); // Show a success message
            hideForms(); // Optionally, you can close the registration popup or redirect the user
        } else {
            alert(data.message); // Show an error message
        }
    })
    .catch(error => console.error('Error:', error));
}

function loginUser() {
    const loginForm = document.getElementById('loginForm');
    const formData = new FormData(loginForm);

    fetch('login.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Handle the server response as needed
    })
    .catch(error => console.error('Error:', error));
}
