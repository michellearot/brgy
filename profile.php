
<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/profile.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- <img src="https://i.pinimg.com/564x/2c/14/42/2c1442cc165c3e445d8266fda7657fe2.jpg" /> -->
 
    <nav>
        <input type="checkbox" class="myCheckBox" id="myCheck">
        <label for="myCheck" class="checkButton">
            <i class="fa fa-bars"></i>
        </label>
        <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Favorites</a></li>
    <li><a href="update_profile.php">Create a Post</a></li>
    <li><a href="home.php?logout=<?php echo $user_id; ?>">Logout</a></li>
    </ul>
        <label class="logo">
        <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            if($fetch['image'] == ''){
                echo '<a href="profile.php"><img src="images/default-avatar.png"></a>';
            }else{
                echo '<a href="profile.php"><img src="uploaded_img/'.$fetch['image'].'"></a>';
            }
        ?>
        <h3><?php echo $fetch['name']; ?></h3>
        </label>
    
    </nav>

    <div class="container">
    <section  class="h-text">
    <span><img src="images/cover3.png"/></span>
</section>
<label class="logo">
        <?php
             $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
             if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }  
            if($fetch['image'] == ''){
            echo '<a href="profile.php"><img src="images/default-avatar.png"></a>';
            }else{
            echo '<a href="profile.php"><img src="uploaded_img/'.$fetch['image'].'"></a>';
            }
            ?>
            <ul>
             <h1><?php echo $fetch['fullname']; ?><br><a href="update_profile.php"><i class="fa fa-edit"style="font-size:25px;color:#164863"></i></a></h1> 
             
             
        </ul> 
            </label>
            <!--  -->
           
            <!-- <
    -->
    </div>

    

</div>
</body>
</html>