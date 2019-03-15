<?php

if (isset($_POST['login-submit'])) {


    include_once "db.php";

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    if(!empty($username ) && !empty($password )){
    
        $sql = "SELECT * FROM user WHERE username='{$username}' AND password='{$password}'"; 
        $query = mysqli_query($conn,$sql);
        $user_found = mysqli_fetch_assoc($query);
       
        if($user_found){
            
            //echo $user_found;
            session_start();
            $_SESSION['username'] = $user_found['username'];

          header("Location:../admin/index.php?loggedin=success");
          exit();
        }else{
       
            header("Location:../index.php?erro=usernotfound");
               exit();
           
        }

    }

    
} else{
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



