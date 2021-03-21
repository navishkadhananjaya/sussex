<?php


require_once ("../../db.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Clients

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Clients Details

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Client ID</th>

<th>Name</th>

<th>Email</th>

<th>Gender</th>

<th>Date of Birth</th>

<th>Mobile Number</th>

<th>City</th>

<th>Country</th>






</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_client = "select * from client";

$run_client = mysqli_query($con,$get_client);

while($row_client = mysqli_fetch_array($run_client)){

$client_id = $row_client['client_id'];

$client_name = $row_client['first_name'];

$client_email = $row_client['email'];

$client_gender = $row_client['gender'];

$client_date_of_birth = $row_client['date_of_birth'];

$client_mobile = $row_client['mobile'];

$client_city = $row_client['city'];

$client_country = $row_client['country'];







?>

<tr>

	<td><?php echo $client_id; ?></td>

	<td><?php echo $client_name; ?></td>

	<td><?php echo $client_email; ?></td>

	<td><?php echo $client_gender; ?></td>

	<td><?php echo $client_date_of_birth; ?></td>

	<td><?php echo $client_mobile; ?></td>

	<td><?php echo $client_city; ?></td>

	<td><?php echo $client_country; ?></td>





</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





<?php }  ?>