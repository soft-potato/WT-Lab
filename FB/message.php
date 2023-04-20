<?php
session_start();
$_SESSION['name2']=$_POST['url'];
header("Location:openchat.php");
?>
