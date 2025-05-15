<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    include 'connect.php';
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM data WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        
        if (password_verify($password, $hashed_password)) {
            echo "Login Successful";
            // Start session and redirect
            session_start();
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "Invalid credentials";
    }
}
?>