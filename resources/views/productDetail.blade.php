<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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
        .product-img {
            max-width: 100%; /* Responsive image */
            height: auto; /* Maintain aspect ratio */
            width: 400px; /* Set width to 400px */
            height: 400px; /* Set height to 400px */
        }
        .thumbnail-img {
            cursor: pointer;
            width: 80px; /* Thumbnail width */
            height: auto; /* Maintain aspect ratio */
            margin: 5px; /* Space between thumbnails */
            border: 1px solid #ccc; /* Light border for thumbnails */
        }
        .thumbnail-img:hover {
            border-color: #007bff; /* Highlight border on hover */
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

<!-- Product Details Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img id="mainImage" src="../storage/{{json_decode($product->images)[0]}}" class="product-img" alt="Product Image">
            <div class="mt-3">
                @foreach(json_decode($product->images) as $image)
                <img src="../storage/{{$image}}" class="thumbnail-img" alt="Thumbnail 1" onclick="changeImage('../storage/{{$image}}')">
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="product-title">{{$product->name}}</h2>
            <div class="rating mb-2">
                ★★★★☆ 4.5 (120 reviews)
            </div>
            <h4 class="text-success">{{$product->price}} sum</h4>
            <button class="btn btn-primary btn-lg mb-3">Add to Cart</button>
            <h5>Описание товара:</h5>
            <p>{{$product->description}}</p>
        </div>
    </div>

    <!-- Additional Information Section -->
    <div class="row my-5">
        <div class="col-md-12">
            <h5>Характеристики:</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Атрибут</th>
                        <th>Детали</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product->attributes as $attribute)

                    <tr>
                        <td>{{$attribute->name}}</td>
                        <td>{{$attribute->pivot->value}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }
</script>
</body>
</html>
