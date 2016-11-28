<?php
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

if (isset($_POST['login']) && $_POST['login'] == 'Login') {

  $salt_stmt = $dbconn->prepare('SELECT salt FROM users WHERE username=:username');
  $salt_stmt->execute(array('username'=>$_POST['username']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res[0] : '';
  $salted = hash('sha256', $salt . $_POST['password']);

  $login_stmt = $dbconn->prepare('SELECT fullname, email FROM users WHERE username=:username AND pass=:pass');
  $login_stmt->execute(array(':username'=>$_POST['username'], ':pass'=>$salted));

  session_start();
  if($user = $login_stmt->fetch()){
    $_SESSION['fullname']=$user['fullname'];
    $_SESSION['email']=$user['email'];
  }

  else {
    $err = 'Incorrect username or password.';
  }
}

if (isset($_SESSION['fullname'])){
  header("Location: ./login.php");
}

if (isset($_POST['register'])) {

  if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['password_confirm']) || !isset($_POST['fullname']) || !isset($_POST['email']) || !isset($_POST['sex'])) {
    header("Location: ./register.php");
  }
  if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_confirm']) || empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['sex'])) {
    header("Location: ./register.php");
  }
  if($_POST["password"]!=$_POST["password_confirm"]){
    header("Location: ./register.php");
  }

  // Apply salt before hashing here
  $salt = hash('sha256', uniqid(mt_rand(), true));

  // Apply salt before hashing
  $salted = hash('sha256', $salt . $_POST['pass']);

  // Store the salt with the password, so we can apply it again and check the result
  // prepared statement is here
  $stmt = $dbconn->prepare("INSERT INTO users (username, pass, salt, fullname, email, sex) VALUES (:username, :pass, :salt, :fullname, :email, :sex)");
  // the execute statement here
  $stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted, ':salt' => $salt, ':fullname' => $_POST["fullname"],':email' => $_POST["email"], ':sex' => $_POST["sex"]));
  $msg = "You have successfully registered, please login to submit your research.";
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
  <link rel="stylesheet" href="login.css" type="text/css" />

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

<div class="text-center" style="padding:50px 0">
  <div class="logo">login</div>
  <div class="logosub">it is only necesasry to login if you want to submit research.</div>
  <?php
  if (isset($_POST['register'])) {
    echo '<div class="logosub">'.$msg.'</div>';
  }
  ?>
  <!-- Main Form -->
  <div class="login-form-1">
    <form id="login-form" class="text-left" method="post" action="login.php">
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="lg_username" class="sr-only">Username</label>
            <input type="text" class="form-control" id="lg_username" name="username" placeholder="username">
          </div>
          <div class="form-group">
            <label for="lg_password" class="sr-only">Password</label>
            <input type="password" class="form-control" id="lg_password" name="password" placeholder="password">
          </div>
        </div>
        <button type="submit" class="login-button" name="login"><i class="fa fa-chevron-right"></i></button>
      </div>
      <div class="etc-login-form">
        <p>new user? <a href="register.php">create new account</a></p>
      </div>
    </form>
  </div>
  <!-- end:Main Form -->
</div>

<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

</body>
</html>
