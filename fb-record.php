<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ePoblacionCertify";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback data from POST request
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = $mysqli->real_escape_string($_POST['comment']);

    // Insert feedback into the database
    $query = "INSERT INTO feedback (rating, comment) VALUES ('$rating', '$comment')";

    if ($mysqli->query($query) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
