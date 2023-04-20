<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fb';
$name=$_SESSION['name'];
$url=$_SESSION['addr'];
$msg=$_POST['msg'];
$msg=trim($msg);
$date = date('Y-m-d h:i:sa');
$conn = mysqli_connect($host, $username, $password, $dbname);
if($msg!=""){
    $res=mysqli_query($conn,"insert into msg(froms,url,msg,date)values('$name','$url','$msg','$date')");
}
header("location:cmpg.php");
?>