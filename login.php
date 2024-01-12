<?php
session_start(); // Start the session if it's not started yet

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Start the session if it's not started yet
            if (!isset($_SESSION['user_id'])) {
                session_start();
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_name'] = $user['name']; // Assuming 'name' is the column in your users table for user's name

            header('Location: dashboard.php');
            exit();
        } else {
            $loginMessage = "Invalid password. Please try again.";
        }
    } else {
        $loginMessage = "Email not recognized. Please check your email and try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="network.css">
    <link rel="stylesheet" href="styles.css">]
</head>

<body>
    <header>
        <h2>logo</h2>
        <nav class="navigation">
            <a href="network.html">Home</a>
            <a href="about-us.html">About us</a>
            <a href="download">Services</a>
            <a href="contact.html">Contact</a>
            <button class="btnsignup-popup">Sign Up</button>
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>

    <div class="form-box login" id="loginForm">
        <h2>Login</h2>
        <form action="dashboard.html" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name = "password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link" onclick="showRegisterForm()"ß>
                            Register Now
                        </a></p>
                </div>
            </form>
        </form>
        <?php if (!empty($loginMessage)) : ?>
            <p class="login-message"><?php echo $loginMessage; ?></p>
        <?php endif; ?>
    </div>

    <!-- Your existing content continues -->

    <script src="dashboard.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>