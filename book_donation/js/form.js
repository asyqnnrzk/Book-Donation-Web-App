function validateRegister(event) {

    var name = document.getElementById("name").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;

    if (name === "") {
        alert("Please provide your name");
        document.getElementById("name").focus();
        event.preventDefault();
        return false;
    }
    if (username === "") {
        alert("Please provide your username");
        document.getElementById("username").focus();
        event.preventDefault();
        return false;
    }
    if (password === "") {
        alert("Please provide your password");
        document.getElementById("password").focus();
        event.preventDefault();
        return false;
    }
    if (email === "") {
        alert("Please provide your email");
        document.getElementById("email").focus();
        event.preventDefault();
        return false;
    }

    return true;
}

function validateLogin(event) {

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "") {
        alert("Please provide your username");
        document.getElementById("username").focus();
        event.preventDefault();
        return false;
    }
    if (password === "") {
        alert("Please provide your password");
        document.getElementById("password").focus();
        event.preventDefault();
        return false;
    }

    return true;
}

