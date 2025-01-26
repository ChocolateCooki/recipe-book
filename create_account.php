<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    // Validate form data (basic example)
    if (empty($username) || empty($email) || empty($password) || empty($mobile)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Database connection (replace with your actual database credentials)
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute SQL statement to insert user data
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, mobile) VALUES (:username, :email, :password, :mobile)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->execute();

            echo "<script>alert('Account created successfully!'); window.location.href = 'index.php';</script>";

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account Page</title>
    <link rel="stylesheet" href="style-2.css">
</head>
<body>

    <div class="container">
        <header>
            </header>

        <h2>Create a new account</h2>

        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button type="submit">Create My Account</button>
        </form>

        <footer>
            </footer>
    </div>

</body>
</html>