<?php
require_once('dbcon.php');


  /*$sql="SELECT p_name,p_details,p_image FROM tbl_user WHERE u_email=? AND u_password=?";
  $stmt=mysqli_prepare($con,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$email,$pass);

  $result=mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $name,$mail);
  mysqli_stmt_fetch($stmt);
  if($mail==$email){
       ob_start();
        header("Location:../index.php");
        ob_end_flush();
        exit();
    }
    else{
    echo "try again".mysqli_error($con);
  }*/



if(isset($_POST['user'])){
  $user=$_POST['user'];
  //$email=$_POST['email'];
 // $pass=$_POST['password'];

  $sql="SELECT u_name,u_email FROM tbl_user WHERE u_name='John' ";
  $stmt=mysqli_prepare($con,$sql);
  

  $result=mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $name,$mail);
  mysqli_stmt_fetch($stmt);
  $data='hi';
  
       echo $mail;
    
    

 

}else{
  echo $user;
}








?>