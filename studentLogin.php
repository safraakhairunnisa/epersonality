<?php
session_start();

require_once "Auth.php";
require_once "Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "authCookieSessionValidate.php";


if ($isLoggedIn) {
    $util->redirect("studentPage.php");
}

if (! empty($_POST["cancel"])) {
    $util->redirect("mainpage.php");}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;

    $studentid = $_POST["studentid"];
    $password = $_POST["password"];

    $student = $auth->getStudentByID($studentid);

    if ( $student == null){
      $message = "Invalid Login";
    }

    else if (password_verify($password, $student[0]["password"])) {
        $isAuthenticated = true;
    }

    if ($isAuthenticated) {
        $_SESSION["studentid"] = $_POST["studentid"];

        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {
            setcookie("login", $studentid, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByUserID($studentid, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($studentid, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
        $util->redirect("studentPage.php");

    } else {
        $message = "Invalid Login";
    }
}

$str="safraa";
$str_hash=password_hash($str,PASSWORD_DEFAULT);
//echo $str_hash;

?>

<html>
<head>
<title>
e-Personality Student Login
</title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
 crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Adamina" />
<style>


#frmLogin {
    padding: 20px 100px 40px 100px;
    background: white;
    border: #f06e9c 1px solid;
    color: #333;
    border-radius: 5px;
    width: 600px;
}

.field-group {
    margin-top: 15px;
}

.input-field {
    padding: 12px 10px;
    width: 100%;
    border: #fad2e0 1px solid;
    border-radius: 5px;
    margin-top: 5px
}

.form-submit-button {
    background: #4CAF50;
    border: 0;
    padding: 10px 0px;
    border-radius: 2px;
    color: #FFF;
    text-transform: uppercase;
    width: 100%;
}

.form-cancel-button {
    background: red;
    border: 0;
    padding: 10px 0px;
    border-radius: 2px;
    color: #FFF;
    text-transform: uppercase;
    width: 100%;
}
.error-message {
    text-align: center;
    color: #FF0000;
}

form {
   max-width: 64em;
   margin: auto;
 }
</style>

</head>
<body>
   <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-md">

<div class="logo">
 <a class="navbar-brand" href="mainpage.php">
   <img src="home.png"  class="img-fluid"></a>
 </div>
<div class="logo">
   <a class="navbar-brand" href="">
     <img src="profile.png" class="img-fluid"></a>
      </div>
      <div class="logo">
     <a class="navbar-brand" href="#contact">
       <img src="phone.png"  class="img-fluid"></a>
     </div>

   <div class="center">
   <p>e-Personality</p>
   </div>

 <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="main-navigation">
 <ul class="navbar-nav">
<li class="nav-item">
 <a class="nav-link" href="logout.php">Logout</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="#container">Test</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="infoUser.php">Information</a>
 </li>
 </ul>
 </div>
</nav>
<br><br>
<form action="" method="post" id="frmLogin">
    <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
    <div class="field-group">
        <div>
            <p>Login Form</p>
        </div>
        <div>
            <input name="studentid" type="text" placeholder="Student ID"
                value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input name="password" type="password" placeholder="Password"
                value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="checkbox" name="remember" id="remember"
                <?php if(isset($_COOKIE["login"])) { ?> checked
                <?php } ?> /> <label for="remember-me">Remember me</label>
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" name="login" value="Login"
                class="form-submit-button"></span>
        </div>
<br>
        <div>
            <input type="submit" name="cancel" value="Cancel"
                class="form-cancel-button"></span>
        </div>
    </div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<div id="contact" class="ending">
  <h5>Contact</h5>
  <p>+60-1120323243</p>
  <p>+03-1890323883</p>
  <p>email: e-personality.upm.edu.my</p>
  <p>Copyright © 2021 UPM® . All rights reserved</p>
</div>
</body>
</html>
