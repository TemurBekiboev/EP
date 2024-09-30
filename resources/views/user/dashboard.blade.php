<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* General Layout Adjustments */
        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            z-index: 10;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #343a40; /* Matches top navbar color */
            height: calc(100vh - 56px); /* Full height minus the top navbar */
            position: fixed;
            top: 56px; /* Pushes sidebar below the top navbar */
            left: 0;
            width: 220px;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #ffffff;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            cursor: pointer;
        }

        .sidebar .nav-link.active {
            color: #ffc107; /* Matches top navbar text color */
        }

        .user-section {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #495057;
        }

        .user-section img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .user-section h6 {
            color: #ffffff;
            margin-top: 10px;
        }

        .main-content {
            margin-left: 220px;
            margin-top: 56px;
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Top Navbar (E-commerce project style) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
            </ul>

            <!-- User Profile Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/30" class="rounded-circle" alt="User Image"> {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<nav class="sidebar">
    <div class="user-section">
        <img src="https://via.placeholder.com/50" alt="User Image">
        <h6>{{Auth::user()->name}}</h6>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#" onclick="showContent(event, 'dashboard')">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showContent(event, 'orders')">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showContent(event, 'profile')">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="showContent(event, 'settings')">Settings</a>
        </li>
    </ul>
</nav>

<!-- Main Content Area -->
<div class="main-content">
    <div id="dashboard-content">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">10 Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Account Balance</h5>
                        <p class="card-text">$120.00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Profile Settings</h5>
                        <p class="card-text">Update your details</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Content -->
    <div id="orders-content" class="d-none">
        <h2>Your Orders</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Product</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>2024-09-20</td>
                <td>Product A</td>
                <td>Shipped</td>
                <td>$50.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2024-09-18</td>
                <td>Product B</td>
                <td>Delivered</td>
                <td>$70.00</td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Profile Content -->
    <div id="profile-content" class="d-none">
        <h2>Profile</h2>
        <p>Update your profile information here.</p>
    </div>

    <!-- Settings Content -->
    <div id="settings-content" class="d-none">
        <h2>Settings</h2>
        <p>Adjust your settings here.</p>
    </div>
</div>

<script>
    // Function to show and hide content based on sidebar navigation
    function showContent(event, contentId) {
        event.preventDefault();

        // Hide all content
        document.querySelectorAll('.main-content > div').forEach(div => {
            div.classList.add('d-none');
        });

        // Show the selected content
        document.getElementById(contentId + '-content').classList.remove('d-none');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
