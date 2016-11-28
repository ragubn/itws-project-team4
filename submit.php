<?php
if(!isset($_SESSION['fullname'])){
   //header("Location: ./login.php");
}
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
<form  class="form" action="./research.php" method="post">
    <h3>Fill out the form below to submit your Research Paper</h3>
    <div class="field">
        <label for="name">Title of Research Project:</label>
        <input class="title" type="text" id="name" name="title" />
    </div>
    <div class="field">
        <label for="name">Rensselaer Categorization:</label>
        <select name="category">
          <option value="1">Biotechnology and the Life Sciences</option>
          <option value="2">Computational Science and Engineering</option>
          <option value="3">Energy, Environment, and Smart Systems</option>
          <option value="4">Media, Arts, Science and Technology</option>
          <option value="5">Nanotechnology and Advanced Materials</option>
        </select>
    </div>
    <div class="field">
        <label for="rp">Link to Published Research Paper (if exists):</label>
        <input class="title" name="rplink" type="url"></input>
    </div>
    <div class="field">
        <label for="abs">Overview of Research (You may use a published abstract here):</label>
        <textarea class="abs" id="abs" name="abstract" type="text" placeholder="If you have published research, you may use the abstract from your paper. Otherwise, please write an overview of the research that you do."></textarea>
    </div>
    <div class="field">
        <label for="name">Name:</label>
        <input  name="name" type="text" value=<?php echo $_SESSION["fullname"];?> disabled></input>
    </div>
    <div class="field">
        <label for="email">E-Mail:</label>
        <input  name="email" type="text" value=<?php echo $_SESSION["email"];?> disabled></input>
    </div>
    <div class="button">
        <button type="submit" name="submitRRE">Submit</button>
    </div>
</form>
</body>
</html>
