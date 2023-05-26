
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./login.css">
  <link rel="icon" type="image/x-icon" href="./images/logo.ico">
</head>
<body>
  <div class="login-form">
    <h2>Login</h2>
    <form action="./login.php" method="post">
      <input type="text" placeholder="Username" name="loginusername">
      <input type="password" placeholder="Password"  name="loginpassword">
      <input type="submit" name="loginsubmit" value="Login">
    </form>
    <p>Don't have an account? <a href="./register.php">Register</a></p>
    <?php
      if (isset($_POST["loginsubmit"])) {
        $username = $_POST["loginusername"];
        $password = $_POST["loginpassword"];
        $errors = array();

        if (empty($username) && empty($password)) {
          array_push($errors, "All fields are required");
        } else if (empty($username)) {
          array_push($errors, "Username is required");
        } else if (empty($password)) {
          array_push($errors, "Password is required");
        } else if (strlen($password) < 8 ) {
          array_push($errors, "Password must be at least 8 characters long");
        } 
        
        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<p>$error</p>";
          }
        } else {
          if ($username == "admin" && $password == "admin123") {
            header("Location: administrationpanel.php?admpanelallowed=true");
            exit;
          }

          include "database.php";

          $sql = "SELECT * FROM `users` WHERE username = ?";
          
          $stmt = $con->prepare($sql);
          $stmt->bind_param("s", $username);
          $stmt->execute();
          $result = $stmt->get_result();
          
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $rowpassword = $row['password'];
            if ($rowpassword == $password) {
              header("location: index.php?loggedin=true&usrname='.$username.'");
              exit;
            } else {
              array_push($errors, "Invalid password");
            }
          } else {
            array_push($errors, "Account doesn't exist");
          }
        }
      }
    ?>
  </div>
</body>
</html>