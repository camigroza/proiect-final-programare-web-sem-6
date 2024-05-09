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
    
    <section id="anotimpuri">
        <article id="spring-section" class="season-section">
            <h2 id="spring" class="season-title">SPRING</h2>
            <div class="card-info">
                <div class="card-image2">
                    <div><img class="img-card2" src="images/spring1.jpg" alt="Spring Image 1"></div>
                    <div><img class="img-card2" src="images/spring2.jpg" alt="Spring Image 2"></div>
                </div>
                <p>
                    In spring, trees awaken from their winter slumber, bursting forth with vibrant new life. 
                    Buds unfurl into delicate leaves, and blossoms paint the branches with hues of pink, white, and yellow. 
                    The air is filled with the sweet fragrance of flowers, and birds return to fill the branches with their 
                    cheerful melodies. Spring is a time of rejuvenation for trees, as they eagerly soak up the warmth of the 
                    sun and eagerly begin their annual cycle of growth.
                </p>
            </div>
        </article>

        <article id="summer-section" class="season-section">
            <h2 id="summer" class="season-title">SUMMER</h2>
            <div class="card-info">
                <div class="card-image2">
                    <div><img class="img-card2" src="images/summer1.jpg" alt="Spring Image 1"></div>
                    <div><img class="img-card2" src="images/summer2.jpg" alt="Spring Image 2"></div>
                </div>
                <p>
                    As summer arrives, trees reach their full glory, their canopies lush and green under the sun's intense rays. 
                    The leaves provide shade and respite from the heat, creating cool, inviting spaces beneath their boughs. 
                    Fruits begin to ripen, dangling from branches like nature's ornaments, attracting birds and other creatures 
                    to partake in their bounty. Summer is a season of abundance for trees, as they thrive in the long, 
                    sun-drenched days, sustaining life with their generous offerings.
                </p>
            </div>
        </article>

        <article id="autumn-section" class="season-section">
            <h2 id="autumn" class="season-title">AUTUMN</h2>
            <div class="card-info">
                <div class="card-image2">
                    <div><img class="img-card2" src="images/autumn1.jpg" alt="Spring Image 1"></div>
                    <div><img class="img-card2" src="images/autumn2.jpg" alt="Spring Image 2"></div>
                </div>
                <p>
                    In autumn, trees undergo a breathtaking transformation, as their leaves turn brilliant shades of red, 
                    orange, and gold. The air becomes crisp and fragrant with the scent of fallen leaves, crunching underfoot 
                    as they carpet the ground. Trees prepare for the coming winter by shedding their leaves, a display of 
                    nature's resilience and adaptation. Against the backdrop of a clear blue sky or a fiery sunset, autumn 
                    trees paint a picture of unparalleled beauty, reminding us of the fleeting yet eternal cycles of life.
                </p>
            </div>
        </article>

        <article id="winter-section" class="season-section">
            <h2 id="winter" class="season-title">WINTER</h2>
            <div class="card-info">
                <div class="card-image2">
                    <div><img class="img-card2" src="images/winter1.jpg" alt="Spring Image 1"></div>
                    <div><img class="img-card2" src="images/winter2.jpg" alt="Spring Image 2"></div>
                </div>
                <p>
                    Winter casts a serene and magical spell upon trees, as they stand stripped of their leaves, bare branches 
                    reaching towards the frosty sky. Snow blankets the landscape, turning trees into glistening sculptures of 
                    ice and light. Despite the harsh conditions, trees remain steadfast, their dormant state a testament to 
                    their endurance and fortitude. Against the backdrop of a winter wonderland, trees exude a quiet strength 
                    and beauty, reminding us of nature's ability to find beauty and resilience even in the harshest of seasons.
                </p>
            </div>
        </article>
    </section>

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

    <script src="edu-res.js"></script>
</body>
</html>