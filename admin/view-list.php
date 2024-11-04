<?php include('../includes/connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;

if(isset($_POST['delete'])) {
    mysqli_query($DB_CONN,"DELETE from items WHERE id='{$_POST['hide_id']}'");

    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong>  Ad Deleted Successfully </div>';
}


 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> A Ajouter Listes </li>
          </ol>

          <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Ads Lists </div>

           

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr# </th>
                      <th>Titre</th>
                      <th>Categorie</th>
                      <th>Prix</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sr# </th>
                      <th>Titre</th>
                      <th>Categorie</th>
                      <th>Prix</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>

<?php $i = 1; $sql=  mysqli_query($DB_CONN,"SELECT * from items");
      while($rowsql = mysqli_fetch_assoc($sql)) {

      $category = mysqli_fetch_assoc(mysqli_query($DB_CONN,"SELECT * from category WHERE code='{$rowsql['cat_id']}'"));
       ?>

                    <tr>
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $rowsql['title']; ?> </td>
                      <td> <?php echo $category['name']; ?></td>
                      <td> <?php echo $rowsql['price']; ?></td>
                      <td> <?php echo $rowsql['date']; ?> </td>
                      <td> <form method="POST" action="">
                        <input type="hidden" name="hide_id" value="<?php echo $rowsql['id']; ?>" >

                       <a target="_blank" href="../post.php?id=<?php echo $rowsql['barcode']; ?>" title="View" class="btn btn-sm btn-info"> View </a> &nbsp; &nbsp;

                       <button type="submit" title="Delete" name="delete" class="btn btn-sm btn-danger"> Supprimer </button>
                     

                       

                        </form> </td>
                    </tr>

    <?php $i++; } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">MAJ Hier à 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>plusieurs tables d'examples bientot...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © siteweb 2020 </span>
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