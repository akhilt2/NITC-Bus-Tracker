<!DOCTYPE html>
<html>
<head>
    <title>YOUR APPLINCES</title>
</head>
<body>

<h2>Fan -1 </h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    
    $url = "https://example.com/api/update_name"; // Replace with your actual URL
    
    $data = json_encode(array("name" => $name));
    
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    echo "PUT request response: " ;//. $response;
}
?>

<form method="post">
    <label for="name">State:</label>
    <input type="text" id="name" name="name">
    
    <input type="submit" value="Submit">
</form>

</body>
</html>
