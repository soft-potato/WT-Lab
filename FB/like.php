<?php
session_start();
    $name=$_SESSION['name'];
    $url= $_POST['url'];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'fb';
    $conn = mysqli_connect($host, $username, $password, $dbname);
    $res = mysqli_query($conn,"select * from liking where name='$name' and url='$url'");
    if(mysqli_num_rows($res)>0){
        $res=mysqli_query($conn,"select * from post where url='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x-1;
        $a=mysqli_query($conn,"UPDATE post SET likes='$x' WHERE url='$url'");
        $b=mysqli_query($conn,"DELETE FROM liking WHERE name='$name' and url='$url'");
    }
    else{
        $res = mysqli_query($conn,"select * from post where url='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x+1;
        $a=mysqli_query($conn,"UPDATE post SET likes='$x' WHERE url='$url'");
        $b=mysqli_query($conn,"INSERT INTO liking(name,url)VALUES('$name','$url')");
    }
    header("Location:home.php");

?>