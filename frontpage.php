<?php
require_once('server/dbcon.php');
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome-all.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">
  <script src=js/popper.min.js></script>
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>






  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/css/mdb.min.css" rel="stylesheet">-->

  <link rel="stylesheet" type="text/css" href="css/font-awesome-min.css">
  <!-- Bootstrap core CSS -->
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">

  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->

  
  
</head>
<body onscroll="scroll();" >



  <div class="topimg">
    <img width="2000px" height="870px" id="imgtop" style="margin-top: -10px;" src="Images/Shades.jpg">
  </div>

<!--         <div class="tophead">

        <h4><img src="Images/icon1.jpg" id="icon1" >
          Your real beauty starts here<img src="Images/icon2.png" id="icon2"> <span style="margin-left: 500px;">Ship to: </span><span> Country</span></h4>



        </div>-->
        <div class="siteTop">

         <h4 id="topPar"><img src="Images/icon1.jpg" id="icon1" >
          Your real beauty starts here<img src="Images/icon2.png" id="icon2"> <span style="margin-left: 500px;"></span></h4>


          <?php
          include('userAcc.php');
          ?>

          <br>

        </div>
        <div class="title">
          <img id="Imglogo" src="Images/ss1.png">
          <h2>Slim<span id="subtitle">Shades</span></h2>
        </div>


        <nav class="siteNav">
         <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="Gallery.php">Gallery</a>
          </li>
          <li>
            <a href="myacc.php">My account</a>
          </li>
          <li>
            <a href="aboutus.php">About us</a>
          </li>
        </ul>


      </nav>
      <div class="Pagestrt">
        <br>
        <h1 id="title">Beauty + Styles</h1>
        <h3 id="title1">Awesome style shades available</h3>
        <br>
        <a id="btnPagestrt" href="Gallery.php" class="btnhomeCard btn btn-primary">Go to store</a>
      </div>


      <script type="text/javascript">
/*$(document).ready(function(){
    $('#btndddd').click(function(){
      $(this).hide();

  });
});*/

</script>

<script src=js/script.js></script>
</body>
</html>