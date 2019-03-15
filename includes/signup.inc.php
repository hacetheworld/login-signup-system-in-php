<?php
if (isset($_POST['register-submit'])) {
   
    include_once "db.php";

    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $cpassword = test_input($_POST['confirm-password']);

if(!empty($username ) && !empty($email ) && !empty($password ) && !empty($cpassword ) && ($password ==$cpassword)){
    
 $sql = "SELECT * FROM user WHERE email='{$email}' "; 
 $query = mysqli_query($conn,$sql);
 $user_found = mysqli_fetch_array($query);

 if($user_found){
    header("Location:../index.php?erro=userExist");
    exit();
 }else{

    $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('{$username}','{$email}','{$password}')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location:../index.php?insert=success");
        exit();
    }else{
        header("Location:../index.php?erro");
        exit();
    }
    
 }



}else{
    header("Location:../index.php?error=emptyFields");
    exit();
}


}
else{
    header("Location:../index.php");
    exit();
}






// Data valdation function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>