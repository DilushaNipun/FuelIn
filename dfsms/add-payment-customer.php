<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add product Code
if(isset($_POST['submit']))
{
//Getting Post Values
$Customer_NIC=$_POST['customerNIC']; 
$Customer_Email=$_POST['customerEmail'];   
$Token_ID=$_POST['tokenID'];
$Payment_Amount=$_POST['paymentAmount'];
$query=mysqli_query($con,"insert into tblpayments(Customer_NIC,Customer_Email,Token_ID,Payment_Amount) values('$Customer_NIC','$Customer_Email','$Token_ID','$Payment_Amount')"); 
if($query){
echo "<script>alert('Payment successfull.');</script>";   
echo "<script>window.location.href='manage-payment.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add-payment.php'</script>";    
}
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Make Payment</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar-customer.php');
include_once('includes/sidebar-customer.php');
?>
       


        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Payment</a></li>
<li class="breadcrumb-item active" aria-current="page">Make Payment</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Make Payment</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>


<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Customer NIC</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Customer NIC" name="customerNIC" required>
<div class="invalid-feedback">Please provide a valid customer NIC.</div>
</div>
<div class="col-md-6 mb-10">
<label for="validationCustom03">Customer Email</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Email" name="customerEmail" required>
<div class="invalid-feedback">Please provide a valid email.</div>
</div>
</div>
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Token ID</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Token ID" name="tokenID" required>
<div class="invalid-feedback">Please provide a valid customer NIC.</div>
</div>
<div class="col-md-6 mb-10">
<label for="validationCustom03">Payment Amount</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Payment Amount" name="paymentAmount" required>
<div class="invalid-feedback">Please provide a valid email.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
    <label for="validationCustom03">Payment Mode</label>
<div class="custom-control custom-radio mb-10">
<input type="radio" class="custom-control-input" id="customControlValidation2" name="paymentmode" value="cash" required>
<label class="custom-control-label" for="customControlValidation2">Cash</label>
</div>
<div class="custom-control custom-radio mb-10">
<input type="radio" class="custom-control-input" id="customControlValidation3" name="paymentmode" value="card" required>
<label class="custom-control-label" for="customControlValidation3">Card</label>
</div>
</div>
</div>
</div>
</div>

<button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>
</div>
</div>
</section>
                     
</div>
</div>
</div>
<!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>

</body>
</html>
<?php } ?>