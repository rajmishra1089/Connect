<?php

session_start();
$dataarray=$_SESSION['data'];
$usermail=$dataarray[0];
$userName=$dataarray[1];
$contmail=$_POST['recipientmail'];
$contname=$_POST['recepientname'];
require 'C:\xampp\htdocs\phpcode\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\phpcode\phpmailer\src\SMTP.php';
require 'C:\xampp\htdocs\phpcode\phpmailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'connectsociety121@gmail.com';
    $mail->Password = 'your password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    
    $mail->setFrom('connectsociety121@gmail.com', 'Connect');
    $mail->addAddress($contmail, $contname);

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if ($con->connect_error) {
        die("connection failed due to " . mysqli_connect_error());
    }
    $sql = "SELECT phoneno FROM `miniproject`.`userlogin` WHERE mail = '$usermail' LIMIT 1";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $ph = $row['phoneno'];
    $sql = "SELECT occupation FROM `miniproject`.`contlogin` WHERE mail = '$contmail' LIMIT 1";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $work = $row['occupation'];
    
    $mail->isHTML(true);
    $mail->Subject = 'New Work Opportunity ['.$work.']';
    $mail->Body = "Dear " . $contname . ",\n\n";
    $mail->Body.="I hope this email finds you well. I am writing to inform you about an exciting new work opportunity available through our company, Connect. We believe that your expertise and skills make you an excellent candidate for this project.\n\n";
    $mail->Body.="At Connect, we specialize in connecting talented contractors like yourself with meaningful projects. We have recently received a project request that aligns perfectly with your area of expertise. We thought it would be a great fit for you and wanted to bring this opportunity to your attention.\n\n";
    $mail->Body.="To express their interest, a user registered on our platform has shown keen interest in working with you specifically for this project. Here are the user's details:\n\n";
    $mail->Body.="- Name: " . $userName . "\n";
    $mail->Body.="- Email: " . $usermail . "\n";
    $mail->Body.="- Phone Number: " . $ph . "\n\n";
    $mail->Body.="We encourage you to reach out to the user directly to discuss the project further and explore collaboration opportunities. We believe that your expertise and their requirements are aligned, making this a potentially valuable partnership.\n\n";
    $mail->Body.="If you have any questions or require additional information, please don't hesitate to reach out to us. We are here to support you throughout the project.\n\n";
    $mail->Body.="Thank you for your attention, and we look forward to hearing about your successful collaboration with the user.\n\n";
    $mail->Body = nl2br($mail->Body);

    
    if($mail->send()){
        echo "<script>
        alert('request sent succesfully');
        window.location.href = 'contractors.php';
        </script>";
    }
    else{
        echo "<script>
        alert('unsuccesfull in sending request');
        window.location.href = 'contractors.php';
        </script>";
    }

} catch (Exception $e) {
    echo 'Email sending failed. Error: ' . $mail->ErrorInfo;
}
?>
