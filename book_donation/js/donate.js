function validateDonation() {
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var publisher = document.getElementById("publisher").value;
    var language = document.getElementById("language").value;

    if (title === "") {
        alert("Please provide the book title");
        document.getElementById("title").focus();
        return false;
    }
    if (author === "") {
        alert("Please provide the book author");
        document.getElementById("author").focus();
        return false;
    }
    if (publisher === "") {
        alert("Please provide the book publisher");
        document.getElementById("publisher").focus();
        return false;
    }
    if (language === "") {
        alert("Please provide the book language");
        document.getElementById("language").focus();
        return false;
    }

    return true;
}

function handleFormSubmit(event) {
    //event.preventDefault();
    var form = event.target;
    var isValid = false;

    if (form.id === 'donate') {
        isValid = validateDonation();
        if (isValid) {
            // Get form data
            var formData = new FormData(form);
            
            // Send form data to register.php using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/donated_book.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Check response from PHP
                    if (xhr.responseText.trim() === 'success') {
                        alert("Submitted successfully!");
                        setTimeout(function() {
                            window.location.href = 'viewbook.php';
                        }, 1000);
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                } else {
                    alert('Request failed. Please try again later.');
                }
            };
            xhr.send(formData);
        }
    }   

    if (!isValid) {
        event.stopPropagation();
    }
}