<?php session_start()?>
<?php
if(empty($_SESSION['email'])){
	header('location:index.php');
}
?>
<?php include"page/h.php"; ?>

    <!-- End of Sidebar -->
<?php include"page/nav.php"; ?>
    <!-- Content Wrapper -->
<?php include"page/nav1.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

      

          
<br />
          

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include"page/foot.php"; ?>