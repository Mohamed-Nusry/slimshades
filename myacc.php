<?php
require_once('server/dbcon.php');
include('header.php');
include('nav.php');

?>


<body>



  <div class="container">
    <h2 class="signupText">My account details</h2>
    <div class="row">
      
      
      <div class="col-sm">
        <h3 class="signupText">General information </h3>
        <div class="myinfo1 signupText"><br>
          <?php if(isset($_SESSION['name'])){
            ?>
            <p>Username: <span><?php echo $_SESSION['name']; ?></span> </p>
            <p>Gender: <span><?php echo $_SESSION['gender']; ?></span> </p>
            <p>Date of birth: <span><?php echo $_SESSION['dob']; ?></span> </p>
            <p>Address: <span><?php echo $_SESSION['address']; ?></span> </p>
            <p>Email: <span><?php echo $_SESSION['email']; ?></span> </p>
            <p>Mobile: <span><?php echo $_SESSION['mob']; ?></span> </p>
            
            
            <?php 
          }else{
            ?>
            
            <p>Usernamee: <span>N/A</span> </p>
            <p>Gender: <span>N/A</span> </p>
            <p>Date of birth: <span>N/A</span> </p>
            <p>Address: <span>N/A</span> </p>
            
            <?php
            
          }
          ?>
        </div>
        <br>
        
        <div class="myinfo2">
          <p class="secinfo signupText">Change Details</p>
          
          
          
        </div>
        
        
      </div>
    </div>
  </div>



  <?php
  include('footer.php');

  ?>







