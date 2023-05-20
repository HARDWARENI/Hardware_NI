<?php
@include 'config.php';

// Establish database connection

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

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
    </div>
    <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lname']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" class="form-control" id="phone" name="pnumber" value="<?php echo $row['pnumber']; ?>">
    </div>
    <div class="form-group">
        <label for="type">User Type:</label>
        <select class="form-control" id="type" name="type" <?php if ($_SESSION['user_type'] != 'admin') echo 'disabled'; ?>>
            <option value="seller" <?php if ($row['type'] == 'seller') echo 'selected'; ?>>Seller</option>
            <option value="customer" <?php if ($row['type'] == 'customer') echo 'selected'; ?>>Customer</option>
            <option value="worker" <?php if ($row['type'] == 'worker') echo 'selected'; ?>>Worker</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="update">Update</button>
</form>
