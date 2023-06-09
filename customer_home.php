<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>AvengerSquad_HardwareNI</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/carousel.css">
        <link rel="stylesheet" href="css/site.css">

    </head>
    <style>
        .topnav-left {
            float: left;
        }
        .topnav-right {
            float: right;
        }
    </style>
    <body style="padding-top: 0px;">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="customer_home.php">Hardware N.I.</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a href="customer_home.php" class="nav-link active" style="padding-left: 50px;padding-right: 50px;">
                                <i class="fa-sharp fa-solid fa-house fa-sm" style="color: #000000;">&nbsp&nbsp</i>Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    <i class="fa-sharp fa-solid fa-cart-shopping" style="color: #000000;">&nbsp&nbsp</i>Cart
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="product_cart.php" class="dropdown-item">Products</a></li>
                                    <li><a href="service_cart.php"class="dropdown-item">Services</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="product.php" class="dropdown-item">Products</a></li>
                                    <li><a href="service.php"class="dropdown-item">Services</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right;">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass fa-sm" style="color: #000000;"></i></button>
                            </form> 
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    <i class="fa-sharp fa-solid fa-ellipsis-vertical" style="color: #000000;"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="user_profile.php">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="seller_product.php">Shop</a></li>
                                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid" style="margin: 0px; padding: 0px;">
            <main role="main" class="pb-3">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://starworkchiangmai.com/wp-content/uploads/2021/04/surprised-happy-girl-pointing-left-recommend-product-advertisement-make-okay-gesture-2048x1365.jpg" width="100%" height="100%">
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1 style="color: black">Free Shipping</h1>
                                    <p style="color: black">April 21 - May 1</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" style="background-color: #F09E00; border: 0;">Buy Now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777" /></svg>
                
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Another example headline.</h1>
                                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777" /></svg>
                
                            <div class="container">
                                <div class="carousel-caption text-end">
                                    <h1>One more for good measure.</h1>
                                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                
                <!-- Marketing messaging and featurettes
                ================================================== -->
                <!-- Wrap the rest of the page in another container to center all the content. -->
                
                <div class="container-fluid" style="text-align: center;">
                
                    <!-- Three columns of text below the carousel -->
                    <div class="row">
                        <div>
                            <h3>Products</h3><br><br>
                        </div>
                        <div class="col-lg-4">
                            <img src="https://ae01.alicdn.com/kf/HTB1CneYKVXXXXczXpXXq6xXFXXXz/Heavy-saving-40-Diagonal-pliers-diagonal-pliers-diagonal-cutting-pliers-Household.jpg" style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>Diagonal Pliers</h4>
                            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="https://cf.shopee.ph/file/d398f8849f21e519c2741e2a362c5ad4" style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>Bicycle Set Kit</h4>
                            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="https://cdn.mscdirect.com/global/images/ProductImages/2925236AA-21.jpg" style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>One Hand Riveter</h4>
                            <p>And lastly this, the third column of representative placeholder content.</p>
                        </div><!-- /.col-lg-4 -->
                        <div>
                        <p><a href="product.php" class="btn btn-secondary" style="background-color: #F09E00; border: 0px;">See more &raquo;</a></p><br><br><br><br>

                        </div>
                    </div><!-- /.row -->
                    <!-- START THE FEATURETTES -->
                
                    <hr>
                
                    <div class="row">
                        <div>
                            <h3>Services</h3><br><br>
                        </div>
                
                        <div class="col-lg-4">
                            <img src="https://images.wisegeek.com/carpenter.jpg" style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>Carpenter</h4>
                            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="https://alis.alberta.ca/media/697347/electrician-istock-487018428.jpg" style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>Electrician</h4>
                            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <img src="https://www.bullseye-plumbing.com/wp-content/uploads/2016/02/professional-plumber-2.jpg   " style="border-radius: 50%;" width="140" height="140">
                            <br><br>
                            <h4>Plumber</h4>
                            <p>And lastly this, the third column of representative placeholder content.</p>
                        </div><!-- /.col-lg-4 -->
                        <div>
                        <p><a href="service.php" class="btn btn-secondary" style="background-color: #F09E00; border: 0px;">See more &raquo;</a></p><br><br><br><br>
                        </div>
                    </div><!-- /.row -->
                
                   
                
                </div><!-- /.container -->
            </main>
        </div>
        

        <footer class="border-top footer text-muted">
            <div class="container">
                &copy; 2023 - AvengerSquad_HardwareNI - <a asp-area="" asp-page="/Privacy">Privacy</a>
            </div>

        </footer>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/site.js" asp-append-version="true"></script>
        <script src="https://kit.fontawesome.com/b931b08b2b.js" crossorigin="anonymous"></script>
    </body>
</html>