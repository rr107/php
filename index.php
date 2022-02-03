<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">

    <title>PHP login</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <i class="glyphicon glyphicon-cloud" style="font-size:60px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="alluser.php">User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <i class='fas fa-user-circle' style='font-size:40px'></i>
    </div>

    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Sign In">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
  
</div>
<div class="text-center" >
    <p style="color:white;font-size:18px;">@Copyright By Creative IT</p>
  </div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>