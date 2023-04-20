<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:index.php");
}
?>
<html>
    <style>
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(28, 57, 170);
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
        *{
            font-family: "Poppins", sans-serif;
            
        }
        body{
            background-color: rgb(28, 57, 101);
        border: 7px solid white;
        border-radius: 14px;
        }
        .title{
            margin: auto;
            font-size: 0.8cm;
            color: rgb(255, 255, 255);
        }
        h5{
            color:grey;
            opacity: 0.6;
            position: relative;
            top:-100px;
        }
        .likes{
            color:pink;
            font:15px;
        }
        .posts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 70px;
        margin: 0 auto;
        max-width: 1200px;
        }
        
        .post {
        background-color: rgb(28, 57, 101);
        border: 7px solid white;
        height: 427px;
        width: 290px;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
        padding: 10px;
        border-radius: 5px;
        margin: 20px;
      }
      .img {
  height: 40px;
  width: 40px;
}
input[type="text"]{
    visibility: hidden;
}
.cm{
    position: relative;
    top: -70px;
    left:177px;
    width:100px;
    height: 50px;
}
    </style>
    <body>
    <?php echo "<h2 class='title'>Welcome {$_SESSION['name']}</h2>"; ?>
    <br>
        <ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="dash.php">Dashboard</a></li>
  <li><a href="chat.php">Chat</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
    <div class="posts">
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'fb';
        $name=$_SESSION['name'];
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $res = mysqli_query($conn,"select * from post order by likes desc");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  
           $x=$images['url'];
           $y="";
           $a=mysqli_query($conn,"select * from liking where name='$name' and url='$x'");
           if(mysqli_num_rows($a) > 0){$y='skull.png';}
           else{$y='love-png-5.png';}
           ?>
           <div class="post">
               <img src="uploads/<?=$x?>" height="340px" width="280px">
               <?php echo "<br><form action='like.php' method='post'><input type='image'class='img' src='$y' name='submit'><label for='like' class='likes'>{$images['likes']}</label><input type='text' id='url' name='url' value='$x'></form><br>"; ?>
               <?php echo "<br><form action='comments.php' method='post'><input type='image' src='com.png' class='cm' name='submit'><input type='text' id='url' name='url' value='$x'></form>"; ?>
               <?php echo "<h5>Date:{$images['date']}</h5>"; ?>
           </div>
                
  <?php } }?>
        
    </div>
    
    </body>
</html>