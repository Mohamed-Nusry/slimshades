<?php
require_once('dbcon.php');
session_start();

if(isset($_POST['user'])){
  $user=$_POST['user'];
  $product=$_POST['product'];
  $Img=$_POST['Img'];
  $Price=$_POST['Price'];
  $productColour=$_POST['productColour'];
  $prodsize=$_POST['prodsize'];
  $prodDelivery=$_POST['prodDelivery'];
  $Quantity=$_POST['Quantity'];
  $productPrice=$_POST['productPrice'];
  $Payment=$_POST['Payment'];
  $Gurantee=$_POST['Gurantee'];
  $Logo=$_POST['Logo'];
  
$sql = "INSERT INTO tbl_sale (s_username, s_product_name, s_product_image, s_product_price, s_product_colour,s_product_size,s_product_delivery,s_product_quantity,s_product_total_price,s_payment_method,s_product_gurantee,s_logo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      
      $stmt = mysqli_prepare($con,$sql);
      mysqli_stmt_bind_param($stmt,"ssssssssssss",$user, $product, $Img, $Price, $productColour, $prodsize,$prodDelivery,$Quantity,$productPrice,$Payment,$Gurantee,$Logo);
      $result = mysqli_stmt_execute($stmt);
      if($result){
        echo "Successfully Inserted!";
      }else{
        echo "Error occurred! ";
        
      }
  

}
?>