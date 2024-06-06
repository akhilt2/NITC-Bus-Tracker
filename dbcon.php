<?php

// Check if latitude and longitude values are provided in the POST request
if (isset($_POST['variable1'], $_POST['variable2'])) {
    $latitude = floatval($_POST['variable1']); // Convert to float to ensure it's a numeric value
    $longitude = floatval($_POST['variable2']); // Convert to float to ensure it's a numeric value

    // Function to store the bus location in the database
    function storeBusLocation($busID, $latitude, $longitude) {
        // Implement database query to insert/update the bus location
        $servername = "localhost";
        $username = "u927048695_bts";
        $password = "NITC@B20s";
        $dbname = "u927048695_bts";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Something went wrong;");
        }

        // Check if the bus_id already exists in the database
        $query = "SELECT * FROM bus_locations WHERE bus_id = '$busID'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // If the bus_id exists, update the existing record
            $sql = "UPDATE bus_locations SET latitudes = '$latitude', longitudes = '$longitude' WHERE bus_id = '$busID'";
        } else {
            // If the bus_id does not exist, insert a new record
            $sql = "INSERT INTO bus_locations (bus_id, latitudes, longitudes) VALUES ('$busID', '$latitude', '$longitude')";
        }

        // Execute the query using database connection
        $conn->query($sql);
        $conn->close();
    }

    // Call the function to store the bus location
    $busID = "LH"; // Replace 'LH' with your actual bus ID
    storeBusLocation($busID, $latitude, $longitude);
}
?>
