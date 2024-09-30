<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .navbar {
            background-color: #343a40;
            color: #ffffff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #ffffff;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .admin-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .admin-info img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>

<!-- Admin Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <div class="admin-info">
        <img src="https://via.placeholder.com/100" alt="Admin Photo">
        <h5>Admin Name</h5>
    </div>
    <a href="#" onclick="showSection('dashboard')">Dashboard</a>
    <a href="#" onclick="showSection('products')">Products</a>
    <a href="#" onclick="showSection('categories')">Categories</a>
    <a href="#" onclick="showSection('subcategories')">Subcategories</a>
    <a href="#" onclick="showSection('orders')">Orders</a>
    <a href="#" onclick="showSection('users')">Users</a>
</div>

<!-- Main Content -->
<div class="content">

    <!-- Dashboard Section -->
    <div id="dashboard" class="section">
        <h2>Admin Dashboard</h2>
        <p>Welcome to the admin dashboard! Here you can manage products, categories, subcategories, and more.</p>

        <!-- Activity Overview -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">320</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">450</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div id="products" class="section" style="display:none;">
        <h2>Manage Products</h2>
        <!-- Product Form -->
        <form>
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" id="productCategory">
                    <option>Category A</option>
                    <option>Category B</option>
                    <option>Category C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="productStock">Stock:</label>
                <input type="number" class="form-control" id="productStock" placeholder="Enter product stock">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <!-- Existing Products Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Product 1</td>
                        <td>Category A</td>
                        <td>$49.99</td>
                        <td>25</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Categories Section -->
    <div id="categories" class="section" style="display:none;">
        <h2>Manage Categories</h2>
        <!-- Category Form -->
        <form>
            <div class="form-group">
                <label for="categoryName">Category Name:</label>
                <input type="text" class="form-control" id="categoryName" placeholder="Enter category name">
            </div>
            <div class="form-group">
                <label for="categoryDescription">Description:</label>
                <textarea class="form-control" id="categoryDescription" placeholder="Enter category description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <!-- Existing Categories Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Category A</td>
                        <td>Description A</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Subcategories Section -->
    <div id="subcategories" class="section" style="display:none;">
        <h2>Manage Subcategories</h2>
        <!-- Subcategory Form -->
        <form>
            <div class="form-group">
                <label for="subcategoryName">Subcategory Name:</label>
                <input type="text" class="form-control" id="subcategoryName" placeholder="Enter subcategory name">
            </div>
            <div class="form-group">
                <label for="parentCategory">Parent Category:</label>
                <select class="form-control" id="parentCategory">
                    <option>Category A</option>
                    <option>Category B</option>
                    <option>Category C</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>

        <!-- Existing Subcategories Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Subcategory Name</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Subcategory 1</td>
                        <td>Category A</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Orders Section -->
    <div id="orders" class="section" style="display:none;">
        <h2>Manage Orders</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Product 1</td>
                        <td>$49.99</td>
                        <td>Pending</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Users Section -->
    <div id="users" class="section" style="display:none;">
        <h2>Manage Users</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    // JavaScript to show and hide sections based on sidebar click
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>