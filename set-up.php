<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="network.css">
    <script src="dashboard.js" defer></script>
</head>

<body>
    <header>
        <h2>logo</h2>
        <nav class="navigation">
            <a href="network.html">Home</a>
            <a href="about-us.html">About us</a>
            <a href="download">Services</a>
            <a href="contact.html">Contact</a>
            <div class="user-dropdown" id="userDropdown">
                <button class="user-name" onclick="toggleDropdown()">
                    <?php
                    session_start();
                    if (isset($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'];
                    } else {
                        echo 'User Name';
                    }
                    ?>
                </button>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="network.html">Sign Out</a>
                </div>
            </div>
        </nav>
    </header>
    <h1 class = "create">Create an Account</h1>
    <div class="set-up">
        <div class="Basic-Information">
            <h3>Basic Information</h3>
            <div class="input-boxes">
                <form action="process_profile.php" method="post" enctype="multipart/form-data">
                    <!-- First Name and Last Name (Pre-populated) -->
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName">

                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName">

                    <!-- Email (Pre-populated) -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </form>
            </div>
        </div>

        <div class="Additional-Information">
            <h3>Additional Information</h3>
            <div class="input-boxes">
                <form action="process_profile.php" method="post" enctype="multipart/form-data">
                    <!-- Birthday -->
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" required>

                    <!-- Gender -->
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Perfer not to say</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="Image-Upload">
            <h3>Image Upload</h3>
            <div class="input-boxes">
                <form action="process_profile.php" method="post" enctype="multipart/form-data">
                    <!-- Image Upload (Up to 5 images) -->
                    <label for="images">Select up to 5 images:</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple>
                </form>
            </div>
        </div>
    </div>
    <button type="submit" class = "next-page" onclick="goToDashboard()">Next Page</button>
    </div>
    <footer>
        <ion-icon name="home-outline" class="footer-icon active"></ion-icon>
        <ion-icon name="chatbubbles-outline" class="footer-icon"></ion-icon>
        <ion-icon name="person-outline" class="footer-icon"></ion-icon>
    </footer>
    <script>
        function goToDashboard() {
            window.location.href = "dashboard.html";
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
