document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('userRegister').addEventListener('submit', handleFormSubmit);
    document.getElementById('userLogin').addEventListener('submit', handleFormSubmit);
});

function validateRegister() {
    var name = document.getElementById("name").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var centre = document.getElementById("centre").value;

    if (name === "") {
        alert("Please provide your name");
        document.getElementById("name").focus();
        return false;
    }
    if (username === "") {
        alert("Please provide your username");
        document.getElementById("username").focus();
        return false;
    }
    if (password === "") {
        alert("Please provide your password");
        document.getElementById("password").focus();
        return false;
    }
    if (email === "") {
        alert("Please provide your email");
        document.getElementById("email").focus();
        return false;
    }
    if (centre === "") {
        alert("Please provide your centre name");
        document.getElementById("centre").focus();
        return false;
    }

    return true;
}

function validateLogin() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "") {
        alert("Please provide your username");
        document.getElementById("username").focus();
        return false;
    }
    if (password === "") {
        alert("Please provide your password");
        document.getElementById("password").focus();
        return false;
    }

    return true;
}

function handleFormSubmit(event) {
    event.preventDefault();

    var form = event.target;
    var isValid = false;

    if (form.id === 'userRegister') {
        isValid = validateRegister();
    } else if (form.id === 'userLogin') {
        isValid = validateLogin();
    }

    if (isValid) {
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        var url = form.id === 'userRegister' ? '../php/register.php' : '../php/login.php';

        xhr.open('POST', url, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var response = xhr.responseText.trim();
                if (response === 'success') {
                    var message = form.id === 'userRegister' ? "Registered successfully!" : "Logged in successfully!";
                    alert(message);
                    setTimeout(function() {
                        var redirectUrl = form.id === 'userRegister' ? 'login.html' : 'admin_page.html';
                        window.location.href = redirectUrl;
                    }, 1000);
                } else if (response === 'exists') {
                    alert("Username already exists. Please choose another one.");
                } else {
                    var errorMessage = form.id === 'userRegister' ? "Registration failed. Please try again." : "Invalid username or password!";
                    alert(errorMessage);
                }
            } else {
                alert('Request failed. Please try again later.');
            }
        };
        xhr.send(formData);
    }
}
