<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Feedback</title>
    <style>
        /* Your CSS styles for the page */
    </style>
    <script>
        // JavaScript function to display an alert when feedback is deleted
        function showFeedbackDeletedAlert() {
            alert("Feedback deleted successfully!");
            window.location.href = "feedback-list.php"; // Redirect to the feedback page
        }
    </script>
</head>
<body>
<?php
// Database connection information
$database = "alumniportalx";
$mysqli = new mysqli("localhost", "root", "", $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $feedbackId = $_POST['id'];

    // Prepare and execute the deletion operation
    $deleteQuery = "DELETE FROM feedback WHERE id = ?";
    $stmt = $mysqli->prepare($deleteQuery);
    $stmt->bind_param("i", $feedbackId);

    if ($stmt->execute()) {
        // Show the alert message and then redirect
        echo '<script>showFeedbackDeletedAlert();</script>';
    } else {
        echo "Error deleting feedback: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request or feedback ID not provided.";
}

?>
</body>
</html>
