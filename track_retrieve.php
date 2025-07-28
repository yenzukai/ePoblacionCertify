<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ePoblacionCertify";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch certification info based on the tracking number
$trackingNumber = $mysqli->real_escape_string($_POST['tracking_number']);
$sql = "SELECT certification_status, first_name, middle_name, last_name, house_no, street_name, barangay, municipality, province, phone_number, certificate_type, pick_up_date, payment_method FROM requester WHERE requester_id = '$trackingNumber'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'certification_status' => $row['certification_status'],
        'requester' => array(
            'name' => $row['first_name'] . ' ' . $row['middle_name']. ' ' . $row['last_name'], 
            'address' => $row['house_no'] . ' ' . $row['street_name']. ' ' . $row['barangay']. ' ' . $row['municipality']. ' ' . $row['province'],
            'contact' => $row['phone_number'],
            'certificate_type' => $row['certificate_type'],
            'pick_up_date' => $row['pick_up_date'],
            'payment_method' => $row['payment_method']
        )
    );
    echo json_encode($response);
} else {
    echo json_encode(array('certification_status' => 'Not Found'));
}

$mysqli->close();
?>
