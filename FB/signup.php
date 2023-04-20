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
            left:85px;
            transition-duration: 0.4s;
        }
        .button1:hover{
            box-shadow: 0 4px 9px 0 rgba(0,0,0,0.44),0 6px 13px 0 rgba(0,0,0,0.19);
        }
        .login{
            position: relative;
            top: 60px;
            left:380px;
            height: 570px;
            width:800px;
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
            font-size: smaller;
            color: red;
        }
        .acc{
            position: relative;
            top:35px;
            left:30px;

        }
        .op{
            font-size: larger;
            color: rgb(28, 57, 101);
            position: relative;
            left:30px;
        }
    </style>
    <body>
    <?php
        $nerror='';
        $eerror='';
        $derror='';
        $perror='';
        $op='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $cpass = $_POST["cpass"];
            $email= $_POST["email"];
            $date=$_POST["date"];
            $flag=true;
            if (empty($name)) {
                $nerror = "*Name is required";
                $flag = false;
            } 
            else {
                if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $flag = false;
                    $nerror = "*Only letters and white spaces are allowed";
                }
            }
            if (empty($email)) {
                $flag = false;
                $eerror="*Email required";
            } 
            else {
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $flag = false;
                    $eerror="*Invalid email";
                }
            }
            if ($cpass != $pass) {
                $flag = false;
                $perror="*Passwords must match";
            }
            if ($flag) {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'fb';
            $conn = mysqli_connect($host, $username, $password, $dbname);
            $sql = "INSERT INTO user ( name,email,pass,dob) 
            VALUES('$name', '$email', '$pass','$date') ";
            $res = mysqli_query($conn,$sql);
            $op="Succesfully signed up";
        }
        else{
            $op="Registration not done";
        }
        }
        ?>
    <h2 class="title">facebook</h2>
    <div class="login">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <?php echo "<label for='op' class='op'>{$op}</label>"; ?>
            <table border="0" cellspacing="5px" cellpadding="5px">
                <tr>
                    <th>
                        <label for="name">Name</label>
                    </th>
                    <th>
                        <input type="text" name="name" placeholder="Enter name" size="20">
                    </th>
                    <th>
                    <?php echo "<label for='error' class='error'>{$nerror}</label>"; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for="Email">Email</label>
                    </th>
                    <th>
                        <input type="email" name="email" placeholder="Enter your email" size="20">
                    </th>
                    <th>
                    <?php echo "<label for='error' class='error'>{$eerror}</label>"; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for="DOB">DOB</label>
                    </th>
                    <th>
                        <input type="date" name="date">
                    </th>
                    <th>
                    <?php echo "<label for='error' class='error'>{$derror}</label>"; ?>
                    </th>
                </tr>
                <tr>
                <th>
                        <label for="pass">password</label>
                    </th>
                    <th>
                        <input type="password" name="pass">
                    </th>
                </tr>
                <th>
                        <label for="pass">confirm password</label>
                    </th>
                    <th>
                        <input type="password" name="cpass">
                    </th>
                    <th>
                    <?php echo "<label for='error' class='error'>{$perror}</label>"; ?>
                    </th>
                </tr>
                </table>
                <input type="submit" name="Signup" value="Signup" class="button1">
</form>
<label for='acc' class='acc'>If you signed......<a href="index.php">Login</a></label>
</div>
    </body>
</html>