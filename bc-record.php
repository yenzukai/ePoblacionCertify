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

    $tracking_number = $mysqli->real_escape_string($_POST['tracking_number']);
    $certificate_type = $mysqli->real_escape_string($_POST['certificate_type']);
    $first_name = $mysqli->real_escape_string($_POST['first_name']);
    $middle_name = $mysqli->real_escape_string($_POST['middle_name']);
    $last_name = $mysqli->real_escape_string($_POST['last_name']);
    $house_no = $mysqli->real_escape_string($_POST['house_no']);
    $street_name = $mysqli->real_escape_string($_POST['street_name']);
    $barangay = $mysqli->real_escape_string($_POST['barangay']);
    $municipality = $mysqli->real_escape_string($_POST['municipality']);
    $province = $mysqli->real_escape_string($_POST['province']);
    $zip_code = $mysqli->real_escape_string($_POST['zip_code']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone_number = $mysqli->real_escape_string($_POST['phone_number']);
    $pick_up_date = $mysqli->real_escape_string($_POST['pick_up_date']);
    $payment_method = $mysqli->real_escape_string($_POST['payment_method']);
    $reference_number = $mysqli->real_escape_string($_POST['reference_number']);
    $purpose = $mysqli->real_escape_string($_POST['purpose']);
    $support_doc = ""; // Initialize the variable

    // File upload
    if (isset($_FILES['support_doc']) && $_FILES['support_doc']['error'] == 0) {
        $targetDir = "uploads/";
    
        // Validate file type
        $allowedTypes = ['pdf', 'doc', 'docx', 'jpeg', 'jpg', 'png'];
        $fileExtension = strtolower(pathinfo($_FILES['support_doc']['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            $fileName = uniqid() . '.' . $fileExtension;
            $targetPath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['support_doc']['tmp_name'], $targetPath)) {
            $support_doc = $targetPath; // Save the file path to the variable

            } else {
            echo "Error: There is something wrong with moving the file" . "<br>";
            }
        } else {
            echo "Error: Invalid file type. Allowed types: " . implode(', ', $allowedTypes) . "<br>";
        }
    } else {
        echo "Error: File has not been uploaded because there is an error" . "<br>";
    }
    /*mySQL: insert data into the requester table*/
    $query = "INSERT INTO requester (requester_id, first_name, middle_name, last_name, house_no, street_name, barangay, municipality, province, zip_code, email, phone_number, certificate_type, pick_up_date, payment_method, reference_number, purpose, support_doc)
        VALUES ('$tracking_number', '$first_name', '$middle_name', '$last_name', '$house_no', '$street_name', '$barangay', '$municipality', '$province', '$zip_code', '$email', '$phone_number', '$certificate_type', '$pick_up_date', '$payment_method', '$reference_number', '$purpose', '$support_doc')";

    if ($mysqli->query($query) === TRUE) {
        echo '<div id="confirm">
        <img src="images/color_ePoblacionCertify.png" class="logo" alt="A logo of the website">
        <div class="confirm-tab">
            <h1>Your request has been successfully submitted!</h1>
            <i class="fa-solid fa-circle-check"></i>
            <h2>Hello <strong><span id="displayName">' . htmlspecialchars($_POST['first_name']) . '</span></strong>! Your request has been received, and it is now ready to be released!</h2>
            <h2>We will be notifying you shortly about your request in this email address: <strong><span id="displayEmail">' . htmlspecialchars($_POST['email']) . '</span></strong></h2>
            <h3>Please keep a record of your reference number for future inquiries</h3>
            <h4>Your Reference Number: <strong><span id="displayTrackingNumber">' . htmlspecialchars($_POST['tracking_number']) . '</span></strong></h4>
            <p>If you have any questions or need further assistance, please contact us at <span>brgysanvicente@gmail.com</span></p>
            <a href="bc-cert-gen.php" target="_blank">Click to download your certificate now!<br /></a>
            <a href="#" onclick="openFeedbackForm()">Give Feedback</a>
        </div>
    </div>';
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    $mysqli->close();

?>
    <div id="feedback-popup">
    <div class="feedback-content">
        <span class="close" onclick="closeFeedbackForm()">&times;</span>
        <h2>Feedback Form</h2>
        <p>Please provide your feedback:</p>
        <form id="feedback-form">
            <div>
                <label for="rating">Rating:</label>
                <div id="stars" class="star-rating">
                    <span class="star" onclick="rate(1)">&#9733;</span>
                    <span class="star" onclick="rate(2)">&#9733;</span>
                    <span class="star" onclick="rate(3)">&#9733;</span>
                    <span class="star" onclick="rate(4)">&#9733;</span>
                    <span class="star" onclick="rate(5)">&#9733;</span>
                </div>
            </div>
            <div>
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="7" cols="80"></textarea>
            </div>
            <button type="button" onclick="submitFeedback()">Submit</button>
        </form>
    </div>
    </div>

    <script>
    // JavaScript for the feedback form
    function openFeedbackForm() {
        document.getElementById('feedback-popup').style.display = 'block';
    }

    function closeFeedbackForm() {
        document.getElementById('feedback-popup').style.display = 'none';
    }

    let selectedRating = 0;

    function rate(stars) {
        selectedRating = stars;
        document.querySelectorAll('.star').forEach((star, index) => {
        star.classList.toggle('active', index < stars);
        });
    }
    
    function submitFeedback() {
        const rating = selectedRating;
        const comment = document.getElementById('comment').value;

        // Send feedback data to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "fb-record.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        const data = "rating=" + rating + "&comment=" + comment;
        xhr.send(data);

        closeFeedbackForm();
    }
    </script>
    
</body>

</html>