<?php
require_once "pdo.php";

session_start();

if ( isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['option5'])) {
  $sql = "UPDATE pt SET question = :question, option1 = :option1, option2 = :option2, option3 = :option3, option4 = :option4, option5 = :option5 WHERE q_id = :question_id";
  echo "<pre>\n$sql\n</pre>\n";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':question' => htmlentities($_POST['question']),
    ':option1' => htmlentities($_POST['option1']),
    ':option2' => htmlentities($_POST['option2']),
    ':option3' => htmlentities($_POST['option3']),
    ':option4' => htmlentities($_POST['option4']),
    ':option5' => htmlentities($_POST['option5']),
    ':question_id' => $_POST['question_id']));

  $_SESSION['edited'] = "Question updated";
  header( 'Location: caunselor.php' ) ;
  return;
}

$stmt = $pdo->prepare("SELECT * FROM pt where q_id = :q");
$stmt->execute(array(":q" => $_GET['question_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$question = htmlentities($row['question']);
$option1 = htmlentities($row['option1']);
$option2 = htmlentities($row['option2']);
$option3 = htmlentities($row['option3']);
$option4 = htmlentities($row['option4']);
$option5 = htmlentities($row['option5']);
$question_id = $row['q_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="newform.css">
</head>
  <body>

    <nav class="navbar navbar-expand-md">
    <div class="logo">
     <a class="navbar-brand" href="counselorPage.php">
       <img src="home.png"  class="img-fluid"></a>
     </div>
    <div class="logo">
       <a class="navbar-brand" href="">
         <img src="profile.png" class="img-fluid"></a>
          </div>
          <div class="logo">
         <a class="navbar-brand" href="counselorPage.php">
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
     <a class="nav-link" value="Logout" href="logout.php">Logout</a>
     </li>
     <li class="nav-item">
     <a class="nav-link" href="caunselor.php">Question</a>
     </li>
     <li class="nav-item">
     <a class="nav-link" href="infoCoun.php">Information</a>
     </li>
     </ul>
     </div>
    </nav>

<br>
<br>
<br>
<br>
    <center><h3>Edit Question</h3>

    <form method="post">
      <p>Question:
        <input type="text" name="question" value="<?= $question ?>"></p>
      <p>Answer 1:
        <input type="text" name="option1" value="<?= $option1 ?>"></p>
      <p>Answer 2:
        <input type="text" name="option2" value="<?= $option2 ?>"></p>
      <p>Answer 3:
        <input type="text" name="option3" value="<?= $option3 ?>"></p>
      <p>Answer 4:
        <input type="text" name="option4" value="<?= $option4 ?>"></p>
      <p>Answer 5:
        <input type="text" name="option5" value="<?= $option5 ?>"></p>

        <input type="hidden" name="question_id" value="<?= $question_id ?>">
      <p><input type="submit" value="Update"/>
          <a class="cancel" href="caunselor.php">Cancel</a></p>
    </form></center>

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
