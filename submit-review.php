<?php

session_start();
include 'connect.php';

if(isset($_POST['Send-review'])) {
    $reviewContent = $_POST['review-content'];
    $rating = $_POST['rating'];
    $username = $_SESSION['username'];

    $stmt = $conn->prepare("INSERT INTO reviews (content, rating, username, post_date) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sis", $reviewContent, $rating, $username);
    if ($stmt->execute()) {
        header("location: reviews.php");
    } else {
        echo "Eroare la adăugarea review-ului: " . $conn->error;
    }

    $stmt->close();
}

?>