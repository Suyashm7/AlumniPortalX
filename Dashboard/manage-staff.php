<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Teachers</title>
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
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

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

        .teacher-name {
            font-size: 18px;
            font-weight: bold;
        }

        .teacher-info {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>College Teachers</h1>
        <table>
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Education</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish a database connection
                $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

                if ($conn === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                // Fetch teacher data from the database
                $sql = "SELECT * FROM staff ";
                $result = mysqli_query($conn, $sql);

                // Initialize the serial number counter
                $srNo = 1;

                // Check if there are results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $srNo++ . "</td>"; // Display the serial number
                        echo "<td class='teacher-name'>" . $row['name'] . "</td>";
                        echo "<td class='teacher-info'>" . $row['education'] . "</td>";
                        echo "<td class='teacher-info'>" . $row['post'] . "</td>";
                        echo "<td class='teacher-info'>" . $row['email'] . "</td>";
                        echo "<td class='teacher-info'>" . $row['mobile'] . "</td>";
                        echo "<td><a href='edit-staff.php?id=" . $row['id'] . "'>Edit</a></td>";
                        echo "<td><a href='delete-staff.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No teachers' data found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
