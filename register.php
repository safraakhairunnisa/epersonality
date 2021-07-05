<?php
session_start();

if(isset($_POST['cancel'])) {
	header('Location: mainpage.php');
	return;
}
require_once "pdo.php";

if (isset($_POST['studentid']) && isset($_POST['email']) && isset($_POST['password'])
&& isset($_POST['password2'])) {
	if (strlen($_POST['studentid']) < 1) {
		$_SESSION['error'] = 'Please enter Student ID';
		header("Location: register.php");
		return;
	} else if (!is_numeric($_POST['studentid']) ) {
		$_SESSION['error'] = 'Student ID must be numeric';
		header("Location: register.php");
		return;
	}  else if (strpos($_POST['email'], "@") === false) {
		$_SESSION['error'] = 'Email must have an at-sign (@)';
		header("Location: register.php");
		return;
	} else if (strcmp(($_POST['password']),($_POST['password2'])) ==! 0) {
		$_SESSION['error'] = 'Password does not match';
		header("Location: register.php");
		return;
	}
	{
		$stmt = $pdo->prepare('INSERT INTO student (studentid, email, password) VALUES ( :id, :em, :pw)');
		$stmt->execute(array(
			':id' => $_POST['studentid'],
			':em' => $_POST['email'],
			':pw' => $_POST['password'])
		);
		$_SESSION['success'] = 'Record inserted';
		header("Location: register.php");
		return;
	}
}
?>

<html>
<head>
<title>
e-Personality Student Registration
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
</head>
body {
    font-family: Adamina;
    background: #fad2e0;
}

#frmRegister {
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
    width: 30%;
}

.form-cancel-button {
    background: red;
    border: 0;
    padding: 10px 0px;
    border-radius: 2px;
    color: #FFF;
    text-transform: uppercase;
    width: 30%;
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
<head>
<body>
   <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
crossorigin="anonymous"></script>

<div style="background:#f06e9c;text-align:center;font:Adamina;color:white;padding:8px 20px;font-size: 20px;" <p style="
  text-align:center">e-Personality</p></div><br><br><br>

<form action="" method="post" id="frmRegister">

    <div class="field-group">
        <div>
            <p>Registration Form</p>
<?php
		if (isset($_SESSION['success'])) {
			echo('<p style="color: green;">' . htmlentities($_SESSION['success']) . "</p>\n");
			unset($_SESSION['success']);
		}
		if (isset($_SESSION['error'])) {
			echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
			unset($_SESSION['error']);
		}
		?>
        </div>
        <div>
            <input name="studentid" type="text" placeholder="Student ID"
                class="input-field">
        </div>
    </div>
<div class="field-group">
        <div>
            <input name="email" type="text" placeholder="Email"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input name="password" type="password" placeholder="Password"

                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input name="password2" type="password" placeholder="Confirm Password"

                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <center><div>
            <input type="submit" name="register" value="Register"
                class="form-submit-button"></span>
<input type="submit" name="cancel" value="Cancel"
                class="form-cancel-button"></span>
        </div></center>
    </div>
</form>
<div id="contact" class="ending">
	<h5>Contact</h5>
	<p>+60-1120323243</p>
	<p>+03-1890323883</p>
	<p>email: e-personality.upm.edu.my</p>
	<p>Copyright © 2021 UPM® . All rights reserved</p>
</div>
</body>
</html>
