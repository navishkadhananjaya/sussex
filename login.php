<?php
require_once ("./db.php");

$con = Createdb();

session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$password = $_POST["password"];
		$email = mysqli_real_escape_string($con, $_POST["email"]);
		$password = md5($_POST["password"]);
		$sql = "SELECT * FROM user_login WHERE user_email = '$email' AND user_password = '$password'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);

		//if user record is available in database then $count will be equal to 1
		if ($count == 1) {
			$row = mysqli_fetch_array($run_query);
			$_SESSION["uid"] = $row["user_id"];
			$_SESSION["name"] = $row["user_name"];
			$_SESSION['user_email']=$row["user_email"];
			$user_type =  $row["user_type"];
			$ip_add = getenv("REMOTE_ADDR");
			//we have created a cookie in login_form.php page so if that cookie is available means user is not login
			if ($user_type == "admin") {
				//if user is login from page we will send login_success
				echo "login_success";

				echo "<script> location.href='user/add_product.php'; </script>";
				exit;
			} else if ($user_type == "receptionist") {
				echo "login_success";

				echo "<script> location.href='users/receptionist'; </script>";
				exit;
			} else if ($user_type == "client service agent") {
				echo "login_success";

				echo "<script> location.href='users/clientServiceAgent'; </script>";
				exit;
			} else if ($user_type == "senior client service agent") {
				echo "login_success";

				echo "<script> location.href='users/seniorClientServiceManager'; </script>";
				exit;
			} else if ($user_type == "finance manager") {
				echo "login_success";

				echo "<script> location.href='users/financeManager'; </script>";
				exit;
			}
		} else {
			echo "<span style='color:red;'>Please register before login..!</span>";
			exit();
		}
	}
