
<?php include('page/db/connection.php') ?>
<?php
if (isset($_POST['submit'])){
	$name=$_POST['user_name'];
	$address=$_POST['address'];
	$number=$_POST['number'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
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

	
	if(empty($name)){
		$st['user_name']="Field Can not be Empty";
	}
	if(empty($address)){
		$st['address']="Field Can not be Empty";
	}
	if (empty($_POST['number'])){
	$st['number']="Field Can not be Empty";	
	}
	elseif(strlen($number)!=11){
	$st['number']="Must Be 11 Digit";	
	}
	if(empty($_POST['email'])){
		$st['email']="Field Can Not Be Empty ";
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$st['email']="Invalid Email Address";
	}
	if(empty($_POST['pass'])){
		$st['pass']="Field Can Not Be Empty";
	}
	if(empty($_POST['cpass'])){
		$st['cpass']="Field Can Not Be Empty";
	}
	if($pass!=$cpass){
		$st['cpass']="Password Does Not Match";
	}
	if(empty($_POST['gen'])){
		$st['gen']="Field Can Not Be Empty";
	}
	if(empty($_POST['dip'])){
	$st['dip']="Field Can Not Be Empty";	
	}
	
}

?>

<?php include"page/inh.php"; ?>

    <!-- End of Sidebar -->

	<!-- start: Header -->
	
<div class="container text-center">
<h1 >Teacher Registration</h1>
<table class="table table-striped">
	<form action="" method="post" enctype="multipart/form-data">
<tr>
	<td>Name</td>
	<td><input type="text" name="user_name" required style="width: 100%;">
	<?php
	if (isset($st['user_name'])){
		echo "<div class='error'>".$st['user_name']."</div>";
	}
	
	?>
	</td>
</tr>
<tr>
	<td>Address</td>
	<td><input type="text" name="address" required style="width: 100%;">
	<?php
	if (isset($st['address'])){
		echo "<div class='error'>".$st['address']."</div>";
	}
	
	?>
	</td>
</tr>
<tr>
	<td>Contact Number</td>
	<td><input type="text" name="number" required style="width: 100%;">
	<?php
	if (isset($st['number'])){
		echo "<div class='error'>".$st['number']."</div>";
	}
	?>
	</td>
</tr>
	<td>Email</td>
	<td><input type="text" name="email" required style="width: 100%;">
	<?php
	if(isset($st['email'])){
		echo "<div class='error'>".$st['email']."</div>";
	}
	?>
	</td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="pass" required style="width: 100%;">
	<?php
	if (isset ($st['pass'])){
		echo "<div class='error'>".$st['pass']."</div>";
	}
	?>
	</td>
</tr>
<tr>
	<td>Confirm Password</td>
	<td><input type="password" name="cpass" required style="width: 100%;">
	<?php
	if (isset ($st['cpass'])){
		echo "<div class='error'>".$st['cpass']."</div>";
	}
	?>
	</td>
</tr>
<tr>
	<td>Select Your Gender</td>
	<td>
	<input type="radio" name="gen" value="male"  >Male
	<input type="radio" name="gen"   value="female" >Female
	<input type="radio" name="gen" value="other" >other
	<?php
	if (isset ($st['gen'])){
		echo "<div class='error'>".$st['gen']."</div>";
	}
	?>
	</td>
</tr>
<tr>
	<td>Select Your Department</td>
	<td>
	 
	<input type="checkbox" name="dip" value="office" >OFFICE
	<input type="checkbox" name="dip" value="admin" >Admin
	<input type="checkbox" name="dip" value="bangla" >Bangla
	<input type="checkbox" name="dip" value="english" >English
	<input type="checkbox" name="dip" value="computer" >Computer
	<input type="checkbox" name="dip" value="law" >Law
	<input type="checkbox" name="dip" value="commerce">Commerce
	<?php
	if (isset($st['dip'])){
		echo "<div class='error'>".$st['dip']."</dip>";
		
	}
	?>
	</td>
</tr>
<tr>
	<td>Upload Your Image</td>
	<td style="color: olive"><input type="file" name="img" required>
	<?php
	if(isset($st['img_name'])){
		echo "<div class='error'>".$st['img_name']."</div>";
		
	}
	?>
	</td>
</tr>
<tr>
	<td>Upload Your Signature</td>
	<td style="color: olive"><input type="file" name="sig" required>
	<?php
	if(isset($st['sig_name'])){
		echo "<div class='error'>".$st['sig_name']."</div>";
		
	}
	?>
	</td>
</tr>

<tr>
<td></td>
	<td><input type="submit" name="submit"></td>
</tr>
<tr>

</form>
</table>
</div>


	
	
  <?php include"page/inf.php"; ?>
<?php
if (isset($_POST['submit'])){
	$name=$_POST['user_name'];
	$address=$_POST['address'];
	$number=$_POST['number'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$gen=$_POST['gen'];
	$dip=$_POST['dip'];
	$img="images/t/".$name.$img_name;
	$sig="images/ts/".$name.$sig_name;
	
	
		$insert_query="INSERT INTO teacher(name,address,number,email,pass,cpass,gen,dip,img,sig) values('$name','$address','$number','$email','$pass','$cpass','$gen','$dip','$img','$sig')";
	
	$run_query=mysqli_query($connect,$insert_query);
	If($run_query){
		echo "<div class='pop1'>"."<div class='pop2'>"."Data INSERT Successfully"."<br>"."<div class='delete'>"."<a href='tlist.php'>closs</a>"."</div>"."</div>"."</div>";
	}
	else{
		echo "<div class='pop1'>"."<div class='pop2'>"."Data INSERT Fail"."<br>"."<div class='delete'>"."<a href='treg.php'>closs</a>"."</div>"."</div>"."</div>";
	}
	
}
	?>


