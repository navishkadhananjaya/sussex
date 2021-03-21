<?php
session_start();
error_reporting(0);
require_once ("../../db.php");
$dbh =CreatePODDB();
if(strlen($_SESSION['login'])==1)
    {   
header('location:index.php');
}
else{ 

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Finance Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../style/css/bootstrap.min.css" rel="stylesheet">
		<link href="../style/css/k.css" rel="stylesheet">
		<script src="../style/js/jquery.min.js"></script>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- DATATABLE STYLE  -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	</head>
	<body>
	
		<?php 
			include("include/header.php");
			include("include/side_bar.php");
		?>
		
		<!-- Dashboard Start --------------------------------------->

		<div class="container-fluid main-container">
			<div class="col-md-9 content" style="margin-left:10px">
				<div class="panel ">
					<div class="panel-heading" style="background-color:#ac7fe1">
						<h1>Dashboard  </h1>
					</div>
					<br>

					<div class="row">

						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="alert alert-success back-widget-set text-center">
								<i class="fa fa-book fa-5x"></i>
								<?php 
									$sql1 ="SELECT client_id from client";
									$query = $dbh -> prepare($sql1);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$listdclients=$query->rowCount();
								?>
								<h3><?php echo htmlentities($listdclients);?></h3>
								Clients
							</div>
						</div>

	
						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="alert alert-info back-widget-set text-center">
								<i class="fa fa-bars fa-5x"></i>
								<?php 
									$sql2 ="SELECT Event_ID from event_details ";
									$query2 = $dbh -> prepare($sql2);
									$query2->execute();
									$results2=$query2->fetchAll(PDO::FETCH_OBJ);
									$issuedevents=$query2->rowCount();
								?>
								<h3><?php echo htmlentities($issuedevents);?> </h3>
								Events
							</div>
						</div>
		
						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="alert alert-warning back-widget-set text-center">
								<i class="fa fa-recycle fa-5x"></i>
								<?php 
									$sql3 ="SELECT payment_id from payment ";
									$query3 = $dbh -> prepare($sql3);
									$query3->execute();
									$results3=$query3->fetchAll(PDO::FETCH_OBJ);
									$returnedpayments=$query3->rowCount();
								?>
								<h3><?php echo htmlentities($returnedpayments);?></h3>
								Payments
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="alert alert-danger back-widget-set text-center">
								<i class="fa fa-users fa-5x"></i>
								<?php 
									$sql4 ="SELECT SUM (Participant_Number) from event_details ";
									$query4 = $dbh -> prepare($sql4);
									$query4->execute();
									$results4=$query4->fetchAll(PDO::FETCH_OBJ);
									$guests=$query4->rowCount();
								?>
								
								<h3> <?php
									
									foreach($dbh->query('SELECT SUM(Price * Participant_Number) 
									FROM event_details') as $row) {

									echo  $row['SUM(Price * Participant_Number)'] ;

									}
									?>
								</h3>
								Total Incomes
							</div>
						</div>
					</div>           
				</div>
			</div>
		</div>
		<!-- Dashboard end--------------------------------------------------- -->
	<?php include("include/js.php"); ?>
	</body>
</html>

<?php }?>

