<?php
require_once ("../../db.php");

if(!isset($_SESSION['user_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Add new clients

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Add new clients

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->






<div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
        .input-borders{
            border-radius:30px;
        }
    </style>
    <!-- row -->
    
    <div class="container-fluid">

        <form id="signup_form"  class="login100-form" method="post" action="">
            <div class="billing-details jumbotron">
                <div class="section-title">
                    <h2 class="login100-form-title p-b-40" >Register Here </h2>
                </div>
                <div class="form-group ">

                    <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="First Name">
                </div>
                <div class="form-group">

                    <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Last Name">
                </div>
                <div class="form-group ">
                    <label style="margin-left: 5px;">Date Of Birth</label>
                    <input class="input form-control input-borders" type="date" name="dob" id="dob" placeholder="Date Of Birth">
                </div>

                <div class="form-group">
                    <select name="gender" class="form-control input-borders">
                        <option>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer Not To Specify">Prefer Not To Specify</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="input form-control input-borders" type="email" name="email"  placeholder="Email">
                </div>
                
                <div class="form-group">
                    <input class="input form-control input-borders" type="number" name="mobile" id="mobile" placeholder="Mobile Number">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Address">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="City">
                </div>

                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="postalcode" id="postalcode" placeholder="Postal Code">
                </div>

                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="country" id="country" placeholder="Country">
                </div>

                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="personality" id="personality" placeholder="Personality">
                </div>

                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Confirm Password">
                </div>
                
                
             <hr>
             <center>
                <input type="submit" name="submit" value="Sign Up" class="btn btn-success form-control" >
                
            </center>
        </form>
        <div class="login-marg">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="signup_msg">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div> 


<?php

if(isset($_POST['submit'])){

  $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $postalcode = $_POST['postalcode'];
    $country = $_POST['country'];
    $personality = $_POST['personality'];
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
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please Fill all fields..!</b>
            </div>
            ";
            exit();
            } 

            else {
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
                }
                else{



                    $sql = "INSERT INTO client (`first_name`, `last_name`, `date_of_birth`, `gender`, `email`, `mobile`, `address_line1`, `city`, `postal_code`, `country`,`personality`,`user_type`, `registration_date`) VALUES ('$f_name','$l_name','$dob','$gender','$email','$mobile','$address1','$address2','$postalcode','$country','$personality','2','$regdate')";

                    $sql2 = "INSERT INTO user_login (`user_name`, `user_email`, `user_password`, `user_type`) VALUES ('$f_name','$email','$password','Client through Reception')";


                                if ($con->query($sql)===TRUE && $con->query($sql2)===TRUE) {

                                  echo "<script>alert('New Client Added sucsessfully')</script>";
                                }
                                else{

                                    echo "<script>alert('Ooops Some Errors Occured Please Try Again! Make Sure You Fill Out All Fields')</script>";
                                    
                                }

                  //  $run_reg1 = mysqli_query($con,$sql);
                    //$run_reg2 = mysqli_query($con,$sql2);

                    //if ($run_reg1 && $run_reg2) {

                     //   echo "<script>alert('New client registerd Sucessfully')</script>";

                     //   echo "<script>window.open('index.php?view_users','_self')</script>";

                    //}

                }
            }
       

}



?>

<?php } ?>