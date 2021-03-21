<?php

session_start();
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
</head>

<body>

	<?php include("include/header.php"); ?>
	<div class="container-fluid main-container">
		<?php include("include/side_bar.php"); ?>

		<div class="col-md-9 content" style="margin-left:10px">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:#ac7fe1">
					<h1>Welcome to Client Service Agent Dashboard </h1>
				</div><br>
				<div class="panel-body">
					<div class="col-lg-6">
						<div class="well" align="center">
							<img src="../../img/participants.jfif" onClick="location.href='handleParticipants.php'" alt="" width="250" height="250">
						</div>
					</div>

					<div class="col-lg-6">
						<div class="well" align="center">
							<img src="../../img/reports.png" onClick="location.href='report.php'" alt="" width="250" height="250">
						</div>
					</div>
					<h3>
						<?php  //success message
						if (isset($_POST['success'])) {
							$success = $_POST["success"];
							echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
						}
						?></h3>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/js.php"); ?>
</body>

</html>