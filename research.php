<?php
try {
  $dbname = 'rre';
  $user = 'root';
  $pass = '';
  $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
session_start();
if (isset($_POST['submitRRE'])) {
  $stmt = $dbconn->prepare("INSERT INTO research (title, category, rplink, overview, submitter, email) VALUES (:title, :category, :rplink, :overview, :submitter, :email)");
  // the execute statement here
  $stmt->execute(array(':title' => $_POST['title'], ':category' => $_POST['category'], ':rplink' => $_POST['rplink'], ':overview' => $_POST["abstract"],':submitter' => $_SESSION["fullname"], ':email' => $_SESSION["email"]));
  $msg = "You have successfully submitted your research. You have been logged out.";
}
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
  <link rel="stylesheet" href="research.css" type="text/css" />
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
        <li class="active"><a href="research.php">Research</a></li>
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
      <h4>Categories</h4>
      <p class="cat"><a href="#">Energy, Environment, and Smart Systems</a></p>
      <p class="cat"><a href="#">Biotechnology and the Life Sciences</a></p>
      <p class="cat"><a href="#">Media, Arts, Science and Technology</a></p>
      <p class="cat"><a href="#">Computational Science and Engineering</a></p>
      <p class="cat"><a href="#">Nanotechnology and Advanced Materials</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <h1>Research</h1>
      <p>Use the search bar below to find research, or click on a category to show all research in that area.</p>
      <div class="container">
      <div class="row">
        <div class="col-md-12">
                <div class="input-group" id="adv-search">
                    <input type="text" class="form-control" placeholder="Search for RPI Research by Title" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
      </div>
    </div>
      <hr>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

</body>
</html>
