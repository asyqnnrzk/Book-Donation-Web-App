<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ url('css/signup_style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Create an account</h1>

            <div class="input-box">
                <input type="text" placeholder="Name" required>
                <i class='bx bxs-rename' ></i>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user' ></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <button type="submit" class="btn">
                SIGN ME UP!
            </button>

            <div class="register-link">
                <p>Already have an account? <a href="#">Login</a>
                </p>
            </div>

        </form>
    </div>
</body>
</html>