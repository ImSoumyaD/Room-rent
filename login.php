<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "room_rent";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login_data WHERE phone_number = '".$phone."' AND password = '".$password."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        header("location: index2.html");
    } else {
        $error = "Invalid Phone or Password";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">Login</div>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="field">
                <input type="text" id="phone" name="phone" required>
                <label>Phone Number</label>
            </div>
            <div class="field">
                <input type="password" id="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Log in">
            </div>
            <div class="signup-link">Not a member? <a href="registration.php">Register now</a></div>
        </form>
    </div>
</body>

</html>
