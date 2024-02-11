<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friends Directory</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

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
      max-width: 1400px;
      margin: 0 auto;
      margin-top: 50px;
      margin-top: 50px;
      padding: 20px;
      display: flex;
      background: #fff;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .person-card {
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      margin-bottom: 20px;
      width: calc(33.33% - 20px); /* 4 cards in a row, minus margins */
      box-sizing: border-box;
    }

    .person-name {
      font-size: 20px;
      font-weight: bold;
    }

    .person-links {
      margin-top: 10px;
    }

    .person-links a {
      display: inline-block;
      margin-right: 10px;
      text-decoration: none;
      color: #007BFF;
    }

    .person-email {
      margin-top: 10px;
      font-weight: bold;
    }
    .person-image {
      text-align: center;
    }

    .person-image img {
      max-width: 100%;
      border-radius: 50%;
    }

    .person-whatsapp {
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumniportalx";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
}
?>

<?php
try {
    $stmt = $conn->prepare("SELECT * FROM profile");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
  <div class="container">
    <?php foreach ($result as $row): ?>
        <div class="person-card">
            <!--div class="person-image">
                <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>'s Image">
            </div-->            <div class="person-name"><?php echo $row['name']; ?></div>
            <div class="person-links">
                <a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:<?php echo $row['email']; ?>"><i class="far fa-envelope"></i></a>
                <a href="https://wa.me/<?php echo $row['mobile']; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="person-email">Email: <?php echo $row['email']; ?></div>
            <div class="person-whatsapp">Mobile: <?php echo $row['mobile']; ?></div>
            <div class="person-email">Job: <?php echo $row['company']; ?></div>
            <div class="person-email">Location: <?php echo $row['address']; ?></div>
        </div>
    <?php endforeach; ?>
</div>
  </body>
  </html>