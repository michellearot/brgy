<?php

include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   
   $select = mysqli_query($conn, "SELECT * FROM `user_details` WHERE email = '$email'") or die(mysqli_error($conn));

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists'; 
   } else {
      if($password != $cpassword){
         $message[] = 'Confirm password not matched!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_details`(`email`, `username`, `password`) VALUES ('$email','$username','$password')") or die(mysqli_error($conn));


         if($insert){
            $message[] = 'Registered successfully!';
            header('location: login.php');
            exit();
         } else {
            $message[] = 'Registration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Sign Up now</h3>
      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>
      <input type="text" name="username" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="submit" name="submit" value="Register now" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
