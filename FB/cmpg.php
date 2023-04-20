<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:index.php");
}
$url=$_SESSION['addr'];
$name=$_SESSION['name'];
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fb';
$conn = mysqli_connect($host, $username, $password, $dbname);
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
        .ms{
            margin-left: 15px;
            padding: 5px;
            background-color: white;
            height: 90px;
            width: 500px;
            border-radius: 10px;
        }
        .posts{
            display: flex;
            flex-direction: column;
            gap:1em;
        }
        .sender{
            color:  rgb(28, 57, 101);

            font-size: 15px;
            padding: 2px;
        }
        .msg{
            color:  black;

            font-size: 13px;
            padding: 2px;
        }
        .post{
            background-color: black;
            width: fit-content;
            color:aliceblue;
        }
        .type{
            padding: 3px;
            margin: 5px;
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
        $res = mysqli_query($conn,"select * from post where url='$url'");
        $i = mysqli_fetch_assoc($res);
        $date=$i['date'];
        $like=$i['likes'];
        $user=$i['name'];

        echo "<div class='post'>";
        echo "<img src='uploads/{$url}' height='400px' width='300px'>";
        echo "<br><label for='u'>Name:{$user}</label>";
        echo "<br><label for='u'>Likes:{$like}</label>";
        echo "<br><label for='u'>Date:{$date}</label>";
        echo "</div>";
        
        $res = mysqli_query($conn,"select * from msg where url='$url' order by date");
        if (mysqli_num_rows($res) > 0) {
            while ($i = mysqli_fetch_assoc($res)) {?>
            <div class="ms">
               <?php echo "<br><label class='sender'>{$i['froms']}:</label><br>"; ?>
               <?php echo "<label class='msg'>{$i['msg']}</label>"; ?>
           </div>
            <?php } }?>
        <div class='type'>
            <form action="incm.php" method="post">
                <input type="type" class="inp" name="msg">
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
    </div>
    </body>
</html>