
<?php

// Database

include 'config.php';

session_start();

// Check if form has been submitted
if(isset($_POST['submit'])){

   // Prevent SQL Injection
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   // Encrypt passwords with MD5 Hashing
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   // SQL Query - Check if user exists in database
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      // If user selects user_type 'user', redirect to user_page 
      // Currently no other user_types other than user 
      // Plans to make an admin page that can edit the map

      // If user exists, fetch relevant data
      $row = mysqli_fetch_array($result);
      if($row['user_type'] == 'user'){
         
         $_SESSION['user_name'] = $row['name'];
         //Redirect to user page 
         header('location:user_page.php');

      }
     
   }else{
      // Otherwise, no matching user found error message
      $error[] = 'incorrect email or password';
   }

};
?>


<!DOCTYPE html>
<html lang="en">

<!-- HTML Website -->

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="main/style.css">

</head>
<body>

<div class="form-container">

   <!-- Browser sends data to webserver to be processed -->
   <form action="" method="post">

   <!-- Headers -->
      <h3>Login</h3>
      <h>Highdown Map</h>

      <!-- Error check -->
      <?php
      if(isset($error)){

         // Loop through each error until all are displayed
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <!-- User input fields for registration -->
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
      
   </form>

</div>

</body>
</html>