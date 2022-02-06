<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP || FORM</title>
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
      </ul>
    </div>
  </div>
</nav>  

<?php 
            require_once "db.php";
            $sql = "SELECT * FROM form_info";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $fetchs = mysqli_fetch_all($result,true);
            }
        ?>
<ul>     
            <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
						<th>Photo</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
						<th>Action</th>
                        <th>Edit</th>
						
						
                    </tr>
                    <tbody>
                    <?php 
                        foreach($fetchs as $fetch){
                            $id = $fetch['id'];		
							$photo = $fetch['photo'];
                            $firstname = $fetch['firstname'];
                            $lastname = $fetch['lastname'];
                            $email = $fetch['email'];

                            echo "<tr>";
                            echo "<td>$id</td>";
							echo "<td><img src='upload/$photo'/ width=50px; height=50px; style='border-radius:50%'></td>";
                            echo "<td>$firstname</td>";
                            echo "<td>$lastname</td>";
                            echo "<td>$email</td>";
                            echo "<td><a href='delete.php?id=$id'>Delete</a></td>";
                            echo "<td><a href='edit.php?id=$id'>Edit</a></td>";
                            echo "</tr>";
                            

                        }
                    ?>

                    </tbody>
            </table>    
        </ul>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>