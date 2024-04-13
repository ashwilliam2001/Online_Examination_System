<?php session_start(); ?>
<html>

<head>
    <title>Online Examination System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head><?php
if (isset($_POST['login'])) {
    if (isset($_POST['usertype']) && isset($_POST['username']) && isset($_POST['pass'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'project3');
        if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }
        $type = mysqli_real_escape_string($conn, $_POST['usertype']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $password = crypt($password, 'akashbiswas');
        $sql = "select * from " . $type . " where mail='{$username}'";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            global $dbmail, $dbpw;
            while ($row = mysqli_fetch_array($res)) {
                $dbpw = $row['pw'];
                $dbmail = $row['mail'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["type"]=$type;
                $_SESSION["username"]=$dbmail;
            }
            if ($dbpw === $password) {
                if($type==='student'){
                    header("location:homestud.php");
                }elseif($type==='staff'){
                    header("location: homestaff.php");
                }
            } elseif ($dbpw !== $password && $dbmail === $username) {
                echo "<script>alert('password is wrong');</script>";
            } elseif ($dbpw !== $password && $dbmail !== $username) {
                echo "<script>alert('username name not found sign up');</script>";
            }
        }
    }
}
?>
<style>
#footer{
  background-color: #212121;
  height: 60px;
  position: fixed;
  bottom: 0px;
  left: 0px;
  line-height: 50px;
  color: #aaa;
  text-align: center;
  width: 100%;
}
    @media screen and (max-width: 620px) {
        input {
            height: 6vw !important;
        }

        .seluser {
            display: grid;
        }

        .sub {
            width: 20vw !important;
        }
    }

    .inp {
        width: 30vw;
        height: 3vw;
        border-radius: 10px;
        border: 2px solid black;
        padding-left: 2vw;
        font-weight: bolder;
        outline: none;
    }

    ::placeholder {
        font-weight: bold;
        font-family: 'Courier New', Courier, monospace;
    }

    label {
        font-weight: bolder;
        font-size: 1.5vw;
    }
    form{
        font-size: 1.5vw;
        margin: 0;
    }

    button:hover {
        background-color:#fff !important;
    }

    .bg {
        background-size: 100%;
    }
    a{
        color: #7e7e7e;
    }
    ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: whitesmoke;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
     justify-content: space-between;

}
li{
    float: left;
}
li a{
    display: block;
    color: black;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
    font-size: 20px;

}
li a:hover:not(.active){
 
   background-color: #07ff13;
}
.active{
  
   background-color: blue;
}
@media screen and (max-width:600px){
    li{
        float:none;
    }
}
</style>

<body style="margin:0;height: 100%;outline:none;padding-bottom: 5vw;">
    <div class="bg" style="font-weight: bolder;background-image: url(./images/background.jpg);background-repeat: no-repeat;padding: 0;margin: 0;background-size: cover;font-family: 'Courier New', Courier, monospace;opacity: 0.9;height: 100%;">
        <center>
        <ul>
        <li><a  href="homepage.html">Home🏡</a></li>
        <li><a class="active" href="index.php">Signin/Signup</a></li>
        <li><a href="about.html">About us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
   
    </ul>
            <h1 style=" color:#fff;text-transform: uppercase;width: auto;background:#000;padding: 1vw;">ONLINE
                Examination  Management System</h1>
        </center>
        <center>
            <div class="login" style="color: #000;width: 40vw;background-color: #fff;border: 2px solid black;padding: 2vw;font-weight: bolder;margin-top: 10vh;border-radius: 10px;">
                <form method="POST">
                    <div class="seluser">
                        <input type="radio" name="usertype" value="student" required>STUDENT
                        <input type="radio" name="usertype" value="staff" required>STAFF
                    </div><br><br>
                    <div class="signin">

                        <label for="username" style="text-transform: uppercase;">Username</label><br><br>
                        <input type="email" name="username" placeholder=" Email" class="inp" required>
                        <br><br>
                        <label for="password" style="text-transform: uppercase;">Password</label><br><br>
                        <input type="password" name="pass" placeholder="******" class="inp" required>
                        <br><br>
                        <input name="login" class="sub" type="submit" value="Login" style="height: 3vw;width: 10vw;font-family: 'Courier New', Courier, monospace;font-weight: bolder;border-radius: 10px;border: 2px solid black;background-color:lightblue"><br>

                </form><br>
               <!-- <div style="color:#000"> <a href="reset.php" style="color:#2385fc;">Forgot password?</a> &nbsp; --> New user! <a href="signup.php" style="color:#2385fc;">SIGN UP</a></div>
            </div>
    </div>
    </center>
    </div>
    |<div id="footer">
    Copyright Online Examination management system © 2023 - Arghya Patra & Agastya Nand
</div>
</body>

</html>