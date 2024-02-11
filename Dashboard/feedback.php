<?php
$conn = mysqli_connect("localhost", "root", "", "alumniportalx");

// If connection is wrong
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST["submit"])) {
    $name =  $_POST['name'];
    $subject =  $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    // Specify the columns in the INSERT statement
    $sql = "INSERT INTO feedback (name, email, subject, msg) VALUES ('$name', '$email', '$subject', '$msg')";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Feedback has been Submitted");
        window.location.replace("alumni.php");
        </script>';
    } else {
        echo "ERROR: Sorry, there was an issue with the feedback submission: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>