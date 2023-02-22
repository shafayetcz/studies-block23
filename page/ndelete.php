<?php include('db/connection.php') ?>
<?php
$delete_id=$_GET['ndelete'];
$delete_qurey="DELETE FROM notice where n_id=$delete_id";
$run_qurey=mysqli_query($connect,$delete_qurey);
if($run_qurey){
	header('location:http://localhost/school1/soft/notice.php');
}
?>