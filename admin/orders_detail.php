<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

 include('header.php'); 

$msg = 0;


if(isset($_POST['updatestatus'])) {
    mysqli_query($conn,"UPDATE orders set status='{$_POST['status']}' WHERE id='{$_GET['id']}'");
    $msg = 1;
    $msg_alert = '<br> <div class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Succes! </strong> Status MAJ avec succes </div>';
}


$qq = mysqli_query($conn,"SELECT * from users JOIN orders on orders.user_id=users.id WHERE orders.id='{$_GET['id']}'");
$rowqq = mysqli_fetch_assoc($qq);

 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Detail commande </li>
          </ol>

          <?php if ($msg=='1') {
                echo $msg_alert;
              } ?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Detail Commande </div>

           

            <div class="card-body">
              <table class="table table-striped">
                  <tr>
                      <th> Commande Non </th>
                      <td> <?php echo $rowqq['order_no']; ?> </td>
                      <th> Total </th>
                      <td> <?php echo $rowqq['total']; ?> </td>
                      <th> Status </th>
                      <td> <?php echo $rowqq['status']; ?> </td>
                  </tr>

                  <tr>
                      <th> Clients </th>
                      <td> <?php echo $rowqq['username']; ?> </td>
                      <th> Contact </th>
                      <td> <?php echo $rowqq['contact']; ?> </td>
                      <th> Address </th>
                      <td colspan="3"> <?php echo $rowqq['address']; ?> </td>
                  </tr>

                  <tr>
                      <th> ID Transaction  </th>
                      <td> <?php echo $rowqq['txn_id']; ?> </td>
                      <th> Payment Way </th>
                      <td> <?php echo $rowqq['pay_way']; ?> </td>
                      <th> Date </th>
                      <td> <?php echo date("d-m-Y", strtotime($rowqq['timestamp'])); ?> </td>
                      
                  </tr> 
<form method="POST" action="">
  <tr>
      <th> MAJ Status </th>
      <td colspan="2"> 
        
        <select name="status" class="form-control">
              <option value="Pending" <?php if ($rowqq['status']=='Pending') { echo 'selected'; } ?> > Envoi </option> 
              <option value="Processing" <?php if ($rowqq['status']=='Processing') { echo 'selected'; } ?>> Encours </option>
              <option value="Cancelled" <?php if ($rowqq['status']=='Cancelled') { echo 'selected'; } ?>> Annulé </option>
              <option value="Delivered" <?php if ($rowqq['status']=='Delivered') { echo 'selected'; } ?>> Delivré </option>
           </select>

      </td>
      <th> <input type="submit" name="updatestatus" value="Update" class="btn btn-primary"> </th>
  </tr> 
 </form>

              </table>
 

              <div class="table-responsive"> <br><br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                           <tr>
                               <th> Sr# </th>
                               <th> Produit </th>
                               <th> Qté </th>
                               <th> Total </th>
                           </tr>
                      </thead>
                    
                      <tbody>

                        <?php 
                              $j = 1;
                              $qqmore = mysqli_query($conn,"SELECT * from orders_detail JOIN products on orders_detail.product_id=products.id WHERE orders_detail.order_id='{$_GET['id']}'");

                                    if(mysqli_num_rows($qqmore)) {
                                    while($rowqqmore = mysqli_fetch_assoc($qqmore)) { 

                                     echo '<tr>
                                               <td>'.$j.'</td>
                                               <td>'.$rowqqmore['name'].'</td> 
                                               <td>'.$rowqqmore['qty'].'</td>
                                               <td>'.$rowqqmore['price']*$rowqqmore['qty'].'</td>
                                          </tr>';

                                  $j++;  } } else {
                                      echo '<tr> <td colspan="6"> No Record Found </td> </tr>';
                                  } ?>
                        
                      </tbody>
                    </table>
              </div>
            </div>

            <div class="card-footer small text-muted">MAJ Hier à 11:59 PM</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<?php  include('footer.php'); ?>