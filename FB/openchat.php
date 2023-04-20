<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location:index.php");
}
$name2=$_SESSION['name2'];
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
            font-size: 0.8cm;
            color: rgb(255, 255, 255);
        }
        .posts{
            display: flex;
            flex-direction: column;
            gap:1em;
        }
        .msg{
            color:  black;

            font-size: 13px;
            padding: 2px;
        }
        .ms{
            margin-left: 15px;
            padding: 5px;
            background-color: white;
            height: 90px;
            width: 500px;
            border-radius: 10px;
        }
        .sender{
            color:  rgb(28, 57, 101);

            font-size: 15px;
            padding: 2px;
        }
        .type{
            padding: 3px;
            margin: 5px;
        }
    </style>
    <body>
    <ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="dash.php">Dashboard</a></li>
  <li><a href="chat.php">Chat</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
    <div class="posts">
        <?php
        echo "<h2 class='title'>To {$name2}:</h2>";
        $res = mysqli_query($conn,"select * from comment where (froms='$name' and tos='$name2') or (froms='$name2' and tos='$name') order by date asc");
        if (mysqli_num_rows($res) > 0) {
            while ($i = mysqli_fetch_assoc($res)) {?>
            <div class="ms">
               <?php echo "<br><label class='sender'>{$i['froms']}:</label><br>"; ?>
               <?php echo "<label class='msg'>{$i['msg']}</label>"; ?>
           </div>
            <?php } }?>
    </div>
        <div class="type" >
            <form action="inmsg.php" method="post">
                <input type="type" class="inp" name="msg">
                <input type="submit" name="submit" class="button2">
            </form>
        </div>
    </body>
</html>