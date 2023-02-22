<?php include('db/connection.php') ?>
<?php
$sql = "SELECT  sum(addme+card_f+lib_f+s_un+soft_f+jan) as 'tolat' FROM `fee`";
$run_query=mysqli_query($connect,$sql);
$data=mysqli_fetch_array($run_query);
	
	$fe=$data['tolat'];
	echo $fe;
	?>