<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
        .custom-file-upload {
            display: inline-block;
            padding: 20px;
            cursor: pointer;
            color: #6c757d;
            font-size: 2rem;
            transition: all 0.3s;
        }
        .custom-file-upload:hover {
            color: #495057;
        }
        .custom-file-upload input {
            display: none;
        }
    </style>
</head>
<body>

<!-- Admin Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-logout')}}">Logout</a>
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
    <a href="#" onclick="showSection('attributes')">Attributes</a>
    <a href="#" onclick="showSection('attributeValues')">Attribute Values</a>
    <a href="#" onclick="showSection('userReviews')">User Reviews</a>
    <a href="#" onclick="showSection('orders')">Orders</a>
    <a href="#" onclick="showSection('users')">Users</a>
</div>

<!-- Main Content -->
<div class="content">

    <!-- Dashboard Section -->
    <div id="dashboard" class="section">
        <h2>Admin Dashboard</h2>
        <p>Welcome to the admin dashboard! Here you can manage products, categories, subcategories, attributes, and more.</p>

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

    <!-- Products Section (unchanged) -->
    <div id="products" class="section" style="display:none;">
        <h2>Manage Products</h2>
        <!-- Product Form -->
        <form action="{{route('product-create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="productCategory">Sub Category:</label>
                <select class="form-control" id="productCategory" name="productCategory">
                    @if(isset($SubCategories) && $SubCategories->isNotEmpty())
                    @foreach($SubCategories as $SubCategory)

                    <option value="{{$SubCategory->id}}">{{$SubCategory->name}}</option>

                    @endforeach
                    @else
                        <option>Not Found</option>
                    @endif

                </select>
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <textarea class="form-control" name="description" id="productDescription" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="productBrand">Brand:</label>
                <input type="text" class="form-control" id="productBrand" placeholder="Enter product brand name">
            </div>
            <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Product Availability
                </label>
            </div>
            </div>
            <div class="form-group">
                <label for="productPrice">Quantity:</label>
                <input type="number" class="form-control" id="productQuantity" placeholder="Enter product quantity">
            </div>
            <div class="form-group">

                <!-- Custom Upload Button -->
                <label class="custom-file-upload">
                    <input id="fileUpload" type="file" accept="image/*"/>
                    <i class="fa-solid fa-image fa-2x"></i> <!-- Icon size doubled here -->
                </label>
                <!-- Label -->
                <label for="fileUpload" class="form-label">Product image:</label>
            </div>
            <div class="form-group">
                <label for="productName">Manufacturer:</label>
                <input type="text" class="form-control" id="productName" placeholder="Manufacturer name">
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

    <!-- Categories Section (reflects migration) -->
    <div id="categories" class="section" style="display:none;">
        <h2>Manage Categories</h2>
        <!-- Category Form -->
        <form action="{{route('category-create')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="categoryName">Category Name:</label>
                <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter category name">
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
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($Categories) && $Categories->isNotEmpty())
                    @foreach($Categories as $Category)
                        <tr>
                            <!-- ID Field -->
                            <td>
                                <input type="number" class="form-control" value="{{ $Category->id }}" readonly style="width: 100%;">
                            </td>
                            <!-- Name Field -->
                            <td>
                                <input type="text" class="form-control" id="categoryName-{{ $Category->id }}" value="{{ $Category->name }}" readonly style="width: 100%;">
                            </td>
                            <!-- Actions -->
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-success btn-sm" onclick="enableEdit({{ $Category->id }})">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>

                                <!-- Update Button -->
                                <button class="btn btn-warning btn-sm" id="updateBtn-{{ $Category->id }}" disabled>
                                    <i class="fa-solid fa-check"></i> Update
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('category-delete', $Category->id) }}" method="POST" style="display:inline;">
{{--                                   <form style="display:inline;">--}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Subcategories Section (reflects migration) -->
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

    <!-- Attributes Section (reflects migration) -->
    <div id="attributes" class="section" style="display:none;">
        <h2>Manage Attributes</h2>
        <!-- Attribute Form -->
        <form>
            <div class="form-group">
                <label for="attributeName">Attribute Name:</label>
                <input type="text" class="form-control" id="attributeName" placeholder="Enter attribute name">
            </div>
            <div class="form-group">
                <label for="attributeProduct">Product:</label>
                <select class="form-control" id="attributeProduct">
                    <option>Product 1</option>
                    <option>Product 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="attributeSubCategory">Subcategory:</label>
                <select class="form-control" id="attributeSubCategory">
                    <option>Subcategory A</option>
                    <option>Subcategory B</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Attribute</button>
        </form>

        <!-- Existing Attributes Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Attribute Name</th>
                    <th>Product</th>
                    <th>Subcategory</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Color</td>
                    <td>Product 1</td>
                    <td>Subcategory A</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Attribute Values Section (reflects migration) -->
    <div id="attributeValues" class="section" style="display:none;">
        <h2>Manage Attribute Values</h2>
        <!-- Attribute Value Form -->
        <form>
            <div class="form-group">
                <label for="attributeValueName">Attribute Value:</label>
                <input type="text" class="form-control" id="attributeValueName" placeholder="Enter attribute value">
            </div>
            <div class="form-group">
                <label for="attributeValueProduct">Product:</label>
                <select class="form-control" id="attributeValueProduct">
                    <option>Product 1</option>
                    <option>Product 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="attributeValueAttribute">Attribute:</label>
                <select class="form-control" id="attributeValueAttribute">
                    <option>Color</option>
                    <option>Size</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Attribute Value</button>
        </form>

        <!-- Existing Attribute Values Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Attribute Value</th>
                    <th>Product</th>
                    <th>Attribute</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Red</td>
                    <td>Product 1</td>
                    <td>Color</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- User Reviews Section (reflects migration) -->
    <div id="userReviews" class="section" style="display:none;">
        <h2>Manage User Reviews</h2>
        <!-- Existing Reviews Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>User 1</td>
                    <td>Product 1</td>
                    <td>4.5</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Orders Section (unchanged) -->
    <div id="orders" class="section" style="display:none;">
        <h2>Manage Orders</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1001</td>
                    <td>Product 1</td>
                    <td>Customer A</td>
                    <td>Shipped</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Users Section (unchanged) -->
    <div id="users" class="section" style="display:none;">
        <h2>Manage Users</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>Admin</td>
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
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }

    function enableEdit(id) {
        // Enable input field for editing
        const nameField = document.getElementById(`categoryName-${id}`);
        const updateBtn = document.getElementById(`updateBtn-${id}`);

        if (nameField.readOnly) {
            nameField.readOnly = false;
            updateBtn.disabled = false;
            nameField.focus(); // Focus on the input when edit is enabled
        } else {
            nameField.readOnly = true;
            updateBtn.disabled = true;
        }
    }
</script>

</body>
</html>

