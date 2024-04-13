<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Contact form</title>
    <style>
      body {
        background: #f7f7f7;
      }
      
      .form-box {
        max-width: 500px;
        margin: auto;
        padding: 50px;
        background: #ffffff;
        border: 10px solid #f2f2f2;
      }
      
      h1, p {
        text-align: center;
      }
      
      input, textarea {
        width: 100%;
      }
      
      #footer{
    background-color: #212121;
    height: 40px;
    position: fixed;
    bottom: 0px;
    left: 0px;
    line-height: 50px;
    color: #aaa;
    text-align: center;
    width: 100%;

  }
    </style>
     
  </head>
  <?php 
  try {
    $db =new mysqli("localhost","root","","project3");

  } catch(Exception $exc) {
    echo $exc->getTraceAsString;
  }
  if(isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Message'])){
   $name = $_POST['Name'];
   $email = $_POST['Email'];
   $msg = $_POST['Message'];
if(filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL)){
   $is_insert = $db->query("INSERT INTO `web_form`(`name`, `email`, `msg`) VALUES ('$name ',' $email ','$msg')");}
else
    {
    echo "<h1> Email is not Valid please re-enter </h1> <br>";
    }
   if($is_insert == TRUE) {
  echo "<h2>Thanks for contacting Will get into contact soon 😃</h2> ";
   exit();  
}

  }


?>

  <body>
    <header>
    <ul class="nav nav-pills nav-fill">
      <li class="nav-item">
        <a class="nav-link" href="home2.html">Home🏡</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">SignUp/SignIn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="about.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="contact.php">Contact Us</a>
      </li>
    </ul>
    <br>
    <br>
  </header>
    <div class="form-box">
      <h1>Contact US 😊 <h4>Online Examination management</h4></h1>
      <p><i>We'll be really happy to hear from you about improvements and feedback regarding our system</i></p>
      <form action="contact.php" method="post" id="myform">
        <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" id="name" type="text" name="Name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" id="email" type="email" name="Email">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="Message"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit" onclick="SubmitformData();" />
        </div>
      </form>
    </div>
    <div id="results">


    </div>

      <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    |<div id="footer">
      Copyright Online Examination management system © 2022-23 - Arghya Patra & Agastya Nand
  </div>
  </body>
</html>