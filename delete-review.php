<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['username']) && $_SESSION['role'] == "ADMIN") {
        if (isset($_POST['review_id'])) {
            $review_id = $_POST['review_id'];

            $query = "DELETE FROM reviews WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $review_id);
            $stmt->execute();
            $stmt->close();

            http_response_code(200);
            echo json_encode(array("message" => "Review deleted successfully."));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "No review ID provided."));
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
