<?php include('../connection.php');
@session_start();

if(!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  }

$catsum = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as totalcategory from category"));

$ads = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as totalproducts from products WHERE type != 'article'"));

$totord = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as totalorders from orders"));

$totuser = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as totalusers from users"));

$totuser = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as totalusers from users"));


 include('header.php');


  ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Apercu</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-tasks"></i>
                  </div>
                  <div class="mr-5"> <?php echo $catsum['totalcategory']; ?> </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="view_category.php">
                  <span class="float-left">Total Categorie</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-table"></i>
                  </div>
                  <div class="mr-5"> <?php echo $ads['totalproducts']; ?>  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="view_products.php">
                  <span class="float-left"> Total Produits </span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
  




            <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-braille"></i>
                  </div>
                  <div class="mr-5"> <?php echo $totord['totalorders']; ?>  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="view_orders.php">
                  <span class="float-left"> Total commande </span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


             <div class="col-xl-4 col-sm-6 mb-4">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <div class="mr-5"> <?php echo $totuser['totalusers']; ?>  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="view_users.php">
                  <span class="float-left"> Total Users </span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

          </div>
        </div>
 
<?php include('footer.php'); ?>