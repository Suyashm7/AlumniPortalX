<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Registration</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: #dfe9f5;
}
        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
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

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the submit button */
        .submit{
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Alumni Registration</h2>
        <form action="" method="post">
            <label>Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label>Email:</label>
            <input type="email" id="email" name="email" required>

            <label>Password:</label>
            <input type="text" id="password" name="password" required>

            <label>Gender:</label>
            <input type="text" id="ender" name="gender" required>

            <label>Graduation Year:</label>
            <input type="text" id="yearofpass" name="yearofpass" required>

            <label>Address:</label>
            <input type="text" id="address" name="address" required>

            <label>Current Post:</label>
            <input type="text" id="post" name="post" required>

            <label>Current Working:</label>
            <input type="text" id="company" name="company" required>

            <label>Phone Number:</label>
            <input type="tel" id="mobile" name="mobile" required>

            <label >Linked-In:</label>
            <input type="text" id="linkedin" name="linkedin" required>

            <label>Twitter:</label>
            <input type="text" id="twitter" name="twitter" required>

            <label>Instagram:</label>
            <input type="text" id="insta" name="insta" required>

            <label>Degree Earned:</label>
            <input type="text" id="degree" name="degree" required>

            <a href=""><button type="submit" id="submit" class="submit" name="submit">Submit</button></a>
        </form>
    </div>
</body>
</html>























<?php
$conn = mysqli_connect("localhost", "root", "", "alumniportalx");

//if connection is wrong

if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if(isset($_POST["submit"])) {
$name =  $_POST['name'];
$email =  $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$yearofpass = $_POST['yearofpass'];
$address =  $_POST['address'];
$post =  $_POST['post'];
$company =  $_POST['company'];
$mobile =  $_POST['mobile'];
$linkedin =  $_POST['linkedin'];
$insta =  $_POST['insta'];
$twitter =  $_POST['twitter'];
$degree =  $_POST['degree'];


$sql = "INSERT INTO profile (name,email,password,gender,yearofpass,address,post,company,mobile,linkedin,insta,twitter,degree) VALUES ('$name', '$email', '$password', '$gender', '$yearofpass', '$address', '$post', '$company',  '$mobile', '$linkedin', '$insta', '$twitter','$degree')";

if(mysqli_query($conn, $sql)){
    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
   // echo '<script> message => alert("Check your gmail spam") </script>';
   echo '<script>alert("Alumni added successfully")
   window.location.replace("admin.php");
   </script>';
} else{
    echo "ERROR: Hush! Sorry $sql. "
        .mysqli_error($conn);
}
}


mysqli_close($conn);
?>