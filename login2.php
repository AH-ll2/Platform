<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "platform";
$conn = mysqli_connect($db_host, $db_username, $db_password,$db_name);
if (!$conn) {
die("Database connection failed: " .mysqli_connect_error());
}

session_start();
require_once 'login2.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$firstname = $_POST['fname'];
$secondname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$conf_password= $_POST['conf_password'];

if($password !=$conf_password ){
  echo " Password does not match ";
  exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// Insert user details into the database
$sql = "INSERT INTO user2( `fname`, `lname`, `phone`, `email`, `password`) VALUES ('$firstname ','$secondname ','$phone ','$email','$hashedPassword')";

if (mysqli_query($conn, $sql)) {
  $stayLoggegIn = isset ($_POST['stay_logged_in'])&& $_POST['stay_logged_in'] ==1;
  $expireTime = $stayLoggegIn ? time() +(86400 *30 ): 0;
// Set a cookie for authentication
setcookie("user_id", mysqli_insert_id($conn), time() + (86400 * 30), "/");
header("Location: platform.php"); // Redirect to the main application page
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <title></title>
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
   

  </head>
  <body >
    <div class="login">
    
    <center>
    <div data-aos="fade">
    <h3>Sign Up</h3>
    <a href="platform.php" ><i class="fa-solid fa-house"></i></a>
    <form action="login2.php" method="post">
      <table class="d0">
      <tr>

      <td> <input type="text" required placeholder="First Name" name="fname"></td>
      <td> <input type="text" required placeholder="Last Name" name="lname"></td>
     </tr>
     </table>
    <div class="d">
      <br><br>
      <input type="number" required placeholder="Phone" name="phone">
      <br><br>
      <input type="email" required placeholder="Email" name="email">
      <br><br>
      <input type="password" required placeholder="Password" name="password">
      <br><br>
      <input type="password" required placeholder="Confirm Password" name="conf_password">
      
    <div class="d3">
        <input type="checkbox" name="Stay_Login" class="col" >Stay Login</td>
    <br><br></div>
    <input class="submit" type="submit" name="Sign_up" value="SignUp" >
    </div>
    </div>
    </form>
</div>
    <br><center>

    <div class="d3">
    <p>Copyright &copy platform.com
      <script>
      AOS.init({
        duration:1000,
        easing :'ease-in-out',
        delay:40,
        once:true
      });
      </script>




  </body>
</html>
