<?php session_start()?>
<?php include('db/connection.php'); ?>
<?php
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	echo "djfsj";
	$select_query="SELECT * FROM Teacher WHERE name='$username' && email='$email' && pass='$password'";
	$run_query=mysqli_query($connect,$select_query);
	$count=mysqli_num_rows($run_query);
	if($count>0){
		header('location:http://localhost/school1/sec/Teacher/soft.php');
		$_SESSION['name']=$username;
		$_SESSION['email']=$email;
		$_SESSION['pass']=$password;
	}
	else{
		header('location:http://localhost/school1/sec/soft/page/er.php');
	}
}
?>