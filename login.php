<?php
include('includes/connect.php'); // Include the database connection file

if (isset($_POST['login'])) {
    // Sanitize the inputs
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the username exists
    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($con, $query);

    // Check if the user exists in the database
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result); // Fetch the user data

        // Verify if the entered password matches the hashed password
        if (password_verify($password, $user['password'])) {
            // Password is correct, login successful
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to the dashboard or homepage
            header('Location: admin_area/index.php');
            exit();
        } else {
            // Password is incorrect
            $error_message = "Invalid username or password.";
        }
    } else {
        // Username doesn't exist
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger"><?= $error_message; ?></div>
                        <?php endif; ?>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-success w-100">Login</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="register.php" class="text-decoration-none">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
