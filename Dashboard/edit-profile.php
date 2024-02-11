<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$database = "alumniportalx";
$mysqli = mysqli_connect("localhost", "root", "", $database);

$username = $_SESSION['username'];

$query = "SELECT * FROM profile WHERE email = '$username'";
$result = mysqli_query($mysqli, $query);
if ($result && $row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $mobile = $row['mobile'];
    $gender = $row['gender'];
    $yearofpass = $row['yearofpass'];
    $degree = $row['degree'];
    $post = $row['post'];
    $company = $row['company'];
    $address = $row['address'];
    $linkedin = $row['linkedin'];
    $twitter = $row['twitter'];
    $insta = $row['insta'];
} else {
    // Handle the case where user data is not found
    // You can redirect to an error page or handle it as needed.
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = mysqli_real_escape_string($mysqli, $_POST['name']);
    $newMobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
    $newGender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $newYearOfPass = mysqli_real_escape_string($mysqli, $_POST['yearofpass']);
    $newDegree = mysqli_real_escape_string($mysqli, $_POST['degree']);
    $newPost = mysqli_real_escape_string($mysqli, $_POST['post']);
    $newCompany = mysqli_real_escape_string($mysqli, $_POST['company']);
    $newAddress = mysqli_real_escape_string($mysqli, $_POST['address']);
    $newLinkedin = mysqli_real_escape_string($mysqli, $_POST['linkedin']);
    $newTwitter = mysqli_real_escape_string($mysqli, $_POST['twitter']);
    $newInsta = mysqli_real_escape_string($mysqli, $_POST['insta']);

    $updateQuery = "UPDATE profile SET name = '$newName', mobile = '$newMobile', gender = '$newGender',
                    yearofpass = '$newYearOfPass', degree = '$newDegree', post = '$newPost',
                    company = '$newCompany', address = '$newAddress', linkedin = '$newLinkedin',
                    twitter = '$newTwitter', insta = '$newInsta' WHERE email = '$username'";

    if ($mysqli->query($updateQuery) === TRUE) {
        echo '<script>alert("Updated Successfully")
        window.location.replace("profile.php");
        </script>';;
       } else {
       echo "Error: " . $updateQuery . "<br>" . $mysqli->error;
       }
}

// Close the database connection
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

        .profile-data {
            margin-bottom: 20px;
            text-align: left;
            padding-left: 20px;
            border-left: 4px solid #007BFF;
        }

        label {
            font-weight: bold;
            color: #007BFF;
        }
        .profile-image {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            margin: 0 auto 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }


        /* Style the edit profile form */
        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <img src="img/alumni1.jpg" alt="Profile Image" class="profile-image">
        <form method="POST" action="edit-profile.php">
            <div class="profile-data">
                <label for="name">Full Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="profile-data">
                <label for="mobile">Mobile Number:</label>
                <input type="text" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="profile-data">
                <label for="gender">Gender:</label>
                <input type="text" name="gender" value="<?php echo $gender; ?>">
            </div>
            <div class="profile-data">
                <label for="yearofpass">Graduation Year:</label>
                <input type="text" name="yearofpass" value="<?php echo $yearofpass; ?>">
            </div>
            <div class="profile-data">
                <label for="degree">Degree Earned</label>
                <input type="text" name="degree" value="<?php echo $degree; ?>">
            </div>
            <div class="profile-data">
                <label for="post">Current Post:</label>
                <input type="text" name="post" value="<?php echo $post; ?>">
            </div>
            <div class="profile-data">
                <label for="company">Currently Working:</label>
                <input type="text" name="company" value="<?php echo $company; ?>">
            </div>
            <div class="profile-data">
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="profile-data">
                <label for="linkedin">Linked In:</label>
                <input type="text" name="linkedin" value="<?php echo $linkedin; ?>">
            </div>
            <div class="profile-data">
                <label for="twitter">Twitter:</label>
                <input type="text" name="twitter" value="<?php echo $twitter; ?>">
            </div>
            <div class="profile-data">
                <label for="insta">Instagram:</label>
                <input type="text" name="insta" value="<?php echo $insta; ?>">
            </div>
            <button type="submit" class="edit-button">Save Changes</button>
        </form>
    </div>
    <script>
    // Check if the URL contains a query parameter indicating a successful update
    const urlParams = new URLSearchParams(window.location.search);
    const updated = urlParams.get("updated");

    // If the "updated" parameter is found in the URL, show the alert box
    if (updated === "true") {
        const alertBox = document.getElementById("alert-box");
        alertBox.style.display = "block";

        // Hide the alert box after a few seconds (e.g., 5 seconds in this example)
        setTimeout(function () {
            alertBox.style.display = "none";
        }, 5000); // 5000 milliseconds = 5 seconds
    }
</script>

</body>
</html>
