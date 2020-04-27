<?php
require_once('dbcon.php');
session_start();

if(isset($_GET['pID'])){
  $pid=$_GET['pID'];
    
$sql = "DELETE FROM tbl_sale WHERE sale_ID=?";
      
      $stmt = mysqli_prepare($con,$sql);
      mysqli_stmt_bind_param($stmt,"i",$pid);
      $result = mysqli_stmt_execute($stmt);
      if($result){
        ob_start();
        header('Location:../Cart.php');
        ob_end_flush();
        exit();

      }else{
        echo "Error occurred! ";
        ob_start();
        header('Location:../Cart.php');
        ob_end_flush();
        exit();
        
      }
  /*$sql="SELECT u_name,u_email,u_gender,u_address,u_dob,u_mobile FROM tbl_user WHERE u_email=? AND u_password=?";
  $stmt=mysqli_prepare($con,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$email,$pass);

  $result=mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $name,$mail,$gender,$address,$dob,$mob);
  mysqli_stmt_fetch($stmt);
  if($mail==$email){ //validation 
    $_SESSION['name']=$name;
    $_SESSION['email']=$mail;
    $_SESSION['gender']=$gender;
    $_SESSION['address']=$address;
    $_SESSION['dob']=$dob;
    $_SESSION['mob']=$mob;
       ob_start();
        header("Location:../index.php");
        ob_end_flush();
        exit();
    }
    else{
    echo "try again".mysqli_error($con);
  }

 

}else{
 ob_start();
        header("Location:../login.php");
        ob_end_flush();
        exit();
}


*/

}
?>