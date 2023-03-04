<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add Station Code
    if(isset($_POST['submit']))
    {
    //Getting Post Values
    $cname=$_POST['companyname'];   
    $Location=$_POST['location'];   
    $Telephone=$_POST['telephone'];   
    $Email=$_POST['email'];   
    $Max_Stock=$_POST['maximumStock'];   
    $query=mysqli_query($con,"insert into tblcompany(CompanyName,Location,Telephone,Email,Max_Stock) values('$cname','$Location','$Telephone','$Email','$Max_Stock')"); 
    if($query){
    echo "<script>alert('Station added successfully.');</script>";   
    echo "<script>window.location.href='manage-companies.php'</script>";
    } else{
    echo "<script>alert('Something went wrong. Please try again.');</script>";   
    echo "<script>window.location.href='add-company.php'</script>";    
    }
    }
//  station Add
  }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Station</title>
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
<li class="breadcrumb-item"><a href="#">Station</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add Station</h4>
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
<label for="validationCustom03">Station Name</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Station Name" name="companyname" required>
<div class="invalid-feedback">Please provide a valid Station name.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Station Location</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Station Location" name="location" required>
<div class="invalid-feedback">Please provide a valid location.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Telephone</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Telephone" name="telephone" required>
<div class="invalid-feedback">Please provide a valid Telephone.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Email</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Email" name="email" required>
<div class="invalid-feedback">Please provide a valid email.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Maximum Stock In Litres</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Maximum Stock" name="maximumStock" required>
<div class="invalid-feedback">Please provide a valid Maximum Stock.</div>
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
