<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AvengerSquad_HardwareNI</title>
        <link rel="stylesheet" href="~/lib/bootstrap/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="~/AvengerSquad_HardwareNI.styles.css" asp-append-version="true" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/carousel.css">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/site.css">

    </head>
    <style>
        rect {
            float: center;
        }
        .bc {
            background-color: #F09E00;
            border: 0px;
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
                                    <li><a class="dropdown-item" href="product.php">Products</a></li>
                                    <li><a class="dropdown-item" href="service.php">Services</a></li>
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
                                    <li><a class="dropdown-item" href="user_profile.php">Accoount</a></li>
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
            <main>
                <div class="album py-5 bg-light text-left">
                    <div class="container ">
                        <h4 class="me-3 mb-0 pb-1">SERVICES&nbsp&nbsp&nbsp<rect style="position: absolute; width: 60.8%;height: 3%; background: #CDCDCD;clip-path: polygon(3% 0%, 100% 0%, 100% 100%, 0% 100%);"></rect></h4>
                        <hr class="mt-0" style="width:100%;">
                        <div class="row">
                            <div class="col">
                        <div class="ms-3 dropdown mb-2" style="float: right;">
                            <button class="btn btn-secondary dropdown-toggle bc" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Sort By
                            </button>
                            <ul class="dropdown-menu">
                              <li><button class="dropdown-item" type="button">Lowest Price</button></li>
                              <li><button class="dropdown-item" type="button">Popular</button></li>
                              <li><button class="dropdown-item" type="button">Relevance</button></li>
                            </ul>
                        </div>
                        <div class="dropdown mb-2" style="float: right;">
                            <button class="btn btn-secondary dropdown-toggle bc" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Filter
                            </button>
                            <ul class="dropdown-menu">
                              <li><button class="dropdown-item" type="button">Tube</button></li>
                              <li><button class="dropdown-item" type="button">Nails</button></li>
                              <li><button class="dropdown-item" type="button">Pliers</button></li>
                              <li><button class="dropdown-item" type="button">Cement</button></li>
                              <li><button class="dropdown-item" type="button">Tool Kit</button></li>
                              <li><button class="dropdown-item" type="button">Hallow Blocks</button></li>
                              <li><button class="dropdown-item" type="button">Cable</button></li>                              
                            </ul>
                        </div>
                        <hr class="" style="width:100%;">
                        <div class="row">
                            <!-- start of column -->
                            <div class="col-sm-2">  
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://th.bing.com/th/id/OIP.IBuMWP6NVQRDIsCFN_VvGAAAAA?pid=ImgDet&rs=1" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Foreman</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://richmondappliancerepairs.ca/wp-content/uploads/2020/07/top-appliance-repair-richmond-technician-thumbs-up.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Plumber</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://d2gr5kl7dt2z3t.cloudfront.net/blog/wp-content/uploads/2017/04/05055600/shutterstock_224697112-768x641.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Painter</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://www.lat-works.com/images/lat-img/jobs-oklahoma--concrete-masonry-jobs-durant.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Masonry</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://d2gr5kl7dt2z3t.cloudfront.net/blog/wp-content/uploads/2017/04/05055600/shutterstock_224697112-768x641.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Painter</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://images.wisegeek.com/carpenter.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Carpenter</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- for down column -->
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://alis.alberta.ca/media/697347/electrician-istock-487018428.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Electrician</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://www.lat-works.com/images/lat-img/jobs-oklahoma--concrete-masonry-jobs-durant.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Masonry</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://richmondappliancerepairs.ca/wp-content/uploads/2020/07/top-appliance-repair-richmond-technician-thumbs-up.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Plumber</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://ecofriend.com/wp-content/uploads/2021/03/installing-insulated-glass-window.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Glazier</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://ecofriend.com/wp-content/uploads/2021/03/installing-insulated-glass-window.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Glazier</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card mb-4 box-shadow">
                                    <a href="product_detail.php" style="text-decoration: none;">
                                        <img src="https://ecofriend.com/wp-content/uploads/2021/03/installing-insulated-glass-window.jpg" height="150" width="160" class="bd-placeholder-img square m-3 mb-0">
                                    </a>
                                    <div class="card-body">
                                        <p class="mb-0">
                                            <i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i><i class="fa-solid fa-star" style="color: #ffea00;"></i>
                                        </p>
                                        <p class="card-text mb-0">Glazier</p>
                                        <small class="text-muted">boss amo</small><br>
                                        <small class="text-muted">₱ 700.00</small><br>
                                        <div class="d-flex" style="float: right;">
                                            <div class="btn-group mb-0 ms-0" >
                                                <a href="service_cart.php"><i class="fa-sharp fa-solid fa-cart-shopping ms-2" style="color: #000000;"></i></a>
                                                <a href="message.php"><i class="fa-sharp fa-solid fa-message ms-2" style="color: #000000;"></i></a>
                                                <a href="favorite.php"><i class="fa-sharp fa-solid fa-heart ms-2" style="color: #000000;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
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