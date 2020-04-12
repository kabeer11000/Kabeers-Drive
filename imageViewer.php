<?php
if(!isset($_GET['image'])){
    header("Location:u/0/index.php");
}else{
    echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $("body").bootstrapMaterialDesign(); });</script>

	<title>View Image | Kabeers Drive</title>
</head>
<body class="bg-dark">
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center mt-2">
			
			<div class="display-4 text-light" style="font-size: 20px;">Kabeers Drive</div>
			<small class="text-muted">'.$_GET['image'].'</small>
		</div>
		<div class="col-md-12 my-auto d-flex justify-content-center align-items-center">
			<img src="'.$_GET['image'].'" style="margin-top: 10%; width: 100%;height: auto;">
		</div>
	</div>
</div>
</body>
</html>';
}
?>