<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
            width: 100%;
            max-width: 500px; /* Fixed width */
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .login-icon {
            font-size: 60px;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-container text-center">
        <i class="fas fa-user-circle login-icon"></i>
        <h3 class="mb-4">User Login</h3>
        <form action="/user/login" method="POST">
            <div class="form-group text-left">
                <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>
        <p class="mt-3">Don't have an account? <a href="/user/register">Register</a></p>
    </div>
</div>

</body>
</html>
