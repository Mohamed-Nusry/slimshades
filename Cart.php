<?php
include('server/dbcon.php');
include('header.php');
?>

<body id="galleryBody"><!-- remove 1 to make background white because there is a css style for the id -->

	<?php
	include('nav.php');

	$sql="SELECT sale_id,s_username, s_product_name, s_product_image, s_product_price, s_product_colour,s_product_size,s_product_delivery,s_product_quantity,s_product_total_price,s_payment_method,s_product_gurantee,s_logo FROM tbl_sale";

	$stmt=mysqli_prepare($con,$sql);
	

	$result=mysqli_stmt_execute($stmt);

	if($result){
		mysqli_stmt_bind_result($stmt,$pId,$user, $product, $Img, $Price, $productColour, $prodsize,$prodDelivery,$Quantity,$productPrice,$Payment,$Gurantee,$Logo);

		


		?>



		<div class="container">
			<div class="row">
				<div class="col-sm topdiv1">

					<h2 align="center">Surf and find your best match</h2>


					<div class="active-cyan-3 active-cyan-4 mb-4">
						<input class="form-control" type="text" placeholder="Search" aria-label="Search">
						<i class="fas fa-search fa-searchmod" aria-hidden="true"></i>
					</div>

				</div>
			</div>
		</div>
		<br>	

		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					
				</div>
			</div>
		</div>
		<br>

		<div class="container">
			<div class="row">
				<div class="col-sm">

					<h1 style="font-weight: bold;" id="txt" align="center">YOUR ADDED PRODUCTS</h1>

				</div>

				
			</div>
		</div>
		<br>



		<div class="container">

			<div class="row">
				<?php
				while (mysqli_stmt_fetch($stmt)) {
					?>
					<div class="col-sm-6 cartCont">

						<div class="cartproImg">
							<img width="500px" src="<?php echo $Img ?>">
						</div>

						<div class="cartproIcon">
							<img width="100px" style="margin-left: 200px; margin-top: -50px;" src="Images/logo/<?php echo $Logo ?>">
						</div>

						<div class="cartproDet">
							<h3 align="center" style="font-weight: bold; margin-left: -30px; margin-top:-10px; "><?php echo $product ?></h3>
							<h4 align="center" style="font-weight: bold; margin-left: -30px ; ">Price: <?php echo $Price ?></h4>
						</div>

						<div class="cartprosubImg">
							
						</div>
						<br>

						<a href="purchase.php?pID=<?php echo $pId ?>"><input type="button" class="btnCart" id="btnBuy" value="Checkout" ></a> 

						<a href="server/DelFromCart.php?pID=<?php echo $pId ?>"><input type="button" class="btnCart" id="btnRemove" value="Remove">
						</a>
					</div>


					<?php

					
				}
			}
			?>
			
		</div>
	</div>


	<?php
	include('footer.php');
	?>







