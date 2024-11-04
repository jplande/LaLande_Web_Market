<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }



$msg = false;

if(isset($_POST['update_products'])) {


    $product_img=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "../images/$product_img");

    if(!empty($product_img)) {
      mysqli_query($conn,"UPDATE products set image='{$product_img}' WHERE id='{$_GET['id']}'");
    }


    mysqli_query($conn,"UPDATE products set name='{$_POST['title']}',cat='{$_POST['cat']}',price='{$_POST['price']}',description='{$_POST['description']}' WHERE id='{$_GET['id']}'");
 
      $msg==true;
      $alertmsg =  "<br><br> <h3 style='color:green'> Updated Successfully </h3>";
     header('location: view_products.php');

}



 include('header.php');    
   $qu =  mysqli_query($conn,"SELECT * from products WHERE id='{$_GET['id']}'");
   $fetchqu = mysqli_fetch_assoc($qu);


 ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Voir & modifier produits </li>
          </ol>

          <?php if ($msg==true) {
                echo $alertmsg;
              } ?>

          
          <div class="card mb-3">
            <div class="card-header"> <i class="fas fa-table">  </i> Voir & modifier produits  
            <a href="view_products.php" class="btn btn-info btn-sm" style="float: right;"> VoirProduits </a>
          </div>

            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" enctype="multipart/form-data" >
                          <label> Title </label>
                          <input type="text" name="title" value="<?php echo $fetchqu['name'] ?>" class="form-control" placeholder="Enter Title" required> <br>

                        
                          <label> Categorie </label>
                          <select name="type" class="form-control" required>
                                   <?php $cat =  mysqli_query($conn,"SELECT * from category");
                                      while($rowcat = mysqli_fetch_assoc($cat)) { ?>
                                    <option <?php if($rowcat['id']==$fetchqu['cat']){ echo 'selected'; } ?>  value="<?php echo $rowcat['id'] ?> "> <?php echo $rowcat['name'] ?>  </option>
                                   <?php  } ?>
                          </select> <br>

                          <label> Prix </label>
                          <input type="text" name="price" class="form-control" value="<?php echo $fetchqu['price'] ?>" placeholder="Enter Participants" required > <br>

                          <label> Description </label>
                          <textarea style="height:200px" name="description" class="form-control" > <?php echo $fetchqu['description'] ?> </textarea> <br>

                           <button type="submit" style="width: 30%" name="update_products" class="btn btn-primary form-control" > MAJ Produit </button>
                    </form>
              </div>
            </div>
          </div>
 
      
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2020 </span>
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