<?php
include('header.php');
require_once('server/dbcon.php');
?>

<body>

	<?php
	include('nav.php');
	?>





	<div class="shadow-lg p-3 mb-5 bg-white rounded"><b>Category</b></div>

	<?php
	if(isset($_GET['id'])){
		$proId=$_GET['id'];

		$sql="SELECT p_id,p_name,p_details,p_image,p_image2,p_image3,p_image4,p_quantity,p_date,p_logo,p_reviews,p_price,p_gurantee FROM tbl_products WHERE p_id=?";

		$stmt=mysqli_prepare($con,$sql);
		mysqli_stmt_bind_param($stmt,"i",$proId);

		$result=mysqli_stmt_execute($stmt);

		if($result){
			mysqli_stmt_bind_result($stmt,$id,$name,$details,$image,$image2,$image3,$image4,$quantity,$date,$logo,$reviews,$price,$gurantee);
		}
		while(mysqli_stmt_fetch($stmt)) { ?>

		<p id="productid" style="display: none;"><?php echo $id;?></p>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<h1>Order</h1>
					<br>
					<div class="prod media mb-4" style="background-color: #fff; border-style: none;">
						
						<img id="imgShow" class="img1" width="500px" src="<?php echo $image ?> ">
						<p style="display: none;" id="prodImg"><?php echo $image ?></p>

					</div>
					<img id="imgSec" class="img1" width="70px" src="<?php echo $image2 ?>">
					<img id="imgThird" class="img1" width="70px" src="<?php echo $image3 ?>">
					<img id="imgFourth" class="img1" width="70px" src="<?php echo $image4 ?>">

				</div>




				<div class="col-sm">
					
					<h1 align="center">Details</h1>
					<br>
					<div class="productdetails" >
						<h2 id="prodName"><?php echo $name ?></h2>
						<img id="prodLogo" width="50px;" src="Images/logo/<?php echo $logo ?>">
						<p style="display: none;" id="logoName"><?php echo $logo ?></p><br>
						<img style="width:20px" src="Images/star.png">
						<img style="width:20px" src="Images/star.png">
						<img style="width:20px" src="Images/star.png">
						<img style="width:20px" src="Images/star.png">
						<img style="width:17px; margin-top:3px" src="Images/half-star.png"> <p><?php echo $reviews; ?>+ customer reviews</p>
						<p>Price <span id="prodlbl">Rs:</span><input type="text" id="prodprice" class="prodprice" value="<?php echo $price?>" readonly> </p>
						<p>Colour:<span class="prodclr" id="colourRed"> Red </span> <span class="prodclr" id="colourBlack"> Black </span> <span class="prodclr" id="colourBlue"> Blue </span> </p>
						<input style="display: none;" type="text" id="prodclrtxt">
						<p>Size: <span id="prodSize">Other</span></p>
						<p>Delivery: <span class="delivery">Free delivery via Small packet </span></p>
						<p><span >Estimate delivery time:</span> <span class="delivery" id="deliveryTime">3-4 days</span></p>
						<p>Quantity: <i class="fas fa-minus"></i> <input type="number" id="qnty" name="quantity" value="1">
							<i class="fas fa-plus"></i></p>
							<p>Total price <span id="totlbl">Rs:</span><input type="text" id="totprice" value="<?php echo $price?>"></p>
							<p>Payment: <span id="payMethod">method</span></p>
							<p>Gurantee: <span id="prodGurantee"><?php echo $gurantee?></span></p>
						</div>

						<?php
					}
				}else{
					echo "get method not set";
				}


				
				$sql="SELECT s_product_name FROM tbl_sale WHERE s_product_name=?";

				$stmt=mysqli_prepare($con,$sql);
				mysqli_stmt_bind_param($stmt,"s",$name);

				$result=mysqli_stmt_execute($stmt);

				if($result){
					mysqli_stmt_bind_result($stmt,$prodName);

					while (mysqli_stmt_fetch($stmt)) {
						
						if($prodName==$name){
							?>

							<p id="cartInfo">ALREADY IN THE CART</p>
							<?php
						}else{
							
							?>
							<button id="btnAdd" class="btnOrder">Add to cart  <i class="fas fa-cart-plus"></i>
							</button>
							<?php
						}
					}
				}else{
					
				}if($prodName!=$name){
					?>
					<button id="btnAdd" class="btnOrder">Add to cart  <i class="fas fa-cart-plus"></i>
					</button>
					<?php
				}
				?>
				
			</div>

		</div>

	</div>

	<br>
	<div class="orderdetails">
		<p style="font-weight: bold"><span id="prodDetails">Product details</span></p>
		<div class="tblproddetails">
	
	<table class="table ">
		<thead class="thead-dark">
			<tr>
				<th scope="col"><b>Product specification</b></th>
				<th scope="col"></th>



			</tr>
		</thead>

		



		<tbody>
			<tr>
				<th class="signupText" scope="row">Brand name: <span><?php echo $name ?> </span></th>
				<td class="signupText">Attributes: UV Protection, Enduring, luxurious </td>
			</tr>
			<tr>
				<th class="signupText" scope="row">Gender: <span> Male/Female/Kids </span></th>
				<td class="signupText">Quality: High </td>
			</tr>
			<tr>
				<th class="signupText" scope="row">Gurantee: <span><?php echo $gurantee?></span></th>
				<td class="signupText">Unit type: Piece </td>
			</tr>
			
		</tbody>
	</table>
</div>
</div>
<br>


<?php
$sql="SELECT tbl_commentsUsername,tbl_commentsUserImage,tbl_commentsComment,tbl_commentsProductid FROM tbl_comments";

$stmt=mysqli_prepare($con,$sql);


$result=mysqli_stmt_execute($stmt);

if($result){
	mysqli_stmt_bind_result($stmt,$user,$userImage,$Comment,$cmntProdid);
	
	?>


	<div class="prodComments" style="border-style: solid;">
		<h3 style="font-weight: bold;">Commments</h3>


				
		<div class="col-sm cmntPost">
			<img style="margin-top: -100px;" width="50px" src="Images/users/defuser.png">
			<textarea id="cmntText" rows="4" cols="50">
				
			</textarea><br>
			<input type="button" style='margin-left:55px;' name="" id="btncmnt" class="btnhomeCard btn btn-primary" value="Post Comment">
			<!--<label id="result">hi</label>-->
			
		</div>
		<br>

		<?php
		while(mysqli_stmt_fetch($stmt)) { 
			if ($cmntProdid==$id){

		?>

		<br>
		<div class="cmntPosted" style="border-style: solid;">
			<br>
			<img width="50px" src="Images/users/<?php echo $userImage ?>">
			<label style=" font-weight: bold"><?php echo $user ?> - </label>
			<label style="margin-left: 50px; font-weight: bold"><?php  echo $Comment ?></label>

			<br>
			<br>
		</div>

		<?php

	}
}
}
?>

<br>
</div>





<div class="jumbotron">
	<h1 style="font-weight: bold;" class="display-4">Best deals</h1>
	<img width="350px;" src="Images/essentials/ad1.jpg">
	<p class="lead">Putting on a new pair of sunglasses is a simple way to transform your look
	</p>
	<hr class="my-4">
	<p>So Go ahead and find yourself something nice.</p>
	<a class="btn btn-primary btn-lg" href="Gallery.php" role="button">Gallery</a>
</div>

<?php
include('footer.php');

?>







