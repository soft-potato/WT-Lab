<?php
session_start();
?>
<html>
    <style>
        *{
            font-family: "Poppins", sans-serif;
            
        }
        body{
            background: rgb(28, 57, 101);
        }
        .title{
            margin: auto;
            font-size: 2cm;
            color: rgb(255, 255, 255);
        }
        .button1{
            height: 35px;
            width: 500px;
            border: 0ch;
            background-color: rgb(28, 57, 101);
            color: white;
            font-family: "klavika" ;
            font-size: 25px;
            display: inline-block;
            cursor: pointer;
            border-radius: 9px;
            position: relative;
            top:20px;
            left:40px;
            transition-duration: 0.4s;
        }
        .button1:hover{
            box-shadow: 0 4px 9px 0 rgba(0,0,0,0.44),0 6px 13px 0 rgba(0,0,0,0.19);
        }
        .top{
            position: relative;
            top:120px;
            left:45px;
            height: 340px;
            width:650px;
            background-color: white;
            border-radius: 30px;
        }
        .login{
            position: relative;
            top:-220px;
            left:730px;
            height: 340px;
            width:650px;
            background-color: white;
            border-radius: 30px;
        }
        input{
            margin-left: 25px;
            border: none;
            height: 70px;
            width: 550px;
            border-bottom: 2px solid grey;
            outline: none;
            font-size: larger;
        }
        .error{
            font-size: larger;
            color: red;
            position: relative;
            left:30px;
        }
        .acc{
            position: relative;
            top:35px;
            left:30px;

        }
    </style>
    <body>
        <?php
        $error='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["password"];
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'fb';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            $sql = "select * from user where name='$name' and pass='$pass'";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                $_SESSION['name']=$name;
                header('Location:home.php');
                exit(1);
            }
            else{
                $error='*Invalid credentials';
            }
        }
        ?>

            <h2 class="title">facebook</h2>
            <div class="login">
                
                <br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   <?php echo "<label for='error' class='error'>{$error}</label>"; ?>
                    <table border="0" cellspacing="5px" cellpadding="5px">
                        <tr>
                            
                            <th>
                                <input type="text" name="name" placeholder="Name">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="password" name="password" placeholder="Password">
                            </th>
                        </tr>
                </table>
                <input type="submit" name="Login" value="Login" class="button1">
                </form>
                <label for='acc' class='acc'>Need an account?<a href="signup.php">Create account</a></label>
            </div>
        
    </body>
</html>