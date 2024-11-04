<?php  include 'connection.php';
@session_start();
 if(!isset($_SESSION['email'])) {
     header('location: login.php');
 }

$alert = false;
$alertmsg = '';

$query = mysqli_query($conn,"SELECT * from users WHERE email='{$_SESSION['email']}'");
$checkq = mysqli_fetch_assoc($query);

if (isset($_POST['updateprofile'])) {

    $up = mysqli_query($conn,"UPDATE users set username='{$_POST['name']}',email='{$_POST['email']}',contact='{$_POST['phone']}',address='{$_POST['address']}' WHERE id='{$checkq['id']}'");

    $alert = true;
    $alertmsg =  "<br><br> <center> <h3 style='color:green'> Compte mis à jour !!! </h3>  <center>";

}


if (isset($_POST['updatepassword'])) {

    $up = mysqli_query($conn,"UPDATE users set password='{$_POST['newpassword']}' WHERE id='{$checkq['id']}'");

    $alert = true;
    $alertmsg =  "<br><br> <center> <h3 style='color:green'> Password Updated Successfully !!! </h3>  <center>";

}
include 'header.php';

?>

    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> Compte </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="logout.php"> Deconnexion </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


  <div class="container">
      <div class="row">


          
        <ul class="nav nav-tabs" style="margin-top: 50px">
            <li style="padding: 20px;font-weight: bold" ><a data-toggle="tab" href="#menu2"> Commandes </a></li>
            <li style="padding: 20px;font-weight: bold" class="active"><a data-toggle="tab" href="#home"> Information Profil </a></li>
            <li style="padding: 20px;font-weight: bold" ><a data-toggle="tab" href="#menu1"> Changer le mot de passe </a></li>
            
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade">
                  <br><br> <h1> Profil Information </h1> <br>
                  <form action="" method="post"  enctype="multipart/form-data">

                  <div class="form-group">
                    <label> Nom </label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $checkq['username'] ?>" required />
                  </div>

                  <div class="form-group">
                    <label> Email </label>
                    <input type="email" class="form-control" readonly name="email" id="email" placeholder="Your Email" value="<?php echo $checkq['email'] ?>" required />
                  </div>


                  <div class="form-group">
                    <label> Contact </label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Your Contact" value="<?php echo $checkq['contact'] ?>" required />
                  </div>

                  <div class="form-group">
                    <label> Addresse </label>
                    <textarea class="form-control" name="address" id="address"  required ><?php echo $checkq['address'] ?>  </textarea>
                  </div>

                 
                  <div class="form-action">
                    <button type="submit" name="updateprofile" class="btn btn-success"> Mis à jour du Profile </button>
                  </div>
                </form>
            </div>



            <div id="menu1" class="tab-pane fade">
                  <br><br> <h1> Changer le mot de Pass </h3>  <br>
                  <form action="" method="post"  enctype="multipart/form-data">

                    <div class="form-group">
                      <label> Mot de passe actuel </label>
                      <input type="password" class="form-control" name="oldpassword" id="oldpassword" value="<?php echo $checkq['password'] ?>" placeholder="Your Current Password" required />
                    </div>

                    <div class="form-group">
                      <label> Nouveau mot de passe </label>
                      <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Your Current Password" required />
                    </div>

                      <div class="form-action">
                        <button type="submit" name="updatepassword" class="btn btn-primary"> mis à jour mdp </button>
                      </div>
                  </form>
            </div>


            <div id="menu2" class="tab-pane active">
              <br><br> <h1> Commande </h1> <br>

              <table class="table table-hover">
                  <tr style="background-color: #B0B435 !important;color: white">
                      <th> Sr# </th>
                      <th> Commande NO </th>
                      <th> Total </th>
                      <th> Status </th>
                      <th> Date </th>
                      <th> Action </th>
                  </tr>


<?php
$i = 1;
$qq = mysqli_query($conn,"SELECT * from orders WHERE user_id='{$_SESSION['id']}'");
      if(mysqli_num_rows($qq)) {
      while($rowqq = mysqli_fetch_assoc($qq)) { ?>

                  <tr>
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $rowqq['order_no']; ?> </td>
                      <td> <?php echo $rowqq['total']; ?> </td>
                      <td> <?php echo $rowqq['status']; ?> </td>
                      <td> <?php echo date("d-m-Y", strtotime($rowqq['timestamp'])); ?> </td>
                      <td>  <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#<?php echo $rowqq['id'] ?>" href="#collapse<?php echo $rowqq['id'] ?>">
                             Voir Details </a>
                          </h4> </td>
                  </tr>

                  <tr>
                     <td colspan="6">
                      <div class="panel-group" id="<?php echo $rowqq['id'] ?>" >
                        <div class="panel panel-danger">
                          <div id="collapse<?php echo $rowqq['id'] ?>" class="panel-collapse collapse" >
                            <div class="panel-body" >
                                 <table class="table table-bordered">
                                     <tr>
                                         <th> Sr# </th>
                                         <th> Produit </th>
                                         <th> Qté </th>
                                         <th> Total </th>
                                     </tr>
<?php 
$j = 1;
$qqmore = mysqli_query($conn,"SELECT * from orders_detail JOIN products on orders_detail.product_id=products.id WHERE orders_detail.order_id='{$rowqq['id']}'");

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
                                 </table>
                            </div>
                          </div>
                        </div>
                      </div> 
                     </td>
                  </tr>
            <?php $i++; } } else {
                  echo '<tr> <td colspan="6"> No Record Found </td> </tr>';
              }  ?>          
              </table>
              
            </div>
          </div>
      </div>
    </div>
<br><br>     
 
<?php include 'footer.php'; ?>