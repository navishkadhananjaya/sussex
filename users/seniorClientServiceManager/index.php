<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Senior Client Service Agent</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../style/css/bootstrap.min.css" rel="stylesheet">
	<link href="../style/css/k.css" rel="stylesheet">
	<script src="../style/js/jquery.min.js"></script>
</head>

<body>

	<?php include("include/header.php"); ?>
	<div class="container-fluid main-container">
		<?php include("include/side_bar.php"); ?>

		<div class="col-md-9 content" style="margin-left:10px">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:#ac7fe1">
					<h1>Welcome to Senior Client Service Agent Dashboard</h1>
				</div><br>
				<div class="panel-body">
					<div class="col-lg-6">
						<div class="well"  align="center">
							<h1>Schedule Events</h1>
							<i class="fa fa-book fa-5x"></i>
							<img src="../../img/scheduleEvents.jpg" onClick="location.href='eventSchedule.php'" alt="" width="300" height="300">
						</div>
					</div>

					<div class="col-lg-6">
						<div class="well" align="center">
							<h1>Match Friendship</h1>
							<img src="../../img/friendship.png" onClick="location.href='matchFriendship.php'" alt="" width="300" height="300">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<?php include("include/js.php"); ?>
</body>

</html>