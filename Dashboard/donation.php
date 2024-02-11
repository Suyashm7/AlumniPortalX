<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Donation Form</title>
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
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 40px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
        }

        .logo {
            width: 100px; /* Adjust the width as needed */
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .bank-details {
            border: 1px solid #ccc;
            margin-top: 30px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .qr-code{
            height: 200px;
            width: 200px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="img/logo.png" alt="College Logo" class="logo">
            <h1>FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY, VASHI.</h1>
        </div>
        <?php
        // Database configuration
        $servername = "localhost";  // Replace with your database server name
        $username = "root";         // Replace with your MySQL username
        $password = "";             // Replace with your MySQL password
        $dbname = "alumniportalx";  // Replace with your database name

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $amount = $_POST["amount"];
            $paymentMethod = $_POST["payment-method"];
            $screenshot=$_POST["screenshot"];

            // Insert data into the database
            $sql = "INSERT INTO donation (name, email, amount, payment_method, screenshot)
                    VALUES ('$name', '$email', $amount, '$paymentMethod', '$screenshot')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Donation Recorded Successfully")
                window.location.replace("alumni.php");
                </script>';;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        <form action="#" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="amount">Donation Amount:</label>
            <input type="number" id="amount" name="amount" required>

            
            <label for="payment-method">Payment Method Used:</label>
            <select id="payment-method" name="payment-method" required>
                <option value="bank-transfer">Bank Transfer</option>
                <option value="upi">UPI (QR Code)</option>
            </select>

            <label for="screenshot">Upload Screenshot:</label>
            <input type="file" id="screenshot" name="screenshot" accept="image/*">
            <small>Accepted formats: JPG, PNG, GIF, etc.</small>


            <div class="bank-details">
                <h2>Bank Transfer Information:</h2>
                <p>Account holder: FCRIT, Vashi.</p>
                <p>Bank Name: HDFC Bank</p>
                <p>Account Number: 50218965325</p>
            </div>
            <div id="upi-details" style="display: block;">
                <p>Scan the QR code below or use the UPI ID for payment:</p>
                <img src="img/qr.jpg" alt="UPI QR Code" class="qr-code">
                <p>UPI ID: fcrit.vashi@okhdfcbank</p>
            </div>

            <button type="submit" class="btn">Donate</button>
        </form>
    </div>
</body>
</html>