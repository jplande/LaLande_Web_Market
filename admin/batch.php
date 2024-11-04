<?php include('../includes/connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }
include('header.php'); 

$msg = 0;

if(isset($_POST['delete'])) {
    mysqli_query($DB_CONN,"DELETE from batch WHERE id='{$_POST['hide_id']}'");

    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong>  Batch supp reussi </div>';
}


?>
      <div id="content-wrapper">

        <div class="container-fluid">

        
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Batch </li>
          </ol>

              <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>  Batch 
              <a href="add_batch.php" class="btn btn-info btn-sm" style="float: right;"> Add Batch </a>
          </div>


          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> Sr# </th>
                      <th> Batch </th>
                      <th> Actions</th>
                    </tr>
                  </thead>
                
                  <tbody>

<?php $i = 1; $sql=  mysqli_query($DB_CONN,"SELECT * from batch");
      while($rowsql = mysqli_fetch_assoc($sql)) {  ?>
                    <tr>
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $rowsql['batch_no']; ?> </td>    
                      <td> 
                      <form method="POST" action="">
                      <input type="hidden" name="hide_id" value="<?php echo $rowsql['id']; ?>" >
                      <button type="submit" title="Delete" name="delete" class="btn btn-sm btn-danger"> <i class="fa fa-times"> </i>  Delete </button>
                        </form>
                      </td>
                    </tr>
    <?php $i++; } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      
      
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