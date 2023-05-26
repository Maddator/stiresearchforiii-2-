<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="./About.css">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <!--Internal CSS for Pop Up Contact-->
  <style>
  #overlay {
  display: none;
  position: absolute;
  }

  #popup {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  background: #000000;
  width: 400px;
  height: 300px;
  margin-left: -200px;
  margin-top: -250px; 
  z-index: 200;
  }

  #popupclose {
  color: white;
  float: right;
  padding: 10px;
  cursor: pointer;
  }

  .popupcontent {
  color: white;
  padding: 10px;
  margin-top: 100px
  }

  </style>
</head>
<body>
    

<div class="banner">
    <div class="navigation">
      <img src="./images/logo.png" alt="logo" class="logo">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./About.php">About</a></li>
        <li><a href="#" id="anchortag_contact" >Contact</a></li>
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

      <button class="usrlogin" onclick="openLoginPage()">Login</button>
      <div class="hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>

    <center><div class="content">
        
            <h1>About</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing 
            elit. Ipsum neque totam aliquid, aperiam enim quos 
            asperiores officia architecto, nemo esse dignissimos 
            cupiditate possimus eveniet, praesentium suscipit 
            voluptatum sunt? Eaque, consequatur.</p>

          <div class="list">

            <br>
            <h2>Group Members</h2>
            
              Aparato, Ryan Ashley
              <br> Carino, Jovy
              <br> Cervera, Ralph Ivan
              <br> Macario, John Chris
              <br> Morales, Ralph
              <br> Valdrez, Jhanice
              <br> Velasco, Glenn

          </div>
    </div></center>

    <script>

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
    
</body>
</html>