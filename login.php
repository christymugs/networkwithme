<?php
session_start();

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            switch ($user['role']) {
                case 'seller':
                    header('Location: seller_dashboard.php');
                    break;
                case 'buyer':
                    header('Location: buyer_dashboard.php');
                    break;
                case 'admin':
                    header('Location: admin_dashboard.php');
                    break;
                default:
                    break;
            }
        } else {
            $loginMessage = "Invalid email or password";
        }
    } else {
        $loginMessage = "Invalid email or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network with Me</title>
    <link rel="stylesheet" href="network.css">
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
</head>

<body>
    <div class="form-box login" id="loginForm">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">
                    Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link" onclick="showRegisterForm()">
                        Register Now
                    </a></p>
            </div>
        </form>
        <?php if (!empty($loginMessage)) : ?>
            <p class="login-message"><?php echo $loginMessage; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>
