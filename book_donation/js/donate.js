function validateDonation() {
    var book_name = document.getElementById("book_name").value;
    var author = document.getElementById("author").value;
    var publisher = document.getElementById("publisher").value;
    var language = document.getElementById("language").value;
    var price = document.getElementById("price").value;
    var centre = document.getElementById("centre").value;

    if (book_name === "") {
        alert("Please provide the book name");
        document.getElementById("book_name").focus();
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
    if (price === "") {
        alert("Please provide the book price");
        document.getElementById("price").focus();
        return false;
    }
    if (centre === "") {
        alert("Please provide the book centre");
        document.getElementById("centre").focus();
        return false;
    }

    return true;
}

function handleFormSubmit(event) {
    event.preventDefault();  // Prevent default form submission

    var form = event.target;
    var isValid = validateDonation();

    if (isValid) {
        // Disable the submit button to prevent multiple submissions
        document.getElementById('submit').disabled = true;

        // Get form data
        var formData = new FormData(form);
        
        // Send form data to donate.php using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Check response from PHP
                var response = xhr.responseText.trim();
                if (response === 'success') {
                    alert("Submitted successfully!");
                    setTimeout(function() {
                        window.location.href = '../php/donated_book.php';
                    }, 1000);
                } else if (response === 'centre not exist') {
                    alert("Centre does not exist.");
                } else {
                    alert("Something went wrong. Please try again.");
                }
            } else {
                alert('Request failed. Please try again later.');
            }

            // Re-enable the submit button after processing
            document.getElementById('submit').disabled = false;
        };
        xhr.send(formData);
    }
}

document.getElementById('donate').addEventListener('submit', handleFormSubmit);
