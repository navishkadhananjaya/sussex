



<div id="newsletter" class="section">

	<?php

	if (isset($_POST['submitemail'])) {
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		ini_set( 'display_errors', 1 );
		error_reporting( E_ALL );
		$from = $email;
		$to = "asifnawasdeen@gmail.com";
		$subject = $subject;
		$message = $message;
		$headers = "From: " . $email;
		mail($to,$subject,$message, $headers);
		echo "<br>";
		?>
		<center>
		<div class="alert alert-success" role="alert">
			Email Sent Sucessfully
		</div>
		</center>
		<?php
		echo "<br>";
		$time=4;
		header("Refresh:$time");	
	}
	
	?>


	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">

				<div class="newsletter">
					<p>Have Any Inquiries?</p>

					<form action="" method="post">
						<div class="row" style="width: 100%;">
							<div class="col-md-6">
								<input type="text" style="padding: 10px;" name="subject" placeholder="Inquiry Subject" class="form-control">
							</div>
							<div class="col-md-6">
								<input type="email" style="padding: 10px;" name="email" placeholder="Your Email Address" class="form-control">
							</div><br>
							<br>
							<div class="col-md-12">
								<textarea class="form-control" style="padding: 10px;" name="message" placeholder="Your Message"></textarea>
							</div><br>
							<br><br>
							<br>
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary" name="submitemail" style="width: 100%;">Send Inquiry</button>
							</div>
							<div class="col-md-6">
								<button type="reset" class="btn btn-info" style="width: 100%;">Cancel</button>
							</div>
						</div>
					</form>

							<!--
							<form id="offer_form" onsubmit="return false">
								<input class="input" type="email" id="email" name="email" placeholder="Enter Your Email">
								<button class="newsletter-btn" value="Sign Up" name="signup_button" type="submit"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<div class="" id="offer_msg">
                                Alert from signup form
                            </div>
                        -->
                        <ul class="newsletter-follow">
                        	<li>
                        		<a href=""><i class="fa fa-facebook"></i></a>
                        	</li>
                        	<li>
                        		<a href=""><i class="fa fa-twitter"></i></a>
                        	</li>
                        	<li>
                        		<a href=""><i class="fa fa-instagram"></i></a>
                        	</li>
                        	<li>
                        		<a href=""><i class="fa fa-github"></i></a>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>