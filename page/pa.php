<?php session_start()?>
<?php
if(empty($_SESSION['email'])){
	header('location:index.php');
}
?>
<?php include("page/db/connection.php");?>
<?php include"page/h.php"; ?>

    <!-- End of Sidebar -->
<?php include"page/nav.php"; ?>
    <!-- Content Wrapper -->
<?php include"page/nav1.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
<div class="container text-center">
<h1>January Fee Entry</h1>
<table class="table table-bordered ">

		 <tr>
    
	<td>Student Name</td>
	<td>Student Roll</td>
	<td>Student Class</td>
	
    </tr>
<?php
$query=mysqli_query($connect,"SELECT *
FROM fee
left JOIN st_info
ON fee.st_id=st_info.st_id where jancon=1");

while($rows=mysqli_fetch_array($query)){
	$id=$rows['st_id'];
	$st_name=$rows['st_name'];
	$st_roll=$rows['st_roll'];
	$st_class=$rows['st_class'];

	
	


?>
<tr>
	
	
	<td><?php echo $st_name; ?></td>
	<td><?php echo $st_roll; ?></td>
	<td><?php echo $st_class; ?></td>
	
	
<?php }?>
</tr>

</table>
<div>
 <?php include"page/foot.php"; ?>

</body>
</html>
<?php
if (isset($_POST['update'])){
	$st_id=$id;	
	$monthf=$_POST['mafee'];
	$ca=$_POST['ca'];
	$fine=$_POST['fine'];
	
	$update_query="UPDATE fee SET ap='$monthf',apf='$fine',apcon='$ca' where st_id=$st_id";
	
	$run_update_query=mysqli_query($connect,$update_query);
	If($run_update_query){
		echo "<div class='pop1'>"."<div class='pop2'>"."Data update Successfully"."<br>"."<div class='delete'>"."<a href='tlist.php'>closs</a>"."</div>"."</div>"."</div>";
		
		
	}
	else{
		echo "Data update Fail";
	}
}
?>