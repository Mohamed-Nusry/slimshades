<?php
require_once('dbcon.php');
session_start();

$name=$_SESSION['name'];
$image=$_SESSION['img'];

$cmnt=$_POST['Comment'];
$prodID=$_POST['ProductID'];
  
$sql = "INSERT INTO tbl_comments (tbl_commentsUsername,tbl_commentsUserImage,tbl_commentsComment,tbl_commentsProductid) VALUES (?,?,?,?)";
      
      $stmt = mysqli_prepare($con,$sql);
      mysqli_stmt_bind_param($stmt,"ssss",$name, $image, $cmnt,$prodID);
      $result = mysqli_stmt_execute($stmt);
      


echo $cmnt;

?>