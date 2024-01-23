<?php
session_start();
$error = isset($_GET['error']) ? $_GET['error'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];


  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $dbname = "aman_noora";

  $conn = new mysqli($servername, $db_username, $db_password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "SELECT * FROM user_details WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {

    $_SESSION["username"] = $username;
    header("Location: home.html");
  } else {
    echo '<script>alert("Invalid username or password");</script>';
  }

  $conn->close();
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>User Login</title>
  <link rel="stylesheet" href="styleL.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title" style="text-align: center;">AMAN User Login</div>
    <div class="content">
      <form action="index.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
        </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>
      </form>
      <a href="registration.php">Create New Acoount</a>
    </div>
  </div>
</body>

</html>