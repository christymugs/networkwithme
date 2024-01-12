<?php
include('db.php');

$registrationMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$firstName $lastName', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $registrationMessage = "Welcome to Network with Me, $firstName $lastName! <a href='login.php'>Login here</a>.";

    } else {
        $registrationMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
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
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
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
                    <p>Don't have an account? <a href="#" class="register-link" onclick="showRegisterForm()"ß>
                            Register Now
                        </a></p>
                </div>
            </form>
        </div> 

        <div class="form-box register" id="registerForm">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name = "firstName"required>
                    <label>First Name</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name = "lastName"required>
                    <label>Last Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name = "email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" required>
                        I agree</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already  have an account? <a href="#" class="login-link" onclick="showLoginForm()">
                            Login
                        </a></p>
                </div>
            </form>
        </div>
    </div>

    <div class="signup-container">
        <!-- Display pop-up message with a link to the login page -->
        <?php if (!empty($registrationMessage)) : ?>
            <p class="welcome-message"><?php echo $registrationMessage; ?></p>
        <?php endif; ?>
    </div>
    <script src="network.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>