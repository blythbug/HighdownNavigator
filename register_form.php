<?php

include 'config.php';

// If 'submit' button has been pressed
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

      // If user exists in database error message
      $error[] = 'this user already exists';

   }else{
      
      // Check if passwords match
      if($pass != $cpass){

         // Error message if passwords don't match
         $error[] = 'passwords do not match';

      }else{

         // SQL Query - Insert user inputs into the database
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);

         // Redirect to login page
         header('location:login_form.php');
      }
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
   <title>register form</title>
   <link rel="stylesheet" href="main/style.css">

</head>
<body>
   
<div class="form-container">
   
   <!-- Browser sends data to webserver to be processed -->
   <form action="" method="post">
      
      <!-- Headers -->
      <h3>Register</h3>
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

      <!-- Input fields for user details -->

      <input type="text" name="name" required placeholder="name">
      <input type="email" name="email" required placeholder="email">
      <input type="password" name="password" required placeholder="password">
      <input type="password" name="cpassword" required placeholder="confirm password">
      <select name="user_type">

      <!-- Only one user_type to select from currently -->
         <option value="user">user</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">

      <!-- Button - Return to login page -->
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>