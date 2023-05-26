<?php
  include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hidden Gems Of Baguio</title>
  <link rel="stylesheet" href="./index.css">
  <link rel="icon" type="image/x-icon" href="./images/logo.ico">
</head>

<body>
  <div class="banner">
    <div class="navigation">
      <img src="./images/logo.png" alt="logo" class="logo">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./About.php">About</a></li>
        <li><a id="anchortag_contact">Contact</a></li>
      </ul>

      <div id="overlay"></div>
      <div id="popup">
        <div class="popupcontrols">
            <span id="popupclose">X</span>
        </div>
        <div class="popupcontent">
        <center><p><strong>Contact Us</strong><br>Loremipsum@email.com<br>+63 92323567894</p></center>
        </div>
      </div>

      
      <?php
          if (isset($_GET['loggedin'])) {
            if (isset($_GET['usrname'])) {
              echo '<button class="usrlogin" onclick="openMainPage()">Logout</button>';
            }
          } else {
            echo '<button class="usrlogin" onclick="openLoginPage()">Login</button>';
          }
        ?>

      <div class="hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>

      <div class="content">
        <h1>Hidden Gems of baguio</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
        <?php
          if (isset($_GET['loggedin'])) {
            if (isset($_GET['usrname'])) {
              $usrname = $_GET['usrname'];
              echo 'Hi! '.$usrname.'';
            }
          } else {
            echo '<button class="usrlogin" onclick="openLoginPage()">Login</button>';
          }
        ?>
      </div>
    </div>

    <div class="grid-imagescontents">
        <?php
          $sql = 'SELECT * FROM `main_page`';

          $result = mysqli_query($con, $sql);

          if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $name = $row['name'];
                  $location = $row['location'];
                  $description = $row['description'];
                  $image = $row['image'];
                  
                  echo '<section class="grid-image-sections">
                          <p class="grid-imageitems-subtitle">'.$name.'</p>
                          <p class="grid-imageitems-location">'.$location.'</p>
                          <p class="grid-imageitems-description">'.$description.'</p>
                          <img src="'.$image.'" alt="'.$name.'">
                        </section>';
              }
          }
        ?>
    </div>
    <div class="grid-footer">
      <div class="info">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, eligendi commodi quibusdam aliquid ut quasi non impedit quo nam illum, corporis rem aut voluptatum blanditiis, et similique nulla. Iure laborum nihil doloribus. Sequi, quibusdam! Delectus eaque accusantium iusto ex magni iste numquam voluptatem quam incidunt a itaque, eligendi rerum sequi?</p>
      </div>
      <div class="contact">
        <p>Contact Us <br>Loremipsum@email.com<br>+63 92323567894</p>
      </div>
    </div>
  </div>
  
  <script>
    function openLoginPage() {
      window.location.href = "./login.php";
    }

    function openMainPage() {
      window.location.href = "./index.php";
    }

    // Initialize Variables
    var closePopup = document.getElementById("popupclose");
    var overlay = document.getElementById("overlay");
    var popup = document.getElementById("popup");
    var button = document.getElementById("anchortag_contact");
    // Close Popup Event
    closePopup.onclick = function() {
      overlay.style.display = 'none';
      popup.style.display = 'none';
    };
    // Show Overlay and Popup
    button.onclick = function() {
    overlay.style.display = 'block';
    popup.style.display = 'block';
  }
  </script>
</html>
