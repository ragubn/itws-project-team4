<?php
session_start();
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

  $login_stmt = $dbconn->prepare('SELECT fullname, isAdmin, userID FROM users WHERE username=:username AND password=:pass AND isAdmin=1');
  $login_stmt->execute(array(':username'=>$_POST['username'], ':pass'=>$salted));

  if($user = $login_stmt->fetch()){
    $_SESSION['fullname']=$user['fullname'];
    $_SESSION['admin']=$user['isAdmin'];
    $_SESSION['id']=$user['userID'];
  }

  else {
    $err = 'Incorrect username or password.';
    header("Location: ./login.php");
  }
}
if (isset($_POST['revokeA'])) {
  $revoke = $dbconn->prepare("UPDATE users SET isAdmin=0 where userID=:id");
  $revoke->bindParam(':id',$_POST['revokeA']);
  $revoke->execute();
  if($_SESSION['id']==$_POST['revokeA']){
    unset($_SESSION['admin']);

  }
}
if (isset($_POST['deleteR'])) {
  $delete = $dbconn->prepare("DELETE FROM research where id=:id");
  $delete->bindParam(':id',$_POST['deleteR']);
  $delete->execute();
}
if (isset($_POST['deleteU'])) {
  $delete = $dbconn->prepare("DELETE FROM users where userID=:id");
  $delete->bindParam(':id',$_POST['deleteU']);
  $delete->execute();
}
if (isset($_POST['makeA'])) {
  $grant = $dbconn->prepare("UPDATE users SET isAdmin=1 where userID=:id");
  $grant->bindParam(':id',$_POST['makeA']);
  $grant->execute();
}

if(!isset($_SESSION['fullname']) || !isset($_SESSION['admin'])){
  $_SESSION['reject']="Invalid username or password.";
  header("Location: ./admin_login.php");
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
  <link rel="stylesheet" href="index.css" type="text/css" />
  <link rel="icon" type="image/png" href="./favicon.png">
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
        <li class="active"><a href="admin.php">Admin</a></li>
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
<div class="container">
  <?php
  echo "<h4>Welcome, ".$_SESSION["fullname"]."!</h4>";
  ?>
<div class="row">
  <div class="col-xl-8">
    <h1>Admins</h1>
    <?php
    $queryString = "SELECT fullname,email,userID FROM users WHERE isAdmin=1";
    $stmt = $dbconn->prepare($queryString);
    $stmt->execute();
    $num = 0;
    $print = '<Table class = "table"><tr><th>Full Name</th><th>Email</th><th>Revoke Privilleges</th></tr>';
    while($result = $stmt->fetch()){
      $num +=1;
      $print = $print.'<tr><td>'.$result['fullname'].'</td><td><a href=mailto:'.$result['email'].'>'.$result['email'].'</a></td><td><form  class="form" action="#" method="post"><div class="input-group-btn"><div  role="group"><button type="submit" name="revokeA" value='.$result['userID'].' class="btn-sm">Revoke</button></div></div></form></td></tr>';
    }
    $print = $print.'</table>';
    if($num == 0){
      $print = '<div class="jumbotron"><p>No admins to display.</p></div>';
    }
    echo $print;
    ?>
  </div>
  <div class="col-xl-8">
    <h1>Users</h1>
    <?php
    $queryString = "SELECT fullname,email,userID FROM users WHERE 1";
    $stmt = $dbconn->prepare($queryString);
    $stmt->execute();
    $num = 0;
    $print = '<Table class = "table"><tr><th>Full Name</th><th>Email</th><th>Grant Admin Privilleges</th><th>Delete</th></tr>';
    while($result = $stmt->fetch()){
      $num +=1;
      $print = $print.'<tr><td>'.$result['fullname'].'</td><td><a href=mailto:'.$result['email'].'>'.$result['email'].'</a></td><td><form  class="form" action="#" method="post"><div class="input-group-btn"><div  role="group"><button type="submit" name="makeA" value='.$result['userID'].' class="btn-sm">Make Admin</button></div></div></form></td><td><form  class="form" action="#" method="post"><div class="input-group-btn"><div  role="group"><button type="submit" name="deleteU" value='.$result['userID'].' class="btn-sm">Delete</button></div></div></form></td></tr>';
    }
    $print = $print.'</table>';
    if($num == 0){
      $print = '<div class="jumbotron"><p>No users to display.</p></div>';
    }
    echo $print;
    ?>
  </div>
</div>
  <div class="col-xl-8">
    <h1>Research Submissions</h1>
    <?php
    $queryString = "SELECT * FROM research WHERE 1";
    $stmt = $dbconn->prepare($queryString);
    $stmt->execute();
    $num = 0;
    $print = '<Table class = "table"><tr><th>Title</th><th>Category</th><th>Link to Paper</th><th>Overview/Abstract</th><th>Submitter</th><th>Email</th><th>Delete</th></tr>';
    while($result = $stmt->fetch()){
      $num +=1;
      if($result['category']==1){
        $cat = 'Biotechnology and the Life Sciences';
      }
      else if ($result['category']==2){
        $cat = 'Computational Science and Engineering';
      }
      else if ($result['category']==3){
        $cat = 'Energy, Environment, and Smart Systems';
      }
      else if ($result['category']==4){
        $cat = 'Media, Arts, Science and Technology';
      }
      else if ($result['category']==5){
        $cat = 'Nanotechnology and Advanced Materials';
      }
      $print = $print.'<tr><td>'.$result['title'].'</td><td>'.$cat.'</td><td><a href='.$result['rplink'].'>'.$result['rplink'].'</a></td><td>'.$result['overview'].'</td><td>'.$result['submitter'].'</td><td>'.$result['email'].'</td><td><form  class="form" action="#" method="post"><div class="input-group-btn"><div  role="group"><button type="submit" name="deleteR" value='.$result['id'].' class="btn-sm">Delete</button></div></div></form></td></tr>';
    }
    $print = $print.'</table>';
    if($num == 0){
      $print = '<div class="jumbotron"><p>No research to display.</p></div>';
    }
    echo $print;
    ?>
  </div>
</div>



<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

</body>
</html>
