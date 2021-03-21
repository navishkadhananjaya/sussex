<?php error_reporting(E_ALL);
ini_set('display_errors', 0); ?>
<style type="text/css">

	.ratings i {
		font-size: 16px;
		color: red
	}

	.strike-text {
		color: red;
		text-decoration: line-through
	}

	.product-image {
		width: 100%
	}

	.dot {
		height: 7px;
		width: 7px;
		margin-left: 6px;
		margin-right: 6px;
		margin-top: 3px;
		background-color: blue;
		border-radius: 50%;
		display: inline-block
	}

	.spec-1 {
		color: #938787;
		font-size: 15px
	}

	h5 {
		font-weight: 400
	}

	.para {
		font-size: 16px
	}
</style>
<?php
include "header.php";
include "db.php";
$p= $_GET['pid'];

$query = "SELECT * FROM `event_details` WHERE Event_ID= '$p'";
$results = mysqli_query($con,$query);
if (mysqli_num_rows($results) > 0) {
	while ($rows = mysqli_fetch_array($results)) {
		?>


		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
		<script>

			(function (global) {
				if(typeof (global) === "undefined")
				{
					throw new Error("window is undefined");
				}
				var _hash = "!";
				var noBackPlease = function () {
					global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
		global.setTimeout(function () {
			global.location.href += "!";
		}, 50);
	};	
	// Earlier we had setInerval here....
	global.onhashchange = function () {
		if (global.location.hash !== _hash) {
			global.location.hash = _hash;
		}
	};
	global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
			var elm = e.target.nodeName.toLowerCase();
			if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
				e.preventDefault();
			}
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>

<div class="container mt-5 mb-5 my-auto" style="padding-top: 20px;">
	<div class="d-flex justify-content-center row my-auto">
		<div class="col-md-10 my-auto">
			<div class="row p-2 bg-white border rounded my-auto">
				<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="img/calendar-4704388_1920.jpg" style="border-radius: 10px;"></div>
				<div class="col-md-6 mt-1 my-auto">
					<h5><?php echo $rows['Event_Name']; ?></h5>
					<div class="d-flex flex-row">
						<div class="ratings mr-2"><?php echo $rows['Venue']; ?></div><span>From - <?php echo $rows['Event_Date']; ?> - To <?php echo $rows['Event_End']; ?></span>
					</div>

					<p class="text-justify text-truncate para mb-0"><?php echo $rows['Event_Desc']; ?><br><br></p>
				</div>
				<div class="align-items-center align-content-center col-md-3 border-left mt-1">
					<div class="d-flex flex-row align-items-center">
						<h4 class="mr-1"><?php echo $rows['Price']; ?></h4>
					</div>
					<div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"  type="button"><i class="fas fa-check-circle"></i> &nbsp; Register</button></div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>

<center >
	<h1 id="reg" style="font-size: 24px;">Get Registered For This Event Right Now</h1>

	<?php
	if(isset($_POST['eventreg'])){

    //Server Variables
		$server_name = "Sussex Events Club";
		$server_mail = "asifnawasdeen@gmail.com";

    //Name Attributes of HTML FORM
		$sender_email = "emailadd";
		$sender_name = "name";
		$contact = "contact";
		$mail_subject = "eventname";
		$message = "eventdesc";
		$start = "eventstart";
		$end = "eventend";
		$loc = "eventloc";
		$price = "eventprice";

    //Fetching HTML Values
		$sender_name = $_POST[$sender_name];
		$sender_mail = $_POST[$sender_email];
		$message = $_POST[$message];
		$contact= $_POST[$contact];
		$mail_subject = $_POST[$mail_subject];
		$start = $_POST[$start];
		$end = $_POST[$end];
		$loc = $_POST[$loc];
		$price = $_POST[$price];


		$main_subject = "New Event Registration";
		$main_body = "New Event Registration At $server_name <br><br> 
		$sender_name, has registerd for the event $mail_subject through the Sussex Events Club website and the details of the registration are as below.<br><br> Name : &nbsp; $sender_name <br>
		<br> 
		Contact Number :&nbsp; $contact <br> 
		<br>
		Email Address : &nbsp; $sender_mail <br> 
		<br>
		Event Name : &nbsp $mail_subject<br>
		<br>
		Starts On :&nbsp; $start <br>
		<br>
		End On <br><br> $end.";

        //Reply Content
		$reply_subject = "Event Registration Sucessfull";
		$reply_body = "<center>Hello There $sender_name <br><br>
		\t This email is to ackwoledge that your registration for the event ".$mail_subject." has been registered sucessfully. Please find the event details summary as below for your reference<br><br>
		Event Name - ".$mail_subject."<br>
		Event Location - ".$loc."<br>
		Event Cost - ".$price."<br>
		Event Location - ".$loc."<br>
		Event Description - ".$message."
		<br>
		This is an auto generated mail sent from the Sussex Events Club.<br>
		Please do not reply to this mail. Contact us via support@sussex.com for any clarifications<br>
		Regards<br>
		$server_name </center>";


 $retval = mail($server_mail, $main_subject, $main_body,"From: $sender_name <$sender_mail>\r\nReply-To: $sender_mail\r\nMIME-Version: 1.0\r\nContent-Type: text/html; boundary=\"$uid\"\r\n\r\n");        //Sending mail to Sender
 $retval = mail($sender_mail, $reply_subject, $reply_body , "From: $server_name<$server_mail>\r\nMIME-Version: 1.0\r\nContent-type: text/html\r\n");
//#############################DO NOT CHANGE ANYTHING ABOVE THIS LINE#############################


 $query = "INSERT INTO `registrations`(`Client_ID`, `Event_ID`, `Payment_Type`) VALUES ([value-1],[value-2],[value-3],[value-4])";
        //Output
 if ($retval == true) {
 	?>
 	<div class="alert alert-success" role="alert">
 		Hooray <i class="fas fa-glass-cheers"></i> Your Registration Is Sucessfull
 	</div>
 	<?php
 	$time =3;
 	header("Refresh:$time");

 } else {
 	?>
 	<div class="alert alert-success" role="alert">
 		Whooops! Some Error Occured Please Try Again!
 	</div>
 	<?php

 	echo "Message could not be sent...Try again later";
            //echo "<script>window.location.replace('testcareers.php');</script>";
 }

}
?>

<form action="" method="post">
	<div class="row" style="width: 100%;">
		<div class="col-md-6">
			<input type="text" style="width: 75%; float: right;" name="name" class="form-control" placeholder="Name">
		</div>
		<div class="col-md-6">
			<input type="text" style="width: 75%; float: left;" name="contact" class="form-control" placeholder="Contact Number">
		</div><br>
		<br>
		<div class="col-md-6">
			<input type="text" name="eventname" style="width: 75%; float: right;" class="form-control" value="<?php echo $rows['Event_Name']; ?>">
		</div>
		<div class="col-md-6">
			<input type="email" name="emailadd" style="width: 75%; float: left;" class="form-control" placeholder="Email Address">
		</div>
		<br><br>
		<div style="width: 74%;">
		<label style="float: left;">Select Your Preffered Payment Option</label>
		</div>
		<div class="col-md-12">
			<select name="payment" class="form-control" style="width: 76%;">

				<?php if ($rows['Price']!="Free") {
					?>
					<option value="Cash">Cash</option>
					<option value="Bank Transfer">Bank Transfer</option>
					<option value="Card">Card</option>
					<?php
				}else if ($rows['Price']=="Free") {
					?>
					<option value="Free Event">Free Event</option>
					<?php
				} ?>
			</select>
		</div>
		<br>
		<!-- Hidden Input Fields -->
		<input type="hidden" name="eventprice" value=" <?php echo $rows['Price']; ?> ">
		<input type="hidden" name="eventdesc" value=" <?php echo $rows['Event_Desc']; ?> ">
		<input type="hidden" name="eventstart" value=" <?php echo $rows['Event_Date']; ?> ">
		<input type="hidden" name="eventend" value=" <?php echo $rows['Event_End']; ?> ">
		<input type="hidden" name="eventloc" value=" <?php echo $rows['Venue']; ?> ">
		<!-- END -->
		<br><br><br>
		<i class="fas fa-envelope"></i> &nbsp; - <label>A confirmation email address will be sent to your email address once registered sucessfully</label>
		<br><br>
		<div class="col-md-12">
			<button type="submit" name="eventreg" class="btn btn-primary"><i class="fas fa-check-circle"></i> Get Registered</button> <button type="reset" class="btn btn-secondary"><i class="fas fa-trash-alt"></i> Cancel</button>
		</div>
	</div>
</form>
</center>
<?php
}
}
?>
<?php
include "newslettter.php";
include "footer.php";

?>
