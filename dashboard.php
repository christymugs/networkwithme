<?php
include('db.php');
session_start();
?>
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

    <div class="dashboard-container">
        <button class="find-people-section" onclick="navigateTo('matches')">
            <h3>Find People to Network With</h3>
            <p>Start exploring and connecting with new people!</p>
            <!-- Add content for Find People section here -->
        </button>
        <button class="matches-section" onclick="navigateTo('find-people')">
            <h3>Your Matches</h3>
            <!-- Add content for Matches section here -->
        </button>
        <button class="chat" onclick="navigateTo('messages')">
            <h3>Messages</h3>
            <!-- Add content for Messages section here -->
        </button>
    </div>

    <script>
        function navigateTo(section) {
            // Redirect to the corresponding HTML page
            window.location.href = section + '.html';
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <!-- Add this to your existing HTML file, just before the closing </body> tag -->
    <footer>
        <ion-icon name="home-outline" class="footer-icon active"></ion-icon>
        <ion-icon name="chatbubbles-outline" class="footer-icon"></ion-icon>
        <ion-icon name="person-outline" class="footer-icon"></ion-icon>
    </footer>

</body>

</html>
