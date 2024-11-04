<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="description"
      content="Team Member Website for Integrative Programming & Technologies"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <title>Our Website | Team Page</title>
  </head>
  <body>
    <!-- Logo and navigation section -->
    <nav>
      <ul>
        <li><a href="http://localhost/TEAM%2012/homepage.php">Home</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="http://localhost/TEAM%2012/about.php">About Us</a></li>
      </ul>
      <img src="moon.png" id="icon" alt="Toggle Dark Mode" />
    </nav>

    <!-- Main content section -->
    <div class="wrapper">
      <h1>Group 12</h1>
      <div class="our_team">
        <div class="team_member">
          <div class="member_img">
            <img
              src="Assets/Reymie.jpg"
              alt="Jhon Reymie V. Say-A (Profile Picture)"
            />
          </div>
          <h3>
            <a href="https://www.facebook.com/ashly.sayavalencia"
              >Jhon Reymie Say-A</a
            >
          </h3>
          <span><b>Representative</b></span>
          <p>
            Jhon Reymie nga pala ng Esporlas Itaas, Putatan, Muntinlupa City.
          </p>
        </div>

        <div class="team_member">
          <div class="member_img">
            <img
              src="Assets/Francisco.jpg"
              alt="Francisco C. Enaje (Profile Picture)"
            />
          </div>
          <h3>
            <a href="https://www.facebook.com/profile.php?id=100048354423128"
              >Francisco Enaje Jr.</a
            >
          </h3>
          <span><b>Member</b></span>
          <p>Francisco nga pala ng Esporlas, Putatan, Muntinlupa City.</p>
        </div>

        <div class="team_member">
          <div class="member_img">
            <img
              src="Assets/Ironman.jpg"
              alt="Ironman M. Leal (Profile Picture)"
            />
          </div>
          <h3>
            <a href="https://www.facebook.com/ironman.leal.73"
              >Ironman M. Leal</a
            >
          </h3>
          <span><b>Member</b></span>
          <p>
            Ironman pala ng Soldiers Hills Village, Putatan, Muntinlupa City.
          </p>
        </div>

        <div class="team_member">
          <div class="member_img">
            <img
              src="Assets/IvanPaul.jpg"
              alt="Ivan Paul Nepomuceno Endaya (Profile Picture)"
            />
          </div>
          <h3>
            <a href="https://www.facebook.com/pnd.ivann">Ivan Paul N. Endaya</a>
          </h3>
          <span><b>Member</b></span>
          <p>
            Ivan Paul nga pala ng <i>Esporlas, Putatan, Muntinlupa City.</i>
          </p>
        </div>
      </div>
    </div>


    <?php
session_start();
include("footer.php");
?>


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
