<?php
session_start();
if(!isset($_POST['login']) && isset($_SESSION['fullname'])){
  session_destroy();
}
try {
  $dbname = 'rre';
  $user = 'root';
  $pass = '';
  $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
if (isset($_POST['login'])) {
  $salt_stmt = $dbconn->prepare('SELECT salt FROM users WHERE username=:username');
  $salt_stmt->execute(array('username'=>$_POST['username']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res[0] : '';
  $salted = hash('sha256', $salt . $_POST['password']);

  $login_stmt = $dbconn->prepare('SELECT fullname, email FROM users WHERE username=:username AND password=:pass');
  $login_stmt->execute(array(':username'=>$_POST['username'], ':pass'=>$salted));

  if($user = $login_stmt->fetch()){
    $_SESSION['fullname']=$user['fullname'];
    $_SESSION['email']=$user['email'];
  }

  else {
    $err = 'Incorrect username or password.';
    header("Location: ./login.php");
  }
}
if(!isset($_SESSION['fullname'])){
  $_SESSION['reject']="Invalid username or password.";
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rensselaer Research Explorer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
          <li><a href="admin_login.php"><p class="glyphicon glyphicon-log-in"></p> Admin Login</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><p class="glyphicon glyphicon-log-in"></p> Submitter Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <form id="submit-form" class="form" action="./research.php" method="post">
      <h3>Fill out the form below to submit your Research Paper</h3>
      <div class="form-group" id="nameDiv">
          <label for="name">Title of Research Project:</label>
          <input class="title" type="text" id="name" name="title" />
      </div>
      <div class="form-group">
          <label for="name">Rensselaer Categorization:</label>
          <select name="category">
            <option value="1">Biotechnology and the Life Sciences</option>
            <option value="2">Computational Science and Engineering</option>
            <option value="3">Energy, Environment, and Smart Systems</option>
            <option value="4">Media, Arts, Science and Technology</option>
            <option value="5">Nanotechnology and Advanced Materials</option>
          </select>
      </div>
      <div class="form-group">
          <label for="rp">Link to Published Research Paper (if exists):</label>
          <input class="title" name="rplink" type="url"></input>
      </div>
      <div class="form-group" id="absDiv">
          <label for="abs">Overview of Research (You may use a published abstract here):</label>
          <textarea class="abs" id="abs" name="abstract" type="text" placeholder="If you have published research, you may use the abstract from your paper. Otherwise, please write an overview of the research that you do."></textarea>
      </div>
      <div class="form-group">
          <label for="name">Name:</label>
          <input  name="name" type="text" value=<?php echo $_SESSION["fullname"];?> disabled></input>
      </div>
      <div class="form-group">
          <label for="email">E-Mail:</label>
          <input  name="email" type="text" value=<?php echo $_SESSION["email"];?> disabled></input>
      </div>
      <div class="button">
          <button id="submitButton" type="submit" name="submitRRE">Submit</button>
      </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="submit.js"></script>
</body>
</html>
