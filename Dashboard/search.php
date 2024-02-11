<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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
        .logo{
            height: 70px;
            width: 70px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 150px;
        }

        /* Add this CSS to style the feedback table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Add any additional styling as needed */

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<div class="container">
    <?php
    // Database connection
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "alumniportalx";

    $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST["submit"])) {
        $address = $_POST['address'];
        //echo $author;
    }

    $query = "SELECT * FROM profile where address = '$address' ";

    echo '<table>
        <tr style="color:black">
            <th> <b><font face="Arial">Sr No.</font></b> </th>
            <th> <b><font face="Arial">Name</font></b> </th>
            <th> <b><font face="Arial">Address</font></b> </th>
            <th> <b> <font face="Arial">Mobile</font> </b> </th>
            <th> <b> <font face="Arial">Linkedin</font> </b> </th>
        </tr>';

    if ($result = $conn->query($query)) {
        $serialNumber = 1; // Initialize the serial number
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $mobile = $row["mobile"];
                $linkedin = $row["linkedin"];
                $address = $row["address"];

                echo '<tr>
                          <td>' . $serialNumber . '</td>
                          <td>' . $name . '</td>
                          <td>' . $address . '</td>
                          <td>' . $mobile . '</td>
                          <td>' . $linkedin . '</td>
                      </tr>';
                $serialNumber++; // Increment the serial number
            }
        } else {
            echo '<tr><td colspan="5">No data found.</td></tr>';
        }
        $result->free();
    } else {
        echo '<tr><td colspan="5">Error executing the query.</td></tr>';
    }
    ?>
</div>
</body>
</html>
