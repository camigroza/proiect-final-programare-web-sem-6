<?php

session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['username']) && $_SESSION['role'] == "ADMIN") {
        if (isset($_POST['photo_id'])) {
            $photo_id = $_POST['photo_id'];

            $query = "DELETE FROM gallery WHERE id_photo = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $photo_id);
            $stmt->execute();
            $stmt->close();

            unlink("uploads/" . $photo_id . ".jpg");

            http_response_code(200);
            echo json_encode(array("message" => "Image deleted successfully."));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No image ID provided."));
        }
    } else {
        http_response_code(403);
        echo json_encode(array("message" => "Unauthorized access."));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed."));
}
?>
