<?php
	$price=$_POST['price'];
	$qnty=$_POST['qnty'];

	

	$tot=$price * $qnty;

	echo $tot;
?>