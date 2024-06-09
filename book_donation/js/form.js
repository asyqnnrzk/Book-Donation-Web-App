function validateRegister() {
    var name = document.getElementById("name").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;

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
        if (isValid) {
            alert("Registered successfully!");
            setTimeout(function() {
                window.location.href = 'login.html';
            }, 1000);
        }
    } else if (form.id === 'userLogin') {
        isValid = validateLogin();
        if (isValid) {
            alert("Logged in successfully!");
            setTimeout(function() {
                window.location.href = 'admin_page.html';
            }, 1000);
        }
    }

    if (!isValid) {
        event.stopPropagation();
    }
}

document.getElementById('userRegister').addEventListener('submit', handleFormSubmit);
document.getElementById('userLogin').addEventListener('submit', handleFormSubmit);
