<?php 
        @session_start();
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $name = $_SESSION['name'];
            $password = $_SESSION['password'];
            $gender = $_SESSION['gender'];
            $yearofpass = $_SESSION['yearofpass'];
            $address = $_SESSION['address'];
            $post = $_SESSION['post'];
            $company = $_SESSION['company'];
            $mobile = $_SESSION['mobile'];
            $linkedin = $_SESSION['linkedin'];
            $insta = $_SESSION['insta'];
            $twitter = $_SESSION['twitter'];
            $degree = $_SESSION['degree'];
           
        }

    $database = "alumniportalx"; 
    $mysqli = mysqli_connect("localhost", "root", "", $database);      
    $query = "SELECT * FROM profile where email = '$username' ";
    if ($result = mysqli_query($mysqli, $query)) {
    $rowcount = mysqli_num_rows( $result );
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Alumni Dashboard</title>
  <link rel="stylesheet" href="style1.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="img/logo.png" alt="">
                </a></li>
                <li>
                  <form action="search.php" method='POST'>

            <button type='submit' name='submit'><i class="fas fa-search"></i></button>
             <input type="text" placeholder="Search.." id='address' name='address'></form>
         </a></li>  
        <li><a href="alumni.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="profile.php">
          <i class="fas fa-user"></i>
          <span class="nav-item">Profile</span>
        </a></li>
        <li><a href="mydonation.php">
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Total Donation</span>
          </a></li>
        <li><a href="donation.php">
          <i class="fas fa-wallet"></i>
          <span class="nav-item">Donation</span>
        </a></li>
        <li><a href="friends.php">
          <i class="fas fa-users"></i>
          <span class="nav-item">Friends</span>
        </a></li>

        <li><a href="alumni-event.php">
          <i class="fas fa-list"></i>
          <span class="nav-item">Events</span>
        </a></li>
              
        <li><a href="staff.php">
          <i class="fas fa-user-tie"></i>
          <span class="nav-item">Staff</span>
        </a></li>
        <li><a href="feedback.html">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Feedback</span>
        </a></li>
        <li><a href="../index.html" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Alumni Dashboard</h1>
        <i><h4><?php echo $username; ?> </h4></i>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-list"></i>
          <h3>Events</h3>
          <button id="events-button" onclick="handleEventsButtonClick()">More</button>        </div>

                <div class="card">
          <i class="fas fa-money-check-alt"></i>
          <h3>Donation</h3>
<button id="donation-button" onclick="handleDonationButtonClick()">More</button>
        </div>
        <div class="card">
          <i class="fas fa-address-card"></i>
          <h3>Username</h3>
          <button id="username-button" onclick="handleUsernameButtonClick()">More</button>
        </div>
      
      </div>
      <div class="course-box">

 <script>
  // Function to handle the "Events" button click
function handleEventsButtonClick() {
    // Set the window location to the Events URL
    window.location.href = "alumni-event.php"; // Replace with the desired Events URL
}

// Function to handle the "Donation" button click
function handleDonationButtonClick() {
    // Set the window location to the Donation URL
    window.location.href = "donation.php"; // Replace with the desired Donation URL
}

// Function to handle the "Username" button click
function handleUsernameButtonClick() {
    // Set the window location to the Username URL
    window.location.href = "profile.php"; // Replace with the desired Username URL
}
</script>
    </section>
  </div>
</body>
</html>
