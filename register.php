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
  <link rel="stylesheet" href="register.css" type="text/css" />
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


<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
  <div class="logo">Register</div>
  <!-- Main Form -->
  <div class="login-form-1">
    <form id="register-form" class="text-left" method="post" action="./login.php">
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="reg_username" class="sr-only">Email address</label>
            <input type="text" class="form-control" id="reg_username" name="username" placeholder="username">
          </div>
          <div class="form-group">
            <label for="reg_password" class="sr-only">Password</label>
            <input type="password" class="form-control" id="reg_password" name="password" placeholder="password">
          </div>
          <div class="form-group">
            <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
            <input type="password" class="form-control" id="reg_password_confirm" name="password_confirm" placeholder="confirm password">
          </div>

          <div class="form-group">
            <label for="reg_email" class="sr-only">Email</label>
            <input type="text" class="form-control" id="reg_email" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <label for="reg_fullname" class="sr-only">Full Name</label>
            <input type="text" class="form-control" id="reg_fullname" name="fullname" placeholder="full name">
          </div>

          <div class="form-group login-group-checkbox">
            <input type="radio" class="" name="sex" id="male" value = "m">
            <label for="male">male</label>

            <input type="radio" class="" name="sex" id="female" value = "f">
            <label for="female">female</label>
          </div>

          <div class="form-group login-group-checkbox">
            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
            <label for="reg_agree">i agree with <a href="#">terms</a></label>
          </div>
        </div>
        <button type="submit" class="login-button" name="register"><i class="fa fa-chevron-right">Go!</i></button>
      </div>
      <div class="etc-login-form">
        <p>Already have an account? <a href="login.php">login here</a></p>
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
