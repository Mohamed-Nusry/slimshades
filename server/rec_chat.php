<?php
require_once('dbcon.php');
session_start();

$unamefrom=$_SESSION['name'];
		$unameto=$_POST['chtToname'];
		$sql="SELECT * FROM tbl_chat WHERE tbl_chat_from=? and tbl_chat_to=? OR tbl_chat_from=? and tbl_chat_to=? ";

		$stmt=mysqli_prepare($con,$sql);

		mysqli_stmt_bind_param($stmt,"ssss",$unamefrom,$unameto,$unameto,$unamefrom);

		$result=mysqli_stmt_execute($stmt);

		if($result){
			mysqli_stmt_bind_result($stmt,$chtId,$chtTo,$chtFrom,$chtMessage,$chtTime);

			}
			while(mysqli_stmt_fetch($stmt)){

				if($chtFrom==$_SESSION['name']){
					$chtFrom="You";
				}
					$data= '<label id="lblchtname">'.$chtFrom.' - '.'</label><label id="lblchtmsg">'.$chtMessage.'</label><br><label id="lblchtTime">'.$chtTime.'</label><br>';

					echo $data;
			}

			//echo $data;

			
					
				?>