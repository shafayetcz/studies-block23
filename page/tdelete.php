<?php include("db/connection.php");?>
<?php
$delete_id=$_GET['tdelete'];
$delete_qurey="DELETE FROM teacher where t_id=$delete_id";
$run_qurey=mysqli_query($connect,$delete_qurey);
if($run_qurey){
	header('location:http://localhost/school1/sec/soft/tlist.php');
}
?>