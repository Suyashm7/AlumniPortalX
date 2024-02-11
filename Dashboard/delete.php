<?php
// Check if an ID parameter is passed in the URL
if (isset($_GET['id'])) {
    $profileId = $_GET['id'];

    // Database connection information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumniportalx";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Delete the profile from the database
        $stmt = $conn->prepare("DELETE FROM profile WHERE id = :id");
        $stmt->bindParam(':id', $profileId);
        $stmt->execute();

        header("Location: alumni-list.php"); // Redirect to the directory page
        exit();
    } catch (PDOException $e) {
        echo "Error deleting profile: " . $e->getMessage();
    }
} else {
    echo "Profile ID not provided.";
}
?>
