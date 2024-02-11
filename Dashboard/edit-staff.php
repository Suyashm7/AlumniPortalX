<?php
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace with your database connection code
    $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Get the posted form data
    $teacherId = $_POST['id'];
    $name = $_POST['name'];
    $education = $_POST['education'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Update the teacher's profile in the database
    $sql = "UPDATE staff SET name = '$name', education = '$education', post = '$position', email = '$email', mobile = '$mobile' WHERE id = $teacherId";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage-staff.php"); // Redirect to the teacher list page
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Teacher Profile</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");
        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #dfe9f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #007BFF;
        }

        /* Style the form elements */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Check if an ID parameter is passed in the URL
    if (isset($_GET['id'])) {
        $teacherId = $_GET['id'];

        // Replace with your database connection code
        $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Fetch the teacher's data by ID
        $sql = "SELECT * FROM staff WHERE id = $teacherId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Display the teacher's profile data in a form for editing
            echo "<div class='container'>";
            echo "<h2>Edit Teacher Profile</h2>";
            echo "<form method='post' action=''>"; // Update the action attribute with your desired URL
            echo "<input type='hidden' name='id' value='" . $teacherId . "'>";
            echo "Name: <input type='text' name='name' value='" . $row['name'] . "'><br>";
            echo "Education: <input type='text' name='education' value='" . $row['education'] . "'><br>";
            echo "Position: <input type='text' name='position' value='" . $row['post'] . "'><br>";
            echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
            echo "Mobile: <input type='text' name='mobile' value='" . $row['mobile'] . "'><br>";
            echo "<input type='submit' value='Update Profile'>";
            echo "</form>";
            echo "</div>";

        } else {
            echo "Teacher not found.";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Teacher ID not provided.";
    }
    ?>
</body>
</html>
