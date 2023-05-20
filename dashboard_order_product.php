<?php
    // Start session
    session_start();

    // Establish database connection
   include 'config.php';	

    // Retrieve data from the database for the currently logged in user
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
    }
	

    // Check if query is successful
    if ($result) {
        // Fetch data
        $row = mysqli_fetch_assoc($result);
    }

	// If the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data and update database

    $id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pnumber = $_POST['phone'];
    $type = $_POST['type'];
    


    // Validate input data
    // ...

    // Update database
    $sql = "UPDATE users SET fname='$fname', lname='$lname', dob='$dob', gender='$gender', address='$address', pnumber='$pnumber', usertype='$type' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        // Display success message
        echo "User information updated successfully";
    } else {
        // Display error message
        echo "Error updating user information: " . mysqli_error($conn);
    }
} else {
    // Retrieve data from the database
    $id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");

    // Check if query is successful
    if ($result) {
        // Fetch data
        $row = mysqli_fetch_assoc($result);
    }
}

    // Close database connection
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Account Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		.sidebar {
			position: fixed;
			height: 100%;
			width: 240px;
			background: #F09E00;
			transition: all 0.5s ease;
		}

		.sidebar.active {
			width: 60px;
		}

		.sidebar .nav-links {
			margin-top: 10px;
		}

		.sidebar .nav-links li {
			position: relative;
			list-style: none;
			height: 50px;
		}

		.sidebar .nav-links li a {
			height: 100%;
			width: 100%;
			display: flex;
			align-items: center;
			text-decoration: none;
			transition: all 0.4s ease;
		}

		.sidebar .nav-links li a.active {
			background: #d9d9d9;
			color: #000000;
		}

		.sidebar .nav-links li a:hover {
			background: #FFFFFF;
		}

		.sidebar .nav-links li i {
			min-width: 60px;
			text-align: center;
			font-size: 18px;
			color: #fff;
		}

		.sidebar .nav-links li a .links_name {
			color: #fff;
			font-size: 15px;
			font-weight: 400;
			white-space: nowrap;
		}

		.sidebar .nav-links .log_out {
			position: absolute;
			bottom: 0;
			width: 100%;
		}

		.home-section {
			position: relative;
			background: #f5f5f5;
			min-height: 100vh;
			width: calc(100% - 240px);
			left: 240px;
			transition: all 0.5s ease;
		}

		.sidebar.active~.home-section {
			width: calc(100% - 60px);
			left: 60px;
		}

		.home-section nav {
			display: flex;
			justify-content: space-between;
			height: 80px;
			background: #fff;
			display: flex;
			align-items: center;
			position: fixed;
			width: calc(100% - 240px);
			left: 240px;
			z-index: 100;
			padding: 0 20px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
			transition: all 0.5s ease;
		}

		.sidebar.active~.home-section nav {
			left: 60px;
			width: calc(100% - 60px);
		}

		.home-section nav .sidebar-button {
			display: flex;
			align-items: center;
			font-size: 24px;
			font-weight: 500;
		}

		nav .sidebar-button i {
			font-size: 35px;
			margin-right: 10px;
		}

		.home-section nav .search-box {
			position: relative;
			height: 50px;
			max-width: 550px;
			width: 100%;
			margin: 0 20px;
		}

		nav .search-box input {
			height: 100%;
			width: 100%;
			outline: none;
			background: #F5F6FA;
			border: 2px solid #EFEEF1;
			border-radius: 6px;
			font-size: 18px;
			padding: 0 15px;
		}

		nav .search-box .bx-search {
			position: absolute;
			height: 40px;
			width: 40px;
			background: #2697FF;
			right: 5px;
			top: 50%;
			transform: translateY(-50%);
			border-radius: 4px;
			line-height: 40px;
			text-align: center;
			color: #fff;
			font-size: 22px;
			transition: all 0.4 ease;
		}

		.home-section nav .profile-details {
			display: flex;
			align-items: center;
			background: #F5F6FA;
			border: 2px solid #EFEEF1;
			border-radius: 6px;
			height: 50px;
			min-width: 190px;
			padding: 0 15px 0 2px;
		}

		.home-section .home-content {
			position: relative;
			padding-top: 104px;
		}

		.home-content .overview-boxes {
			display: flex;
			align-items: center;
			justify-content: space-between;
			flex-wrap: wrap;
			padding: 0 20px;
			margin-bottom: 26px;
		}

		.overview-boxes .box {
			display: flex;
			align-items: center;
			justify-content: center;
			width: calc(100% / 4 - 15px);
			background: #fff;
			padding: 15px 14px;
			border-radius: 12px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
		}

		.overview-boxes .box-topic {
			font-size: 20px;
			font-weight: 500;
		}

		.home-content .box .number {
			display: inline-block;
			font-size: 35px;
			margin-top: -6px;
			font-weight: 500;
		}

		.home-content .box .indicator {
			display: flex;
			align-items: center;
		}

		.home-content .box .indicator i {
			height: 20px;
			width: 20px;
			background: #8FDACB;
			line-height: 20px;
			text-align: center;
			border-radius: 50%;
			color: #fff;
			font-size: 20px;
			margin-right: 5px;
		}

		.box .indicator i.down {
			background: #e87d88;
		}

		.home-content .box .indicator .text {
			font-size: 12px;
		}

		.home-content .box .cart {
			display: inline-block;
			font-size: 32px;
			height: 50px;
			width: 50px;
			background: #cce5ff;
			line-height: 50px;
			text-align: center;
			color: #66b0ff;
			border-radius: 12px;
			margin: -15px 0 0 6px;
		}

		.home-content .box .cart.two {
			color: #2BD47D;
			background: #C0F2D8;
		}

		.home-content .box .cart.three {
			color: #ffc233;
			background: #ffe8b3;
		}

		.home-content .box .cart.four {
			color: #e05260;
			background: #f7d4d7;
		}

		.home-content .total-order {
			font-size: 20px;
			font-weight: 500;
		}

		.home-content .sales-boxes {
			display: flex;
			justify-content: space-between;
			/* padding: 0 20px; */
		}

		/* left box */
		.home-content .sales-boxes .recent-sales {
			width: 100%;
			background: #fff;
			padding: 20px 30px;
			margin: 0 20px;
			border-radius: 12px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
		}

		.home-content .sales-boxes .sales-details {
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		.sales-boxes .box .title {
			font-size: 24px;
			font-weight: 500;
			/* margin-bottom: 10px; */
		}

		.sales-boxes .sales-details li.topic {
			font-size: 20px;
			font-weight: 500;
		}

		.sales-boxes .sales-details li {
			list-style: none;
			margin: 8px 0;
		}

		.sales-boxes .sales-details li a {
			font-size: 18px;
			color: #333;
			font-size: 400;
			text-decoration: none;
		}

		.sales-boxes .box .button {
			width: 100%;
			display: flex;
			justify-content: flex-end;
		}

		.sales-boxes .box .button a {
			color: #fff;
			background: #0A2558;
			padding: 4px 12px;
			font-size: 15px;
			font-weight: 400;
			border-radius: 4px;
			text-decoration: none;
			transition: all 0.3s ease;
		}

		.sales-boxes .box .button a:hover {
			background: #0d3073;
		}
		.sales-boxes .recent-sales .sales-details{
			margin-top:15px;
		}
		.sales-boxes .recent-sales img{
			width:80px;
			height:80px;
			padding: 10px;
		}
		.sales-boxes .recent-sales .name{
			word-wrap: break-word; 

		}
		.sales-boxes .recent-sales i{
			margin-top: 90px;
		}

		/* Responsive Media Query */
		@media (max-width: 1240px) {
		.sidebar {
			width: 60px;
		}

		.sidebar.active {
			width: 220px;
		}

		.home-section {
			width: calc(100% - 60px);
			left: 60px;
		}

		.sidebar.active~.home-section {
		  /* width: calc(100% - 220px); */
		  overflow: hidden;
		  left: 220px;
		}

		.home-section nav {
		  width: calc(100% - 60px);
		  left: 60px;
		}

		.sidebar.active~.home-section nav {
		  width: calc(100% - 220px);
		  left: 220px;
		}
		}

		@media (max-width: 1150px) {
		.home-content .sales-boxes {
		  flex-direction: column;
		}

		.home-content .sales-boxes .box {
		  width: 100%;
		  overflow-x: scroll;
		  margin-bottom: 30px;
		}

		.home-content .sales-boxes .top-sales {
		  margin: 0;
		}
		}

		@media (max-width: 1000px) {
		.overview-boxes .box {
		  width: calc(100% / 2 - 15px);
		  margin-bottom: 15px;
		}
		}

		@media (max-width: 700px) {

		nav .sidebar-button .dashboard,
		nav .profile-details .admin_name,
		nav .profile-details i {
		  display: none;
		}

		.home-section nav .profile-details {
		  height: 50px;
		  min-width: 40px;
		}

		.home-content .sales-boxes .sales-details {
		  width: 560px;
		}
		}

		@media (max-width: 550px) {
		.overview-boxes .box {
		  width: 100%;
		  margin-bottom: 15px;
		}

		.sidebar.active~.home-section nav .profile-details {
		  display: none;
		}
		}

		@media (max-width: 400px) {
		.sidebar {
		  width: 0;
		}

		.sidebar.active {
		  width: 60px;
		}

		.home-section {
		  width: 100%;
		  left: 0;
		}

		.sidebar.active~.home-section {
		  left: 60px;
		  width: calc(100% - 60px);
		}

		.home-section nav {
		  width: 100%;
		  left: 0;
		}

		.sidebar.active~.home-section nav {
		  left: 60px;
		  width: calc(100% - 60px);
		}
		}
    </style>
  </head>
  
  <body>
    <!---Sidebar-->
    <div class="sidebar">
      <div class="d-flex flex-column align-items-center text-center mt-5 ">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle bg-white " width="150">
        <span class="logo_name text-white mt-3"><?php // Check if $row variable is defined and not null
													if (isset($row) && is_array($row)) {
														// Access array offset only if $row is an array and not null
														echo $row['fname'] . ' ' . $row['lname'];
													} else {
														// Handle case where $row is not defined or null
														echo 'Error: $row is not defined or null';
													}
													?></span>
      </div>
      <ul class="nav-links">
        <li>
			<a href="seller_product.php" class="active">
			  <i class='bx bx-grid-alt'></i>
			  <span class="links_name">Product</span>
			</a>
		</li>
  
        <li>
          <a href="dashboard_order_product.php" class="active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Orders</span>
          </a>
        </li>
        <li>
          <a href="dashboard_pastreview_product.php">
            <i class='bx bx-list-ul'></i>
            <span class="links_name">Past Reviews</span>
          </a>
        </li>
        <li>
          <a href="dashboard_orderhistory_product.php">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Order History</span>
          </a>
        </li>
		<li>
          <a href="dashboard_help_account.php">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
                       
					</div>
                    
					<form class="d-flex">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass fa-sm" style="color: #000000;"></i></button>
					</form> 
                </div>
            </nav>

        </header>
        <!-- Order Nav -->
      <div class="home-content">
        <ul class="nav nav-tabs px-5">
          <li class="active">
            <a data-toggle="tab" href="#home">All</a>
          </li>
          <li class="px-5">
            <a data-toggle="tab" href="#menu1">Pending</a>
          </li>
          <li class="px-5">
            <a data-toggle="tab" href="#menu2">To Ship</a>
          </li>
          <li class="px-5">
            <a data-toggle="tab" href="#menu3">Completed</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="sales-boxes py-5 border-top ">
              <div class="recent-sales box ">
                <div><h5>3 Orders</h5></div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Product(s)</th>
                      <th scope="col">Order Total</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU" alt="product name">Multifunctional Universal Diagonal Pliers </td>
                      <td>₱300</td>
                      <td>Unpaid</td>
                      <td>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" top="10" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                          </span>
                        </a>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                          </span>
                        </a>
                      </td>
                    </tr>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU">Multifunctional Universal Diagonal Pliers</td>
                      <td>₱500</td>
                      <td>Processing</td>
                      <td>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" top="10" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                          </span>
                        </a>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                          </span>
                        </a>
                      </td>
                    </tr>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU">Multifunctional Universal Diagonal Pliers</td>
                      <td>₱750</td>
                      <td>Delivered</td>
                      <td>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" top="10" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                          </span>
                        </a>
                        <a href="#">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                          </span>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="menu1" class="tab-pane fade ">
            <div class="sales-boxes py-5 border-top ">
              <div class="recent-sales box ">
                <div><h5>1 Orders</h5></div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Order Total</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU" alt="product name">Multifunctional Universal Diagonal Pliers </td>
                      <td>₱300</td>
                      <td>Pending</td>
                      
                    </tr>
					<tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU" alt="product name">Multifunctional Universal Diagonal Pliers </td>
                      <td>₱300</td>
                      <td>Approved</td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="menu2" class="tab-pane fade ">
            <div class="sales-boxes py-5 border-top ">
              <div class="recent-sales box ">
                <div><h5>1 Orders</h5></div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Order Total</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU" alt="product name">Multifunctional Universal Diagonal Pliers </td>
                      <td>₱500</td>
                      <td>To Ship</td>
                      <td><button class="btn btn-primary">Contact Seller</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="menu3" class="tab-pane fade ">
            <div class="sales-boxes py-5 border-top ">
              <div class="recent-sales box ">
                <div><h5>1 Orders</h5></div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Order Total</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="name">
                      <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr6a047PhWwkiRXbbGO61yrSqqxUDauVGz6dsz8KVLAxVqzBFmiWrnoaiqh_N9dQy8RD4&usqp=CAU" alt="product name">Multifunctional Universal Diagonal Pliers </td>
                      <td>₱700</td>
                      <td>Completed</td>
                      <td><a href="product_review.php"><button class="btn btn-primary">Review</button></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    </script>
  </body>
</html>