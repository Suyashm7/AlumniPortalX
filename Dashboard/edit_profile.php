<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Your CSS styling for the edit profile page */
        body {
            background: #dfe9f5;
            font-family: "Poppins", sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
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
    // Database connection information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumniportalx";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if form data is submitted for updating the profile

            // Get the posted form data
            $profileId = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $company = $_POST['company']; // Add company field
            $address = $_POST['address']; // Add address field

            // Update the profile in the database
            $stmt = $conn->prepare("UPDATE profile SET name = :name, email = :email, mobile = :mobile, company = :company, address = :address WHERE id = :id");
            $stmt->bindParam(':id', $profileId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':address', $address);
            $stmt->execute();

            header("Location: alumni-list.php"); // Redirect to the directory page
            exit();
        } elseif (isset($_GET['id'])) {
            // Check if an ID parameter is passed in the URL
            $profileId = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM profile WHERE id = :id");
            $stmt->bindParam(':id', $profileId);
            $stmt->execute();
            $profile = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($profile) {
                // Display the profile data in a form for editing
                echo "<div class='container'>";
                echo "<h1>Edit Profile</h1>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='id' value='" . $profileId . "'>";
                echo "<label>Name:</label><input type='text' name='name' value='" . $profile['name'] . "'><br>";
                echo "<label>Email:</label><input type='text' name='email' value='" . $profile['email'] . "'><br>";
                echo "<label>Mobile:</label><input type='text' name='mobile' value='" . $profile['mobile'] . "'><br>";
                echo "<label>company:</label><input type='text' name='company' value='" . $profile['company'] . "'><br>"; // Add company field
                echo "<label>address:</label><input type='text' name='address' value='" . $profile['address'] . "'><br>"; // Add address field
                echo "<input type='submit' value='Update Profile'>";
                echo "</form>";
                echo "</div>";
            } else {
                echo "Profile not found.";
            }
        } else {
            echo "Profile ID not provided.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>
