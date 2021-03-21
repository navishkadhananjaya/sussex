<?php

session_start();

require_once ("../../db.php");
$con = Createdb();

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$user_session = $_SESSION['user_email'];

$get_user = "select * from user_login  where user_email='$user_session'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_id = $row_user['user_id'];

$user_name = $row_user['user_name'];

$user_email = $row_user['user_email'];


$get_client = "select * from user_login";
$run_client = mysqli_query($con,$get_client);
$count_client = mysqli_num_rows($run_client);

$get_event = "select * from event_details";
$run_event = mysqli_query($con,$get_event);
$count_events = mysqli_num_rows($run_event);

/*$get_p_categories = "select * from product_categories";
$run_p_categories = mysqli_query($con,$get_p_categories);
$count_p_categories = mysqli_num_rows($run_p_categories); 


$get_customers = "select * from user";
$run_customers = mysqli_query($con,$get_customers);
$count_customers = mysqli_num_rows($run_customers); */

//$get_pending_orders = "select * from pending_orders";
//$run_pending_orders = mysqli_query($con,$get_pending_orders);
//$count_pending_orders = mysqli_num_rows($run_pending_orders); 

?>


<!DOCTYPE html>
<html>

<head>

<title>Receptionist Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['addnew_client'])){

    include("addnew_client.php");
    
}

if(isset($_GET['book_events'])){

    include("book_events.php");
    
}

if(isset($_GET['view_users'])){

include("view_users.php");

}


if(isset($_GET['delete_user'])){

include("delete_user.php");

}

if(isset($_GET['edit_user'])){

    include("edit_user.php");

}
if(isset($_GET['view_events'])){

include("view_events.php");

}






?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>