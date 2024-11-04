<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    
<nav>
    <ul>
        <li><a href="http://localhost/TEAM%2012/homepage.php">Home</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="http://localhost/TEAM%2012/about.php">About Us</a></li>
    </ul>
    <img src="moon.png" id="icon" alt="Toggle Dark Mode" />
</nav>




<?php
session_start();
include("connect.php");

//POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $message = $_POST['message'];

        //  displaying the submitted data
        echo "<p>Thank you, $name. Your message has been received:</p>";
        echo "<p>$message</p>";
    }
}
// Handle GET requests
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: homepage.php");
    exit();
}
?>
<div style="text-align:center; padding:15%;">
    <p style="font-size:50px; font-weight:bold;">
        Hello Welcome To Our Site  
        <?php 
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT users.* FROM users WHERE users.email='$email'");
            while ($row = mysqli_fetch_array($query)) {
                echo $row['firstName'] . ' ' . $row['lastName'];
            }
        }
        ?>
        🙂
    </p>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <a href="?action=logout">Logout</a>
</div>

  <!-- Script for dark theme toggle -->
    <!--mga kulang lang nito pre ay yung png paki dl nlngS-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          var icon = document.getElementById("icon");
  
          // Check for saved theme preference in localStorage
          if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark-theme");
            icon.src = "sun.png"; // Show sun icon if dark mode is active
          } else {
            icon.src = "moon.png"; // Show moon icon by default
          }
  
          icon.addEventListener("click", function () {
            document.body.classList.toggle("dark-theme");
  
            // Update localStorage and icon based on current theme
            if (document.body.classList.contains("dark-theme")) {
              icon.src = "sun.png";
              localStorage.setItem("theme", "dark");
            } else {
              icon.src = "moon.png";
              localStorage.setItem("theme", "light");
            }
          });
        });
      </script>
    </body>
  </html>
</body>
</html>
