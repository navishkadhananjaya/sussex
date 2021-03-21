<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p>Sussex Companions (SC) is a club for the over 50s, which seeks to match up individuals with new friends. </p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>Colombo, Sri Lanka</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>011-123-1234</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>hello@sussex.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 text-center" style="margin-top:80px;">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-camera-retro"></i></a></li>
						<li><a href="#"><i class="fa fa-book"></i></a></li>
						<li><a href="#"><i class="fa fa-car"></i></a></li>
						<li><a href="#"><i class="fa fa-braille"></i></a></li>
						<li><a href="#"><i class="fa fa-paint-brush"></i></a></li>
						<li><a href="#"><i class="fa fa-gamepad"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy; <?php echo date('Y'); ?> All Rights Reserved
					</span>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<li><a href="#">Indoor Games</a></li>
							<li><a href="#">Outdoor Games</a></li>
							<li><a href="#">Educational Meetups</a></li>
							<li><a href="#">Art</a></li>
							<li><a href="#">Cooking</a></li>
							<li><a href="#">Music</a></li>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->


	<!-- bottom footer -->

	<!-- /bottom footer -->
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/actions.js"></script>
<script src="js/sweetalert.min"></script>
<script src="js/jquery.payform.min.js" charset="utf-8"></script>
<script src="js/script.js"></script>
<script>
	var c = 0;

	function menu() {
		if (c % 2 == 0) {
			document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";
			document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";
			c++;
		} else {
			document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";
			document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";
			c++;
		}
	}
</script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to cart !", "success");
		});
	});

	$('.block2-btn-addwishlist').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});
</script>