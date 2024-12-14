<?php
session_start();
include 'config.php'; // Assuming this file contains database connection details

// Check if user is logged in
if(isset($_SESSION['user_id'])) {
    // User is logged in, display welcome message
    $user_id = $_SESSION['user_id'];
    // Retrieve user details from the database based on the user_id if needed
    // Example:
    $query = mysqli_query($conn, "SELECT * FROM `user_details` WHERE id = '$user_id'");
    $user = mysqli_fetch_assoc($query);
    $username = $user['username'];

    // Check if $username is set before echoing it
    if(isset($username)) {
        // Display welcome message
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome To JudgeMentor</title>
            <!-- custom css file link  -->
            <link rel="stylesheet" href="css/style.css">
            <style>
                /* CSS for the page */
                body {
                    background-color: #f0f0f0; /* Background color for the entire page */
                    margin: 0;
                    font-family: Arial, sans-serif;
                }

                .header {
    background-color: #000; /* Background color for the header */
    color: #fff; /* Text color for the header */
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h1 {
    margin: 0;
}

.username {
    margin: 0;
    padding-right: 20px;
    font-size: 25px;
    margin-bottom: 10px;
}

.slogan {
    font-style: italic;
    background-color: #1E5128; /* Change the background color as needed */
    text-align: center;
    padding: 10px;
    margin-top: 5px;
    border-radius: 20px;
}

.logout {
    background-color: #1E5128; /* Background color for the logout link */
    color: #fff; /* Text color for the logout link */
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 20px;
    margin-top: 50px;
}

/* Styles for the plus button */
/* Styles for the plus button */
.plus-button {
    background-color: #fff;
    color: #000;
    font-size: 15px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    padding: 20px;
    margin: 0 auto; /* Center the button horizontally */
}



.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 30px; /* Increase padding to make the popup bigger */
    border-radius: 15px; /* Make the border radius slightly bigger */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Increase the box shadow */
    z-index: 9999;
}

.popup form {
    background-color: #ffff; /* Background color for the form */
    padding: 20px; /* Add padding to the form */
    border-radius: 10px; /* Add border radius to the form */
}

.popup h2 {
    margin-top: 0;
}

.popup input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f0f0f0;
}

.popup button {
    padding: 10px 20px;
    border: none;
    background-color: #1E5128;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

            </style>
        </head>
        <body>
            <div class="header">
                <div>
                    <h1>JudgeMentor</h1>
                    <p class="slogan">Your Road to Success</p> <!-- Slogan with italics and background color -->
                </div>
                <div>
                    
                    <p class="username"><?php echo $username; ?></p> <!-- Display username -->
                    <button class="plus-button" onclick="togglePopup()">+</button> <!-- Plus button -->
                    <a href="login.php" class="logout">Logout</a> <!-- Logout link -->
                   
                    
                </div>
            </div>



            <!-- Popup window -->
            <div class="popup" id="popup">
                <h2>Create Reviewer</h2>
                <form>
                    <input type="text" placeholder="Add title">
                    <button type="submit">Add</button>
                    <button type="button" onclick="togglePopup()">Cancel</button>
                </form>
            </div>

            <!-- JavaScript to toggle the popup window -->
            <script>
                function togglePopup() {
                    var popup = document.getElementById("popup");
                    if (popup.style.display === "none") {
                        popup.style.display = "block";
                    } else {
                        popup.style.display = "none";
                    }
                }
            </script>
        </body>
        </html>

        <?php
    } else {
        // If $username is not set, handle it gracefully
        echo "Welcome To JudgeMentor";
        // Optionally, you can redirect the user to the login page or perform other actions
    }
} else {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}
?>
