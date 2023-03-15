<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'><link rel="stylesheet" 
   href="./admin_login.css">

</head>

<?php
// Handle form submission
$connect = mysqli_connect("localhost","root","","security");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Admin_Name = $_POST['Admin_Name'];
  $Admin_password = $_POST['Admin_password'];

  // Query the database to check if the username and password are valid
  $query = "SELECT * FROM admin WHERE Admin_Name='$Admin_Name' and Admin_password='$Admin_password'";
  $result = mysqli_query($connect, $query);
  
  // Check if username and password are valid
if (mysqli_num_rows($result) == 1) {
    // Redirect to dashboard
    header('Location: ../index.html');
    exit;
  } else {
    // Show error message
    echo '<p>Invalid username or password. Please try again.</p>';
  }
}
?>

<body>

<form class="login-form" method="POST">
  <p>Xiao Hei Zi Admin</p>
  <h1>Login</h1>
  <div class="form-input-material">
    <input type="text" name="Admin_Name" id="Admin_Name" placeholder=" " autocomplete="off" class="form-control-material" required />
    <label for="Admin_Name">Username</label>
  </div>
  <div class="form-input-material">
    <input type="password" name="Admin_password" id="Admin_password" placeholder=" " autocomplete="off" class="form-control-material" required />
    <label for="Admin_password">Password</label>
  </div>
  <button type="submit"  class="btn btn-primary btn-ghost">Login</button>
</form>
  
</body>
</html>