
<?php
session_start();
error_reporting(0);
require_once ("../../db.php");
$con = Createdb();
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
		<title>Client Service Agent</title>
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
                                    <label for="" class="mt-2" style="float:left;">Daily Reports on clients meetings</label>
                                    <label for="" class="mt-2" style="float:center;"></label>
                                    <div class="col-sm-3" style="float:right;">
                                    </div>
                                    <button class="btn btn-success btn-sm " type="button" id="print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Client ID</th>
                                                <th>Client Name</th>
                                                <th>Gender</th>
												<th>Hobby</th>
												<th>Friend's Name</th>
												<th>Friend's Gender</th>
												<th>Friendship Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT 
														friendship.client_id AS ClientID,
														client2.first_name AS ClientName,
														client2.gender AS ClientGender,

														client1.first_name AS friendName,
														client1.gender AS friendGender,

														GROUP_CONCAT(DISTINCT hobbies.hobby_name) AS  Hobbies,
														friendship.friendship_date
														FROM friendship
														JOIN client AS client1 ON client1.client_id =friendship.friends_id
														JOIN client AS client2 ON client2.client_id =friendship.client_id

														JOIN client_hobbies AS client_hobbies ON client_hobbies.client_id =friendship.client_id
														JOIN  hobbies AS hobbies ON hobbies.hobby_id = client_hobbies.hobby_id

														GROUP BY friendship.friends_id";

                                            $results=mysqli_query($GLOBALS['con'],$sql);
											
                                                
                                            
                                            if($row=mysqli_fetch_assoc($results))
									
                                            {
                                            foreach($results as $result)
                                            {?>  

                                            <tr class="odd gradeX">
                                                
                                                <td class="center"><?php echo htmlentities($result['ClientID']);?></td>
                                                <td class="center"><?php echo htmlentities($result['ClientName']);?></td>
                                                <td class="center"><?php echo htmlentities($result['ClientGender']);?></td>
                                                <td class="center"><?php echo htmlentities($result['Hobbies']);?></td>
                                                <td class="center"><?php echo htmlentities($result['friendName']);?></td>
                                                <td class="center"><?php echo htmlentities($result['friendGender']);?></td>
												<td class="center"><?php echo htmlentities($result['friendship_date']);?></td>
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