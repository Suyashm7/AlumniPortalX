<?php
@session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $database = "alumniportalx";
    $mysqli = mysqli_connect("localhost", "root", "", $database);
    $query = "SELECT * FROM profile where email = '$username' ";

    if ($result = mysqli_query($mysqli, $query)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $name = $row['name'];
            $password = $row['password'];
            $gender = $row['gender'];
            $yearofpass = $row['yearofpass'];
            $address = $row['address'];
            $post = $row['post'];
            $company = $row['company'];
            $mobile = $row['mobile'];
            $linkedin = $row['linkedin'];
            $insta = $row['insta'];
            $twitter = $row['twitter'];
            $degree = $row['degree'];
        }
    } else {
        // Handle query execution errors
        echo "Query failed: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Profile</title>
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

        /* Style the profile image */
        .profile-image {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            margin: 0 auto 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Style the profile data */
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

        /* Style the submit button */
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
        <h2>Alumni Profile</h2>
        <img src="img/alumni1.jpg" alt="Profile Image" class="profile-image">
        
        <div class="profile-data">
            <label for="name">Full Name:</label>
            <span id="name"><?php echo $name; ?></span>
        </div>

        <div class="profile-data">
            <label for="email">Email:</label>
            <span id="email"><?php echo $username; ?></span>
        </div>

        <div class="profile-data">
            <label for="mobile">Mobile Number:</label>
            <span id="mobile"><?php echo $mobile; ?></span>
        </div>

        <div class="profile-data">
            <label for="gender">Gender:</label>
            <span id="gender"><?php echo $gender; ?></span>
        </div>


        <div class="profile-data">
            <label for="yearofpass">Graduation Year:</label>
            <span id="yearofpass"><?php echo $yearofpass; ?></span>
        </div>

        <div class="profile-data">
            <label for="degree">Degree Earned</label>
            <span id="degree"><?php echo $degree; ?></span>
        </div>

        <div class="profile-data">
            <label for="post">Current Post:</label>
            <span id="post"><?php echo $post; ?></span>
        </div>

        <div class="profile-data">
            <label for="company">Currently Working:</label>
            <span id="company"><?php echo $company; ?></span>
        </div>

        <div class="profile-data">
            <label for="address">Adress:</label>
            <span id="address"><?php echo $address; ?></span>
        </div>

        <div class="profile-data">
            <label for="linkedin">Linked In:</label>
            <span id="linkedin"><?php echo $linkedin; ?></span>
        </div>

        <div class="profile-data">
            <label for="twitter">Twitter:</label>
            <span id="twitter"><?php echo $twitter; ?></span>
        </div>

        <div class="profile-data">
            <label for="insta">Instagram:</label>
            <span id="insta"><?php echo $insta; ?></span>
        </div>

        <a href="edit-profile.php" class="edit-button">Edit Profile</a>
    </div>
</body>
</html>
