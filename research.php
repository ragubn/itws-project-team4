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

if (isset($_POST['query'])&& !empty($_POST['query'])){
  $queryString = "SELECT * FROM research WHERE title LIKE :query OR submitter LIKE :query";
  $stmt = $dbconn->prepare($queryString);
  $query = '%'.$_POST['query'].'%';
  $stmt->bindParam(':query',$query);
  $stmt->execute();
  $num = 0;
  $print = '<Table class = "table"><tr><th>Title</th><th>Category</th><th>Link to Paper</th><th>Overview/Abstract</th><th>Submitter</th><th>Email</th></tr>';
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
    $print = $print.'<tr><td>'.$result['title'].'</td><td>'.$cat.'</td><td>'.$result['rplink'].'</td><td>'.$result['overview'].'</td><td>'.$result['submitter'].'</td><td>'.$result['email'].'</td></tr>';
  }
  $print = $print.'</table>';
  if($num == 0){
    $print = '<div class="jumbotron"><p>No results, please try another search.</p></div>';
  }
}

if (isset($_POST['click'])&& !empty($_POST['click'])){
  $queryString = "SELECT * FROM research WHERE category = :click";
  $stmt = $dbconn->prepare($queryString);
  $click = $_POST['click'];
  $stmt->bindParam(':click',$click);
  $stmt->execute();
  $num = 0;
  $print = '<Table class = "table"><th>Title</th><th>Category</th><th>Link to Paper</th><th>Overview/Abstract</th><th>Submitter</th><th>Email</th></tr>';
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
    $print = $print.'<tr><td>'.$result['title'].'</td><td>'.$cat.'</td><td>'.$result['rplink'].'</td><td>'.$result['overview'].'</td><td>'.$result['submitter'].'</td><td>'.$result['email'].'</td></tr>';
  }
  $print = $print.'</table>';
  if($num == 0){
    $print = '<div class="jumbotron"><p>No results in the selected category, please try another category.</p></div>';
  }
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
      <h4>Categories</h4>
      <form method="post" action="#">
        <button type="submit" class="btn-link" name="click" value = "1">Biotechnology and the Life Sciences</button>
        <button type="submit" class="btn-link"  name="click" value = "2">Computational Science and Engineering</button>
        <button type="submit" class="btn-link"  name="click" value = "3">Energy, Environment, and Smart Systems</button>
        <button type="submit" class="btn-link"  name="click" value = "4">Media, Arts, Science and Technology</button>
        <button type="submit" class="btn-link"  name="click" value = "5">Nanotechnology and Advanced Materials</button>
      </form>
    </div>
    <div class="col-sm-8 text-left">
      <h1>Research</h1>
      <p>Use the search bar below to find research, or click on a category to show all research in that area.</p>
      <div class="container">
      <div class="row">
        <div class="col-md-12">
                <div class="input-group" id="adv-search">
                  <form  class="form" action="#" method="post">
                    <input type="text" class="form-control" name="query" placeholder="Search for RPI Research by Title or Author" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="submit" name="search" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                  </form>
                </div>
                <?php
                if ((isset($_POST['query']) && !empty($_POST['query']))||(isset($_POST['click']) && !empty($_POST['click']))) {
                  echo $print;
                  echo '</div>';
                }
                ?>

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
