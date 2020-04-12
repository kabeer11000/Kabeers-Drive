<?php
session_start();
$verifyNum = mt_rand(100000, 999999);
// the message
require_once 'swift/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('GMAIL_USERNAME')
  ->setPassword('GMAIL_PASSWORD');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
  ->setFrom(array('abc@example.com' => 'ABC'))
  ->setTo(array('xyz@test.com'))
  ->setBody("Your Kabeer's Drive Verification Code is: <br><b>".$verifyNum."</b>");

$result = $mailer->send($message);

if(isset($_POST['submit'])){
    if($verifyNum == $_POST['text']){
        echo "Done";
    }else{
        echo"Failed";
    }
}

?>

    <meta charset="utf-8">
    <title>Kabeer's Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<link rel="shortcut icon" type="image/png" href="ic_launcher.png"/>
    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<div class="container">
<div class="row">
<div class="col-md-12">
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Code We Sent You</label>
    <input type="text" required name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter XXX-XXX">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>