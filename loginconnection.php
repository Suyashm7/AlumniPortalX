<?php
 
 @session_start();

 $host = "localhost";  
 $user = "root";  
 $password = '';  
 $db_name = "alumniportalx";  
   
 $con = mysqli_connect($host, $user, $password, $db_name);  
 if(mysqli_connect_errno()) {  
     die("Failed to connect with MySQL: ". mysqli_connect_error());  
 } 
 


   
    //setting variable using post array
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    //check if the user exists in the user table
    $query = "select * from profile where email = '$username' ";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0){

        if(strcmp($row['password'],$password)==0){
        //if the user exists then create seesion variables emailid and password
        $_SESSION['username']=$username;
        $_SESSION['name']=$name;
        $_SESSION['password'] = $row['password'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['yearofpass'] = $row['yearofpass'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['post'] = $row['post'];
        $_SESSION['company'] = $row['company'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['linkedin'] = $row['linkedin'];
        $_SESSION['insta'] = $row['insta'];
        $_SESSION['twitter'] = $row['twitter'];
        $_SESSION['degree'] = $row['degree'];
        $_SESSION['amount'] = $row['amount'];
        
        //redirect to explore page
        header('Location: ./Dashboard/alumni.php');
    }
    //incorrect password
    else{
        echo '<script>alert("Invalid Password")
   window.location.replace("login.html");
   </script>';
    }
    }
    //if user is not found
    else {
        echo '<script>alert("Recheck your credentials")
   window.location.replace("login.html");
   </script>';
    }

?>