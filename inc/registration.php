<?php
session_start();
require_once ("../db.php");
if (isset($_POST['create'])){
    $firstname = trim(htmlspecialchars($_POST['firstname']));
    $lastname = trim(htmlspecialchars($_POST['lastname']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $cpassword = trim(htmlspecialchars($_POST['cpassword']));
    md5($password);
    $enpt= md5($password);

    if ($password != $cpassword) {
        $_SESSION['err_pass']="Confirm password didn't match";
        header("Location:../index.php");

    }

 
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
        if ($up) {
            if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($password) ){

                $sql = "INSERT INTO form_info(firstname, lastname, email, password, photo ) value ('$firstname', '$lastname', '$email', '$enpt', '$uniq');";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['success']="Insertation Successful";
                    header("Location:../index.php");
                }
                else{
                    $_SESSION['err_fail']="Insertation failed";
                    header("Location:../index.php");
                }
            }else {
               $_SESSION['err_emp']="Field Is Empty";
               header("Location:../index.php");
            }
        }
        else {
            $_SESSION['err_image']="Issue with image upload";
            header("Location:../index.php");
        }
    }
    else{
        $_SESSION['err_image']="Please Upload image";
        header("Location:../index.php");
    }
   
    
}

?>