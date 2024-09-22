<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            background-color: #343a40;
        }
        .login-container {
            margin-top: 100px;
            width: 100%;
            max-width: 500px; /* Increased width */
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }
        .admin-icon {
            font-size: 60px;
            color: #343a40;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-container text-center">
        <i class="fas fa-user-shield admin-icon"></i>
        <h3 class="mb-4">Admin Login</h3>
        <form action="/admin/login" method="POST">
            <div class="form-group text-left">
                <label for="email"><i class="fas fa-envelope"></i> Admin Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter admin email" required>
            </div>
            <div class="form-group text-left">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-dark btn-block">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>
    </div>
</div>

</body>
</html>
