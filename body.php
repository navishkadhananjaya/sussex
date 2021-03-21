
<?php

require_once ("./db.php");

$connect = Createdb();
?>
<div class="main main-raised">
	<div class="section mainn mainn-raised">
		<!-- container -->
		<div class="container">
			
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=78"><div class="shop">
						<div class="shop-img">
							<img src="./img/office-620822_1920.jpg" alt="">
						</div>
						<div class="shop-body">
							<h3>Create An<br>Account</h3>
							
						</div>
					</div></a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=72"><div class="shop">
						<div class="shop-img">
							<img src="./img/people1.jpg" alt="">
						</div>
						<div class="shop-body">
							<h3>Register For Exciting<br>Events</h3>
						</div>
					</div></a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<a href="product.php?p=79"><div class="shop">
						<div class="shop-img">
							<img src="./img/brushes-3129361_1920.jpg" alt="">
						</div>
						<div class="shop-body">
							<h3>Enjoy What <br> You<br> Love <i class="fas fa-heart" style="color: red;"></i><br>Doing</h3>
							
						</div>
					</div></a>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Latest Events In Sussex</h3>
							<!--
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul>
							</div>
						-->
					</div>
				</div>
				<center>
					<div class="row" style="width: 100%;">
						<?php
						$query = "SELECT event_details.Event_ID, event_details.Event_Name, event_details.Event_Desc,event_details.Event_Date,event_details.Event_End,event_details.Price,event_details.Event_Catergory_ID, event_categories.cat_title FROM event_details INNER JOIN event_categories ON event_details.Event_Catergory_ID = event_categories.cat_id";
						$result = mysqli_query($connect, $query);
						if(mysqli_num_rows($result) > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								?> 
								<div class="col-lg-4">
									<div class="card" style="width: 30rem; border: solid; border-color: blue; padding: 10px; border-radius: 10px;">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row['Event_Name']; ?></h5>
											<h6 class="card-subtitle mb-2 text-muted"><?php echo $row['cat_title']; ?></h6>
											<hr>
											<p class="card-text">
												<label>Starting On</label>
												<p><?php echo $row['Event_Date']; ?></p>

												<label>Ending On</label>
												<p><?php echo $row['Event_End']; ?></p>

												<label>Your Investment</label>
												<p><?php echo $row['Price']; ?></p>
											</p>
											<hr>
											<a href="product.php?pid=<?php echo $row['Event_ID']; ?>" role="button" class="btn btn-primary">Register</a>
										</div>
									</div>
								</div>
								<br>
								<br>
								<?php
							}
						}
						?>
					</div>
				</center>

				<br>

				<div id="sectionedit" class="section mainn mainn-raised" style="padding-top: 50px; padding-bottom: 50px;">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-md-12">
								<div class="hot-deal">
									<h4 class="text-uppercase">“Persistence. Perfection. Patience. Power. Prioritize your passion. It keeps you sane.”<br>―<br> Criss Jami, Killosophy</h4>
									
									</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /HOT DEAL SECTION -->


				<!-- SECTION -->
				<div class="section">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">

							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h3 class="title">Browse By Category</h3>
									<div class="section-nav">
										<ul class="section-tab-nav tab-nav">
											<form method="post" action="">
												<li class="active"><button type="submit" name="edu" role="button" class="btn btn-primary">Education</button></li>
												<li><button type="submit" name="inout" role="button" class="btn btn-primary">Indoor & Outdoor</button></li>
												<li><button type="submit" name="arts" role="button" class="btn btn-primary">Arts</button></li>
												<li><button type="submit" name="cooking" role="button" class="btn btn-primary">Cooking</button></li>
											</form>
										</ul>
									</div>
								</div>
								<hr style="padding: 10px;">
							</div>
							
							<center>
								<div class="row" style="width: 100%;">
									<?php
									if (isset($_POST['edu'])) {
										$query = "SELECT event_details.Event_ID, event_details.Event_Name, event_details.Event_Desc,event_details.Event_Date,event_details.Event_End,event_details.Price,event_details.Event_Catergory_ID, event_categories.cat_title FROM event_details INNER JOIN event_categories ON event_details.Event_Catergory_ID = event_categories.cat_id WHERE event_categories.cat_title='Educational Meetups'";
										$result = mysqli_query($connect, $query);
										if(mysqli_num_rows($result) > 0)
										{
											while($row = mysqli_fetch_array($result))
											{
												?> 
												<div class="col-lg-4">
													<div class="card" style="width: 30rem; border: solid; border-color: blue; padding: 10px; border-radius: 10px;">
														<div class="card-body">
															<h5 class="card-title"><?php echo $row['Event_Name']; ?></h5>
															<h6 class="card-subtitle mb-2 text-muted"><?php echo $row['cat_title']; ?></h6>
															<hr>
															<p class="card-text">
																<label>Starting On</label>
																<p><?php echo $row['Event_Date']; ?></p>

																<label>Ending On</label>
																<p><?php echo $row['Event_End']; ?></p>

																<label>Your Investment</label>
																<p><?php echo $row['Price']; ?></p>
															</p>
															<hr>
															<a href="product.php?p=<?php echo $row['Event_ID']; ?>'" role="button" class="btn btn-primary">Register</a>
														</div>
													</div>
												</div>
												<br>
												<br>
												<?php
											}
										}
									}
									elseif (isset($_POST['inout'])) {
										$query = "SELECT event_details.Event_ID, event_details.Event_Name, event_details.Event_Desc,event_details.Event_Date,event_details.Event_End,event_details.Price,event_details.Event_Catergory_ID, event_categories.cat_title FROM event_details INNER JOIN event_categories ON event_details.Event_Catergory_ID = event_categories.cat_id WHERE event_categories.cat_title='Outdoor Games' OR event_categories.cat_title='Indoor Games'";
										$result = mysqli_query($connect, $query);
										if(mysqli_num_rows($result) > 0)
										{
											while($row = mysqli_fetch_array($result))
											{
												?> 
												<div class="col-lg-4">
													<div class="card" style="width: 30rem; border: solid; border-color: blue; padding: 10px; border-radius: 10px;">
														<div class="card-body">
															<h5 class="card-title"><?php echo $row['Event_Name']; ?></h5>
															<h6 class="card-subtitle mb-2 text-muted"><?php echo $row['cat_title']; ?></h6>
															<hr>
															<p class="card-text">
																<label>Starting On</label>
																<p><?php echo $row['Event_Date']; ?></p>

																<label>Ending On</label>
																<p><?php echo $row['Event_End']; ?></p>

																<label>Your Investment</label>
																<p><?php echo $row['Price']; ?></p>
															</p>
															<hr>
															<a href="product.php?p=<?php echo $row['Event_ID']; ?>'" role="button" class="btn btn-primary">Register</a>
														</div>
													</div>
												</div>
												<br>
												<br>
												<?php
											}
										}
									}
									else{
										?>
										<img src="img/calender.png" style="width: 25%; height: 25%;">
										
										<h1>Save The Dates - We Got Events To Attend</h1>
										<?php
									}
									?>
									<hr style="padding: 10px;">
						<!--
					<?php	
						$query = "SELECT event_details.Event_ID, event_details.Event_Name, event_details.Event_Desc,event_details.Event_Date,event_details.Event_End,event_details.Price,event_details.Event_Catergory_ID, event_categories.cat_title FROM event_details INNER JOIN event_categories ON event_details.Event_Catergory_ID = event_categories.cat_id";
						$result = mysqli_query($connect, $query);
						if(mysqli_num_rows($result) > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								?> 
								<div class="col-lg-4">
									<div class="card" style="width: 30rem; border: solid; border-color: blue; padding: 10px; border-radius: 10px;">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row['Event_Name']; ?></h5>
											<h6 class="card-subtitle mb-2 text-muted"><?php echo $row['cat_title']; ?></h6>
											<hr>
											<p class="card-text">
												<label>Starting On</label>
												<p><?php echo $row['Event_Date']; ?></p>

												<label>Ending On</label>
												<p><?php echo $row['Event_End']; ?></p>

												<label>Your Investment</label>
												<p><?php echo $row['Price']; ?></p>
											</p>
											<hr>
											<a href="product.php?p=<?php echo $row['Event_ID']; ?>'" role="button" class="btn btn-primary">Register</a>
										</div>
									</div>
								</div>
								<br>
								<br>
								<?php
							}
						}
						?>
					</div>
				</center>
			-->
			<!-- /section title -->
			<!-- /tab -->
		</div>
	</div>
</div>
<!-- /Products tab & slick -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->