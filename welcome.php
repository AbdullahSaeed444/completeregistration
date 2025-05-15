<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css" class="css">
</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4 text-center text-success">Welcome <?php echo $_SESSION['username']  ?> </h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p> We're glad to have you back. You have successfully logged into your account. From here, you can explore your dashboard, manage your profile, or continue where you left off.
                 If you need any assistance, feel free to reach out to our support team. Enjoy your experience!</p>
            <p class="lead">
                <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
            </p>
        </div>
    </div>

</body>

</html>