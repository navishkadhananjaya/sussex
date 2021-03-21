<?php
require_once ("../../db.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";


}
else {

if(isset($_POST['submit'])){


  $Event_ID = $_POST['Event_Name'];

  $client_id = $_POST['email'];

  $payment_type = $_POST['Payment_Type'];


  
  $book_event = "insert into registrations (Event_ID,Client_ID,Payment_Type) values ('$Event_ID','$client_id','$payment_type')";
   
 // echo $book_event;
  // die();

  $run_booking = mysqli_query($con,$book_event);
  
  

  if($run_booking){
  
  
  echo "<script>alert('Booking confirmed')</script>";
  
  echo "<script>window.open('index.php?book_events','_self')</script>";
  
  }
  else
  {

  }
  
  }
  
  ?>


<!DOCTYPE html>

<html>

<head>

<title> Booking for events </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Book events

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Book events

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Event Name </label>

<div class="col-md-6" >

<select name="Event_Name" class="form-control" >

<option > Select  an Event </option>


<?php



$get_event_id = "select * from event_details";

$run_event_id = mysqli_query($con,$get_event_id);

while ($row_event_id=mysqli_fetch_array($run_event_id)) {



$event_id = $row_event_id['Event_ID'];

$Event_Name=$row_event_id['Event_Name'];

echo "<option value='$event_id' >$Event_Name</option>";

}


?>


</select>

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Client  </label>

<div class="col-md-6" >

<select name="email" class="form-control" >

<option > Select  a Client </option>


<?php

$get_client = "select * from client";

$run_client = mysqli_query($con,$get_client);

while ($row_client=mysqli_fetch_array($run_client)) {

//$p_cat_id = $row_p_cat['p_cat_id'];

$client_id = $row_client['client_id'];

$email = $row_client['email'];

echo "<option value='$client_id' >$email</option>";
//value='$p_cat_id'

}


?>


</select>

</div>

</div><!-- form-group Ends -->







<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > payment Type </label>

<div class="col-md-6" >

<input type="text" name="Payment_Type" class="form-control" required >

</div>

</div><!-- form-group Ends -->





<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Book Event" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>





<?php } ?>
