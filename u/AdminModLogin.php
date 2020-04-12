<?php 
session_start();
if(isset($_POST['id'])&&isset($_POST['username'])){
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['image'] = $_POST['image'];
    //header("Location:0/files.php");
}
?>
<form method="post" action="">
<input name="image" type="text" value="<?php echo $_POST['image'];?>" placeholder="Image Url">
<input name="username" type="text" placeholder="username">
<input name="id" type="text" placeholder="ID">
<input name="submit" type="submit" value="submit">
</form>