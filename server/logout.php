<?php

session_start();


if(isset($_SESSION['name'])){
  session_destroy();
  session_unset();
  ob_start();
  header("Location:../login.php");
  ob_end_flush();
  exit();


}else{
	echo "session not set";
}


?>