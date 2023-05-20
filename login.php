<?php
session_start();
include 'config.php';

$alert = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from database
    $password = md5($password);
    $sql = "SELECT * FROM `users` WHERE username = ? AND password = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Check if the user exists and the password is correct
    if (mysqli_num_rows($result) == 1) {
        // Set the user attribute value in the session
        $_SESSION["usertype"] = $user["usertype"];
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["fname"] = $user["fname"];
        $_SESSION["lname"] = $user["lname"];
        $_SESSION["address"] = $user["address"];
        $_SESSION["gender"] = $user["gender"];
        $_SESSION["dob"] = $user["dob"];
        $_SESSION["pnumber"] = $user["pnumber"];

        // Redirect the user to the appropriate dashboard
        if ($user["usertype"] == "Seller") {
            header("Location: seller_dashboard.php");
            exit();
        } elseif ($user["usertype"] == "Worker") {
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: customer_home.php");
            exit();
        }
    } else {
        // User does not exist, show an error message
        $alert_message = 'Invalid username or password.';
    }
}
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    *{
      font-family: 'Poppins','san-serif';
    }
    .wrapper{
      background-image: url(registerb.png);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .main{
      display: flex;
      justify-content: center;
      align-items: center;
      min-height:  100vh;

    
    }
    .row{
      width: 90%;
      height: 575px;
      border-radius: 10px;
      background: #fff;
      box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
      margin:auto;
    }
    .side-image{
      background-image: url(register.png);
      background-position: center;
      position: relative;
      border-radius: 10px 0 0 10px;
    }
    img{
      width: 20px;
      position: absolute;
      top:30px;
      left: 30px;

    }
    .text{
      position: absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }
    .text p{
      color:#fff;
      font-size: 18px;
    }
    .right{
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }
  
    .input-box{
      width: 360px;
      box-sizing: border-box;
      
    }
    .input-box header{
      font-weight: 700;
      text-align: center;
      margin-bottom: 20px;
    }
    .input-field{
      display: flex;
      flex-direction: column;
      position: relative;
      padding: 0 10px 0 10px;
    }
    .input{
      height: 30px;
      width: 100%;
      background: transparent;
      border: none;
      border-bottom: 1px solid rgba(0,0,0,0.2);
      outline: none;
      margin-bottom: 25px;
      color: #40414a;
    }
    @media only screen and (max-width: 768px){
      .side-image{
        border-radius: 10px 10px 0 0;
        height: 100px;
      }
      img{
        width: 35px;
        position: absolute;
        top: 20px;
        left: 47%;
      }
      .text{
        position: absolute;
        top:70%;
        text-align: center;
      }
      .text p{
        font-size: 17px;
      }
      .row{
        max-width: 500px;
        height: auto;
        width: 100%;;
      }
    }
    .btn{
      margin: auto; 
    margin-top: 20px;
    background: #FFA500;
    padding: 13px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: bold;
    width: 45%;
     border-radius: 8px;
     border:none;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image">
          <!----Image--->
          <div class="text">
            <p>Join Us</p>
          </div>
        </div>
        <div class="col-md-6 right">
          <div class="input-box">
          <header><h3>Login</h3></header>
		  <?php if (!empty($alert_message)) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $alert_message; ?>
    </div>
<?php } ?>
		<br>
		 <form action="" method="post"> 
        <div class="form-group">
          <input type="text" class="input form-control" name="username" id="username" required  placeholder="Username"> 
        </div>
        <div class="form-group">
          <input type="password" class="input form-control" name="password" id="password" required  placeholder="Password"> 
        </div>
        <div class="text-right">
		<h6><a href="reset_request.php">Forgot Password?</a></h6>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="login" value="LOGIN">Login</button>
        </div>
			</form>
        <h6 class="text-center mt-5">No Account?<a href="register.php"><b>Register here</b></a></h6>
        </div>
      </div>
      </div>
    </div>
  </div>
   <script>
    // add an event listener for the close button
    document.querySelector('.close').addEventListener('click', function() {
      // remove the parent element that contains the alert message
      this.parentNode.parentNode.removeChild(this.parentNode);
    });
  </script>
</body>
</html>
