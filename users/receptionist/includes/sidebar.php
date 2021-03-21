<?php


if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Receptionist Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $user_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->



<li class="divider"></li>

<li><!-- li Starts -->

<a href="../../logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->


<li><!-- Products li Starts -->

<a href="#" data-toggle="collapse" data-target="#Clients">

<i class="fa fa-user"></i> Clients

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="Clients" class="collapse">

<li>

<a href="index.php?addnew_client"> 

<i class="fa fa-fw fa-edit"></i> Add New Clients </a>

</li>

<li>

<a href="index.php?view_users"> 

<i class="fa fa-fw fa-edit"></i> View Clients </a>

</li>

</ul>

</li><!-- Products li Ends -->


<li><!-- Products li Starts -->

<a href="#" data-toggle="collapse" data-target="#Events">

<i class="fa fa-fw fa-table"></i> Events

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="Events" class="collapse">

<li>
	<a href="index.php?book_events">

<i class="fa fa-fw fa-edit"></i> Booking for events </a>
</li>

<li>
	<a href="index.php?view_events">

<i class="fa fa-fw fa-edit"></i> View events </a>
</li>

</ul>

</li>

<li><!-- li Starts -->

<a href="../../logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>