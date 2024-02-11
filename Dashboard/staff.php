<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Teachers</title>
    <!-- Include FontAwesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
        .teacher-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .teacher-card {
            width: calc(33.33% - 20px);
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }
        .teacher-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .teacher-info {
            font-size: 16px;
        }
        .teacher-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        /* Style the WhatsApp and Email icons */
        .contact-icons {
            font-size: 24px;
            margin-top: 10px;
        }
        .fa-whatsapp, .fa-envelope {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>College Teachers</h1>
        <div class="teacher-grid">
            <?php
            // Establish a database connection
            $conn = mysqli_connect("localhost", "root", "", "alumniportalx");

            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            // Fetch teacher data from the database
            $sql = "SELECT * FROM staff ";
            $result = mysqli_query($conn, $sql);

            // Check if there are results
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Start a teacher card
                    echo '<div class="teacher-card">';
                    // Add the teacher's image
                    // echo '<img src="' . $row['img'] . '" alt="' . $row['name'] . '" class="teacher-image">';
                    echo '<div class="teacher-name">' . $row['name'] . '</div>';
                    echo '<div class="teacher-info">';
                    echo '<p>Education: ' . $row['education'] . '</p>';
                    echo '<p>Position: ' . $row['post'] . '</p>';
                    echo '<p>Email: ' . $row['email'] . '</p>';
                    echo '<p>Mobile: ' . $row['mobile'] . '</p>';
                    // Add WhatsApp and Email icons with links
                    echo '<div class="contact-icons">';
                    echo '<a href="https://wa.me/' . $row['mobile'] . '" target="_blank"><i class="fab fa-whatsapp"></i></a>';
                    echo '<a href="mailto:' . $row['email'] . '"><i class="far fa-envelope"></i></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No teachers' data found.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
