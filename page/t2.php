<?php include('db/connection.php') ?>
<?php
$sql = "SELECT  sum(ae) as 'to' FROM `expense`";
$run_query=mysqli_query($connect,$sql);
$data=mysqli_fetch_array($run_query);
	$ex=$data['to'];
	echo $ex;
	?>