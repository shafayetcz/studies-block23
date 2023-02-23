<?php session_start()?>
<?php include("page/db/connection.php");?>

 <?php
if (isset($_POST['submit'])){
	$id=$_POST['id'];
	$sig=$_FILES['sig'];
	$img=$_FILES['img'];
	$img_name=$_FILES['img']['name'];
	$img_size=$_FILES['img']['size'];
	// echo $img_size;
	$img_tmp_name=$_FILES['img']['tmp_name'];
	$extension=pathinfo($img_name,PATHINFO_EXTENSION);
	 if($extension=='jpg'||$extension=='png'||$extension=='pdf'){
		if($img_size<=(1024*1024)){
		move_uploaded_file($img_tmp_name,"images/t/".$name.$img_name);
		}
		else{
			//echo"invalid File size";
			$st['img_name']="invalid File size";
		}
	} 
	
	 else{
		//echo"invalid File Format";
		$st['img_name']="invalid File Format";
	}
	
	$sig_name=$_FILES['sig']['name'];
	$sig_size=$_FILES['sig']['size'];
	// echo $img_size;
	$sig_tmp_name=$_FILES['sig']['tmp_name'];
	$extension=pathinfo($sig_name,PATHINFO_EXTENSION);
	 if($extension=='jpg'||$extension=='png'||$extension=='pdf'){
		if($sig_size<=(1024*1024)){
		move_uploaded_file($sig_tmp_name,"images/ts/".$name.$sig_name);
		}
		else{
			//echo"invalid File size";
			$st['img_name']="invalid File size";
		}
	} 
	
	 else{
		//echo"invalid File Format";
		$st['img_name']="invalid File Format";
	}
}


?>
<?php include"page/h.php"; ?>

    <!-- End of Sidebar -->
<?php include"page/inh.php"; ?>
    <!-- Content Wrapper -->
	<!-- start: Header -->
	<div class="container text-center">
	<?php
$edit_data=$_GET['tedit'];


$show_query="SELECT * FROM teacher where t_id=$edit_data";
$run_query=mysqli_query($connect,$show_query);
while($rows=mysqli_fetch_array($run_query)){
	$id=$rows['t_id'];
	$name=$rows['name'];
	$address=$rows['address'];
	$number=$rows['number'];
	$email=$rows['email'];
	$pass=$rows['pass'];
	$cpass=$rows['cpass'];
	$gen=$rows['gen'];
	$dip=$rows['dip'];
	$img=$rows['img'];
	$sig=$rows['sig'];

}
?>
	<table class="table table-striped ta">
		<td>Teacher Image</td>
	<td style="color: olive"><?php echo "<img src='$img' height='100' width='100' />"; ?>
	</td>
</tr>
<tr>
	<td>Teacher Signature</td>
	<td style="color: olive"><?php echo "<img src='$sig' height='100' width='100' />"; ?>
	</td>
	<tr>
	
		
		<form action="" method="post" >
		<tr>
			<td>Teacher Name</td>
			<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="<?php echo $address; ?>"></td>
		</tr>
		<tr>
			<td>Teacher Number</td>
			<td><input type="text" name="number" value="<?php echo $number; ?>"></td>
		</tr>
		<tr>
			<td>E-male</td>
			<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
		</tr>
		<td>Password</td>
			<td><input type="text" name="pass" value="<?php echo $pass; ?>"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="text" name="cpass" value="<?php echo $cpass; ?>"></td>
		</tr>
		<tr>
		<tr>
			<td>Gender</td>
			<td><input type="text" name="gen" value="<?php echo $gen; ?>"></td>
		</tr>
		<tr>
			<td>Your Dpartment</td>
			<td><input type="text" name="dip" value="<?php echo $dip; ?>"></td>
		</tr>
		
		
			
			<tr>
	
</tr>
			
			
			
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="update" value="update"></td>
		</tr>
		
		</form>
	</table>
	</div>

		
	 <?php include"page/inf.php"; ?>
</body>
</html>
<?php
if(isset($_POST['update'])){
	$name=$_POST['name'];
	$address=$_POST['address'];
	$number=$_POST['number'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$gen=$_POST['gen'];
	$dip=$_POST['dip'];
	
	$update_query="UPDATE teacher SET name='$name',address='$address',number='$number',email='$email',pass='$pass',cpass='$cpass',gen='$gen',dip='$dip' where t_id=$edit_data";
	
	$run_update_query=mysqli_query($connect,$update_query);
	If($run_update_query){
		echo "<div class='pop1'>"."<div class='pop2'>"."Data update Successfully"."<br>"."<div class='delete'>"."<a href='tlist.php'>closs</a>"."</div>"."</div>"."</div>";
		
		
	}
	else{
		echo "Data update Fail";
	}
}
?>