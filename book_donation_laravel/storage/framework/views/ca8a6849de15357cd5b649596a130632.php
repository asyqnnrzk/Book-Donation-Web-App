<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages of Hopes Homepage</title>
    <link rel="stylesheet" href="<?php echo e(url('css/home_style.css')); ?>">
</head>
<body>
    <header>
        <div class="banner">
            <div class="navbar">
                <img src="<?php echo e(url('img/logo_trans.png')); ?>" class="logo" alt="Logo">
                <ul>
                    <li><a href="<?php echo e(url('admin_page')); ?>">Admin</a></li>
                    
                    
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="content">
            <h1>Welcome! Donate or purchase?</h1>
            <p>Your actions are truly appreciated by the world!</p>
            <div>
                <button type="button">DONATE</button>
                <button type="button">PURCHASE</button>
            </div>
            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="<?php echo e(url('img/sdg4.jpg')); ?>" style="width:100%">
                </div>
                <div class="mySlides">
                    <img src="<?php echo e(url('img/study.jpg')); ?>" style="width:100%">
                </div>
                <div class="mySlides">
                    <img src="<?php echo e(url('img/book.jpg')); ?>" style="width:100%">
                </div>
            </div>
        </div>
    </main>
    <script>
        var slideIndex = 0;
        var slides = document.getElementsByClassName("mySlides");

        function showSlides() {
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            slides[slideIndex-1].style.transform = "translateX(0)";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        function initSlideshow() {
            slides[0].style.display = "block";
            slides[0].style.transform = "translateX(0)";
            setTimeout(showSlides, 2000); // Initialize first slide and start slideshow
        }

        initSlideshow();
    </script>
</body>
</html>
<?php /**PATH C:\Users\USER\Desktop\SEM 6\Web App\Book Donation Web App\book_donation\resources\views/home.blade.php ENDPATH**/ ?>