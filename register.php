<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>PHP resigtration</title>
</head>
<body style="background-color: 	powderblue;">
	<div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <i class="glyphicon glyphicon-cloud" style="font-size:60px;color:lightblue;text-shadow:2px 2px 4px #000000;"></i>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Log In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>     
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-6">
				<form action="inc/registration.php" method="POST" enctype="multipart/form-data">
					<h1>Sign Up</h1>
					<p>Please fill the form with correct values.</p>
					<hr>
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" type="text" id="firstname" name="firstname" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>
					<label for="lastname"><b>last Name</b></label>
					<input class="form-control" type="text" id="lastname" name="lastname" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>
					<label for="email"><b>Email</b></label>
					<input class="form-control" type="text" id="email" name="email" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>
					<label for="password"><b>Password</b></label>
					<input class="form-control" type="password" id="password" name="password" required>
					<span><?php echo $_SESSION['err_pass'] ?? ''?></span>
					<label for="cpassword"><b>Confirm Password</b></label>
					<input class="form-control" type="password" id="cpassword" name="cpassword" required>
					<span><?php echo $_SESSION['err_pass'] ?? ''?></span>
					<div class="mt-3">
					<input class="form-control" type="file" id="image" name="image">
					<span><?php echo $_SESSION['err_image'] ?? ''?></span>
					<span><?php echo $_SESSION['err_size'] ?? ''?></span>
					</div>
					<hr>
					<input class="btn btn-primary" type="submit" name="create" value="Sumbit">
				
				</form>
				<?php
	                 session_destroy();
	                 session_unset();

?>
				</div>
		</div>
		
	</div>
<?php
	require ("inc/footer.php");
?>