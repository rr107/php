<?php
session_start();
require_once "db.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM form_info WHERE id = '$id' LIMIT 1";
    $data = mysqli_query($conn,$sql);
    if(mysqli_num_rows($data) > 0){
        $data = mysqli_fetch_assoc($data);   
    }
}
if(isset($_POST['Update'])){
    $id = $_GET['id'];
	$image = $_FILES['image'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$email = $_POST['email'];

	if ($_FILES['image'] ['name'] != '') {
        $type= ['jpg','jpeg', 'png','JPG','JPEG', 'PNG'];
        $image=($_FILES['image']);
        $ext = explode('.', $image['name']);
        $isize = $image['size'];
        if(!in_array(end($ext),$type)){
            $_SESSION['err_format']="Enter correct file format";
            header("Location:../index.php");
        }
        if ($isize > 1048576) {
            $_SESSION['err_size']="Enter correct file format";
            header("Location:../index.php");
        }
        $uniq= $ext[0].'_'. rand(1,15). '.'.end($ext);
        $up= move_uploaded_file($image['tmp_name'],'../upload/'.$uniq);

	}

    $update = "UPDATE form_info SET photo= '$uniq' firstname = '$firstname', lastname = '$laststname', email = '$email' WHERE id = '$id'";

    if(mysqli_query($conn,$update)){
        echo 'Successfully Update';
        header("Location: edit.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>PHP edit</title>
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
					<input class="form-control" type="text" value = "<?php echo $data['firstname']; ?>" id="firstname" name="firstname" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>

					<label for="lastname"><b>last Name</b></label>
					<input class="form-control" type="text" value = "<?php echo $data['lastname']; ?>" id="lastname" name="lastname" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>

					<label for="email"><b>Email</b></label>
					<input class="form-control" type="text" value="<?php echo $data['email']; ?>" id="email" name="email" required>
					<span><?php echo $_SESSION['err_emp'] ?? ''?></span>

					<div class="mt-3">

					<input class="form-control" type="file" id="image" name="image">
					<span><?php echo $_SESSION['err_image'] ?? ''?></span>
					<span><?php echo $_SESSION['err_size'] ?? ''?></span>
					</div>
					<hr>
					<div class="width w-100 p-2">
						<img src="upload/<?php echo $data['photo'];?>">
					</div>

					<input class="btn btn-primary" type="submit" name="create" value="Update">
				
				</form>
				</div>
		</div>
		
	</div>
<?php
	require ("inc/footer.php");
?>