<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$postalcode = $_POST['postalcode'];
	$country = $_POST['country'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$regdate = date('Y-m-d');

	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
		empty($mobile) || empty($address1) || empty($address2)){
		
		echo "
	<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
	</div>
	";
	exit();
} else {
	if(!preg_match($name,$f_name)){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>this $f_name is not valid..!</b>
		</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>this $l_name is not valid..!</b>
		</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>this $email is not valid..!</b>
		</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Password is weak</b>
		</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Password is weak</b>
		</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>password is not same</b>
		</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Mobile number $mobile is not valid</b>
		</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
		<div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Mobile number must be 10 digit</b>
		</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT email FROM client WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
		<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Email Address already exists</b>
		</div>
		";
		exit();
	} else {
		
		$sql = "INSERT INTO `client`(`first_name`, `last_name`, `date_of_birth`, `gender`, `email`, `mobile`, `address_line1`, `city`, `postal_code`, `country`,`user_type`, `registration_date`) VALUES ('$f_name','$l_name','$dob','$gender','$email','$mobile','$address1','$address2','$postalcode','$country','1','$regdate')";

		$sql2 = "INSERT INTO `user_login`(`user_name`, `user_email`, `user_password`, `user_type`) VALUES ('$f_name','$email','$password','Online Client')";

		if ($con->query($sql)===TRUE && $con->query($sql2)===TRUE) {
			?>
			<div class="alert alert-success" role="alert">
				Hooray You Have Been Registered Sucessfully
			</div>
			<?php
		}
		else{
			?>
			<div class="alert alert-success" role="alert">
				Ooops Some Errors Occured Please Try Again! Make Sure You Fill Out All Fields
			</div>
			<?php
			
		}

		
	}
}

}



?>






















































