<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Code for deletion       
if(isset($_GET['del'])){    
    $Customer_NIC=$_POST['customerNIC']; 
    $cmpid=substr(base64_decode($_GET['del']),0,-5);
    $query=mysqli_query($con,"delete from tblcompany where id='$cmpid'");
    echo "<script>alert('Company record deleted.');</script>";   
    echo "<script>window.location.href='manage-request.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Manage Payments</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
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
<li class="breadcrumb-item"><a href="#">Payments</a></li>
<li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>View Payments</h4>
</div>

                <!-- /Title -->
                <!-- Row -->
                <div class="row">
                <div class="col-xl-12">
                <form class="needs-validation" method="post" novalidate>


<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03">Customer NIC</label>
<input type="text" class="form-control" id="validationCustom03" placeholder="Customer NIC" name="customerNIC" required>
<div class="invalid-feedback">Please provide a valid customer NIC.</div>
</div>

</div>


<button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>
                </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer NIC</th>
                                                    <th>Customer Email</th>
                                                    <th>Token ID</th>
                                                    <th>Payment Amount</th>
                                                    <th>Payment Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
if(isset($_POST['submit']))
{
    $Customer_NIC=$_POST['customerNIC']; 


 
$query=mysqli_query($con,"select * from tblpayments where Customer_NIC = '$Customer_NIC'");
}
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>                                                
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['Customer_NIC'];?></td>
<td><?php echo $row['Customer_Email'];?></td>
<td><?php echo $row['Token_ID'];?></td>
<td><?php echo $row['Payment_Amount'];?></td>
<td><?php echo $row['Date'];?></td>
<td>
<!-- <a href="manage-request.php?del=<?php echo base64_encode($row['id'].$rno);?>" data-toggle="tooltip" data-original-title="Cancel" onclick="return confirm('Do you really want to cancel?');"> <i class="glyphicon glyphicon-envelope txt-danger"></i> </a>                 -->
</td>
</tr>
<?php 
$cnt++;
} ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>
</html>
<?php } ?>