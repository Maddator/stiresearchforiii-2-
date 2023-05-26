<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./register.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.ico">
</head>
<body>
  <div class="register-form">
    <h2>Register</h2>
    <form action="./register.php" method="post">
      <input type="text" placeholder="Username" name="regusername">
      <input type="password" placeholder="Password" name="regpassword">
      <input type="submit" value="Register" name="regsubmit">
    </form>
    <p>Already have an account? <a href="./login.php">Login</a></p>
    <?php
      if (isset($_POST["regsubmit"])) {
        $username = $_POST["regusername"];
        $password = $_POST["regpassword"];
        $errors = array();

        if (empty($username) && empty($password)) {
          array_push($errors, "All fields are required");
        } else if (empty($username)) {
          array_push($errors, "Username is required");
        } else if (empty($password)) {
          array_push($errors, "Password is required");
        } else if (strlen($password) < 8) {
          array_push($errors, "Password must be at least 8 characters long");
        } 
        
        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<p>$error</p>";
          }
        } else {
          require_once "database.php";
          $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
          $stmt = mysqli_stmt_init($con);
          $prepare = mysqli_stmt_prepare($stmt, $sql);
          
          if ($prepare) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            echo "<p>Successfully Registered</p>";
            header("Location: ./login.php");
            exit; 
          }
        }
      }
    ?>
  </div>
</body>
</html>