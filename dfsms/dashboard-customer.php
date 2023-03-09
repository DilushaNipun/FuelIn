<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Dashboard</title>
    <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="dist/css/stylenew.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<?php include_once('includes/navbar-customer.php');
include_once('includes/sidebar-customer.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">



<div class="col-lg-3 col-md-6">
<div class="card card-sm small-box bg-warning">
<div class="card-body">
<div class="d-flex justify-content-between mb-5">
<div>
<span class="d-block font-19 text-dark font-weight-700">Fuel Types</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<?php
$query=mysqli_query($con,"select CategoryName from tblcategory");
$listedcat=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{

?>
    <span class="d-block font-18 display-3 text-dark mb-7 text-left"><?php echo $row['CategoryName']?></span>
    <?php
}?>
</div>
</div>
</div>
</div>
<?php
$query=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId ");
$row=mysqli_fetch_array($query);
?>
<div class="col-lg-3 col-md-6">
<div class="card card-sm small-box bg-danger">
<div class="card-body">
<div class="d-flex justify-content-between mb-5">
<div>
<span class="d-block font-19 text-white font-weight-700">Token</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<?php
$adminid=$_SESSION['aid'];


$query1=mysqli_query($con,"select UserName,NIC from tbladmin where id='$adminid'");
$row=mysqli_fetch_array($query1);
$cmpid='252-5698';
$query=mysqli_query($con,"select * from tblvehicle where Vehi_No='$cmpid'");
while($result=mysqli_fetch_array($query))
{

?>
    <span class="d-block font-18 display-3 text-dark mb-7 text-left"><?php echo $result['Vehi_No']?></span>
    <?php
}?>
</div>
</div>
</div>
</div>	

<?php
$qury=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)>=(DATE(NOW()) - INTERVAL 7 DAY)");
$row=mysqli_fetch_array($qury);

?>

</div>
					
            </div>
            <!-- /Container -->
			
            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
	<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="dist/js/vectormap-data.js"></script>
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
	<script src="dist/js/irregular-data-series.js"></script>
    <script src="dist/js/init.js"></script>
	
</body>

</html>
<?php } ?>