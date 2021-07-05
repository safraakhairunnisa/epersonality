<?php
session_start();

if(isset($_POST['cancel'])) {
	header('Location: mainpage.php');
	return;
}
require_once "pdo.php";

$studentid = $_SESSION["studentid"];
$stmt = $pdo->query("SELECT studentid, name, course, faculty, college FROM  student WHERE studentid = '{$studentid}'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ( $rows as $row ) {
 ($row['studentid']);
 ($row['name']);
 ($row['course']);
 ($row['faculty']);
 ($row['college']);
}

if (isset($_POST['edit']) && isset($_POST['studentid']) && isset($_POST['name']) && isset($_POST['course'])
&& isset($_POST['faculty']) && isset($_POST['college'])) {
	if (strlen($_POST['studentid']) < 1) {
		$_SESSION['errorProfile'] = 'Please enter Student ID';
		header("Location: profile.php");
		return;
	} else if (!is_numeric($_POST['studentid']) ) {
		$_SESSION['errorProfile'] = 'Student ID must be numeric';
		header("Location: profile.php");
		return;
	}  else if (strlen($_POST['name']) < 1) {
		$_SESSION['errorProfile'] = 'Please enter your name';
		header("Location: profile.php");
		return;
	}  else if (strlen($_POST['course']) < 1) {
		$_SESSION['errorProfile'] = 'Please enter your course';
		header("Location: profile.php");
		return;
	}  else if (strlen($_POST['faculty']) < 1) {
		$_SESSION['errorProfile'] = 'Please enter your faculty';
		header("Location: profile.php");
		return;
	}else if (strlen($_POST['college']) < 1) {
		$_SESSION['errorProfile'] = 'Please enter your college';
		header("Location: profile.php");
		return;
	}
	{
       $studentid = $_SESSION["studentid"];
		$stmt = $pdo->prepare("UPDATE student SET studentid = :id, name = :nm, course = :cr, faculty = :fc, college = :co WHERE studentid = '{$studentid}'" );
		$stmt->execute(array(
			':id' => $_POST['studentid'],
			':nm' => $_POST['name'],
			':cr' => $_POST['course'],
			':fc' => $_POST['faculty'],
                        ':co' => $_POST['college']
		));
		$_SESSION['insert'] = 'Record inserted';
		header("Location: profile.php");
		return;
	}
}
?>

<html>
<head>
<title>
e-Personality Student Profile
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

#frmProfile {
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
    width: 40%;
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

<nav class="navbar navbar-expand-md">

<div class="logo">
 <a class="navbar-brand" href="studentPage.php">
   <img src="home.png"  class="img-fluid"></a>
 </div>
<div class="logo">
   <a class="navbar-brand" href="profile.php">
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
 <a class="nav-link" href="pt.php">Test</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="infoStud.php">Information</a>
 </li>
 </ul>
 </div>
</nav>
<br><br><br>

<form action="" method="post" id="frmProfile">

    <div class="field-group">
        <div>
            <p>Student Profile</p>
<?php
		if (isset($_SESSION['insert'])) {
			echo('<p style="color: green;">' . htmlentities($_SESSION['insert']) . "</p>\n");
			unset($_SESSION['success']);
		}
		if (isset($_SESSION['errorProfile'])) {
			echo('<p style="color: red;">' . htmlentities($_SESSION['errorProfile']) . "</p>\n");
			unset($_SESSION['errorProfile']);
		}
		?>
        </div>
        <div>
            Student ID: <input name="studentid" readonly type="text" placeholder="Student ID"
                class="input-field" value= "<?php echo htmlentities($row['studentid']);?>"
        </div>
    </div>
<div class="field-group">
        <div>
            Student Name: <input name="name" type="text" placeholder="Name"
                class="input-field" value= "<?php echo htmlentities($row['name']);?>"
        </div>
    </div>
<div class="field-group">
        <div>
            Course: <input name="course" type="text" placeholder="Course"
                class="input-field" value= "<?php echo htmlentities($row['course']);?>"
        </div>
    </div>
    <div class="field-group">
        <div>
            Faculty: <input name="faculty" type="text" placeholder="Faculty"
               class="input-field" value= "<?php echo htmlentities($row['faculty']);?>"
        </div>
    </div>
    <div class="field-group">
        <div>
            College: <input name="college" type="text" placeholder="College"
      class="input-field" value= "<?php echo htmlentities($row['college']);?>"
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" name="edit" value="Update Profile"
                class="form-submit-button"></span>

        </div>
    </div>
</form>

</body>
</html>
