<?php

include('frontpage.php');




?>
<!-- SideNav slide-out button -->


<?php
if(isset($_SESSION)){
	echo 'set';
}else{
	echo "not set";
}


?>




<h3 id="headline">.</h3>

<div class="container">
	<div class="row">
		<div class="col-sm" >

			

      <!--<div class="card-footer text-muted">
        2 days ago
    </div>-->





    <div class="card card-image" style="background-image: url(Images/essentials/gradient1.jpg);">
    	<div class="text-white text-center py-5 px-4 my-5">
    		<div>
    			<h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>20+ New arrived products</strong></h2>
    			<p class="mx-5 mb-5">We believe that there is a silver lining in everything, and once you begin to see it, you'll need sunglasses to combat the glare
    			</p>
    			<a class="btn btn-outline-white btn-md" href="Gallery.php"><i class="fas fa-clone left"></i> View products</a>
    		</div>
    	</div>
    </div>
</div>
</div>
<br>
<div class="row">
	<div class="col-sm" >
		<img id="sung2" width="500px;" src="Images/essentials/sung2.jpg">

	</div>
	<div class="col-sm" >
		<img id="ad2" width="500px;"  src="Images/essentials/Ad2.gif">
	</div>
</div>


<br>

<div class="row">
	<div class="col-sm" >
		<!--Carousel Wrapper-->
		<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-1z" data-slide-to="1"></li>
				<li data-target="#carousel-example-1z" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<!--First slide-->
				<div class="carousel-item active">
					<img class="d-block w-100" src="Images/essentials/top4.jpg" alt="First slide">
				</div>
				<!--/First slide-->
				<!--Second slide-->
				<div class="carousel-item">
					<img class="d-block w-100" src="Images/essentials/top5.jpg" alt="Second slide">
				</div>
				<!--/Second slide-->
				<!--Third slide-->
				<div class="carousel-item">
					<img class="d-block w-100" src="Images/essentials/top12.jpg" alt="Third slide">
				</div>
				<!--/Third slide-->
			</div>
			<!--/.Slides-->
			<!--Controls-->
			<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<!--/.Controls-->
		</div>
		<!--/.Carousel Wrapper-->
	</div>
</div>


<div class="row">
	<div class="col-sm" >
		
		<div class="info">
			<h1 style="font-weight: bold;">Who are we</h1>
			<p style="text-align: justify; text-justify: inter-word; font-weight: bold;">SlimShades is a luxury shades store, which specializes in selling imported sunglass items. SlimShades has many Island wide, and also planned to place branches in near other cities as well, We are selling high quality shades and we offer high and satisfied level of customer service. We won a good place in the market for the quality business</p>

			<!-- News jumbotron -->
			<div class="jumbotron text-center hoverable p-4">
				<div class="row">
					<div class="col-md-4 offset-md-1 mx-3 my-3">
						<div class="view overlay">
							<img src="Images/essentials/shades.jfif" class="img-fluid" alt="Sample image for first version of blog listing">
							<a>
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>
					</div>

					<div class="col-md-7 text-md-left ml-3 mt-3">
						<a href="#!" class="green-text">
							<h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> SlimShades</h6>
						</a>

						<h4 class="h4 mb-4">Our Mission</h4>

						<p class="font-weight-normal">We are SlimShades and our mission is to be the premier and the top store in the world and the best dealer for the top brands, modern trends and high quality fashion and performance shades.</p>
						


						<h4 class="h4 mb-4">Our Vision</h4>

						<p class="font-weight-normal">We are SlimShades and our mission is to be the premier and the top store in the world and the best dealer for the top brands, modern trends and high quality fashion and performance shades.</p>
						

						<a href="aboutus.php" class="btn btn-success">About Us</a>

					</div>
				</div>
			</div>

			





		</div>


	</div>


</div>



</div>



</div>
</div>



<?php
include('footer.php');


?>







