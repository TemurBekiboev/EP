<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            /*background-color: #f8f9fa;*/
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
        .toast-success {
            background-color: green !important;
        }
        .toast-error {
            background-color: red !important;
        }
        .toast-message {
            color: white !important;
        }
        .file-input {
            display: none;
        }

        /* Custom button style */
        .btn-upload {
            display: inline-flex;
            align-items: center;
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .btn-upload i {
            margin-right: 5px;
        }

        /* Image preview styling */
        .image-preview img {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
        }

        /*!* Responsive table *!*/
        /*.flex-center {*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/

        .flex-center img {
            width: 60px;
            height: 60px;
            display: block;
            margin-left:auto;
            margin-right: auto;
        }
        .flex-center img:hover {
            cursor: pointer;
        }

        .table > tbody > tr > td {
            vertical-align: middle;
        }

        /*.table-input-container {*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    align-self: center;*/
        /*}*/

        /*.table-input-container input {*/
        /*    margin: 0;*/
        /*    align-self: center;*/
        /*    display: block;*/
        /*    !*margin: auto;*!*/
        /*}*/

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
                <input type="text" class="form-control" name="product_name" id="productName" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="productCategory">Sub Category:</label>
                <select class="form-control" id="productCategory" name="product_sbc">
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
                <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Enter product price">
            </div>
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <textarea class="form-control" name="description" id="productDescription" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="productBrand">Brand:</label>
                <input type="text" name="product_brand" class="form-control" id="product_brand" placeholder="Enter product brand name">
            </div>
            <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" name="product_availability" type="checkbox" value="1" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Product Availability
                </label>
            </div>
            </div>
            <div class="form-group">
                <label for="productPrice">Quantity:</label>
                <input type="number" name="product_quantity" class="form-control" id="productQuantity" placeholder="Enter product quantity">
            </div>
            {{--    Image Add  --}}
            <div class="form-group">
                <label for="productImages">Product Images:</label>
                <div class="custom-file-upload">
                    <input type="file" name="images[]" id="productImages" class="file-input" accept="image/*" multiple onchange="productPreviewImages(event)">
                    <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('productImages').click();">
                        <i class="fa-solid fa-upload"></i> Upload Images
                    </button>
                </div>

                <!-- Image Previews -->
                <div id="productPreviewImages" class="image-previews mt-3">
                    <!-- Preview images will be dynamically added here -->
                </div>
            </div>

            <div class="form-group">
                <label for="productMnf">Manufacturer:</label>
                <input type="text" name="product_mnf" class="form-control" id="productMnf" placeholder="Manufacturer name">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <!-- Existing Products Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Sub Category</th>
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
        <form action="{{route('category-create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categoryName">Category Name:</label>
                <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter category name">
            </div>
            <!-- Custom Image Upload Button -->
            <div class="form-group">
                <label for="categoryImage">Category Image:</label>
                <div class="custom-file-upload">

                    <input type="file" name="image" id="categoryImage" class="file-input" accept="image/*" onchange="previewImage(event)">
                    <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('categoryImage').click();">
                        <i class="fa-solid fa-upload"></i> Upload Image
                    </button>
                </div>

                <!-- Image Preview -->
                <div class="image-preview mt-3">
                    <img id="imagePreview" src="" alt="Image Preview" style="max-width: 150px; max-height: 150px; display: none;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <!-- Existing Categories Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
{{--                    <th>ID</th>--}}
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($Categories) && $Categories->isNotEmpty())
                    @foreach($Categories as $Category)

                        <tr>

                            <form action="{{route('category-update', $Category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <!-- ID Field -->
{{--                            <td>--}}
{{--                                <div class="table-input-container">--}}
{{--                                <input type="number" class="form-control" value="{{ $Category->id }}" readonly style="width: 100%;">--}}
{{--                                </div>--}}
{{--                            </td>--}}

                                <!-- Image Field -->
                                <td>
                                    <div class="flex-center">
                                    @if($Category->image)
                                        <img src="{{ asset('storage/' . $Category->image) }}" alt="Category Image" id="categoryImageSmall" class="img-fluid" onclick="document.getElementById('categoryImage-{{ $Category->id }}').click();">
                                    @else
                                        <span>No Image</span>
                                    @endif

                                    <!-- File input, only visible after Edit is clicked -->
                                    <input type="file" name="category_image" id="categoryImage-{{ $Category->id }}" onchange="replaceImage(event)" class="form-control mt-2" style="display: none;" disabled>
                                    </div>
                                </td>

                            <!-- Name Field -->
                            <td>
                                <div class="table-input-container">
                                <input type="text" class="form-control" name="category_name" id="categoryName-{{ $Category->id }}" value="{{ $Category->name }}" readonly style="width: 100%;">
                                </div>
                            </td>
                            <!-- Actions -->
                            <td>
                                <div class="flex-center">
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-success btn-sm" onclick="enableEdit({{ $Category->id }},'cEdit')">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>

                                <!-- Update Button -->


                                <button type="submit" class="btn btn-warning btn-sm" id="updateBtn-{{ $Category->id }}" disabled>
                                    <i class="fa-solid fa-check"></i> Update
                                </button>
                                </div>
                            </td>
                        </form>
                            <td>
                                <div class="flex-center">
                                <!-- Delete Button -->
                                <form action="{{ route('category-delete', $Category->id) }}" method="POST" style="display:inline;">
{{--                                   <form style="display:inline;">--}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                                </div>
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
        <form action="{{route('sub-category-create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="subcategoryName">Subcategory Name:</label>
                <input type="text" name="name" class="form-control" id="subcategoryName" placeholder="Enter subcategory name">
            </div>
            <div class="form-group">
                <label for="parentCategory">Parent Category:</label>
                <select class="form-control" id="parentCategory" name="category_id">
                    @if(isset($Categories) && $Categories->isNotEmpty())
                    @foreach($Categories as $Category)
                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <!-- Custom Image Upload Button -->
            <div class="form-group">
                <label for="subCategoryImage">Sub Category Image:</label>
                <div class="custom-file-upload">

                    <input type="file" name="image" id="subCategoryImage" class="file-input" accept="image/*" onchange="sbcPreviewImage(event)">
                    <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('subCategoryImage').click();">
                        <i class="fa-solid fa-upload"></i> Upload Image
                    </button>
                </div>

                <!-- Image Preview -->
                <div class="image-preview mt-3">
                    <img id="sbcImagePreview" src="" alt="Image Preview" style="max-width: 150px; max-height: 150px; display: none;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>

        <!-- Existing Subcategories Table -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Images</th>
                    <th>Subcategory Name</th>
                    <th>Parent Category</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($SubCategories) && $SubCategories->isNotEmpty())
                    @foreach($SubCategories as $sbc)

                <tr>
                    <form action="{{route('category-update', $Category->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <td>
                        <div class="flex-center">
                            @if($sbc->image)
                                <img src="{{ asset('storage/' . $sbc->image) }}" alt="Sub Category Image" id="subCategoryImageSmall" class="img-fluid" onclick="document.getElementById('subCategoryImage-{{ $sbc->id }}').click();">
                            @else
                                <span>No Image</span>
                            @endif

                            <!-- File input, only visible after Edit is clicked -->
                            <input type="file" name="sub_category_image" id="subCategoryImage-{{ $sbc->id }}" onchange="replaceImage(event)" class="form-control mt-2" style="display: none;" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="table-input-container">
                            <input type="text" class="form-control" name="sub_category_name" id="subCategoryName-{{ $sbc->id }}" value="{{ $sbc->name }}" readonly style="width: 100%;">
                        </div>
                    </td>
                    <td>
                        <div class="table-input-container">
                            <select class="form-control" id="parentCategoryName-{{ $sbc->id }}" name="category_id" disabled>
                                <option value="{{ $sbc->category->id }}"  style="width: 100%;">{{$sbc->category->name}}</option>
                                @foreach($Categories as $Category)
                                    @if(!($Category->id == $sbc->category->id))
                                    <option value="{{$Category->id}}"> {{$Category->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                        <!-- Actions -->
                        <td>
                            <div class="flex-center">
                                <!-- Edit Button -->
                                <button type="button" id="sbcEdit" class="btn btn-success btn-sm" onclick="enableEdit({{ $sbc->id }},'sbcEdit')">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>

                                <!-- Update Button -->


                                <button type="submit" class="btn btn-warning btn-sm" id="sbcUpdateBtn-{{ $sbc->id }}" disabled>
                                    <i class="fa-solid fa-check"></i> Update
                                </button>
                            </div>
                        </td>
                    </form>
                    <td>
                        <div class="flex-center">
                            <!-- Delete Button -->
                            <form action="{{ route('sub-category-delete', $sbc->id) }}" method="POST" style="display:inline;">
                                {{--                                   <form style="display:inline;">--}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Attributes Section (reflects migration) -->
    <div id="attributes" class="section" style="display:none;">
        <h2>Manage Attributes</h2>
        <!-- Attribute Form -->
        <form id="dynamicInputForm" action="{{route('attribute-create')}}" method="post">
            @csrf
            <div id="inputWrapper">
                <!-- First input field -->
                <div class="form-group">
                    <label for="attributeName1">Attribute Name:</label>
                    <input type="text" class="form-control" name="attributeNames[]" id="attributeName1" placeholder="Enter attribute name">
                </div>
            </div>

            <!-- Button to add more input fields -->
            <button type="button" id="addInputBtn" class="btn btn-secondary">+ Add Attribute</button>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
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
        <form id="attributeForm">
            <div class="form-group">
                <label for="attrValProduct">Product:</label>
                <select class="form-control" id="attrValProduct" name="attrValProduct">
                    @if(isset($Products) && $Products->isNotEmpty())
                        @foreach($Products as $Product)
                    <option value="{{$Product->id}}">{{$Product->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div id="attributeWrapper">
                <!-- First Attribute Value Group -->
                <br>
                <div class="attributeGroup">
                    <div class="form-group">
                        <label for="attributeValueName">Attribute Value:</label>
                        <input type="text" class="form-control" name="attributeValues[]" placeholder="Enter attribute value">
                    </div>
                    <div class="form-group">
                        <label for="attributeValueAttribute">Attribute:</label>
                        <select class="form-control" name="attributeNames[]">
                            @if(isset($Attributes) && $Attributes->isNotEmpty())
                            @foreach($Attributes as $Attribute)
                            <option value="{{$Attribute->id}}">{{$Attribute->name}}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>
            </div>

            <!-- Button to add new attribute fields -->
            <button type="button" class="btn btn-secondary" id="addAttributeBtn">+ Add Attribute</button>

            <br><br>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit Attribute Values</button>
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


<!-- jQuery (required for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Popper.js (required for Bootstrap tooltips, popovers, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    @if(session('success'))
    toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
    toastr.error("{{ session('error') }}");
    @endif

    @if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
@endif
</script>

<script>
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }

    function enableEdit(id,name) {
        // Enable input field for editing
        var nameField = '';
        var updateBtn = '';
        var imageField = '';
        var parentCategory = '';
        if(name === 'cEdit'){
        nameField = document.getElementById(`categoryName-${id}`);
        updateBtn = document.getElementById(`updateBtn-${id}`);
        imageField = document.getElementById(`categoryImage-${id}`);
        }
        else {
            nameField = document.getElementById(`subCategoryName-${id}`);
            updateBtn = document.getElementById(`sbcUpdateBtn-${id}`);
            imageField = document.getElementById(`subCategoryImage-${id}`);
            parentCategory = document.getElementById(`parentCategoryName-${id}`);
        }
        if (nameField.readOnly) {
            nameField.readOnly = false;
            updateBtn.removeAttribute('disabled');
            imageField.removeAttribute('disabled');
            parentCategory.removeAttribute('disabled');
            nameField.focus(); // Focus on the input when edit is enabled
        } else {
            nameField.readOnly = true;
            updateBtn.disabled = true;
            imageField.disabled = true;
            parentCategory.disabled = true;
        }
    }
    function previewImage(event) {
        const reader = new FileReader();
        const imagePreview = document.getElementById('imagePreview');

        reader.onload = function() {
            if (reader.readyState === 2) {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }
        }

        reader.readAsDataURL(event.target.files[0]);
    }
    function replaceImage(event) {
        const reader = new FileReader();
        const imagePreview = document.getElementById('categoryImageSmall');

        reader.onload = function() {
            if (reader.readyState === 2) {
                imagePreview.src = reader.result;
                // imagePreview.style.display = 'block';
            }
        }

        reader.readAsDataURL(event.target.files[0]);
    }
    function sbcPreviewImage(event) {
        const reader = new FileReader();
        const imagePreview = document.getElementById('sbcImagePreview');

        reader.onload = function() {
            if (reader.readyState === 2) {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }
        }

        reader.readAsDataURL(event.target.files[0]);
    }
    var selectedImages = []; // Store all selected images globally

    // Store the DataTransfer object to hold files
    var dt = new DataTransfer();

    function productPreviewImages(event) {
        var previewsContainer = document.getElementById('productPreviewImages');
        var files = event.target.files;

        // Loop through the new files and add them to the DataTransfer object
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            dt.items.add(file);  // Add the file to the DataTransfer object

            var reader = new FileReader();
            reader.onload = (function(file) {
                return function(e) {
                    // Create an image element for preview
                    var imgContainer = document.createElement('div');
                    imgContainer.style.display = 'inline-block';
                    imgContainer.style.position = 'relative';
                    imgContainer.style.marginRight = '10px';

                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = "150px";
                    img.style.maxHeight = "150px";

                    // Create a "remove" button for each image
                    var removeBtn = document.createElement('button');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.style.position = 'absolute';
                    removeBtn.style.top = '0';
                    removeBtn.style.right = '0';
                    removeBtn.style.background = 'red';
                    removeBtn.style.color = 'white';
                    removeBtn.style.border = 'none';
                    removeBtn.style.cursor = 'pointer';
                    removeBtn.onclick = function() {
                        // Remove the image preview
                        previewsContainer.removeChild(imgContainer);

                        // Remove the file from DataTransfer object
                        for (var j = 0; j < dt.items.length; j++) {
                            if (dt.items[j].getAsFile() === file) {
                                dt.items.remove(j);
                                break;
                            }
                        }

                        // Update the file input with the new DataTransfer files
                        document.getElementById('subCategoryImages').files = dt.files;
                    };

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(removeBtn);
                    previewsContainer.appendChild(imgContainer);
                };
            })(file);

            reader.readAsDataURL(file);
        }

        // Update the file input with the DataTransfer files
        event.target.files = dt.files;
    }
    document.addEventListener('DOMContentLoaded', function () {
        let attributeIndex = 1; // Keep track of the number of input fields

        // Event listener for the "Add Attribute" button
        document.getElementById('addInputBtn').addEventListener('click', function () {
            attributeIndex++; // Increment the attribute index

            // Create a new div for the new input field
            let newInputGroup = document.createElement('div');
            newInputGroup.classList.add('form-group');

            // Add the new input field's HTML
            newInputGroup.innerHTML = `
            <label for="attributeName${attributeIndex}">Attribute Name:</label>
            <input type="text" class="form-control" name="attributeNames[]" id="attributeName${attributeIndex}" placeholder="Enter attribute name">
        `;

            // Append the new input field to the wrapper
            document.getElementById('inputWrapper').appendChild(newInputGroup);
        });

        document.getElementById('addAttributeBtn').addEventListener('click', function () {
            attributeIndex++; // Increment the attribute index

            // Create a new div for the new input field
            let InputGroup = document.createElement('div');
            InputGroup.classList.add('form-group');
            let newInputGroup = document.createElement('div');
            newInputGroup.classList.add('form-group');

            var Attributes = @json($Attributes);

            // Add the new input field's HTML
            InputGroup.innerHTML = "<br><label for='attributeValueName" + attributeIndex + "'>Attribute Value:</label> <input type='text' class='form-control' id='attributeValueName" + attributeIndex + "' name='attributeValues[]' placeholder='Enter attribute value'>";
            let selectHTML = '<label for="attributeValueAttribute' + attributeIndex + '">Attribute:</label> <select class="form-control" id="attributeValueAttribute' + attributeIndex + '" name="attributeNames[]">';

            if (typeof Attributes !== 'undefined' && Attributes.length > 0) {
                Attributes.forEach(function (attribute) {
                    selectHTML += `<option value="${attribute.id}">${attribute.name}</option>`;
                });
            }
            selectHTML += '</select>';

            // Assign the built select HTML to newInputGroup
            newInputGroup.innerHTML = selectHTML;

            // Append the new input field to the wrapper
            document.getElementById('attributeWrapper').appendChild(InputGroup);
            document.getElementById('attributeWrapper').appendChild(newInputGroup);
        });
    });



</script>

</body>
</html>

