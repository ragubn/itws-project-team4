<!-- <?php
session_start();
if(!isset($_SESSION['fullname'])){
   header("Location: ./login.php");
}
?> -->

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
  <link rel="stylesheet" href="submit.css" type="text/css" />
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
        <li><a href="index.php">Home</a></li>
        <li><a href="research.php">Research</a></li>
        <li class="active"><a href="submit.php">Submit</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><p class="glyphicon glyphicon-log-in"></p> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<form  class="form" action="" method="post">
    <h3>Fill out the form below to submit your Research Paper</h3>
    <div class="field">
        <label for="name">Title of Research Paper:</label>
        <input class="title" type="text" id="name" name="title" />
    </div>
    <div class="field">
        <label for="abs">Abstract for Research Paper:</label>
        <textarea class="abs" id="abs" name="abstract"></textarea>
    </div>
    <div class="field">
        <label for="rp">Research Paper:</label>
        <textarea class="rp" id="rp" name="rptext"></textarea>
    </div>
    
    <div class="button">
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>
