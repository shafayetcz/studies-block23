<?php include('db/connection.php') ?>
<?php
$delete_id=$_GET['hdelete'];
$delete_qurey="DELETE FROM hall where h_id=$delete_id";
$run_qurey=mysqli_query($connect,$delete_qurey);
if($run_qurey){
	header('location:http://localhost/school1/soft/hall.php');
}
?>