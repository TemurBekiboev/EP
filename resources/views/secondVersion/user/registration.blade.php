<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            margin-top: 100px;
            width: 100%;
            max-width: 500px; /* Fixed width */
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .register-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="register-container text-center">
        <i class="fas fa-user-plus register-icon"></i>
        <h3 class="mb-4">User Registration</h3>
        <form action="/user/register" method="POST">
            <div class="form-group text-left">
                <label for="name"><i class="fas fa-user"></i> Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group text-left">
                <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
            </div>
            <div class="form-group text-left">
                <label for="confirm-password"><i class="fas fa-lock"></i> Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">
                <i class="fas fa-user-plus"></i> Register
            </button>
        </form>
        <p class="mt-3">Already have an account? <a href="/user/login">Login</a></p>
    </div>
</div>

</body>
</html>
