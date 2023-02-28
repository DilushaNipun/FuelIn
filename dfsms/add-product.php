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
$catname=$_POST['category']; 
$company=$_POST['company'];   
$pname=$_POST['productname'];
$pprice=$_POST['productprice'];
$query=mysqli_query($con,"insert into tblproducts(CategoryName,CompanyName,ProductName,ProductPrice) values('$catname','$company','$pname','$pprice')"); 
if($query){
echo "<script>alert('Product added successfully.');</script>";   
echo "<script>window.location.href='add-product.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";   
echo "<script>window.location.href='add-product.php'</script>";    
}
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Product</title>
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
<li class="breadcrumb-item"><a href="#">Order</a></li>
<li class="breadcrumb-item active" aria-current="page">Prepare Order</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Prepare Order</h4>
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
<label for="validationCustom03">Order Id</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Order Id" name="productname" required>
<div class="invalid-feedback">Please provide a valid Order Id.</div>
</div>
</div> 

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Fuel Type</label>
 <select class="form-control custom-select" name="category" required>
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
<label for="validationCustom03">Fuel Price / per Litre</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Fuel Price" name="productprice" required>
<div class="invalid-feedback">Please provide a valid Fuel price.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Station</label>
 <select class="form-control custom-select" name="company" required>
<option value="">Select Station</option>
<?php
$ret=mysqli_query($con,"select CompanyName from tblcompany");
while($row=mysqli_fetch_array($ret))
{?>
<option value="<?php echo $row['CompanyName'];?>"><?php echo $row['CompanyName'];?></option>
<?php } ?>
</select>
<div class="invalid-feedback">Please select a Station.</div>
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