<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;

if(isset($_POST['delete'])) {
    mysqli_query($conn,"DELETE from products WHERE id='{$_POST['hide_id']}'");

    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Success! </strong>  suppression produit reussi</div>';
}


 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Voir Produits </li>
          </ol>

          <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <div class="card mb-12">
            <div class="card-header">
              <i class="fas fa-table"></i>
               Voir Produits

              <a href="add_products.php" class="btn btn-info btn-sm" style="float: right;"> Ajouter Produits </a>
            </div>

           

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> Sr# </th>
                      <th> Nom </th>
                      <th> Categorie </th>
                      <th> Image </th>
                      <th> Prix </th>
                     
                      <th> Actions </th>
                    </tr>
                  </thead>
                
                  <tbody>

<?php $i = 1; 
            $sql=  mysqli_query($conn,"SELECT * from products WHERE type != 'article' ORDER by id DESC");
            while($rowsql = mysqli_fetch_assoc($sql)) { 

             $stdn =   mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from category WHERE id='{$rowsql['cat']}'"));  ?>
                    <tr>
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $rowsql['name']; ?> </td>  
                      <td> <?php echo $stdn['name']; ?> </td>    
                      <td> <img style="width: 100px" src="../images/<?php echo $rowsql['image']; ?>">  </td> 
                      <td> <?php echo $rowsql['price']; ?> </td> 
                      <td> 
                      <form method="POST" action="">
                      <input type="hidden" name="hide_id" value="<?php echo $rowsql['id']; ?>" >
                          <button type="submit" title="Delete" name="delete" class="btn btn-sm btn-danger"> <i class="fa fa-times"> </i>  Supprimer </button>
                          <a href="edit_article.php?id=<?php echo $rowsql['id']; ?>" title="View & Edit" class="btn btn-sm btn-success"> <i class="fa fa-eye"> </i>  Voir & Editer </a>
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