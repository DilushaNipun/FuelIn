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
$cmpid=substr(base64_decode($_GET['compid']),0,-5);
//Getting Post Values  
$Fuel_Quota=$_POST['fuelQuota'];   
$Fuel_Type=$_POST['fuelType'];   
$Vehi_Type=$_POST['vehType'];   
$Customer_NIC=$_POST['customerNIC'];
$query=mysqli_query($con,"update tblvehicle set Fuel_Quota='$Fuel_Quota',Fuel_Type='$Fuel_Type',Vehi_Type='$Vehi_Type',Customer_NIC='$Customer_NIC' where Vehi_No='$cmpid'"); 

if($query){
    echo "<script>alert('vehicle updated successfully.');</script>";   
    echo "<script>window.location.href='manage-vehicle.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. Please try again.');</script>";   
    echo "<script>window.location.href='edit-vehicle.php'</script>";    
    }
    
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edit Vehicle</title>
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
<li class="breadcrumb-item"><a href="#">Vehicle</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Vehicle</h4>
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
$cmpid=substr(base64_decode($_GET['compid']),0,-5);
$query=mysqli_query($con,"select * from tblvehicle where Vehi_No='$cmpid'");
while($result=mysqli_fetch_array($query))
{    
?> 
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Vehicle Number</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Vehi_No'];?>" name="VehiNo" disabled="disabled" required>
<div class="invalid-feedback">Please provide a valid Vehicle Number.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Vehicle Type</label>
<select class="form-control custom-select" name="vehType" required>
 <option value="<?php echo $result['Vehi_Type'];?>"><?php echo $result['Vehi_Type'];?></option>
    <option value="Car">Car</option>
	<option value="Van">Van</option>
	<option value="Heavy Vehicle">Heavy Vehicle</option>
	<option value="Motor Bicycle">Motor Bicycle</option>
	<option value="Three Wheeler">Three Wheeler</option>
</select>
<div class="invalid-feedback">Please select a Fuel Type.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Type</label>
<select class="form-control custom-select" name="fuelType" required>
 <option value="<?php echo $result['Fuel_Type'];?>"><?php echo $result['Fuel_Type'];?></option>
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
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Fuel_Quota'];?>" name="fuelQuota" required>
<div class="invalid-feedback">Please provide a valid Quota Limit.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Customer NIC</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $result['Customer_NIC'];?>" name="customerNIC" required>
<div class="invalid-feedback">Please provide a valid Customer NIC.</div>
</div>
</div>

<?php } ?>
<a href="manage-vehicle.php"><button class="btn btn-secondary" type="button" name="back">Back</button></a>
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