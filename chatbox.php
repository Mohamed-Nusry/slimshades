<?php
require_once('server/dbcon.php');
include('header.php');
include('nav.php');


		$sql="SELECT COUNT(*) FROM tbl_chat";
		$stmt=mysqli_prepare($con,$sql);
		$result=mysqli_stmt_execute($stmt);


		if($result){
		  mysqli_stmt_bind_result($stmt,$count);
		  }
		  
		  while(mysqli_stmt_fetch($stmt)){
		    ?>

		    <label id="cmntCount"><?php echo $count ?></label>

		    <?php 

}
		$unamefrom="Harry";
		$unameto="alex";
		$sql="SELECT * FROM tbl_chat WHERE tbl_chat_from=? and tbl_chat_to=? OR tbl_chat_from=? and tbl_chat_to=? ";

		$stmt=mysqli_prepare($con,$sql);

		mysqli_stmt_bind_param($stmt,"ssss",$unamefrom,$unameto,$unameto,$unamefrom);

		$result=mysqli_stmt_execute($stmt);

		if($result){
			mysqli_stmt_bind_result($stmt,$chtId,$chtTo,$chtFrom,$chtMessage,$chtTime);

			?>
			<div class="cht">
					<label>Chatbox</label>
					<br>
			<?php
			?>
			<!-- 
				<div class="chtmsg">
					<label id="lblchtname"><?php if($chtFrom==$_SESSION['name']){ echo "You"." -";}else{ echo $chtFrom." -";}?></label>
					<label id="lblchtmsg"><?php echo $chtMessage;?></label>
					<br>
					<label id="lblchtTime"><?php echo $chtTime;?></label>
					</div>
				</div> 
				<br>-->
				


	<?php
			
			?>





<body>



	<div class="container">
		<h2 align="center" class="signupText">Chat box</h2>
		<div class="row">
			
		

			<div class="col-sm-6 chatbox">
			<p>hi</p>
			<label id="lblchtusername"><?php echo $_SESSION['name']; ?></label>
			<div style="width:400px; height: 430px; border:solid; background-color: white; margin-top: -15px; margin-left: 15px; "  id="chtbx" class="chtbox"> 
			<div id="chtname">
				<p style="background-color: lightblue; font-weight: bold">Chat name</p>
			</div>
			<div style="border-width: 1px; font-weight: bold; border-style: solid; height: 250px; width: 300px; margin-left: 44px; overflow: scroll;" id="chatmsg">
			<?php

			while(mysqli_stmt_fetch($stmt)){
					
				?>
				<label id="lblchtname"><?php if($chtFrom==$_SESSION['name']){ echo "You"." -";}else{ echo $chtFrom." -";}?></label>
					<label id="lblchtmsg"><?php echo $chtMessage;?></label>
					<br>
					<label id="lblchtTime"><?php echo $chtTime;?></label>
					<br>
					

				<div id="nowMsg">
					<label id="nowMessage"></label>
				</div>
					
			</div>
			<div id="chtType">
				<textarea name="chat_msg" id="chat_msg" class="form-control" style="width: 300px; margin-left: 44px; margin-top: 10px;"></textarea>';
			</div>
			<div id="chtsubmit">
				<button type="button" name="send_cht" id="send_cht" class="btn btn-info send_cht" style="width: 140px; margin-left: 200px; margin-top: -15px;">Send</button>
			</div>
			</div>

			</div>


			<div class="col-sm-6">
				<!-- <table border="1">
					
					<th>Name</th>
					<th>Status</th>
					<th>Action</th>
					<tr>
					 <?php
					//include('chatbox2.php');

			//while(mysqli_stmt_fetch($userfetchstmt)){
					
				?> 
					<td class="tblnmee"><label id="tblnme"><?php //echo $nme; ?></td>
					<td>Online</td>
					<td><input type="button" name="chat" class="start_chat" value=<?php //echo $nme; ?>></td>
					</tr>
					
				
			<?php
		}
		?>
			
				
				</table> -->
				<div id="user_details"></div>

				<div id="user_model_details"></div>
				
			</div>

			
		</div>
		


	</div>

	<p id="labeldefault">#nowMessage</p>
	<!-- <p id="chtnewdiv">#chtnewdiv</p> -->
<div id="block1"></div>

<div id="chtall"></div>

<button type="button" name="snd_cht" id="snd_cht" class="btn btn-info snd_cht" style="width: 140px; margin-left: 200px; margin-top: -15px;">Check</button>


<!-- <button type="button" name="send_chat" id="send_msgchat" class="btn btn-info send_chat">Send</button> -->

	<?php

				
				
			

			}else{
				echo mysqli_stmt_error($stmt);
			}


	include('footer.php');

	?>

<script>
	$(document).ready(function(){
		fetch_user();
		function fetch_user(){
			$.ajax({
				url:"chatbox2.php",
				method:"POST",
				success:function(data){
					$('#user_details').html(data);
				}

			});
		}
	});
</script>







