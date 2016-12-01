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
        <li><a href="admin_login.php"><p class="glyphicon glyphicon-log-in"></p> Admin Login</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><p class="glyphicon glyphicon-log-in"></p> Submitter Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <div>
        <h4>Rensselaer Mission Statement</h4>
        <p>Rensselaer educates the leaders of tomorrow for technologically based careers. We celebrate discovery, and the responsible application of technology, to create knowledge and global prosperity.</p>
      </div>
      <div>
        <h4>Institutional Research and Assessment Mission Statement </h4>
        <p>The Office of Institutional Research and Assessment (OIRA) is an information source for internal Institute personnel and for external constituencies seeking data regarding Rensselaer, and a campus wide coordinating point for faculty development and student learning assessment. The OIRA is divided into two primary functions:</p>
        <ul>
          <li>Institutional research</li>
          <li>Faculty development and student learning assessment</li>
       </ul>
      </div>
    </div>
    <div class="col-sm-8 text-left">
      <h1>Welcome</h1>
      <p>Research is an essential part of a university, and a valuable educational experience. By placing the research that an institution is currently partaking in on a central website, it allows students to see the opportunities that exist for them to get involved on campus. As well, it provides the ability for students who are taking part in research the ability to let others know what they are doing and see what other students are researching.</p>
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
      <h4>Institutional research</h4>
      <p>The Rensselaer research enterprise in FY2013 has surpassed $100M in sponsored research expenditures broadly divided among five Signature Research Thrusts: Biotechnology and the Life Sciences; Computational Science and Engineering; Media, Arts, Science, and Technology; Energy, Environment, and Smart Systems; and Nanotechnology and Advanced Materials. Emanating from these pillars of the Rensselaer research ecosystem are five broad research platforms that have resulted from nearly $1.25 billion investment by the university. Through these research platforms, Rensselaer researchers are addressing global challenges with both urgency and impact.</p>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

</body>
</html>
