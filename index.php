<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration & Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css" class="css">

</head>
<body>

<div class="container form-container">


    <div class="row">
        <!-- Sign up -->
        <div class="col ad-6 border-snip">
            <div class="text-center">Sign up</div>
            <form action="./signup.php" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required autocomplete="off">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="off">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required autocomplete="off">
                <button type="submit" class="btn btn-signup w-100 at-2" name="signup">Signup</button>
            </form>
        </div>
        <!-- Login -->
        <div class="col ad-6">
            <div class="text-center">Login</div>
            <form action="./login.php" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                <button type="submit" class="btn btn-light w-100 at-2" name="login">Login</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
