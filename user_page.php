<?php

include 'config.php';

session_start();

// If user variable is not set (If user is not logged in)
if(!isset($_SESSION['user_name'])){
   
   // Redirect to login page
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- HTML Website -->

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!--  Stylesheet for Leaflet map  -->
   <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
   <link rel="stylesheet" href="main/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">

      <!-- Headers -->
      <h3><span>Highdown School & Sixth Form</span></h3>
      <h1>Map Navigator</h1>

   <!-- Display OpenStreetMap -->
      
      <!-- Map Size Configuration -->
      <div id = "map" style = "width: 950px; height: 490px"></div>

      <!-- Buttons -->
    <div class="controls">
            <button onclick="resetMap()">Reset Map</button>
            <a href="logout.php" class="btn">logout</a>
    </div>


   <!-- Interactive JS Scripts -->

    <!-- Script to call Leaflet map with OpenStreetMap and markers -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Script to call Leaflet routing machine ; Leaflet extension -->
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <!-- Script to call script.js -->
    <script src="main/script.js"></script>


</div>

</body>
</html>