<?php
    session_start();
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My garden</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c2d64ebb86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="slideout-menu">
        <ul>
            <?php
                if(!isset($_SESSION['username'])) {
                    echo '<li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="tree-gallery.php">Tree gallery</a></li>
                    <li><a href="edu-res.php">Educational resources</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li>
                        <input class="searchh" type="text" placeholder="Search here">
                    </li>';
                } else {
                    echo '<li><a href="logout.php">Logout</a></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="tree-gallery.php">Tree gallery</a></li>
                    <li><a href="edu-res.php">Educational resources</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li>
                        <input class="searchh" type="text" placeholder="Search here">
                    </li>';
                }
            ?>
        </ul>
    </div>

    <header>
        <nav>
            <div id="logo-img">
                <a href="home.php">
                    <img src="images/logo.png" alt="My garden logo">
                </a>
            </div>
            <div id="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
            <ul>
                <?php
                if(isset($_SESSION['username'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    if($current_page == 'login.php')
                        echo '<li class="active"><a href="login.php">Login</a></li>';
                    else {
                        echo '<li><a href="login.php">Login</a></li>';
                    }
                    if($current_page == 'register.php')
                        echo '<li class="active"><a href="register.php">Register</a></li>';
                    else {
                        echo '<li><a href="register.php">Register</a></li>';
                    }
                }
                ?>
            </ul>
            <ul>
                <li <?php if($current_page == 'home.php') echo 'class="active"'; ?>><a href="home.php">Home</a></li>
                <li <?php if($current_page == 'tree-gallery.php') echo 'class="active"'; ?>><a href="tree-gallery.php">Tree gallery</a></li>
                <li <?php if($current_page == 'edu-res.php') echo 'class="active"'; ?>><a href="edu-res.php">Educational resources</a></li>
                <li <?php if($current_page == 'reviews.php') echo 'class="active"'; ?>><a href="reviews.php">Reviews</a></li>
                <li>
                    <div class="searchh" id="search-icon">
                        <i class="fas fa-search"></i>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div id="search-box">
        <input class="searchh" type="text" placeholder="Search here">
    </div>

    <div id="banner">
        <h1>Welcome to my garden</h1>
        <h2>Admire the simple beauty and complexity of nature</h2>
    </div>

    <main>
        <a href="edu-res.php">
            <h2 class="section-heading">All seasons</h2>
        </a>

        <section>
            <div class="card">
                <div class="card-image">
                    <img class="img-card" src="images/spring-tree.jpg" alt="Spring tree">
                </div>
                <div class="card-description">
                        <h3>Spring trees</h3>
                    <p>
                        Spring is awesome! Come learn more about it!
                    </p>
                    <a href="edu-res.php#spring-section" class="btn-readmore">Read more</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img class="img-card" src="images/summer-tree.jpg" alt="Summer tree">
                </div>
                <div class="card-description">
                    <h3>Summer trees</h3>
                    <p>
                        Summer is awesome! Come learn more about it!
                    </p>
                    <a href="edu-res.php#summer-section" class="btn-readmore">Read more</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img class="img-card" src="images/autumn-tree.jpg" alt="Autumn tree">
                </div>
                <div class="card-description">
                    <h3>Autumn trees</h3>
                    <p>
                        Autumn is awesome! Come learn more about it!
                    </p>
                    <a href="edu-res.php#autumn-section" class="btn-readmore">Read more</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img class="img-card" src="images/winter-tree.jpg" alt="Winter tree">
                </div>
                <div class="card-description">
                    <h3>Winter trees</h3>
                    <p>
                        Winter is awesome! Come learn more about it!
                    </p>
                    <a href="edu-res.php#winter-section" class="btn-readmore">Read more</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="left-footer">
            <h3>We hope you'll leaf us a good review!</h3>
            <div id="logo-img">
                <a href="#top" id="scrollToTop">
                    <img src="images/logo.png" alt="My garden logo">
                </a>
            </div>
        </div>

        <div class="right-footer">
            <h3>Follow us on</h3>
            <div id="social-media-footer">  
                <ul>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <p>This website is developed by Cami, with the help of Cosmo <3</p>
    </footer>

    <div class="popup-image">
        <span>&times;</span>
        <img src="images/winter-tree.jpg" alt="">
    </div>

    <script src="main.js"></script>  
</body>
</html>