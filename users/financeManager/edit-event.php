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

if(isset($_POST['update']))
{

$eventname=$_POST['eventname'];
$eventtitle=$_POST['eventtitle'];
$eventstart=$_POST['eventstart'];
$eventend=$_POST['eventend'];
$venue=$_POST['venue'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$guest=$_POST['guest'];
$eventid=intval($_GET['eventid']);
$sql="update event_details set Event_Name=:eventname, Event_Catergory_ID=:eventtitle, Event_Date=:eventstart, Event_End=:eventend, Venue=:venue, Price=:price, Event_Desc=:desc, Participant_Number=:guest where Event_ID=:eventid";
$query = $dbh->prepare($sql);
$query->bindParam(':eventname',$eventname,PDO::PARAM_STR);
$query->bindParam(':eventtitle',$eventtitle,PDO::PARAM_STR);
$query->bindParam(':eventstart',$eventstart,PDO::PARAM_STR);
$query->bindParam(':eventend',$eventend,PDO::PARAM_STR);
$query->bindParam(':venue',$venue,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':guest',$guest,PDO::PARAM_STR);
$query->bindParam(':eventid',$eventid,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Events details updated successfully";
header('location:event_fees.php');

}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Finance Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../style/css/bootstrap.min.css" rel="stylesheet">
		<link href="../style/css/k.css" rel="stylesheet">
		<script src="../style/js/jquery.min.js"></script>

    </head>

    <body>
        <!------MENU SECTION START-->

        <?php include("include/header.php");?>
        <div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>

        <!-- MENU SECTION END-->

        <div class="col-md-9 content" style="margin-left:10px">
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
    

            <div class="row">
                <div class="col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Event Details
                        </div>

                        <div class="panel-body">
                            <form role="form" method="post">
                                <?php 
                                    $eventid=intval($_GET['eventid']);
                                    
                                    $sql = "SELECT 
                                        event_details.Event_Name,
                                        event_categories.cat_title,
                                        event_categories.cat_id as catid,
                                        event_details.Event_Date,
                                        event_details.Event_End,
                                        event_details.Venue,
                                        event_details.Price,
                                        event_details.Event_Desc,
                                        event_details.Participant_Number,

                                        event_details.Event_ID as eventid from event_details

                                        join event_categories on event_categories.cat_id=event_details.Event_Catergory_ID
                                        where event_details.Event_ID=:eventid
                                    ";


                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':eventid',$eventid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    { 
                                ?>  

                                    <div class="form-group">
                                        <label>Event Name</label>
                                        <input class="form-control" type="text" name="eventname" value="<?php echo htmlentities($result->Event_Name);?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label> Event Category</label>
                                        <select class="form-control" name="eventtitle" required="required">
                                            <option value="<?php echo htmlentities($result->catid);?>"> 
                                            <?php echo htmlentities($catname=$result->cat_title);?></option>
                                                <?php 
                                                $sql1 = "SELECT * from  event_categories ";
                                                $query1 = $dbh -> prepare($sql1);
                                                $query1-> bindParam(PDO::PARAM_STR);
                                                $query1->execute();
                                                $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                                                if($query1->rowCount() > 0)
                                                {
                                                foreach($resultss as $row)
                                                {           
                                                if($catname==$row->cat_title)
                                                {
                                                continue;
                                                }
                                                else
                                                {
                                                ?>  
                                            <option value="<?php echo htmlentities($row->cat_id);?>"><?php echo htmlentities($row->cat_title);?></option>
                                            <?php }}} ?> 
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Event Start</label>
                                        <input class="form-control" type="date" name="eventstart" value="<?php echo htmlentities($result->Event_Date);?>"  required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label>Event End</label>
                                        <input class="form-control" type="date" name="eventend" value="<?php echo htmlentities($result->Event_End);?>"  required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label>Venue</label>
                                        <input class="form-control" type="text" name="venue" value="<?php echo htmlentities($result->Venue);?>"  required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="text" name="price" value="<?php echo htmlentities($result->Price);?>"  required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" type="text" name="desc" value="<?php echo htmlentities($result->Event_Desc);?>"  required="required" />
                                    </div>

                                    <div class="form-group">
                                        <label>Guests</label>
                                        <input class="form-control" type="number" name="guest" value="<?php echo htmlentities($result->Participant_Number);?>"  required="required" />
                                    </div>

                                <?php }} ?>

                                <button type="submit" name="update" class="btn btn-info">Update </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT-WRAPPER SECTION END-->
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>
</html>
<?php } ?>

