
<?php
session_start();
error_reporting(0);
require_once ("../../db.php");
$dbh = CreatePODDB();
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
	
		<?php include("include/header.php");?>
		<div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>
		
			<div class="col-md-9 content" style="margin-left:10px">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color:#ac7fe1">
						<h1>Client Membership Fees  </h1>
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
                                    <th>Payment ID</th>
                                    <th>Client ID</th>
                                    <th>Amount</th>
                                    <th>Penalties</th>
                                    <th>Payment Type</th>
                                    <th>Paid Date</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $sql = "SELECT 
                                payment.payment_id,
                                client.client_id,
                                payment.amount,
                                client_membership.penalty,
                                client_membership.payment_type,
                                client.registration_date 
                                
                                from client_membership 
                                join payment on payment.payment_id=client_membership.paid_amount
                                join client on payment.payment_id=client_membership.paid_amount

                                join client on client.client_id=client_membership.client_id
                                join payment on payment.payment_id=client_membership.paid_amount 
                                join client on client.registration_date=client_membership.paid_date
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
                                    <td class="center"><?php echo htmlentities($result->payment_id);?></td>
                                    <td class="center"><?php echo htmlentities($result->client_id);?></td>
                                    <td class="center"><?php echo htmlentities($result->amount);?></td>
                                    <td class="center"><?php echo htmlentities($result->penalty);?></td>
                                    <td class="center"><?php echo htmlentities($result->payment_type);?></td>
                                    <td class="center"><?php echo htmlentities($result->registration_date);?></td>
                                    <td class="center">

                                    <a href="edit-book.php?paymentid=<?php echo htmlentities($result->paymentid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                    <a href="manage-books.php?del=<?php echo htmlentities($result->paymentid);?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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

<?php }?>