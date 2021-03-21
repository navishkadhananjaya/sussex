
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
		<div>
        
		    <?php include("include/side_bar.php");?>
		
			<div class="col-md-9" style="margin-left:10px">
				<div class="panel">
					<div class="panel-heading" style="background-color:#ac7fe1">
						<h1>Client </h1>
					</div>
					<br>
					
					<!-- Dashboard Start -->
         
                    <div >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registered Clients
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client ID</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Reg Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * from client";
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
                                                <td class="center"><?php echo htmlentities($result->client_id);?></td>
                                                <td class="center"><?php echo htmlentities($result->first_name);?></td>
                                                <td class="center"><?php echo htmlentities($result->email);?></td>
                                                <td class="center"><?php echo htmlentities($result->mobile);?></td>
                                                    <td class="center"><?php echo htmlentities($result->registration_date);?></td>
                                            </tr>
                                            <?php $cnt=$cnt+1;}} ?>                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>           
                    </div>
                </div>
                        
            </div>
        </div>
        
        <!-- Dashboard end -->

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