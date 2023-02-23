
<?php include('page/db/connection.php') ?>
<?php include"page/h.php"; ?>

    <!-- End of Sidebar -->
<?php include"page/inh.php"; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">

        
          <!-- Page Heading -->
      
            <h1 class="text-center text-info">Teacher List</h1>
		
          

        
        <!-- /.container-fluid -->
 <table class="table table-bordered table-responsive">
<tr>
	<td>Name</td>
	<td>Address</td>
	<td>number</td>
	<td>E-mail</td>
	<td>pass</td>
	<td>cpass</td>
	<td>gen</td>
	<td>dip</td>
	<td>img</td>
	<td>sig</td>
	<td>Program</td>
</tr>
<?php
$show_query="SELECT * FROM teacher";
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

?>
<tr>
	<td><?php echo $name; ?></td>
	<td><?php echo $address; ?></td>
	<td><?php echo $number; ?></td>
	<td><?php echo $email; ?></td>
	<td><?php echo $pass; ?></td>
	<td><?php echo $cpass; ?></td>
	<td><?php echo $gen; ?></td>
	<td><?php echo $dip; ?></td>
	<td><?php echo "<img src='$img' height='50' width='50' />"; ?></td>
	<td><?php echo "<img src='$sig' height='50' width='50' />"; ?></td>

<td><button type="button" class="btn btn-primary "><a href="tedit.php?tedit=<?php echo $id; ?>" class="text-white">Edit</a></button><button type="button" class="btn btn-danger"><a href="page/tdelete.php?tdelete=<?php echo $id ?>" class="text-white">Delete</a></button></td>
	</tr>

<?php } ?>
</table>
      </div>
   
	 
   <?php include"page/inf.php"; ?>