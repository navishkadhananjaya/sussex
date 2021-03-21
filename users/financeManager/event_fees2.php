
<?php
session_start();
error_reporting(0);
require_once ("../../db.php");
$dbh = CreatePODDB();

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
					<div class="panel-body">
						<h3>
							<?php  //success message
							if(isset($_POST['success'])) {
							$success = $_POST["success"];
							echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
							}
							?>
						</h3>
					</div>

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
                                <?php $sql = "SELECT * from event_details";
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
                                    <td class="center"><?php echo htmlentities($result->Event_Catergory_ID);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_Date);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_End);?></td>
                                    <td class="center"><?php echo htmlentities($result->Venue);?></td>
                                    <td class="center"><?php echo htmlentities($result->Price);?></td>
                                    <td class="center"><?php echo htmlentities($result->Event_Desc);?></td>
                                    <td class="center"><?php echo htmlentities($result->Participant_Number);?></td>
                                    <td class="center">

                                    <a href="edit-book.php?bookid=<?php echo htmlentities($result->payment_id);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                    <a href="manage-books.php?del=<?php echo htmlentities($result->payment_id);?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                    </td>
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
	<?php 
    include("include/js.php"); ?>
	</body>
</html>

