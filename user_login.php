<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login Form</title>
  <link rel="stylesheet" href="./user_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="user_login.js"></script>
</head>
<body>

<?php
// Handle form submission
$connect = mysqli_connect("localhost","root","","security");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Customer_email = $_POST['Customer_email'];
  $Password = $_POST['Password'];

  // Query the database to check if the username and password are valid
  $query = "SELECT * FROM customers WHERE Customer_email='$Customer_email' and Password='$Password'";
  $result = mysqli_query($connect, $query);
  
  // Check if username and password are valid
if (mysqli_num_rows($result) == 1) {
    // Redirect to dashboard
    header('Location: ./Admin/index.html');
    exit;
  } else {
    // Show error message
    echo '<p>Invalid username or password. Please try again.</p>';
  }
}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="main">    
    <input type="checkbox" id="chk" aria-hidden="true">

      <div class="signup">
        <form method="post">
          <label for="chk" aria-hidden="true">Sign up</label>
          <input type="text" name="username" id="id_username" placeholder="User name" required="">
          <input type="email" name="email" placeholder="Email" required="">
          <i class="far fa-eye" id="togglePassword"></i>
          <input type="password" name="password" id="id_password" placeholder="Password" required="">
          <button>Sign up</button>
        </form>
      </div>

      <div class="login">
        <form method="post">

          <label for="chk" aria-hidden="true">Login</label>
          <input type="email" id="Customer_email" name="Customer_email" placeholder="Email" required="">
          <i class="far fa-eye" id="togglePasswordLogin"></i>
          <input type="password" name="Password" id="Password" placeholder="Password" required="">
          
          <div class="remember-forgot">
            <label><input type="checkbox" id="rememberMe" >Remember me</label>
            <a href="#">Forgot password?</a>
          </div>
<br>
<br>
          <button onclick="lsRememberMe()">Login</button>
        </form>
      </div>
  </div>
</body>

<script type="text/javascript">
    const togglePassword = document.querySelector('#togglePassword');
    const togglePasswordLogin = document.querySelector('#togglePasswordLogin');
      const signup_password = document.querySelector('#id_password');
      const Password = document.querySelector('#Password');
    
      togglePassword.addEventListener('click', function (e) 
      {
        // toggle the type attribute
        const type = signup_password.getAttribute('type') === 'password' ? 'text' : 'password';
        signup_password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
      });

      togglePasswordLogin.addEventListener('click', function (e) 
      {
        // toggle the type attribute
        const type = Password.getAttribute('type') === 'password' ? 'text' : 'password';
        Password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");


    //remember me function
    if (localStorage.checkbox && localStorage.checkbox !== "") {
      rmCheck.setAttribute("checked", "checked");
      emailInput.value = localStorage.username;
    } else {
      rmCheck.removeAttribute("checked");
      emailInput.value = "";
    }

    function lsRememberMe() {
      if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;
      } else {
        localStorage.username = "";
        localStorage.checkbox = "";
      }
    }
    </script>

</html>
  
</body>
</html>