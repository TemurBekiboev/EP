<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Updated Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for the page */
        }
        .navbar {
            background-color: #343a40; /* Dark background for the navbar */
        }
        .navbar a {
            color: #ffffff; /* White text for navbar links */
        }
        .hero {
            background-color: #6c757d; /* Gray background for the hero section */
            color: white; /* White text color */
        }
        .footer {
            background-color: #343a40; /* Dark background for the footer */
            color: #ffffff; /* White text for footer */
        }
        .category-card {
            position: relative;
            cursor: pointer;
            overflow: hidden; /* Ensures content doesn't overflow */
            transition: box-shadow 0.3s;
        }
        .category-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .category-img {
            width: 100%;
            height: 250px; /* Adjust the height of the images */
            object-fit: cover; /* Ensure the image fits well */
        }
        .category-title {
            position: absolute;
            bottom: -40px; /* Start hidden */
            left: 0;
            right: 0;
            text-align: center;
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            transition: bottom 0.3s; /* Smooth transition */
            padding: 10px; /* Padding around the text */
        }
        .category-card:hover .category-title {
            bottom: 0; /* Show on hover */
        }
        .product-card {
            height: 100%; /* Ensure product cards are the same height */
            background-color: #ffffff; /* White background for product cards */
            border: 1px solid #e0e0e0; /* Light border */
            transition: box-shadow 0.3s;
        }
        .product-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .product-img {
            height: 150px; /* Set a fixed height for product images */
            object-fit: cover; /* Ensure the image fits well */
        }
        .product-link {
            text-decoration: none; /* Remove underline from links */
            color: inherit; /* Inherit color from parent */
        }
        /*.category-img {*/
        /*    object-fit: cover;*/
        /*    width: 100%;*/
        /*    height: 200px; !* Adjust based on how tall you want the image *!*/
        /*}*/
    </style>
</head>
<body>

<!-- Navigation Bar -->
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">E-Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left-aligned menu items -->
            <ul class="navbar-nav mr-auto">
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

            <!-- Right-aligned Login and Register buttons -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login-form')}}"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register-form')}}"><i class="fas fa-user-plus"></i> Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero text-center py-5">
    <div class="container">
        <h1 class="display-4">Welcome to E-Shop</h1>
        <p class="lead">Find the best products at unbeatable prices!</p>
        <a href="#" class="btn btn-light btn-lg">Shop Now</a>
    </div>
</div>

<!-- Categories Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Shop by Categories</h2>
    @if(isset($categories) && $categories->isNotEmpty())
        @foreach($categories as $key=>$category)
            @if($key % 4 == 0)
                <div class="row">
        @endif

                <div class="col-md-3">
                    <div class="card mb-4 category-card p-2">
                        <img src="storage/{{$category->image}}" class="card-img-top category-img" alt="Category 1">
                        <div class="category-title">{{$category->name}}</div>
                    </div>
                </div>

        @if($key % 4 == 3)
            </div>
                @endif
        @endforeach
    @endif
</div>

<!-- Products Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Featured Products</h2>
    @if(isset($products) && $products->isNotEmpty())
        @foreach($products as $key=>$product)
            @if($key % 4 == 0)
    <div class="row">
        @endif
        <div class="col-md-3 mb-4">
            <a href="product1.html" class="product-link">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->price}} sum</p>
                    </div>
                </div>
            </a>
        </div>
        @if($key % 4 == 3)
    </div>
            @endif
        @endforeach
    @endif
</div>

<!-- Footer -->
<footer class="footer text-center py-4">
    <div class="container">
        <p class="mb-0">© 2024 E-Shop. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
