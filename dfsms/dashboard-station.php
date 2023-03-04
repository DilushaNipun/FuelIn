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

<?php include_once('includes/navbar-Station.php');
include_once('includes/sidebar-Station.php');
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

<?php
$query=mysqli_query($con,"select id from tblcategory");
$listedcat=mysqli_num_rows($query);
?>

<div class="col-lg-3 col-md-6">
    <div class="card card-sm small-box bg-primary">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-5">
                <div>
                    <h3><span class="d-block font-19 text-white font-weight-700">Fuel Types</span></h3>
                </div>
                <div>
                </div>
            </div>
            <div class="text-center">
                <h3><span class="d-block font-45 display-3 text-white mb-7"><?php echo $listedcat;?></span></h3>
                <small class="d-block text-white">Listed Fuel Types</small>
            </div>
        </div>
        <div class="small-box-footer">

        </div>
    </div>
</div>
							
<?php
$sql=mysqli_query($con,"select id from tblproducts");
$listedproduct=mysqli_num_rows($sql);
?>
<div class="col-lg-3 col-md-6">
<div class="card card-sm small-box bg-warning">
<div class="card-body">
<div class="d-flex justify-content-between mb-5">
<div>
<span class="d-block font-19 text-dark font-weight-700">Customers</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<span class="d-block font-45 display-3 text-dark mb-7"><?php echo $listedproduct;?></span>
<small class="d-block text-dark">Listed Customers</small>
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
<span class="d-block font-19 text-white font-weight-700">Total Litres</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<span class="d-block font-45 display-3 text-white mb-7"><?php echo number_format($row['tt'],2);?></span>
<small class="d-block text-white">Total litres till date</small>
</div>
</div>
</div>
</div>	

<?php
$qury=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)>=(DATE(NOW()) - INTERVAL 7 DAY)");
$row=mysqli_fetch_array($qury);
?>
<div class="col-lg-3 col-md-6">
<div class="card card-sm small-box bg-dark">
<div class="card-body">
<div class="d-flex justify-content-between mb-5">
<div>
<span class="d-block font-19 text-white font-weight-700">Last 7 Days Sales</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<span class="d-block font-45 display-3 text-white mb-7"><?php echo number_format($row['tt'],2);?></span>
<small class="d-block text-white ">Last 7 Days Total Sales</small>
</div>
</div>
</div>
</div>

<?php
$quryss=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)=CURDATE()");
$rws=mysqli_fetch_array($quryss);
?>
<div class="col-lg-3 col-md-6">
<div class="card card-sm small-box">
<div class="card-body">
<div class="d-flex justify-content-between mb-5">
<div>
<span class="d-block font-19 text-dark font-weight-700">Today's Sales</span>
</div>
<div>
</div>
</div>
<div class="text-center">
<span class="d-block font-45 display-3 text-dark mb-7"><?php echo number_format($rws['tt'],2);?></span>
<small class="d-block text-dark">Today's Total Sales</small>
</div>
</div>
</div>
</div>


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