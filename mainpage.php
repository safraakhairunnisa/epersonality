<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="main.css">


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
                <div class="dropdown">
                  <button class="dropbtn">Login</button>
                  <div class="dropdown-content">
                    <a href="studentLogin.php" style="text-decoration:none;">Student</a>
                    <a href="counselorLogin.php" style="text-decoration:none;">Counselor</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#container">Test</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#container">Information</a>
              </li>
            </ul>
          </div>
        </nav>

        <header class="page-header header container-fluid">
          <div class="overlay"></div>
          <div class="description">
            <h1>Welcome</h1>
            <p>Love Yourself.</p>
          </div>
        </header>

        <script src="main.js"></script>

        <div id="container" class="container features">
          <div  class="row">
            <div class="col-lg-6 col-md-6">
              <p>Test Now</p>
              <img src="test.jpg" alt="tradition" class="img-fluid">
              <button onclick="document.location='studentLogin.php'" type="button" class="button">Test your personality now!</button>
            </div>

            <div class="col-lg-6 col-md-6">
              <p>The Big Five Personality Test</p>
              <img src="personality.jpg" alt="tradition" class="img-fluid">
              <button onclick="document.location='infoUser.php'" type="button" class="button">Information</button>
            </div>
          </div>
        </div>

        <footer><div id="contact" class="ending">
          <h5>Contact</h5>
          <p>+60-1120323243</p>
          <p>+03-1890323883</p>
          <p>email: e-personality.upm.edu.my</p>
          <p>Copyright © 2021 UPM® . All rights reserved</p>
        </div></footer>

      </body>

      </html>
