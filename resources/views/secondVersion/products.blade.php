<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .navbar {
            background-color: #343a40; /* Dark background for the navbar */
        }
        .navbar a {
            color: #ffffff; /* White text for navbar links */
        }
        .footer {
            background-color: #343a40; /* Dark background for the footer */
            color: #ffffff; /* White text for footer */
        }
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .filter-section {
            background-color: #ffffff; /* White background for the filter */
            padding: 20px;
            border-radius: 5px;
        }
        .filter-section h5 {
            margin-bottom: 15px;
        }
        .product-list {
            background-color: #ffffff; /* White background for products */
            padding: 20px;
            border-radius: 5px;
        }
        .product-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
            position: relative;
        }
        .product-row img {
            width: 150px; /* Thumbnail width */
            height: 150px; /* Thumbnail height */
            object-fit: cover;
        }
        .product-info {
            flex-grow: 1;
            margin-left: 20px;
        }
        .product-description {
            font-size: 14px;
            color: #666;
        }
        .product-price {
            font-weight: bold;
            color: #333;
        }
        .view-product-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #28a745; /* Green color for button */
            border-color: #28a745;
        }
        .pagination {
            justify-content: center;
        }
        .price-input {
            width: 80px;
            display: inline-block;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">E-Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
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
        </div>
    </div>
</nav>

<!-- Main Content Section -->
<div class="container my-5">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <div class="filter-section">
                <h5>Filter by:</h5>
                <form>
                    <!-- Price Range Input -->
                    <div class="form-group">
                        <label for="priceRange">Price Range</label>
                        <div>
                            <input type="number" class="form-control price-input" id="minPrice" placeholder="Min">
                            -
                            <input type="number" class="form-control price-input" id="maxPrice" placeholder="Max">
                        </div>
                    </div>

                    <!-- Brand Radio Buttons -->
                    <div class="form-group">
                        <label>Brand</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brandA" value="BrandA">
                            <label class="form-check-label" for="brandA">Brand A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brandB" value="BrandB">
                            <label class="form-check-label" for="brandB">Brand B</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brandC" value="BrandC">
                            <label class="form-check-label" for="brandC">Brand C</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Apply Filters</button>
                </form>
            </div>
        </div>

        <!-- Products Section -->
        <div class="col-md-9">
            <div class="product-list">
                <!-- Product Row 1 -->
                <div class="product-row">
                    <img src="https://via.placeholder.com/150" alt="Product Image">
                    <div class="product-info">
                        <h5>Product 1</h5>
                        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
                        <p class="product-price">$49.99</p>
                    </div>
                    <a href="#" class="btn btn-success view-product-btn">View Product</a>
                </div>
                
                <!-- Product Row 2 -->
                <div class="product-row">
                    <img src="https://via.placeholder.com/150" alt="Product Image">
                    <div class="product-info">
                        <h5>Product 2</h5>
                        <p class="product-description">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <p class="product-price">$39.99</p>
                    </div>
                    <a href="#" class="btn btn-success view-product-btn">View Product</a>
                </div>
                
                <!-- Product Row 3 -->
                <div class="product-row">
                    <img src="https://via.placeholder.com/150" alt="Product Image">
                    <div class="product-info">
                        <h5>Product 3</h5>
                        <p class="product-description">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p class="product-price">$29.99</p>
                    </div>
                    <a href="#" class="btn btn-success view-product-btn">View Product</a>
                </div>
                
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
