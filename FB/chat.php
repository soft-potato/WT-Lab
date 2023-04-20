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
        .profile{
            display: flex;
            background-color: white;
            height:55px;
            border-radius: 30px;
        }
        .posts {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-gap: 70px;
        max-width: 1200px;
        margin:8px;
        }
        .user{
            position: relative;
            left:15px;
            margin-right: 17px;
        }
        input[type="text"]{
    visibility: hidden;
}
input[type="img"]{
    cursor: pointer;
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
        $res = mysqli_query($conn,"select * from user");
        if (mysqli_num_rows($res) > 0) {
            while ($i = mysqli_fetch_assoc($res)) {  
                $x= $i['name'];
             if($i['name']!=$name){?>
           
           <div class="profile">
               <?php echo "<form action='message.php' method='post'><input type='image' name='submit' src='msg.png' height='30px' width='30px'><label for='user' class='user'>User:{$x}</label></label><input type='text' id='url' name='url' value='$x'>";?>
               
               </form>
           </div>
                
  <?php } } }?>
        </div>
    </body>
</html>