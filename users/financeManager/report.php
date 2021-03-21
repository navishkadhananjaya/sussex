
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
        
		    <?php 
                include("include/side_bar.php");
                $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
            ?>
		
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

                                <div>
                                    <label for="" class="mt-2" style="float:left;">Events Reports</label>
                                    <label for="" class="mt-2" style="float:center;"></label>
                                    <div class="col-sm-3" style="float:right;">
                                    <input type="month" style="float:center;" name="month" id="month" value="<?php echo $month ?>" class="form-control">
                                    </div>
                                    <button class="btn btn-success btn-sm " type="button" id="print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Event Name</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Venue</th>
                                                <th>Price</th>
                                                <th>Guests</th>
                                                <th>Income</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT                               
                                                event_details.Event_Name,
                                                event_categories.cat_title,
                                                event_details.Event_Date,
                                                event_details.Venue,
                                                event_details.Price,
                                                event_details.Participant_Number,

                                                event_details.Event_ID as eventid from event_details
                                                
                                                join event_categories on event_categories.cat_id=event_details.Event_Catergory_ID";

                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            $income = 199;
                                            $total = 2999;
                                                
                                            
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {?>  

                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->Event_Name);?></td>
                                                <td class="center"><?php echo htmlentities($result->cat_title);?></td>
                                                <td class="center"><?php echo htmlentities($result->Event_Date);?></td>
                                                <td class="center"><?php echo htmlentities($result->Venue);?></td>
                                                <td class="center"><?php echo htmlentities($result->Price);?></td>
                                                <td class="center"><?php echo htmlentities($result->Participant_Number);?></td>
                                                <td class="center"><?php echo htmlentities($income);?></td>
                                            </tr>
                                            <?php $cnt=$cnt+1;}} ?>                                      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-right">Total</th>
                                                <th colspan="3" class="text-right">
                                                    <?php
                                                        foreach($dbh->query('SELECT SUM(Price * Participant_Number) FROM event_details') as $row) {
                                                        echo $row[ 'SUM(Price * Participant_Number)'] ;
                                                        }
                                                    ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div> 
                        </div>           
                    </div>
                </div>
                        
            </div>
        </div>
        
        <!-- Dashboard end -->

	<?php include("include/js.php"); ?>

    <noscript>
        <style>
            table#dataTables-example{
                width:100%;
                border-collapse:collapse
            }
            table#dataTables-example td,table#dataTables-example th{
                border:1px solid
            }
            p{
                margin:unset;
            }
            .text-center{
                text-align:center
            }
            .text-right{
                text-align:right
            }
        </style>
    </noscript>

    <script>
    $('#month').change(function(){
        location.replace('report.php?month='+$(this).val())
    })
    $('#print').click(function(){
            var _c = $('#dataTables-example').clone();
            var ns = $('noscript').clone();
                ns.append(_c)
            var nw = window.open('','_blank','width=900,height=600')
            nw.document.write('<p class="text-center"><b>Events Report of <?php echo date("F, Y",strtotime($month)) ?></b></p>')
            nw.document.write(ns.html())
            nw.document.close()
            nw.print()
            setTimeout(() => {
                nw.close()
            }, 500);
        })
    </script>

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