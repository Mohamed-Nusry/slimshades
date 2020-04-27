<?php
include('server/dbcon.php');
include('header.php');
?>

<body id="galleryBody1"><!-- remove 1 to make background white because there is a css style for the id -->

  <?php
  include('nav.php');

  if (isset($_GET['pID'])){
   $proId=$_GET['pID'];
 }

 $sql="SELECT s_username, s_product_name, s_product_image, s_product_price, s_product_colour,s_product_size,s_product_delivery,s_product_quantity,s_product_total_price,s_payment_method,s_product_gurantee FROM tbl_sale WHERE sale_id=?";

 $stmt=mysqli_prepare($con,$sql);
 mysqli_stmt_bind_param($stmt,'i',$proId);

 $result=mysqli_stmt_execute($stmt);

 if($result){
  mysqli_stmt_bind_result($stmt,$user, $product, $Img, $Price, $productColour, $prodsize,$prodDelivery,$Quantity,$productPrice,$Payment,$Gurantee);

  

  ?>
  <div id="myDIV"></div>

  <div class="container">

    <br>
    <div class="row">
      
      <div class="col-sm">
        <h4 style="font-weight:bold;" id="txt">PURCHASE PRODUCT</h4>
      </div>
    </div>
  </div>
  <?php
  while (mysqli_stmt_fetch($stmt)) {
  	?>
    <div class="container buyDiv ">

      <br>
      <div class="row">
        
        <div class="col-sm-10 purchaseDiv">
          
          <br>
          <div class="purchaseImg">
            <?php 
            
            ?>
            <img width="200px" src="<?php echo $Img ?>">
            <p id="purchaseModel">Model: <span><?php echo $product ?>;</span></p>
            <p id="purchaseColour">Colour: <span><?php echo $productColour ?></span></p>
            <p id="purchaseSize">Size: <span><?php echo $prodsize ?></span></p>

            

            <p class="purchasePrice">Price <span id="prodlbla">Rs:</span><input type="text" style=" border-style: none;" id="prodprice" value="<?php echo $Price?>" readonly> </p>

            <p id="purchaseQnty">Quantity: <i class="fas fa-minus"></i> <input type="number" id="qnty" name="quantity" value="<?php echo $Quantity ?>">
              <i class="fas fa-plus"></i></p>

              <p id="purchaseTotPrice"><span id="totlbl">Rs:</span><input style="max-width: 60px;" type="text" id="totprice" value="<?php echo $productPrice ?>"></p>

              
            </div>

          </div>

          <div class="col-sm-2">

            <h1 id="txt" align="center">YOUR PRODUCT IS READY </h1>
            
          </div>
        </div>
      </div>

      <?php 
    }
  }
  ?>
  <br>
  <?php
  if(isset($_SESSION['name'])){

    $sqlInfo="SELECT u_name,u_email,u_gender,u_address,u_dob,u_mobile FROM tbl_user WHERE u_email=?";
    $stmt=mysqli_prepare($con,$sqlInfo);
    mysqli_stmt_bind_param($stmt,"s",$_SESSION['email']);

    $res=mysqli_stmt_execute($stmt);


    if($res){
      mysqli_stmt_bind_result($stmt, $name,$mail,$gender,$address,$dob,$mob);

      

      ?>

      
      <?php
      while (mysqli_stmt_fetch($stmt)) {
       ?>
       <div class="container divPurchase">

        <br>
        <div class="row">
          
          <div class="col-sm">

            <h1>Delivery Details</h1>

          </div>
        </div>

        <div class="row">

          <div class="col-sm">

           
            
            <div class="form-group signupText">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $mail ?> " aria-describedby="emailHelp" placeholder="Enter email" required>
              
            </div>

            <div class="form-group signupText">
              <label for="exampleInputUsername">Username</label>
              <input type="text" class="form-control" id="name" name="name" id="exampleInputUsername" value="<?php echo $name ?> " placeholder="Username" required>
              
            </div>

            <div class="form-group signupText">
              <label for="exampleInputPostal">Zip/Postal Code</label>
              <input type="text" class="form-control" name="Postal" id="exampleInputPostal" required>
            </div>
            

            
            
            
            <div class="form-group frmpart2 signupText">
              <label for="exampleInputaddress">Address</label>
              <input type="text" class="form-control" name="address" id="exampleInputaddress" value="<?php echo $address ?> " placeholder="Address" required>
            </div>
            <div class="form-group frmpart2 signupText">
              <label for="exampleInputmobile">Mobile</label>
              <input type="text" class="form-control" name="mobile" id="exampleInputmobile" value="<?php echo $mob ?> " required>
            </div>
            <div class="form-group signupText" frmpart2>
              <label for="exampleInputDob">Address 2</label>
              <input type="text" class="form-control" name="Address2" id="exampleInputAddress2" required>
            </div>
            <div class="form-group signupText" frmpart2>
              <label for="exampleInputCard">Card Number</label>
              <input type="text" class="form-control" name="card" id="exampleInputCard" required>
            </div>

            <div class="form-group form-check ">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label signupText" for="exampleCheck1">I agree to the terms and conditions</label>
            </div>
            <button type="submit" id="btnPurchase" class="btn btn-primary">Submit</button>
            <small id="emailHelp" class="form-text text-muted">We'll never share your personal inforamtion with anyone else.</small>

            

            
          </div>
        </div>
      </div>
      <?php 
    }
  }
}
else{
 

 ?>

 <h1 style="font-weight: bold;" align="center">To purchase this item <span> <a href="login.php">Sign in</span></a><br>
  <h1>.</h1>
  <?php
}
?>
</div>

<?php
include('footer.php');
?>







