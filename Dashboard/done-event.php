<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
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
            height: auto;
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
        
    </style>
</head>
<body>
<?php  
$database = "alumniportalx"; 
$mysqli = new mysqli("localhost", "root", "", $database); 
$today = date('Y-m-d');
$query = "SELECT * FROM event where date > $today ";

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

        echo '<div class="event">
                <img src="img/' . $field5name . '" alt="Event Image">
                <div class="event-details">
                    <h2 class="event-title">' . $field1name . '</h2>
                    <p class="event-date">Date: ' . $field2name . '</p>
                    <p class="event-time">Time: ' . $field3name . '</p>
                    <p class="event-location">Location: ' . $field4name . '</p>
                    <p class="event-description">Description: ' . $field6name . '</p>
                </div>
            </div>';
    }
    echo '</div>'; // Close the container
    $result->free();
} 
?>
</body>
</html>
