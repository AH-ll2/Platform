<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "platform";
$conn = mysqli_connect($db_host, $db_username, $db_password,$db_name);
if (!$conn) {
die("Database connection failed: " .mysqli_connect_error());
}
?>
<?php
session_start();
require_once 'login.php'; // Include the database connection script


if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST['fname'];
$password = $_POST['password'];

$sql = "SELECT id,password FROM user2 WHERE fname = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row !=null){
$stored_password = $row['password'];

// فك تشفير كلمة المرور المستردة ومقارنتها بالقيمة المدخلة من قبل المستخدم
if (password_verify($password, $stored_password)) {
 
  $_SESSION['user_id'] = $row['id'];
  header("Location: platform.php");

} else {
  echo "Invalid password or username";
}

mysqli_close($conn);

}
else{
echo "البيانات غير صحيحة
";
}

}
?>

 

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
   
    <title>Login</title>
    <style>
    body{
      background-image:url('image/111.jpg');
       background-repeat:no-repeat;
       padding-left: 35%;
       padding-top: 6%;
       font-family: sans-serif;
    }
      h3{
    font-size:40px;
    color:#8f95ee;
    }
    input{
    width:95%;
    padding:8px ;
    font-size:20px;
    border-radius:5px;
    color:black;
    border-color:white;
    margin-top: 5%;
    }
      .submit{
        width:105%;
        font-size:20px;
        border-radius:13px;
        color: white;
        padding: 8px;
        background-color:#8f95ee;
        text-align: center;
        border-color:#8f95ee;
        padding: 12px;
        margin-top: 10%;
      }
      .login{
        border-radius:15px;
        width:330px;
        height:500px;
        padding:20px;
      }
      .login:hover{
        box-shadow:3px 3px 30px #8f95ee;
      }
      .login a{
        color:#8f95ee ;
      }
      .icoon p{
      display: inline-block;
      width: 45px;
      height: 45px;
      line-height: 45px;
      font-size: 25px;
      color: #8f95ee;
      text-align: center;
      background-color: rgba(102, 181, 181, 0.2);
      margin-top: 15px;
    }
    </style>
  </head>
  <body >
    <center>
    <div class="container" data-aos="zoom-in">
    <div class="login">
      <h3>Sign Up</h3>
      <a href="platform.php"><i class="fa-solid fa-house"></i></i></a>
      <form action="login.php" method="post">
    <table >
      <tr>
        <td><input type="text" name="fname" required placeholder="User_name" ></td>
      </tr>

      <tr>
        <td><input type="password" name="password" required placeholder="Enter your Password"></td>
      </tr>

      <tr>
       <td><input class="submit" type="submit" name="login" value="Login"></td>
      </tr>

    </table>
    </form>
         <p align="center"> Create new account?</p>
         
          <div class="icoon" id="icoon">
            <p><a href="login2.php"><i class="fa-brands fa-google"></i></a></p>
            <p><a href="login2.php"><i class="fa-brands fa-yahoo"></i></a></p>
            <p><a href="login2.php"><i class="fa-solid fa-cloud"></i></a></p>
          </div>
    </div>
    </div>
  <!-- تحديد تأثيرات AOS js على العناصر -->
  <script>
    AOS.init();
  </script>


  
  </body>
</html>
