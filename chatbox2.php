<?php
require_once('server/dbcon.php');

session_start();

$uname=$_SESSION['name'];

			$userfetchsql="SELECT u_id,u_name FROM tbl_user";

		$userfetchstmt=mysqli_prepare($con,$userfetchsql);

//mysqli_stmt_bind_param($userfetchstmt,"s",$uname);

		$userfetchresult=mysqli_stmt_execute($userfetchstmt);

		 
		if($userfetchresult){
			mysqli_stmt_bind_result($userfetchstmt,$uid,$uname);
}

$output= '
<table class="table table-bordered table-striped">
	<tr>
		<td>Username</td>
		<td>Status</td>
		<td>Action</td>
	<tr>
';
		


while(mysqli_stmt_fetch($userfetchstmt)) { 
	$output .= '
	<tr>
		<td>' .$uname. '</td>
		<td></td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' .$uid.'"data-tousername="' .$uname.'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;
	
	
	


			?>


	
			






