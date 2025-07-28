<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <link rel="icon" href="images/san-vicente-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1199724377.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ePoblacionCertify";

    $mysqli = new mysqli($servername, $username, $password, $database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $name = $mysqli->real_escape_string($_POST['Name']);
    $email = $mysqli->real_escape_string($_POST['Email']);
    $message = $mysqli->real_escape_string($_POST['Message']);
    
    /*mySQL: delivers input data to the database*/
    $query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    /*Shows message after the transmission of data*/
    if ($mysqli->query($query) === TRUE) {
        echo'<div class="thank-you">
        		<i class="fa-solid fa-circle-check"></i>
        		<h2>Thank You!</h2>
        		<p>Your message has been sent to our customer support. Please wait for their response.</p>
        		<a href="contact.html">OK</a>
   	 		</div>';
    } 
    else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    $mysqli->close();
?>

</body>

</html>
