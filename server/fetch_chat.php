<?php
require_once('dbcon.php');
session_start();


$divnme=$_POST['Divnme'];
$chatname=$_SESSION['name'];;
$chatto=$_POST['chatTo'];
$chatmsg=$_POST['chatmessage'];
$chattime=$_POST['chatTime'];
$_SESSION['countchtbx'];

$_SESSION['countchtbx']++;


if($chatmsg!="" && $chatmsg!=null){

  
$sql = "INSERT INTO tbl_chat (tbl_chat_to,tbl_chat_from,tbl_chat_message,tbl_chat_date) VALUES (?,?,?,?)";
      
      $stmt = mysqli_prepare($con,$sql);
      mysqli_stmt_bind_param($stmt,"ssss",$chatto, $chatname, $chatmsg,$chattime);
      $result = mysqli_stmt_execute($stmt);
      if($result){
        echo "success";
      }else{
        echo "try again".mysqli_error($con);
      }

}else{
  echo "provide message";
}

echo $divnme.$_SESSION['countchtbx'];
?>