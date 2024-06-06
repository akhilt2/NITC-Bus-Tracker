<?php
session_start();
if (!isset($_SESSION["adminSOMS"])) {
   header("Location: login.php");
}
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* function storeBusLocation($busID, $latitude, $longitude) {
        // Implement database query to insert the bus location
      // $conn=mysqli_connect("localhost","u927048695_bts","NITC@B20s","u927048695_bts");
         $servername = "localhost";
              $username = "u927048695_bts";
              $password = "NITC@B20s";
              $dbname = "u927048695_bts";
               
              // Create connection
              $conn = mysqli_connect($servername, $username, $password, $dbname);
                           
                if (!$conn) {
                  die("Something went wrong;");
              }
              $sql="UPDATE bus_locations SET latitudes= '$latitude', longitudes= '$longitude' WHERE bus_id='$busID' ";
               
      // $query = "INSERT INTO bus_locations (bus_id, latitudes, longitudes) VALUES ('$busID', '$latitude', '$longitude')";
        // Execute the query using database connection
         $conn->query($sql);
       
    }*/

?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Driver Dashboard</title>
    <script >
      
// const express = require('express');
// const fs = require('fs');
// const app = express();

const port = 3000;
const freq=5000;//frequency to retrive coordinates

let coordinates = {};
// I'm caalling this function from html using onload

//Too retrieve the user's location using the geolocation API
function getUserLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(successCallback, errorCallback);
  } else {
    console.log('Geolocation is not supported by this browser.');
  }
}

// Success callback function for getCurrentPosition
function successCallback(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  console.log('Latitude:', latitude);
  console.log('Longitude:', longitude);
  updateCoordinates(latitude, longitude);
  //appendLocationToFile(latitude, longitude);
  coordinates = { latitude, longitude };
  console.log(coordinates);
  /*console.log(typeof coordinates);
  jsonString = JSON.stringify(coordinates);
  console.log(jsonString);*/
  sendDataToServer(coordinates);
  return coordinates;
  // it calls getCurrent Location for each freq 
  
  //setInterval(getCurrentLocation, freq); //Here freq= 5000 milliseconds => 5 seconds
}

// Error callback function for getCurrentPosition
function errorCallback(error) {
  console.log('Error occurred while retrieving location:', error.message);
}

// Step 3: Implement location tracking logic
function getCurrentLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
  } else {
    console.log('Geolocation is not supported by this browser.');
  }
}
function sendDataToServer(dataArray) {
  // Convert the array to JSON format
  const jsonData = JSON.stringify(dataArray);

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  // Define the PHP file that will handle the data insertion
  const phpFile = "insert_data4.php"; // Replace "insert_data.php" with your PHP script filename

  // Prepare the AJAX request
  xhttp.open("POST", phpFile, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Handle the AJAX response (optional)
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      // Handle the response if needed
      console.log(xhttp.responseText);
    }
  };

  // Send the JSON data to the PHP script
  xhttp.send("data=" + jsonData);
}

// Call the function to send the data to the PHP script

/*function appendLocationToFile(latitude, longitude) {
  var variable1 = latitude;
  var variable2 = longitude;

  // Send variables to server-side script using AJAX
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "index.php", true); // Point to the PHP file handling database operations
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      console.log(xhttp.responseText); // Response from PHP script (optional)
    }
  };
  var data = 'variable1=' + encodeURIComponent(variable1) + '&variable2=' + encodeURIComponent(variable2);
  xhttp.send(data);
}*/

function updateCoordinates(latitude, longitude) {
  const coordinatesElement = document.getElementById('coordinates');
  coordinatesElement.textContent = `Latitude: ${latitude}, Longitude: ${longitude}`;
  
}


    </script>
  //   <?php
    // Function to store the bus location in the database
    // function storeBusLocation($busID, $latitude, $longitude) {
    //     // Implement database query to insert the bus location
    //   // $conn=mysqli_connect("localhost","u927048695_bts","NITC@B20s","u927048695_bts");
    //      $servername = "localhost";
    //           $username = "u927048695_bts";
    //           $password = "NITC@B20s";
    //           $dbname = "u927048695_bts";
               
    //           // Create connection
    //           $conn = mysqli_connect($servername, $username, $password, $dbname);
                           
    //             if (!$conn) {
    //               die("Something went wrong;");
    //           }
    //           $sql="UPDATE bus_locations SET latitudes= '$latitude', longitudes= '$longitude' WHERE bus_id='$busID' ";
               
    //   // $query = "INSERT INTO bus_locations (bus_id, latitudes, longitudes) VALUES ('$busID', '$latitude', '$longitude')";
    //     // Execute the query using database connection
    //      $conn->query($sql);
       
    // }
    
    // Call the function to store the bus location
    // $busID = "LH";
    //  $latitude =latitude; // Example latitude value
    //  $longitude =longitude; // Example longitude value
//     if (isset($_POST['latitude'], $_POST['longitude'])) {
//   $latitude = $_POST['latitude'];
//   $longitude = $_POST['longitude'];
//   storeBusLocation('LH',$latitude, $longitude);
// }
//     storeBusLocation('LH',11.1232,232.232);

// ?>
  </head>

<body onload="getUserLocation()">

  
    <div class="container">
        <h1>Welcome to SOMS BUS DRIVER Dashboard</h1>
         <h1>Heyyy  </h1>
   <p id="coordinates"></p>

        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>
