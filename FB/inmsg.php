<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fb';
$name=$_SESSION['name'];
$name2=$_SESSION['name2'];
$msg=$_POST['msg'];
$msg=trim($msg);
$date = date('Y-m-d h:i:sa');
$conn = mysqli_connect($host, $username, $password, $dbname);
if($msg!=""){
    $res=mysqli_query($conn,"insert into comment(froms,tos,msg,date)values('$name','$name2','$msg','$date')");
}
header("location:openchat.php");
?>