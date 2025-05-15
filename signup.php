<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    include 'connect.php';
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords don't match";
        exit();
    }
    
    // Check if username exists
    $sql = "SELECT * FROM data WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO data (username, password) VALUES ('$username', '$hashed_password')";
        
        if (mysqli_query($con, $insert_sql)) {
            echo "Signup Successful";
            // Redirect to login

        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>