<?php
// get_bus_locations.php

//Step 1: Connect to the database
$servername = "localhost";
$username = "u927048695_bts";
$password = "NITC@B20s";
$dbname = "u927048695_bts";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Execute a query
$sql = "SELECT latitudes, longitudes FROM bus_locations where bus_id='LH' ORDER BY cr_ts DESC limit 1";
$result = $conn->query($sql);

// Step 3: Fetch the data
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[0]= $row;
    }
}

$sql= "SELECT latitudes, longitudes FROM bus_locations where bus_id='SOMS' ORDER BY cr_ts DESC limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[1] = $row;
    }
}
$sql= "SELECT latitudes, longitudes FROM bus_locations where bus_id='mhb1' ORDER BY cr_ts DESC limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[2] = $row;
    }
}
$sql= "SELECT latitudes, longitudes FROM bus_locations where bus_id='mhb2' ORDER BY cr_ts DESC limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[3] = $row;
    }
}

// Close the connection
$conn->close();

// Send the data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>