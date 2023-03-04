<?php

$conn =mysqli_connect("localhost", "root", "", "dfsms");

if(isset($_POST['userName']))
{
$AdminName = $conn->real_escape_string('Customer');
$UserName = $conn->real_escape_string($_POST['userName']);
$Email = $conn->real_escape_string($_POST['email']);
$MobileNumber = $conn->real_escape_string($_POST['mobile']);
$NIC = $conn->real_escape_string($_POST['nic']);
$Password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($Password, PASSWORD_DEFAULT);

$query = "INSERT into tbladmin(AdminName,UserName,Email,MobileNumber,NIC,Password) VALUES('" . $AdminName . "','" . $UserName . "','" . $Email . "','" . $MobileNumber . "','" . $NIC ."','" . $hashed_password ."')";
$success = $conn->query($query);

if (!$success){
	die("Couldnt enter data: ".$conn->error);
}
else{
    echo "<script>alert('User added successfully.');</script>";   
echo "<script>window.location.href='signup.php'</script>";
}
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FuelIn | Sign Up</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" style="width:200px; height:52px;" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./about-us.html">About</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
                <a href="http://localhost/FuelIn/dfsms/index.php" class="primary-btn">Sign In</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/headerimg2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Sign Up</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                            <span>Sign Up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Register Section Begin -->
    <section class="register-section classes-page spad">
        <div class="container">
            <div class="classes-page-text">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="register-text">
                            <div class="section-title">
                                <h2>Register Now</h2>
                            </div>
                            <form class="register-form" method="post" novalidate>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name">User Name*</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="User Name" id="userName" name="userName" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">Your email address*</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="User Email" name="email" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last-name">NIC*</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="User NIC" name="nic" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mobile">Mobile No*</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="Mobile Number" name="mobile" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="password">Password*</label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="register-btn">Get Started</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="register-pic">
                            <img src="img/register-pic.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>UNLIMITED SERVICES</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-1.jpg">
                        <div class="si-text">
                            <h4>Oil Mines</h4>
                            <!-- <span><i class="fa fa-user"></i> Ryan Knight</span> -->
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-4.jpg">
                        <div class="si-text">
                            <h4>Fuel Transport</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-2.jpg">
                        <div class="si-text">
                            <h4>Fuel</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-5.jpg">
                        <div class="si-text">
                            <h4>Fuel Bowsers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-3.jpg">
                        <div class="si-text">
                            <h4>Fuel Stations</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-6.jpg">
                        <div class="si-text">
                            <h4>Oil Mines</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-7.jpg">
                        <div class="si-text">
                            <h4>Fuel Pump</h4>
                        </div>
                    </div>
                    <div class="single-class-item set-bg" data-setbg="img/classes/classes-8.jpg">
                        <div class="si-text">
                            <h4>Fuel Ships</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-banner-item set-bg" data-setbg="img/footer-banner/footer1.jpg">
                        <span>New member</span>
                        <h2>7 days for free</h2>
                        <p>Complete the training sessions with us, surely you will be happy</p>
                        <a href="#" class="primary-btn">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-banner-item set-bg" data-setbg="img/footer-banner/footer2.jpg">
                        <span>contact us</span>
                        <h2>09 746 204</h2>
                        <p>If you trust us on your journey they dark sex does not disappoint you!</p>
                        <a href="#" class="primary-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Banner Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-option">
                        <span>Phone</span>
                        <p>(123) 118 9999 - (123) 118 9999</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-option">
                        <span>Address</span>
                        <p>72 Kangnam, 45 Opal Point Suite 391</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-option">
                        <span>Email</span>
                        <p>contactcompany@Gutim.com</p>
                    </div>
                </div>
            </div>
            <div class="subscribe-option set-bg" data-setbg="img/footer-signup.jpg">
                <div class="so-text">
                    <h4>Subscribe To Our Mailing List</h4>
                    <p>Sign up to receive the latest information </p>
                </div>
                <form action="#" class="subscribe-form">
                    <input type="text" placeholder="Enter Your Mail">
                    <button type="submit"><i class="fa fa-send"></i></button>
                </form>
            </div>
            <div class="copyright-text">
                <ul>
                    <li><a href="#">Term&Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
                <p>&copy;<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
                <div class="footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>