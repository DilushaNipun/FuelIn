<?php
session_start();
?>

<html>

  <head>
    
    <title> About | FuelIn </title>
    <style >
        
    </style>
    
  </head>

  <link rel="stylesheet" type = "text/css" href ="dist/css/aboutus.css">
  <link rel="stylesheet" type = "text/css" href ="dist/css/bootstrap.min.css">
  <script type="text/javascript" src="dist/js/jquery.min.js"></script>
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>

  <body style="background-image:url('dist/img/headerimg1.JPG'); background-size:cover; background-color:black; opacity:0.9; ">

  
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

      /*function initMap() {
       // The location of Uluru
      var sl = {lat: 6.927079, lng: 79.861244};
       
      var map = new google.maps.Map(
      document.getElementById("map"), {zoom: 6, center: sl});
        // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: sl, map: map});


      }*/
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Speedy Foods</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
            (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
            </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              
          
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>

            </ul>
            </li>
          </ul>

<?php
}
?>
        </div>

      </div>

    </nav>
    
<div class="card">
  <div class="wide">
        <div class="tagline">It's not our <font color="red"><strong>work life</strong></font>, it's our <font color="green"><strong><em>life's work</em>.</strong></font></div>
        <h3 style="color: white " align="center">About the food culture in Speedy Foods</h3>
        <br>
        <h3 style="color: white" align="center">Order food & beverages online from restaurants near & around you. <h3 style="color: white" align="center">There are variety of food range according to your preference at our restaurants </h3><h3 style="color : white" align="center">We are ready to deliver them to your doorstep, our service is available within 24/7 hours.</h3><h3 style="color : white" align="center"> Why do you waiting for? Don't miss the chance. Grab the opportunity NOW!!</h3></h3>
      </h3><h3 style="color : white" align="center">Simply plcae yuor order through our <font color="yellow"><strong>"Speedy Foods"</strong></font> website,mobile app or contact our hotlines <font color="yellow"><strong>0112-385789/0112-789658.</strong></font> <h3 style="color: white" align="center">It's always open for you....</h3>
    </div>
</div>

    

        

        <a href="https://www.google.com/maps/place/"><img src="images/maps.png" class="rounded-circle" style="width: 400px; height: 200px; padding-left: 77px; padding-bottom: 10px; margin-top: 10px;"></a>

        

         </body>
</html>