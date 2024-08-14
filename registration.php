<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $databaseHost = 'localhost';
  $databaseName = 'room_rent';
  $databaseUsername = 'root';
  $databasePassword = '';

  $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];

  $sql = "INSERT INTO `login_data`(`full_name`, `email`, `phone_number`, `password`, `gender`) VALUES ('$full_name','$email','$phone_number','$password','$gender')";
  if (mysqli_query($conn, $sql)) {
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <div class="container">
    <div class="title">Registration</div>
    <div class="massage" id="massage">
        <p>Registration is Successfull! Continue with <a href="login.php">Log in</a></p>
      </div>
    <div class="content">
       <form action="" method="POST">
        <div id="user-details" class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="full_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone_number" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Others">
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
              <span class="gender">Others</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
      <p>Already registered? <a href="login.php">Log in</a></p>
    </div>
  </div>
  <script>
       const regForm = document.querySelector('form');
    const alertMsg = document.getElementById('massage');

    regForm.addEventListener('submit', function(event) {
      event.preventDefault(); 
      alertMsg.classList.add('show'); 
      regForm.style.opacity = '0.5'; 
      setTimeout(function() {
        regForm.submit(); 
      }, 2000);
      setTimeout(function() {
        alertMsg.classList.remove('show'); 
        regForm.style.opacity = '1'; 
      }, 5000);
    });
  </script>
</body>

</html>