<?php

session_start();
include 'connect.php';

if(isset($_POST['Upload'])) {
    $imageName = $_POST['image-name'];
    $username = $_SESSION['username'];
    $imageFile = $_FILES['image'];

    $uploadsDirectory = "uploads/"; 
    $uploadedFilePath = $uploadsDirectory . basename($imageFile["name"]);
    if (!move_uploaded_file($imageFile["tmp_name"], $uploadedFilePath)) {
        echo "Failed to upload file.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO gallery (image_name, image_path, username) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $imageName, $uploadedFilePath, $username);
    if ($stmt->execute()) {
        header("location: tree-gallery.php");
    } else {
         echo "Error uploading image: " . $conn->error;
    }

    $stmt->close();
}

?>