<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
      <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        h1 {
            text-align: center;
            color: #333;
            width: 100%;
        }

        .event {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            width: calc(50% - 20px);
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .event img {
            width: 100%;
            height: 400px;
        }

        .event-details {
            padding: 20px;
        }

        .event-title {
            font-size: 1.5em;
            margin: 0;
            color: #333;
        }

        .event-date {
            font-size: 1em;
            margin: 10px 0;
            color: #777;
        }

        .event-location {
            font-size: 1em;
            margin: 10px 0;
            color: #777;
        }
        .event-time {
            font-size: 1em;
            margin: 10px 0;
            color: #777;
        }
        .event-description {
            font-size: 1em;
            margin: 10px 0;
            color: #777;
        }

        .btn {
            background-color: #007BFF;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
<?php  
$database = "alumniportalx"; 
$mysqli = new mysqli("localhost", "root", "", $database); 
$query = "SELECT * FROM event";

if ($result = $mysqli->query($query)) {
    echo '<div class="container">
            <h1>Upcoming Events</h1>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["title"];
        $field2name = $row["date"];
        $field3name = $row["time"];
        $field4name = $row["location"];
        $field5name = $row["image"];
        $field6name = $row["description"];
        $field7name = $row["id"];

        echo '<div class="event">
                <img src="img/' . $field5name . '" alt="Event Image">
                <div class="event-details">
                    <h2 class="event-title">' . $field1name . '</h2>
                    <p class="event-date">Date: ' . $field2name . '</p>
                    <p class="event-time">Time: ' . $field3name . '</p>
                    <p class="event-location">Location: ' . $field4name . '</p>
                    <p class="event-description">Description: ' . $field6name . '</p>

                    <p><a href="delete_event.php?id= ' .$field7name. ' class="btn" ">Delete</a></p>


                </div>
            </div>';
    }
    echo '</div>'; // Close the container
    $result->free();
} 
?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

<script src="assets/js/main.js"></script>
</body>
</html>
