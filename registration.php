<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $email = $_POST["email"];
  $fullName = $_POST["fullName"];
  $dob = $_POST["dob"];
  $city = $_POST["city"];
  $country = $_POST["country"];
  $phoneNumber = $_POST["phoneNumber"];
  $gender = $_POST["gender"];

  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $dbname = "aman_noora";

  $conn = new mysqli($servername, $db_username, $db_password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $check_username_sql = "SELECT * FROM user_details WHERE username = '$username'";
  $result = $conn->query($check_username_sql);

  if ($result->num_rows > 0) {

    echo "<script>alert('Username already taken. Please choose a different username.'); window.location.href='registration.php';</script>";
    exit();
  }


  $insert_sql = "INSERT INTO user_details (username, password, email, fullName, dob, city, country, phoneNumber, gender)
                   VALUES ('$username', '$password', '$email', '$fullName', '$dob', '$city', '$country', '$phoneNumber', '$gender')";

  if ($conn->query($insert_sql) === TRUE) {
    header("Location: index.php");
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel="stylesheet" href="styleR.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title" style="text-align: center;">AMAN User Registration</div>
    <div class="content">
      <form action="registration.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="confirmPassword" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="fullName" required>
          </div>
          <div class="input-box">
            <span class="details">DOB</span>
            <input type="date" placeholder="2001-01-01" name="dob" required>
          </div>

          <div class="input-box">
            <span class="details">City</span>
            <input type="text" placeholder="Enter your city" name="city" required>
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" placeholder="Enter your Country" name="country" required>
          </div>


          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneNumber" required>
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>

</html>