<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rensselaer Research Explorer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
          <div class="form-group has-error has-feedback">
            <label for="reg_username" class="sr-only">Username</label>
            <input type="text" class="form-control" id="reg_username" name="username" placeholder="username">
          </div>
          <div class="form-group has-error">
            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
          </div>
          <div class="form-group has-error">
            <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
          </div>

          <div class="form-group has-error">
            <label for="reg_email" class="sr-only">Email</label>
            <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
          </div>
          <div class="form-group has-error">
            <label for="reg_fullname" class="sr-only">Full Name</label>
            <input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name">
          </div>

          <div class="form-group login-group-checkbox has-error">
            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
            <label for="reg_agree">I agree with <a href="https://www.rpi.edu/dept/finance/docs/research/STANDARD_NDA.pdf">Terms and Conditions</a></label>
          </div>
        </div>
        <button type="submit" class="login-button" name="register"><i class="fa fa-chevron-right"></i></button>
      </div>
      <div class="etc-login-form">
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
    </form>
  </div>
  <!-- end:Main Form -->
</div>

<footer class="container-fluid text-center">
  <p>RPI 2016</p>
</footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="register.js"></script>

</body>
</html>
