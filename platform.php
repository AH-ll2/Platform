
<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "platform";
$conn = mysqli_connect($db_host, $db_username, $db_password,$db_name);
if (!$conn) {
die("Database connection failed: " .mysqli_connect_error());
}
if(session_start() == PHP_SESSION_NONE){
  session_start();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $_POST['message'];
    
    // تأكد من أن البريد الإلكتروني وكلمة المرور والرسالة غير فارغة
   if(!empty($email) && !empty($password) && !empty($message)) {
        // تخزين معلومات العميل في متغيرات الجلسة
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        
        // إرسال رسالة البريد الإلكتروني باستخدام PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom($email);
            $mail->addAddress('ahlamy200152@gmail.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'رسالة بريد إلكتروني من خدمة العملاء';
            $mail->Body = $message;

            $mail->send();
            echo 'تم إرسال الرسالة بنجاح!';
        } catch(Exception $e) {
            echo 'حدث خطأ أثناء إرسال الرسالة: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'يرجى ملء جميع الحقول!';
    }
} else {
    // عرض الصفحة الأولى
    include 'platform.php';
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PLATFORM</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body>
    <header>

    <i class="fa-solid fa-graduation-cap"></i>
    <ul>
        <li ><a href="#home">HOME</a></li>
        <li><a href="#container1">CONTENT US</a></li>
        <li><a class="bto" href="login.php">LOGIN</a></li>
    </ul>
     </header>
   <!--Start Setting Box -->
   <div class="Setting-box open">
        <div class="toggle-settings">
        <i class="fas fa-cog"></i>
        </div>
        <div class="Settings-container">
             <div class="Option-box">
                <h4>Colors</h4>
                <ul class="colors-list">
                    <li class="active" data-color="#d69c1f"></li>
                    <li data-color="#e91e63"></li>
                    <li data-color="#009688"></li>
                    <li data-color="#03A9f4"></li>
                    <li data-color="#4caf50"></li>
                    <li data-color="#171717"></li>
                    
                </ul>
            </div>  
        </div>
      </div>
     <!-- Start Body -->
    <div class="Body0">
      <div class="container">
        <div class="text">
          <h1>Welcome, To Learning</h1>
          <h2>Learning that fits</h2>
          <p>skills for your present (and future)</p>
          </div>

       </div>
    </div>
      <div class="home" id="home">
      <div class="button">

     <p class="inline" ><h2>Categories</h2> <a class="inl" href="#">See All</a></p>
     <a class="bto" href="#Development">Development</a>
     <a class="bto" href="#IT & Software">IT & Software</a>
     <a class="bto" href="#Business">Business</a>
       <a class="bto" href="#Health & Fitness">Health & Fitness</a>
       <a class="bto" href="#Photography">Photography</a>
      </div>
      <br><br><br>

      <div class="Development" id="Development">

      <h2 class="title">Top Courses in <p class="blue"> Development</p></h2>
      <div class="container">
        <div class="box">
          <img src="image/9.jpg" alt="" />
          <div class="content">
            <h3>Java Swing (GUI)  </h3>
            <p>John Purcell</p>
          </div>

            <div class="star">
              <i class="red" >4.6</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(2,452)</i>
              </div>
          <div class="prices">
            <p>$34.99</p>
          </div>
          <div class="best">
            <button type="" name="">Bestseller</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
        <div class="box">
          <img src="image/7.jpg" alt="" />
          <div class="content">
            <h3>Learn To Program With Delphi and Object Pascal  </h3>
            <p>Huw Collingbourne</p>
          </div>
         
            <div class="star">
              <i class="red">4.6</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(725)</i>
              </div>
          
          <div class="prices">
            <p>$89.99</p>
          </div>
          <div class="best">
            <button type="" name="">Bestseller</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>

        <div class="box">
          <img src="image/12.jpg" alt="" />
          <div class="content">
            <h3>Step-by-step HTML and CSS for Absolute Beginners </h3>
            <p>John Purcell</p>
          </div>
        
            <div class="star">
              <i class="red">4.8</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(1,536)</i>
              </div>
          
          <div class="prices">
            <p>$84.99</p>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
        <div class="box">
          <img src="image/34.jpg" alt="" />
          <div class="content">
            <h3>The Ultimate Excel Programmer Course  </h3>
            <p>Daniel Strong</p>
          </div>
          
            <div class="star">
              <i class="red">4.7</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(15,851)</i>
              </div>
          
          <div class="prices">
            <p>$84.99</p>
          </div>
          <div class="best">
            <button type="" name="">Bestseller</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>

            <div class="box">
              <img src="image/a.png" alt="" />
              <div class="content">
                <h3>Learn HTML5 Programming From Scrach</h3>
                <p>Eduionx Learning Solution</p>
              </div>
            
            <div class="star">
              <i class="red">4.3</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(14,647)</i>
              </div>
              
              <div class="prices">
                <p>$24.99</p>
              </div>
              <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
            </div>
        <div class="box">
          <img src="image/22.jpg" alt="" />
          <div class="content">
            <h3>1 Hour HTML </h3>
            <p>John Bura</p>
          </div>
         
            <div class="star">
              <i class="red">4.7</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(3,376)</i>
              </div>
         
          <div class="prices">
            <p>$84.99</p>
          </div>
          <div class="best">
            <button type="" name="">Bestseller</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
      <br><br><br><br>
      <div class="IT & Software" id="IT & Software">

        <h2 class="title">Top Courses in <p class="blue"> IT & Software</p></h2>
        <div class="container">
          <div class="box">
            <img src="image/16.jpg" alt="" />
            <div class="content">
              <h3>Unix F or Beginner  </h3>
              <p>Skill Tree</p>
            </div>
           
              <div class="star">
                <i class="red">4.5</i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="gray">(239)</i>
                </div>
           
            <div class="prices">
              <p>$74.99</p>
            </div>
            <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
          </div>
          <div class="box">
            <img src="image/11.jpg" alt="" />
            <div class="content">
              <h3>MPLS Layer 3V </h3>
              <p>sikandar Shaik</p>
            </div>
              <div class="star">
                <i class="red">4.6</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(932)</i>
            </div>
            <div class="prices">
              <p>$19.99</p>
            </div>
            <div class="best">
              <button type="" name="">Highest Rated</button>
            </div>
            <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
          </div>

          <div class="box">
            <img src="image/14.jpg" alt="" />
            <div class="content">
              <h3>Data Modeling and Relation Database Design</h3>
              <p>Haris Kilikoton</p>
            </div>
              <div class="star">
                <i class="red">4.5</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(4,256)</i>
              </div>
            <div class="prices">
              <p>$49.99</p>
            </div>
            <div class="best">
              <button type="" name="">Highest Rated</button>
            </div>
            <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
          </div>
          <div class="box">
            <img src="image/13.jpg" alt="" />
            <div class="content">
              <h3>Cisco CCNA 200-301- Your Guide to Passing - 2022  </h3>
              <p>Matt Carey</p>
            </div>
              <div class="star">
                <i class="red">4.7</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(1,375)</i>
              </div>
            <div class="prices">
              <p>$19.99</p>
            </div>
            <div class="best">
              <button type="" name="">Highest Rated</button>
            </div>
            <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
          </div>

              <div class="box">
                <img src="image/8.jpg" alt="" />
                <div class="content">
                  <h3>Oracle Golden Gate 12c database replication</h3>
                  <p>Javier Morales Carreras</p>
                </div>
                  <div class="star">
                    <i class="red">4.7</i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="gray">(173)</i>
                  </div>

                <div class="prices">
                  <p>$79.99</p>
                </div>
                <div class="best">
                  <button type="" name="">Highest Rated</button>
                </div>
                <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
              </div>
          <div class="box">
            <img src="image/27.jpg" alt="" />
            <div class="content">
              <h3>Virtual Private Networks for beginners - VPN  </h3>
              <p>Marious Kuriate</p>
            </div>
              <div class="star">
                <i class="red">4.5</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(1,420)</i>
              </div>
            <div class="prices">
              <p>$24.99</p>
            </div>
            <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
          </div>
      </div>
    </div>
    <br><br><br><br>
    <div class="Business" id="Business">

      <h2 class="title">Top Courses in <p class="blue"> Business</p></h2>
      <div class="container">
        <div class="box">
          <img src="image/4.jpg" alt="" />
          <div class="content">
            <h3>Amazon FBA Beginners Course </h3>
            <p>William </p>
          </div>
            <div class="star">
              <i class="red">4.6</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(919)</i>
              </div>
          <div class="num">
            <p></p>
          </div>
          <div class="prices">
            <p>$19.99</p>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
        <div class="box">
          <img src="image/33.jpg" alt="" />
          <div class="content">
            <h3>Crisis Intervention SEminar  </h3>
            <p>Paul R.king</p>
          </div>
            <div class="star">
                <i class="red">4.6</i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="filled fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="gray">(378)</i>
                </div>
          <div class="prices">
            <p>$49.99</p>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
        <div class="box">
          <img src="image/5.jpg" alt="" />
          <div class="content">
            <h3>Direction The Actor:A USC course with Nina Foch  </h3>
            <p>Nina Foch, Randal Kleiser</p>
          </div>
            <div class="star">
              <i class="red">4.8</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(1,127)</i>
              </div>
          <div class="prices">
            <p>$24.99</p>
          </div>
          <div class="best">
            <button type="" name="">Bestseller</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
        <div class="box">
          <img src="image/6.jpg" alt="" />
          <div class="content">
            <h3>International Expansion</h3>
            <p>Anthony Gioeli</p>
          </div>
            <div class="star">
              <i class="red">4.6</i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="filled fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="gray">(1,218)</i>
              </div>
          <div class="prices">
            <p>$79.99</p>
          </div>
          <div class="best">
            <button type="" name="">Highest Rated</button>
          </div>
          <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>

            <div class="box">
              <img src="image/24.jpg" alt="" />
              <div class="content">
                <h3>Product Management 101</h3>
                <p>Todd Birzer</p>
              </div>
                <div class="star">
                  <i class="red">4.6</i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="gray">(13,843)</i>
                  </div>
              <div class="prices">
                <p>$59.99</p>
              </div>
              <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
            </div>

            <div class="box">
              <img src="image/19.jpg" alt="" />
              <div class="content">
                <h3>Customer Success</h3>
                <p>Chuck Wallr</p>
              </div>
                <div class="star">
                  <i class="red">4.6</i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="filled fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="gray">(2,911)</i>
                  </div>
              <div class="prices">
                <p>$34.99</p>
              </div>
              <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
            </div>
       </div>
    </div>
    <br><br><br><br>
    <div class="Health & Fitness" id="Health & Fitness">

    <h2 class="title">Top Courses in <p class="blue"> Health & Fitness</p></h2>
    <div class="container">
      <div class="box">
        <img src="image/30.jpg" alt="" />
        <div class="content">
          <h3>Introductory Sport Psychology </h3>
          <p>Michelle Pain</p>
        </div>

          <div class="star">
            <i class="red">4.3</i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="gray">(304)</i>
            </div>
        <div class="prices">
          <p>$69.99</p>
        </div>
        <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
      </div>
      <div class="box">
        <img src="image/20.jpg" alt="" />
        <div class="content">
          <h3>Introduction to CBT (Fully Accredited) </h3>
          <p>Kevin O'Doherty</p>
        </div>
        
          <div class="star">
            <i class="red">4.3</i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="gray">(248)</i>
            </div>
        
        <div class="prices">
          <p>$19.99</p>
        </div>
        <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
      </div>
      <div class="box">
        <img src="image/18.jpg" alt="" />
        <div class="content">
          <h3>Learn Miliitary Close Combat Training  </h3>
          <p>Chris Pizzo</p>
        </div>
        
          <div class="star">
            <i class="red">4.6</i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="gray">(2,431)</i>
            </div>
       
        <div class="prices">
          <p>$84.99</p>
        </div>
        <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
      </div>
      <div class="box">
        <img src="image/17.jpg" alt="" />
        <div class="content">
          <h3>14-Day Yoga Detox and Empowerment Course  </h3>
          <p>Sadie Nardini</p>
        </div>
       
          <div class="star">
            <i class="red">4.4</i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="filled fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="gray">(849)</i>
            </div>
        <div class="prices">
          <p>$29.99</p>
        </div>
        <div class="best">
          <button type="" name="">Bestseller</button>
        </div>
        <div class="youtube">
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
          </div>
      </div>
    </div>


  <br><br><br><br>

  <div class="container1" id="container1">
  <div class="card mb-8">
  <div class="row no-gutters">
    <div class="col" >
      <img src="image/1001.jpg" class="card-img" alt="...">
    </div>
    <div class="col">
      <div class="card-body">
        <h3 class="card-title"><center>Content US</h3>
              <form action ="platform.php" metod="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="exampleInputMassage">Massage</label>
         <textarea class="form-control" name="message"></textarea>
        </div><br>
        <button type="submit" class="btn btn-primary h-100">Send</button>
      </form>

      </div>
    </div>
  </div>
</div>
 </div>

    <div class="footer">
    <footer class="bg-light text-center text-lg-start">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(240, 240, 240, 0.5);">
        © 2023 Creat By:
        <p class="text-dark">AHLAM NOOFAL & AYA GALAL</p>
      </div>
      <!-- Copyright -->
    </footer>
    </div>

  <div class="reaload">
    <div class="loader">
      <img src="image/45.gif" alt="Loading" />
    </div>
  </div>
  <a href="#" class="backBut" title=""><i class="fa fa-chevron-up"></i></a>

 <!-- Bootstrap JavaScript -->

  <script src="js/stylescript.js"></script>
  <script src="js/jquery-3.7.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
