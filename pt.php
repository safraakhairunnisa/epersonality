<?php
require_once "pdo.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personality Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Adamina" />

  <style>
  .header {
    background-image: url('ocean.jpg');
    background-size: cover;
    background-position: center;
    position: relative;
  }
  table, th, td {
    padding: 10px;
    margin: 20px;
  }

  td{
    text-align: center;
  }

  .edit:link, .edit:visited {
    color: #DFE0D4;
    background-color: #FF5335;
    border: 2px solid #DFE0D4;
    border-radius: 5px;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }

  .edit:hover, .edit:active {
    background-color: #DFE0D4;
    color: #FF5335;
    border: 2px solid #FF5335;
  }

  input[type="radio"]:checked:after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
    top: -2px;
    left: -1px;
    position: relative;
    background-color: #3C1053FF;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 2px solid white;
  }

  input[type="submit"] {
    margin-left: 50%;
    color: #DFE0D4;
    background-color: #FF5335;
    border: 2px solid #DFE0D4;
    border-radius: 5px;
    padding: 10px 20px;
    align: center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    transition-duration: 0.4s;
    margin-bottom: 20px;
  }

  input[type="submit"]:hover {
    background-color: #DFE0D4;
    color: #FF5335;
    border: 2px solid #FF5335;
  }

  .description h3 {
    color: #fc3030;
    margin: 40px;
  }
  .description p {
    color: #fff;
    font-size: 1.3rem;
    line-height: 1.5;
    text-align: justify;

  }
  .description b{
    color: #FF5335;
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
      <a class="navbar-brand" href="studentPage.php">
        <img src="home.png"  class="img-fluid"></a>
      </div>
      <div class="logo">
        <a class="navbar-brand" href="profile.php">
          <img src="profile.png" class="img-fluid"></a>
        </div>
        <div class="logo">
          <a class="navbar-brand" href="studentPage.php">
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
                <a class="nav-link" href="pt.php">Test</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="infoStud.php">Information</a>
              </li>
            </ul>
          </div>
        </nav>


        <header class="page-header header container-fluid">
          <div class="overlay"></div>
          <div class="description">
            <h3 style="text-align:center;" class="title">Personality Test</h3>
            <h5>Introduction</h5>

            <p>This is a personality test, it will help you understand why you act the way
              that you do and how your personality is structured. Please follow the instructions
              below, scoring and results are on the next page.</p>

              <p><b>Instructions:</b> This is a personality test, it will help you understand why you
                act the way that you do and how your personality is structured. Choose the number that
                indicates how much you disagree or agree with each statement. Begin each statement with
                “I….”.</p>
              </div>
            </header>
            <h3 class="title">Answer All The Questions :)</h3>
            <?php
            if(isset($_SESSION['complete'])){
              echo ('<center><p style = "color:green;">'. htmlentities($_SESSION['complete'])."</p></center>\n");
              unset($_SESSION['complete']);
            }
            if(isset($_SESSION['error'])){
              echo ('<center><p style = "color:#e60000;">'. htmlentities($_SESSION['error'])."</p></center>\n");
              unset($_SESSION['error']);
            }
            ?>
            <div class="container" >
              <form method="post">
                <?php
                $stmt = $pdo->query("SELECT * FROM pt");
                $count = $pdo->query("SELECT count(*) FROM pt");
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo '<table width="100%">';
                $index = 1;
                foreach ($row as $row){
                  echo "<tr><td colspan='5';><h5>".$row['q_id'].". ".$row['question']."</h5></td></tr>\n";
                  echo '<tr><td><p><input type="radio" name="quest['.$index.']" value="1"> '.$row['option1']."</p></td>";
                  echo '<td><p><input type="radio" name="quest['.$index.']" value="2"> '.$row['option2'].'</p></td>';
                  echo '<td><p><input type="radio" name="quest['.$index.']" value="3"> '.$row['option3'].'</p></td>';
                  echo '<td><p><input type="radio" name="quest['.$index.']" value="4"> '.$row['option4'].'</p></td>';
                  echo '<td><p><input type="radio" name="quest['.$index.']" value="5"> '.$row['option5']."</p></td></tr>\n";
                  $index++;
                }
                echo "</table>";

                ?>

                <p><input type="submit" name="submit" value="Submit">        <a class="edit" href = "summary.php">Summary</a></p>

              </form>
            </div>

            <?php
            if(isset($_POST['submit'])){
              if(isset($_POST['quest'])){
                $answers = $_POST['quest'];

                if(isset($answers[1]) && isset($answers[2]) && isset($answers[3]) && isset($answers[4]) && isset($answers[5])
                && isset($answers[6]) && isset($answers[7]) && isset($answers[8]) && isset($answers[9]) && isset($answers[10])
                && isset($answers[11]) && isset($answers[12]) && isset($answers[13]) && isset($answers[14]) && isset($answers[15])
                && isset($answers[16]) && isset($answers[17]) && isset($answers[18]) && isset($answers[19]) && isset($answers[20])
                && isset($answers[21]) && isset($answers[22]) && isset($answers[23]) && isset($answers[24]) && isset($answers[25])
                && isset($answers[26]) && isset($answers[27]) && isset($answers[28]) && isset($answers[29]) && isset($answers[30])){
                  $_SESSION['extroversion'] = 20 + $answers[1] - $answers[6] + $answers[11] - $answers[16] + $answers[21] - $answers[26];
                  $_SESSION['agreeableness'] = 14 - $answers[2] + $answers[7] - $answers[12] + $answers[17] - $answers[22] + $answers[27];
                  $_SESSION['conscientiousness'] = 14 + $answers[3] - $answers[8] + $answers[13] - $answers[18] + $answers[23] - $answers[28];
                  $_SESSION['neuroticism'] = 38 - $answers[4] + $answers[9] - $answers[14] + $answers[19] - $answers[24] + $answers[29];
                  $_SESSION['openness'] = 8 + $answers[5] - $answers[10] + $answers[15] - $answers[20] + $answers[25] - $answers[30];

                  $stmt = $pdo->prepare('INSERT INTO score (studentid, e, a, c, n, o) VALUES ( :id, :e, :a, :c, :n, :o)');
                  $stmt->execute(array(
                    ':id' => $_SESSION['studentid'],
                    ':e' => $_SESSION['extroversion'],
                    ':a' => $_SESSION['agreeableness'],
                    ':c' => $_SESSION['conscientiousness'],
                    ':n' => $_SESSION['neuroticism'],
                    ':o' => $_SESSION['openness']
                  ));
                  $_SESSION['complete']= "Test completed! Click the Summary button below to see your score.";

                }else{
                  $_SESSION['error']= "Some questions are not answered!";

                }
              }else{
                $_SESSION['error']= "Please answer the questions!";

              }
            }

            ?>

            <div id="contact" class="ending">
              <h5>Contact</h5>
              <p>+60-1120323243</p>
              <p>+03-1890323883</p>
              <p>email: e-personality.upm.edu.my</p>
              <p>Copyright © 2021 UPM® . All rights reserved</p>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <script src="main.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          </body>
          </html>
