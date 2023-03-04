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
    
    $Token_ID=$_POST['tokenId'];   
    $GivenQuota=$_POST['givenQuota']; 
    $EstiTime=$_POST['estiTime'];
    $VehicleNo=$_POST['vehicleNo'];
    $FuelType=$_POST['fuelType']; 
    $Issued_Quantity=$_POST['issuedQuantity'];
    (int)$RemainFuelQuota = $GivenQuota - $Issued_Quantity;
    $query=mysqli_query($con,"insert into tbltoken(Token_ID,Given_Quota,Remain_Fuel_Quota,Vehicle_No,Fuel_type,Issued_Quantity,Esti_Time) values('$Token_ID','$GivenQuota','$RemainFuelQuota','$VehicleNo','$FuelType','$Issued_Quantity','$EstiTime')");
//Getting Post Values

if($query){
echo "<script>alert('Token added successfully.');</script>";   
echo "<script>window.location.href='add-token.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add-token.php'</script>";    
}
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Token</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar-Station.php');
include_once('includes/sidebar-station.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Token</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Token</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Token</h4>
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
<label for="validationCustom03">Token Id</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Token Id" name="tokenId" required>
<div class="invalid-feedback">Please provide a valid Token Id.</div>
</div>
</div> 

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Vehicle Number</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Vehicle Number" name="vehicleNo" required>
<div class="invalid-feedback">Please provide a valid Vehicle Number.</div>
</div>
</div> 

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Type</label>
 <select class="form-control custom-select" name="fuelType" required>
<option value="">Select Fuel Type</option>
<?php
$ret=mysqli_query($con,"select CategoryName from tblcategory");
while($row=mysqli_fetch_array($ret))
{?>
<option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
<?php } ?>
</select>
<div class="invalid-feedback">Please select a Fuel Type.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Quota Limit</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Fuel Quota" name="givenQuota" required>
<div class="invalid-feedback">Please provide a valid Fuel Quota.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Issued Fuel Quantity</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Issued Fuel Quantity" name="issuedQuantity" required>
<div class="invalid-feedback">Please provide a valid Fuel Quantity.</div>
</div>
</div>
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Token Expire Date</label>
<input class="form-control" type="date" name="estiTime" required  />
<div class="invalid-feedback">Please provide a valid date.</div>
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