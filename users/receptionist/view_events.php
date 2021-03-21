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

<i class="fa fa-dashboard" ></i> Dashboard / View Events

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Events Details

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Event ID</th>

<th>Event Name</th>

<th>Event Start Date</th>

<th>Venue</th>

<th>Price</th>

<th>Event End Date</th>

<th>Discription</th>





</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_event = "select * from event_details";

$run_event= mysqli_query($con,$get_event);

while($row_event = mysqli_fetch_array($run_event)){

$Event_ID = $row_event['Event_ID'];

$Event_Name = $row_event['Event_Name'];

$Event_Date = $row_event['Event_Date'];

$Venue = $row_event['Venue'];

$Price = $row_event['Price'];

$Event_End = $row_event['Event_End'];

$Event_Desc = $row_event['Event_Desc'];









?>

<tr>

	<td><?php echo $Event_ID; ?></td>

	<td><?php echo $Event_Name; ?></td>

	<td><?php echo $Event_Date; ?></td>

	<td><?php echo $Venue; ?></td>

	<td><?php echo $Price; ?></td>

	<td><?php echo $Event_End; ?></td>

	<td><?php echo $Event_Desc; ?></td>





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