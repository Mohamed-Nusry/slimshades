<?php 
if(isset($_SESSION['name'])){
  $name=$_SESSION['name'];
  $image=$_SESSION['img'];
}else{
  $name="Guest";
  $image="defuser.png";
}



$sql="SELECT COUNT(*) FROM tbl_sale";
$stmt=mysqli_prepare($con,$sql);
$result=mysqli_stmt_execute($stmt);


?>



<?php

if($result){
  mysqli_stmt_bind_result($stmt,$count);
  
  
  while(mysqli_stmt_fetch($stmt)){
    ?>
    



    
    <?php
    if(isset($_SESSION['name'])){
      ?>
      <img style="border-radius: 10px; margin-left: 200px;" width="50px" id="userImg"  src="Images/users/<?php echo $image ?>" alt="User">
       <p style="display: inline; font-weight: bold;">Hi</p><p id="uname" style="display: inline; font-weight: bold; color:red;"> <?php echo $name?></p>
      <a href="cart.php"> <img  width="50px" id="cart" src="Images/other/cart.png"></a>
      <p id="cartCount"><?php echo $count ?></p>
      <p id="cmntimg" style="display: none;"><?php echo $image;?></p>
      <?php
      
    }else{
      
      ?>
      <img style="border-radius: 10px;" width="50px" id="userImg"  src="Images/users/<?php echo $image ?>" alt="User">
       <p style="display: inline; font-weight: bold;">Hi</p> <p id="uname" style="display: inline; font-weight: bold; color:red;"> <?php echo $name?></p>
      <a href="cart.php"> <img  width="50px" id="cart" src="Images/other/cart.png"></a>
      <p id="cartCount"><?php echo $count ?></p>
      <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
      <a href="signup.php"><button type="button" class="btn btn-success">Signup</button></a>

      <?php
    }?>

    <?php
  }
}
?>
</div>


<!-- Example single danger button -->

<?php
if(isset($_SESSION['name'])){


  ?>
  <div class="btn-group">
    <div class="dropdown-menu UserDropdown">
      <a class="dropdown-item" href="myacc.php">My account</a>
      <a class="dropdown-item" href="cart.php">Cart</a>
      <a class="dropdown-item" href="aboutus.php">About us</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="server/logout.php">Log out</a>
    </div>  
  </div>

  <?php
} else{


  ?>

  <div class="btn-group">
    <div class="dropdown-menu UserDropdown">
      <a class="dropdown-item" href="myacc.php">Log in</a>
      <a class="dropdown-item" href="#">Signup</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="aboutus.php.php">About us</a>
    </div>
  </div>




  <?php
}
?>