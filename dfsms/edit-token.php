<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Edit product Code
if(isset($_POST['update']))
{
$pid=substr(base64_decode($_GET['pid']),0,-5);    
//Getting Post Values
$GivenQuota=$_POST['givenQuota'];    
$VehicleNo=$_POST['vehicleNo'];
$FuelType=$_POST['fuelType'];
$Issued_Quantity=$_POST['issuedQuantity'];
(int)$RemainFuelQuota = $GivenQuota - $Issued_Quantity;
$query=mysqli_query($con,"update tbltoken set Given_Quota='$GivenQuota',Remain_Fuel_Quota='$RemainFuelQuota',Vehicle_No='$VehicleNo',Fuel_type='$FuelType',Issued_Quantity='$Issued_Quantity' where Token_ID='$pid'"); 


if($query){
    echo "<script>alert('Token updated successfully.');</script>";   
    echo "<script>window.location.href='manage-token.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. Please try again.');</script>";   
    echo "<script>window.location.href='edit-token.php'</script>";    
    }
    

}


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edit Token</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Token</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Token</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
<?php
$pid=substr(base64_decode($_GET['pid']),0,-5);
$query=mysqli_query($con,"select * from tbltoken where Token_ID='$pid'");
while($result=mysqli_fetch_array($query))
{    
?> 
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Vehicle Number</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Vehicle_No'];?>" name="vehicleNo" required>
<div class="invalid-feedback">Please provide a valid Vehicle Number.</div>
</div>
</div>   

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Type</label>
<select class="form-control custom-select" name="fuelType" required>
 <option value="<?php echo $result['Fuel_type'];?>"><?php echo $result['Fuel_type'];?></option>
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
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Given_Quota'];?>" name="givenQuota" required>
<div class="invalid-feedback">Please provide a valid Quota Limit.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Quantity</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Issued_Quantity'];?>" name="issuedQuantity" required>
<div class="invalid-feedback">Please provide a valid Fuel Quantity.</div>
</div>
</div>

<?php } ?>
<a href="manage-token.php"><button class="btn btn-secondary" type="button" name="back">Back</button></a>
<button class="btn btn-primary" type="submit" name="update">Update</button>
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