<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="<?php echo e(url('css/home_style.css')); ?>">
</head>
<body>
    <header>
        <div class="banner">
            <div class="navbar">
                <img src="<?php echo e(url('img/logo_trans.png')); ?>" class="logo" alt="Logo">
                <ul>
                    <li><a href="<?php echo e(url('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(url('register')); ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="content">
            <h1>Welcome Admin</h1>
            <p>Let's get to business!</p>
            <div>
                <a href="<?php echo e(route('donated.book')); ?>">
                    <button type="button">BOOKS DONATED</button>
                </a>
                <a href="<?php echo e(route('purchased.book')); ?>">
                    <button type="button">BOOKS PURCHASED</button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
<?php /**PATH C:\Users\USER\Desktop\SEM 6\Web App\Book Donation Web App\book_donation\resources\views/admin_page.blade.php ENDPATH**/ ?>