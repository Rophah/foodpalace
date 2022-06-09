<?php
//include_once("classes/user.php");
include_once("navbarheader.php");

?>

<!-- The food search-->
<section id="foodsearch" >
	<div class="overlay">
		<div class="container-fluid ">

			<!--start row-->
				<!-- <div class= "row">
					<div class="col-md-12 p-3 font-weight-bold text-center" style="background-color: rgb(255,153,0)">
						Are you a new user? Please sign up to order  <i class="fa-solid fa-bowl-hot"></i>food and make table reservation
					</div>
				</div>	 -->	

			 <!--start row-->
			<div class="row mx-auto">
				
				<div class="my-auto">
					<div class="dummy-text text-light text-center smallscreen" style="margin-top: 12%;">
						<h1 class="hungry">HUNGRY?</h1>
						<H2>Good, we are here to serve <span>YOU<span></H2>
						<h3 class="mb-3">Order from us where you get treated as a king</h3>
						<a href='menudata.php' class="btn" style="background-color: rgb(255,153,0); color:#fff"><h4>SEE MENU AND ORDER</h4></a>
						<a href="tablepreserve.php" class="btn btnsecondary"><h5>TABLE PRESERVATION</h5></a>
						<div class="p-3 mt-3" style="color: rgb(255,153,0)">
						Are you a new user? Please sign up to order  <i class="fa-solid fa-bowl-hot"></i>food and make table reservation
						</div>
					</div>
				</div>
			</div>
		<div>	
	</div>	
</section>
<!-- The end of food search-->


	<!-- our story -->
<section id="ourstory">

	<div class="container-fluid mt-2">
		<div class="row padall " >
			<div class= "col-sm-12 col-md-6 text-center">
				<h2>OUR STORY</h2>
				<div class="underline"></div>
				<P class="space">The story began in 1992 when Chidinma got admitted into the university. She had always loved cooking from little. In her hostel in the university, everyone wanted to eat her meal whenever she cooked. She then thought to herself, "Why not make these meals and sell in her hostel?". After just a year, she got herself a restaurant where She could serve a larger audience </P>
			</div>
			<div class= "col-sm-12 col-md-6">
				<img class= "img-fluid" src="images/restaurant.jpg" alt="Restaurant">
			</div>
		</div>
	</div>	

</section>
	<!-- The end of our story -->

	<!-- =========== Food category ===========-->
	<!-- <section id="category" style="background-color:#2C2929; color: #ffffff;">
		<?php //include_once('categoryindex.php');?>
	</section> -->
	<!-- =========== End of food category-->

	

	<!-- Food menu-->
	<section id="menu">
	<div id="menubackground" style="padding: 4rem;">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="text-center py-3 text-uppercase">Explore Foods</h2>
					<div class="underlinewider"></div>
				</div>
			</div>
			<div class="row p-4">
				

				<div class="col-md-6 p-4">
					<div class="foodimg">
						<img src="images/friedrice.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Fried rice</h4>
						<p>Food price: #2000</p>
						<p class="small">Fried rice with well garnished chicken</p>

						<!-- <a href="#" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>
				</div>

				<div class=" col-md-6 p-4">
					
					<div class="foodimg">
						<img src="images/jollofrice.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Jollof rice</h4>
						<p>Food price: #2000</p>
						<p class="small">Jollof rice with well garnished chicken</p>

						<!-- <a href="" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>

				</div>
				<div class="col-md-6 p-4">

					<div class="foodimg">
						<img src="images/eba.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Eba and Egusi</h4>
						<p>Food price: #2000</p>
						<p class="small">Scrumptuous eba with egusi soup garnished with stock fish</p>

						<!-- <a href="" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>
					
				</div>
				<div class="col-md-6 p-4">
					<div class="foodimg">
						<img src="images/fufuandogbono.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Pounded yam with Ogbono soup</h4>
						<p>Food price: #2000</p>
						<p class="small">Fluffy pounded yam with ogbono soup well-garnished with crayfish</p>

						<!-- <a href="login.php" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>
					
				</div>
				<div class="col-md-6 p-4">
					
					<div class="foodimg">
						<img src="images/meatpie.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Meatpie</h4>
						<p>Food price: #2000</p>
						<p class="small">Yummy! Made with alot of meat </p>

						<!-- <a href="login.php" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>

				</div>
				<div class="col-md-6 p-4">
					
					<div class="foodimg">
						<img src="images/breadbean.jpg" alt="fried rice" class="imgsmall">
					</div>
					<div class="fooddescription">
						<h4 class="lead">Bean and bread</h4>
						<p>Food price: #2000</p>
						<p class="small">Bean locally called 'ewa agoyin' with soft bread</p>

						<!-- <a href="login.php" class="btn btnsecondary orderbutton">Order Now!</a> -->
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>
	</div>
	</section>
	<!-- End of food menu -->

	<!-- ==========  location ==============-->
	<section id="location">
		<div class="container-fluid">
			<div>
				
			</div>
			<div class="row p-5 locationalign">
				<div class="col-sm-12 col-md-5 text-center pl-5">
					<h3>OPENING HOURS</h3>
					<div class="underline mb-4"></div>
					<P>Monday - Closed</P>
					<p>Tuesday - Friday- 7am to 12am</p>
					<p>Open on all public holidays</p>
					<p><i class="fas fa-mobile-alt"></i></p>
					<p>+234-567-8903-567</p>
					<p><i class="fas fa-envelope-open-text"></i></p>
					<p><a href="https://www.gmail.com" target="_blank">foodpalace@gmail.com</a></p>
				</div>
				<div class="col-sm-12 col-md-7 text-center pl-5">
					<h3 class="text-center">WHERE YOU CAN FIND US</h3>
					<div class="underlinewider mb-4"></div>
					<p>No 11A, Jogunomi street,Gbagada,Lagos State, Nigeria</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.807206657569!2d3.3827103144954824!3d6.5460115952654165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d734e047c61%3A0x10665bdd80606080!2sphase%202%2C%2011%20Jogunomi%20St%2C%20Somolu%20102216%2C%20Lagos!5e0!3m2!1sen!2sng!4v1636242961483!5m2!1sen!2sng" width ="80%" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</section>
	<!-- ==========  end of location ==============-->

	<!-- The summary-->
	<section id="summary">
		<div class="container pt-5">
			<div class="row text-center">
				<div class="col-sm-6">
					<h3>SITEMAP</h3>
					<div class="underline"></div>
					<p><a class="btn anchorborder" href="#ourstory" >Our story</a></p>
					<p><a class="btn anchorborder" href="#category">Category</a></p>
					<p><a class="btn anchorborder" href="#menu">Menu</a></p>
					<p><a class="btn anchorborder" href="#register">Sign up</a></p>
					<p><a class="btn anchorborder" href="#location">Location</a></p>
				</div>
				<div class="col-sm-6">
					<h3>RESERVATION</h3>
					<div class="underlinewider"></div>
					<P><a class="nav-link" href="#"><button class="btn primaryfooter">SEE MENU & ORDER</button></a></P>
					<a class="nav-link" href="#"><button class="btn secondaryfooter ">TABLE PRESERVATION</button></a>
				</div>
			</div>
		</div>

	</section>
	<!-- The end of summary-->


	<!-- The footer -->
	<section id="footer" >
		<div class="container-fluid footer-bac" >
			<div class="row py-3">
				<div class="col-sm-6 text-center">
					<p style="display: inline;">All rights reserved. Designed by <a>Adebanjo Rafat</a></p>
				</div>
				<div class="col-sm-6 text-center">
					<a href="https://www.facebook.com"  class="footericons" ><i class="fab fa-facebook " ></i></a>
					<a href="https://www.instagram.com" class="footericons"><i class="fab fa-instagram "></i></a>
					<a href="https://www.twitter.com" class="footericons"><i class="fab fa-twitter "></i></a>
					<p style="display: inline;"><i class="fas fa-phone footericons"></i>+234-567-8903-567</p>
				</div>
			</div>
		</div> 
	</section>
	<!-- The end of  footer -->

	<!-- -->
	<!-- JS FILES -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="//code.tidio.co/up88jsdec9ymstn9dg8tgkf4v3zrb9t8.js" async></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#new').click(function(){

				$('#signup').show();
				$('#registration').css("color","red");
				$('#signupbutton').css("background-color", 'red');
				$('#login').hide();
			})

			$('#old').click(function(){
				$('#signup').hide();
				$('#login').css('color','blue');
				$('#login').show();
			})

		});


		$(document).ready(function(){
			$('#search').keyup(function(){
				var $searchvalue = $this.val();

				$('$searchresult').html($searchvalue);
			})


			$.ajax({
				type:post;
				data: "search=" + $searchvalue;
				url:'search.php';
				success: function(msg){
					$('$searchresult').html(msg)
				};
				error: {console.log('error')
				}
			})
		})

	</script>
</body>
</html>