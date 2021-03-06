<?php
include('server/dbcon.php');
include('header.php');
?>

<body id="galleryBody1"><!-- remove 1 to make background white because there is a css style for the id -->

  <?php
  include('nav.php');
  
  if(isset($_GET['search'])){
    $search="%".$_GET['search']."%";

  }

  ?>




  

  <div class="container">
   <div class="row">
    <div class="col-sm topdiv1">

     <h2 align="center">Surf and find your best match</h2>


     <div class="active-cyan-3 active-cyan-4 mb-4">
      <input id="searchProd" class="form-control" type="text" placeholder="Search" aria-label="Search">
      
    </div>

  </div>
</div>
</div>
<br>	

<div class="container">
	<div class="row">

   <div class="col-sm-5">
     <h3>Quick tip</h3>
     <p>Easy navigation available</p>
   </div>
   <div class="col-sm-7">

     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img class="d-block w-100 " src="Images/top4.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 " src="Images/top6c.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 " src="Images/sung1.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
</div>
<br>

<div class="container">
 <h3 style="font-weight: bold;">Search results</h3>
 <div class="row">
  
   <?php


   $sql="SELECT p_id,p_order,p_name,p_details,p_image,p_quantity,p_date FROM tbl_products WHERE p_name LIKE ? ";

   $stmt=mysqli_prepare($con,$sql);
   mysqli_stmt_bind_param($stmt,'s',$search);
   $result=mysqli_stmt_execute($stmt);
   if($result){
    mysqli_stmt_bind_result($stmt,$id,$order,$name,$details,$image,$quantity,$date);
  }




  while(mysqli_stmt_fetch($stmt)) { 

   
    ?>

    <div class="col-sm">

      <br>
      
      <div class="card cardModify cardsize" style="width: 18rem;">
       <img class="cardModify-img-top" src=<?php echo $image;?> alt="Card image cap">
       <div class="card-body">
         <h5 class="card-title"><?php echo $name;?></h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="order.php?id=<?php echo $id ?>" class="btn btn-primary">View full details</a>

       </div>
       
     </div>

   </div>
   <?php

 }

 ?>
 
</div>


<br>






</div>


<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item active"><a class="page-link" href="">1</a></li>
    <li class="page-item">
      <a class="page-link" href="Page2.php?oid=7">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item ">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

<?php
include('footer.php');
?>







