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
        .date{
            color:white;
            font:8px;
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
        height: 305px;
        width: 290px;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
        padding: 10px;
        border-radius: 5px;
        margin: 20px;
      }
      input[type="file"]::file-selector-button {
  background-image: url(Add-Icon-o3nlsc-300x300.png);
  height: 290px;
  width: 287px;
}
input[type='file'] {
    color: rgba(0, 0, 0, 0);
}
    .button2{
            height: 20px;
            width: 287px;
            border: 0ch;
            font-size: 18px;
            background-color: white;
            color: rgb(28, 57, 101);}
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
        <div class="post">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" class="inp" name="file">
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'fb';
        $conn = mysqli_connect($host, $username, $password, $dbname);
        $name = $_SESSION['name'];
        $res = mysqli_query($conn,"select * from post where name = '$name'");
        if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  ?>
           
           <div class="post">
               <img src="uploads/<?=$images['url']?>" height="280px" width="280px">
               <?php echo "<br><label for='like' class='likes'>Likes:{$images['likes']}</label><br>"; ?>
               <?php echo "<label for='date' class='date'>Date:{$images['date']}</label>"; ?>
           </div>
                
  <?php } }?>
        
    </div>

    </body>
</html>