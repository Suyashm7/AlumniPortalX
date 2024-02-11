<?php
// Check if an ID parameter is passed in the URL
if (isset($_GET['id'])) {
    $teacherId = $_GET['id'];

    // Replace with your database connection code
    $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Delete the teacher's profile from the database
    $sql = "DELETE FROM staff WHERE id = $teacherId";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage-staff.php"); // Redirect to the teacher list page
        exit();
    } else {
        echo "Error deleting profile: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Teacher ID not provided.";
}
?>
