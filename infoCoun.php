<!DOCTYPE html>
<html lang="en">
 <head>
 <title>User Page</title>
 <style>
 .info{
  text-align: center;
  font-size: 18px;
  padding: 70px;
}
.info  h2{
  text-align: center;
  font-weight: bold;
}
.question{
  padding: 40px;
  column-count: 3;
  column-gap: 40px;
}
 </style>
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

<form method="POST">
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
</form>

<div class="info">
<h2>Information</h2>
<h4>This is a personality test, it will help you understand why you act the way that you do and how your personality is structured.</h3>
<div class="question">
<p>1. Am the life of the party</p>
<p>2. Feel little concern for others</p>
<p>3. Am always prepared.</p>
<p>4. Get stressed out easily</p>
<p>5. Have a rich vocabulary</p>
<p>6. Don't talk a lot.</p>
<p>7. Am interested in people.</p>
<p>8. Leave my belongings around.</p>
<p>9. Am relaxed most of the time. </p>
<p>10. Have difficulty understanding abstract ideas.</p>
<p>11. Feel comfortable around people.</p>
<p>12. Insult people.</p>
<p>13. Pay attention to details.</p>
<p>14. Worry about things.</p>
<p>15. Have a vivid imagination.</p>
<p>16. Keep in the background.</p>
<p>17. Sympathize with others' feelings.</p>
<p>18. Make a mess of things.</p>
<p>19. Seldom feel blue.</p>
<p>20. Am not interested in abstract ideas.</p>
<p>21. Start conversations.</p>
<p>22. Am not interested in other people's problems.</p>
<p>23. Get chores done right away</p>
<p>24. Am easily disturbed.</p>
<p>25. Have excellent ideas.</p>
<p>26. Have little to say.</p>
<p>27. Have a soft heart</p>
<p>28. Often forget to put things back in their proper place.</p>
<p>29. Get upset easily.</p>
<p>30. Do not have a good imagination.</p>
</div>

<h2 style="padding: 40px;">Formula</h2>
<p><span style="font-weight:bold;">E</span> = 20 + (1) ___ - (6) ___ + (11) ___ - (16) ___ + (21) ___ - (26) ___ = _____</p>
<p><span style="font-weight:bold;">A</span> = 14 - (2) ___ + (7) ___ - (12) ___ + (17) ___ - (22) ___ - (27) ___ = _____</p>
<p><span style="font-weight:bold;">C</span> = 14 + (3) ___ - (8) ___ + (13) ___ - (18) ___ + (23) ___ - (28) ___ = _____</p>
<p><span style="font-weight:bold;">N</span> = 38 - (4) ___ + (9) ___ - (14) ___ + (19) ___ - (24) ___ - (29) ___ = _____</p>
<p><span style="font-weight:bold;">O</span> = 8 + (5) ___ - (10) ___ + (15) ___ - (20) ___ + (25) ___ - (30) ___ = _____ </p>

<div style="padding: 40px;">
<ul>
  <li>Extroversion (E) is the personality trait of seeking fulfillment from sources outside the self or
in community. High scorers tend to be very social while low scorers prefer to work on their
projects alone.</li>
<li>Agreeableness (A) reflects much individuals adjust their behavior to suit others. High scorers
are typically polite and like people. Low scorers tend to 'tell it like it is'.</li>
<li>Conscientiousness (C) is the personality trait of being honest and hardworking. High scorers
tend to follow rules and prefer clean homes. Low scorers may be messy and cheat others.</li>
<li>Neuroticism (N) is the personality trait of being emotional.</li>
<li>Openness to Experience (O) is the personality trait of seeking new experience and intellectual
pursuits. High scores may day dream a lot. Low scorers may be very down to earth.</li>
</div>
</div>

<div id="contact" class="ending">
  <h5>Contact</h5>
  <p>+60-1120323243</p>
  <p>+03-1890323883</p>
  <p>email: e-personality.upm.edu.my</p>
  <p>Copyright © 2021 UPM® . All rights reserved</p>
</div>

  </body>

</html>
