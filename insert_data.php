<?php
// Retrieve the data sent by the AJAX request
if (isset($_POST['data'])) {
    // Convert the JSON data to a PHP array
    $dataArray = json_decode($_POST['data'], true);

    // Database credentials
    $servername = "localhost";
    $username = "u927048695_bts";
    $password = "NITC@B20s";
    $dbname = "u927048695_bts";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Extract the latitude and longitude values from the array
    $latitude = $dataArray['latitude'];
    $longitude = $dataArray['longitude'];
   echo gettype( $latitude);
    // Use prepared statement to prevent SQL injection
     $sql=" INSERT INTO bus_locations (bus_id, latitudes, longitudes) VALUES ('LH', ?, ?)";
   // $sql = "UPDATE bus_locations SET latitudes = ?, longitudes = ? WHERE bus_id = 'LH'";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "dd", $latitude, $longitude);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Data updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
