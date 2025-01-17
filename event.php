<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <!-- =======================================================
  * Template Name: Company
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>



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

        .container2 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
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
        
  </style>

</head>

<body>

  
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.html"><span>Alumni</span>Portal</a><span>X</span></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a href="index.html" >Home</a></li>

        <li class="dropdown"><a href="about.html"><span>About</span></a></li>

        <li><a href="event.php">Events</a></li>
        <li><a href="feedback.html">Feedback</a></li>
        <li><a href="contact.html" class="active">Contact</a></li>
        <li class="dropdown"><a href=""><span>LogIn</span><i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="login.html">Alumni</a></li>
            <li><a href="adminlogin.php">Admin</a></li>
          </ul>
        </li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="header-social-links d-flex">
      <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
    </div>

  </div>
</header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Events</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Events</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<!-- End #main -->

    <?php  
    $database = "alumniportalx"; 
    $mysqli = new mysqli("localhost", "root", "", $database); 
    $today ="2023-11-06";
    $query = "SELECT * FROM event where date > $today except SELECT * FROM event where time = '1 PM'";

    if ($result = $mysqli->query($query)) {
        echo '<div class="container2">
                <h1>Recent Events</h1>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["title"];
            $field2name = $row["date"];
            $field3name = $row["time"];
            $field4name = $row["location"];
            $field5name = $row["image"];
            $field6name = $row["description"];

            echo '<div class="event">
                    <img src="./Dashboard/img/' . $field5name . '" alt="Event Image">
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

    <!-- Upcoming Events Button -->
    <div class="text-center mt-4">
      <a href="uevent.php" class="btn btn-primary">Upcoming Events</a> <br><br>
    </div>
  </main>

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-6 footer-contact">
          <h3>Fr. C. Rodrigues Institute of Technology</h3>
          <p>
            Agnel Technical Education Complex<br>
            Sector 9-A, Vashi, Navi Mumbai,<br>
            Maharashtra, India<br>
            PIN - 400703<br><br>

            (022) 27771000 , 27662949<br>
            (022) 27660619<br>
            principal@fcrit.ac.in
          </p>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Events</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>



      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
      </div>

    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>