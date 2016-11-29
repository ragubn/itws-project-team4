<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rensselaer Research Explorer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
  <link rel="stylesheet" href="index.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <p class="icon-bar"></p>
        <p class="icon-bar"></p>
        <p class="icon-bar"></p>
      </button>
      <a class="navbar-brand" href="index.php"><img src="logo.png" alt="logo" height="35"/></a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="research.php">Research</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><p class="glyphicon glyphicon-log-in"></p> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>Innovations</h4>
      <div>
        <p><a href="#">Novel Therapy for Back Pain</a></p>
        <p>Researchers have identified a mechanism with the potential to arrest or even reverse degeneration of a painful intervertebral disc.</p>
      </div>
      <div>
        <p><a href="#">An Enormous Corrugated Galaxy </a></p>
        <p>The Milky Way galaxy is at least 50 percent larger than is commonly estimated, according to an international team led by Professor Heidi Jo Newberg. </p>
      </div>
       <div>
        <p><a href="#">Weathering the Storm</a></p>
        <p>Rensselaer civil and environmental engineers are protecting roofs from caving in under the weight of snow by advocating for well-crafted building codes, and investigating building performance, warnings, and human behavior during tornadoes.  </p>
      </div>
    </div>
    <div class="col-sm-8 text-left">
      <h1>Welcome</h1>
      <p>Research is an essential part of a university, and a valuable educational experience. By placing the research that an institution is currently partaking in on a central website, it allows students to see the opportunities that exist for them to get involved on campus. As well, it provides the ability for students who are taking part in research the ability to let others know what they are doing and see what other students are researching.</p>
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
      <h4>Highlights</h4>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ZUZVD2ImSCs" frameborder="0" allowfullscreen></iframe>
      </div>
      <div>
        <p>Partnerships: Icahn School of Medicine at Mount Sinai and Rensselaer</p>
      </div>
      <div class="embed-responsive embed-responsive-16by9">
       <iframe width="560" height="315" src="https://www.youtube.com/embed/SCWIp8fFd_M" frameborder="0" allowfullscreen></iframe>
      </div>
      <div>
        <p>Immersive Learning at Rensselaer: Geo Explorer </p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

</body>
</html>
