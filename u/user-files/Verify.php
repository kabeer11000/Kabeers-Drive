<?php 
session_start();

if(isset($_POST['id'])){
if($_SESSION['id'] == $_POST['id']){
echo"done"; }
else{
echo"failed";}
?>
<form action="" method="post">
<input type="text" name="id">
<input type="submit" name="submit" value="submit">
</form>
