<?php
require_once "pdo.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Caunselor</title>
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

    <div class="container" style="background:#DFE0D4;" >
      <?php
          if (isset($_SESSION['edited'])) {
            echo('<p style="color: green;">' . htmlentities($_SESSION['edited']) . "</p>\n");
            unset($_SESSION['edited']);
          }
          ?>
  <?php
  $stmt = $pdo->query("SELECT * FROM pt");
  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo '<table width="100%">';

  foreach ($row as $row){
      echo "<tr><td colspan='5';><h5>".$row['q_id'].". ".$row['question']."</h5></td></tr>\n";
      echo '<tr><td><p><input type="radio" name="test" value="1" disabled>'.$row['option1'].'</p></td>';
      echo '<td><p><input type="radio" name="test" value="2" disabled>'.$row['option2'].'</p></td>';
      echo '<td><p><input type="radio" name="test" value="3" disabled>'.$row['option3'].'</p></td>';
      echo '<td><p><input type="radio" name="test" value="4" disabled>'.$row['option4'].'</p></td>';
      echo '<td><p><input type="radio" name="test" value="5" disabled>'.$row['option5']."</p></td>";
      echo '<td><a class="edit" href="qaedit.php? question_id='.urlencode($row['q_id']).'">Edit</a>';
      echo "</td></tr>\n";
  }
  echo "</table>";

  ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div id="contact" class="ending">
  <h5 style="font-weight: bold;">Contact</h5>
  <p>+60-1120323243</p>
  <p>+03-1890323883</p>
  <p>email: e-personality.upm.edu.my</p>
  <p style="font-weight: bold;">Copyright © 2021 UPM® . All rights reserved</p>
</div>
</body>
</html>
<?php

?>
