<?php
session_start();
require_once "pdo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test Summary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Adamina" />

  <style>

  .header {
    background-image: url('faces.png');
    background-size: cover;
    background-position: center;
    position: relative;
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
            <h3>Summary</h3>
            <p><b>Extroversion (E)</b> is the personality trait of seeking fulfillment from sources outside the self or in
              community. High scorers tend to be very social while low scorers prefer to work on their projects alone.</p>

              <p><b>Agreeableness (A)</b> reflects much individuals adjust their behavior to suit others. High scorers
                are typically polite and like people. Low scorers tend to 'tell it like it is'.</p>

                <p><b>Conscientiousness (C)</b> is the personality trait of being honest and hardworking. High scorers tend
                  to follow rules and prefer clean homes. Low scorers may be messy and cheat others.</p>

                  <p><b>Neuroticism (N)</b> is the personality trait of being emotional.</p>

                  <p><b>Openness to Experience (O)</b> is the personality trait of seeking new experience and intellectual pursuits.
                    High scores may day dream a lot. Low scorers may be very down to earth.</p>
                  </div>
                </header>


                <div class="row">
                  <div class="col-sm-7">
                    <img src="big5.png" class="img-fluid">
                  </div>

                  <div class="col-sm-5">
                    <h4>Your Score:</h4>
                    <?php if(isset($message)) { echo $message; } ?>
                    <h6>
                      <?php

                        $studentid = $_SESSION["studentid"];

                        $stmt = $pdo->query("SELECT e,a,c,n,o FROM score where studentid = '{$studentid}'");
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($rows == null){
                          $message = "You have not completed the test yet";
                        }

                        else {
                          foreach ($rows as $row){
                          ($row['e']);
                          ($row['a']);
                          ($row['c']);
                          ($row['n']);
                          ($row['o']);
                        }
                        echo "E: ".$row['e'];
                        echo "\t\tA: ".$row['a'];
                        echo "\t\tC: ".$row['c'];
                        echo "\t\tN: ".$row['n'];
                        echo "\t\tO: ".$row['o'];
                      }
                      ?>
                    </h6>
                    <a href="https://positivepsychology.com/big-five-personality-theory/"> <button type="button">Tell Me More!</button></a>
                  </div>
                </div>
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
