<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Amounts</title>
    <style>
        /* Reset some default styles */
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
            max-width: 1200px;
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
        /* Style the alumni table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        /* Style the alumni image */
        .alumni-image {
            max-width: 100px;
            height: auto;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Donation Amounts</h1> <br>
    <table border="1">
        <tr>
            <th>SR No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Donation Amount</th>
            <th>Timestamp</th>
        </tr>
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

        // Fetch donation data from the database
        $sql = "SELECT name, email, amount, date FROM donation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sr_no = 1; // Initialize SR No
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $sr_no . "</td>"; // Display SR No
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "</tr>";
                $sr_no++; // Increment SR No
            }
        } else {
            echo "<tr><td colspan='3'>No donations found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</div>
</body>
</html>
