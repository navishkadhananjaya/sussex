
<?php
session_start();
error_reporting(0);
require_once ("../../db.php");
$dbh =CreatePODDB();

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
	
		<?php include("include/header.php");?>
		<div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>
		
			<div class="col-md-9 content" style="margin-left:10px">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color:#ac7fe1">
						<h1>Event Holding Fees  </h1>
					</div>
					<br>
					
					<!-- Dashboard Start -->

					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Category ID</th>
                                    <th>Event Start </th>
                                    <th>Event End </th>
                                    <th>Venue</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>No. of Guests</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql = "SELECT 
                                    event_details.Event_Name,
                                    event_categories.cat_title,
                                    event_details.Event_Date,
                                    event_details.Event_End,
                                    event_details.Venue,
                                    event_details.Price,
                                    event_details.Event_Desc,
                                    event_details.Participant_Number,

                                    event_details.Event_ID as eventid from event_details

                                    join event_categories on event_categories.cat_id=event_details.Event_Catergory_ID
                                ";

                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {?> 

                                <tr class="odd gradeX">
                                    <td class="center"><?php echo htmlentities($cnt);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_Name);?></td>
                                    <td class="center"><?php echo htmlentities($result->cat_title);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_Date);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_End);?></td>
                                    <td class="center"><?php echo htmlentities($result->Venue);?></td>
                                    <td class="center"><?php echo htmlentities($result->Price);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_Desc);?></td>
                                    <td class="center"><?php echo htmlentities($result->Participant_Number);?></td>
                                    <td class="center">

                                    <a href="edit-event.php?eventid=<?php echo htmlentities($result->eventid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                    <!--
                                    <a href="event_fees.php?del=<#?php echo htmlentities($result->eventid);?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                    </td>
                                    -->
                                </tr>

                                <?php 
                                    $cnt=$cnt+1;
                                }} ?>
                                 

                            </tbody>
                        </table>
                    </div>

					<!-- Dashboard end -->

				</div>
			</div>
		</div>

	<?php include("include/js.php"); ?>
    

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

	</body>
</html>

