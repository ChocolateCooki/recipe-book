<?php

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data (username and password)
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate user credentials (replace with your authentication logic)
  // **IMPORTANT:** This is a basic example, you should implement secure authentication using password hashing.

  if ($username == "admin" && $password == "password") {
    // Login successful
    $_SESSION["username"] = $username;
    header("location: index.php"); // Redirect to homepage after successful login
  } else {
    // Login failed
    $error = "Invalid username or password.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Log In Page</title>
  <link rel="stylesheet" href="style-3.css">
</head>
<body>

  <div class="container">
    <header>
      <div class="logo">
        <img src="logo.png" alt="Logo" width="75" height="70">
      </div>
      <div class="home-button">
        <button><a href="index-1.html" style="color: white;">Home</a></button>
      </div>
    </header>

    <h2>Log In to account</h2>

    <?php if (isset($error)) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" placeholder="Jane">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="email@janesfakedomain.net">
      </div>
      <button type="submit">Log In</button>
    </form>

    <footer>
      <div class="logo">
      </div>
      <div class="quick-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index-5.html">Search</a></li>
          <li><a href="index-3.html">Sign up</a></li>
          <li><a href="index-2.html">Create Account</a></li>
        </ul>
      </div>
      <div class="social-media">
        <h3>Follow us on</h3>
        <ul>
          <li><a href="https://www.youtube.com/c/Ap%C3%A9Amma">Youtube</a></li>
          <li><a href="https://web.facebook.com/ApeAmmaFans?_rdc=1&_rdr#">Facebook</a></li>
          <li><a href="https://www.instagram.com/apeammachannel/">Instagram</a></li>
        </ul>
      </div>
      <div class="logout">
        <button><a href="index-1.html" style="color: white;">Log out</a></button>
      </div>
    </footer>
  </div>

</body>
</html>