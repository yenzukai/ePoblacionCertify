<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="icon" href="images/san-vicente-logo.png" type="image/x-icon">
    <style>
        body {
        font-family: 'Arial', sans-serif; 
        margin: 0;
        padding: 0;
        background-color: #ffffff;
        }
    </style>
</head>

<body>
<?php

    require_once './dompdf/autoload.inc.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ePoblacionCertify";

    $mysqli = new mysqli($servername, $username, $password, $database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

        $sql = "SELECT * FROM requester ORDER BY date_requested DESC LIMIT 1";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // Output a certificate for the latest row in the database
            $row = $result->fetch_assoc();
            echo generateCertificate($row['first_name'], $row['middle_name'], $row['last_name'], $row['house_no'], $row['street_name'], $row['barangay'], $row['municipality'], $row['province'], $row['zip_code'], $row['business_name'], $row['business_number'], $row['date_requested']);
            echo "<br><br>";
        } 
        else {
            echo "No request was found in the database.";
        }

    // Close connection
    $mysqli->close();

    // Certificate generation function
    function generateCertificate($first_name, $middle_name, $last_name, $house_no, $street_name, $barangay, $municipality, $province, $zip_code, $business_name, $business_number, $date_requested)
    {
    // Start output buffering
    ob_start();

    $base64BrgyImage = base64_encode(file_get_contents(__DIR__ . '/images/brgy-san-vicente-logo.png'));
    $base64MunisipyoImage = base64_encode(file_get_contents(__DIR__ . '/images/bayan-ng-lagonoy.png'));
    $base64SignatureImage = base64_encode(file_get_contents(__DIR__ . '/images/cap-sign.png'));

    // You can customize the certificate template as needed
        $certificateTemplate = "
        <html>
        <head>
        <style>
        body {
            font-family: 'Times New Roman', serif; 
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        div.certificate {
            border: 1px solid #000;
            padding: 50px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 750px;
            margin: 15px auto;
        }

        img.brgy {
            position: absolute;
            top: 55px; /* Adjust the top position as needed */
            left: 90px; /* Adjust the left position as needed */
            max-height: 130px; /* Adjust the max-height as needed */
        }

        img.munisipyo {
            position: absolute;
            top: 50px; /* Adjust the top position as needed */
            left: 485px; /* Adjust the left position as needed */
            max-height: 150px; /* Adjust the max-height as needed */
        }

        p {
            margin: 20px 0;
            line-height: 1.5;
            font-size: 18px;
        }

        ul li {
            margin: 10px 0;
            line-height: 1.4;
            font-size: 18px;
        }

        h1 {
            margin-top: 100px;
            color: #000000;
            text-align: center;
            margin-bottom: 50px;
        }

        h3 {
            margin-bottom: -20px;
            text-align: center;
            font-weight: lighter;
        }

        img.signature {
            position: absolute;
            top: 940px; /* Adjust the top position as needed */
            left: 230px; /* Adjust the left position as needed */
            max-height: 150px; /* Adjust the max-height as needed */
        }

        h4 {
            margin-top: 125px;
            margin-bottom: 50px;
            font-weight: bold;
            text-align: center;
        }
        </style>
        </head>
        <body>
        <div class='certificate'>
        <img class='brgy' src='data:image/png;base64, $base64BrgyImage' alt='Brgy San Vicente Logo'>
        <img class='munisipyo' src='data:image/png;base64, $base64MunisipyoImage' alt='Bayan ng Lagonoy'>
        <h3>Republic of the Philippines</h3>
        <h3>Province of Camarines Sur</h3>
        <h3>Municipality of Lagonoy</h3>
        <h3>Barangay of San Vicente</h3>
        <h1>BARANGAY CLEARANCE TO OPERATE BUSINESS</h1>
        <p>To whom it may concern:</p>
        <p>This is to certify that <strong>$first_name $middle_name $last_name</strong> is a resident of <strong>$house_no $street_name, Brgy. $barangay $municipality $province $zip_code</strong></p>
        <p>and has the business named as <strong>$business_name</strong> and its business number is <strong>$business_number</strong> located in $street_name, Brgy. $barangay $municipality $province $zip_code.</p>
        <ul>
        <li>The business is duly registered in this barangay office.</li>
        <li>The business owner is required to renew on or before the majority date and comply with all legal documents.</li>
        <li>This Barangay Clearance to Operate Business will be effective from <strong>$date_requested to endDate</strong></li>
        </ul>
        <p>This certification issued upon request of the above-named interested party for record and reference purposes.</p>
        <p>Issued this <strong>$date_requested</strong> at Barangay $barangay, $municipality, $province.</p>
        <img class='signature' src='data:image/png;base64, $base64SignatureImage' alt='Signature of Brgy Captain'>
        <h4>MELVIN P. GERALDINO<br>Punong Barangay</h4>
        </div>
        </body>
        </html>
        ";

    // Output certificate content
    echo $certificateTemplate;

    // Get the contents of the output buffer and clean it
    $html = ob_get_clean();

    // Generate PDF using dompdf
    $pdf = new Dompdf\Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper('legal', 'portrait');
    $pdf->render();

        // Save or download the PDF
    $pdfOutput = $pdf->output();
    file_put_contents("certificate/certificate_$first_name.pdf", $pdfOutput);
    echo "<a href='certificate/certificate_$first_name.pdf' download>Download PDF</a>";
    }
?>
</body>

</html>