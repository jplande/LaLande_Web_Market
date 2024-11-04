<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;



 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Voir commandes </li>
          </ol>

          <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Voir commandes </div>

           

            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                            <tr>
                              <th> Sr# </th>
                              <th> Commande NON </th>
                              <th> Total </th>
                              <th> Status </th>
                              <th> Date </th>
                              <th> Action </th>
                            </tr>
                      </thead>
                    
                      <tbody>

              <?php
                  $i = 1;
                  $qq = mysqli_query($conn,"SELECT * from orders ORDER by id DESC");
                        if(mysqli_num_rows($qq)) {
                        while($rowqq = mysqli_fetch_assoc($qq)) { ?>

                  <tr>
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $rowqq['order_no']; ?> </td>
                      <td> <?php echo $rowqq['total']; ?> </td>
                      <td> <?php echo $rowqq['status']; ?> </td>
                      <td> <?php echo date("d-m-Y", strtotime($rowqq['timestamp'])); ?> </td>
                      <td> <a href="orders_detail.php?id=<?php echo $rowqq['id'] ?>"> Voir Details </a> </td>
                  </tr>

             <?php $i++; } } else {
                              echo '<tr> <td colspan="6"> No Record Found </td> </tr>';
                          }  ?> 
                        
                      </tbody>
                    </table>
              </div>
            </div>

            <div class="card-footer small text-muted">MAJ Hier à 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>Plus d'example bientot...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © siteweb 2021 </span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php  include('footer.php'); ?>