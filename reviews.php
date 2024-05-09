<?php
    session_start();
    $current_page = basename($_SERVER['PHP_SELF']);
    include 'connect.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <div class="searchh" id="search-box">
        <input type="text" placeholder="Search here">
    </div>

    <main id="main-reviews">
        <?php
        if(isset($_SESSION['username'])) {
            echo '
        <div id="review-form">
            <h2>ADD REVIEW</h2>
            <form id="add-review-form" action="submit-review.php" method="POST">
                <label for="review-content">Description:</label>
                <textarea id="review-content" name="review-content" required></textarea>
                
                <div id="rating-div">
                    <div id="label-select">
                        <label for="rating">Rating:</label>
                        <select id="rating" name="rating" required>
                            <option value="1">1 star</option>
                            <option value="2">2 stars</option>
                            <option value="3">3 stars</option>
                            <option value="4">4 stars</option>
                            <option value="5">5 stars</option>
                        </select>
                    </div>

                    <button type="submit" name="Send-review">Send review</button>
                </div>
            </form>
        </div> ';
        }
        ?>

        <?php
            $query = "SELECT * FROM reviews";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                echo '<div id="reviews-div">';
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="review">
                        <div class="review-header">
                            <h2>'.$row['username'].'</h2>
                            <p>'.$row['post_date'].'</p>
                        </div>
                        <div class="review-content">
                            <p>'.$row['content'].'</p>
                        </div>
                        <div class="review-footer">';
                        if ($row['rating'] == '1') {
                            echo '<p>Rating: '.$row['rating'].' star</p>';
                        } else {
                            echo '<p>Rating: '.$row['rating'].' stars</p>';
                        }
                        echo '</div>';

                        if(isset($_SESSION['username']) && $_SESSION['role'] == "ADMIN") {
                            echo '<button id="btn-delete-review" onclick="deleteReview(' . $row["id"] . ')">Delete Review</button>';
                        }

                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>Nu există recenzii disponibile.</p>';
            }
        ?>
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

    <script src="reviews.js"></script>
</body>
</html>