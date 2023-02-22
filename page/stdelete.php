<?php include("db/connection.php");?>
<?php
$delete_id=$_GET['stdelete'];
$delete_qurey="DELETE FROM st_info where st_id=$delete_id";
$run_qurey=mysqli_query($connect,$delete_qurey);
if($run_qurey){
	header('location:http://localhost/school1/sec/soft/stv.php');
}
?>