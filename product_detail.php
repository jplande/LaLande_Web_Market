<?php include 'header.php';
include 'connection.php';

$si = mysqli_query($conn,"SELECT * from products WHERE id='{$_GET['id']}'");
$rirow = mysqli_fetch_assoc($si);


 ?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> <?php echo $rirow['name'] ?> </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                        <li class="breadcrumb-item active">Detail Produit </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin TITRE BOX -->

    <!-- Debut detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="images/<?php echo $rirow['image'] ?>" alt="<?php echo $rirow['name'] ?>"> </div>
                        </div>
                    
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>  <?php echo $rirow['name'] ?> </h2>
                        <h5>  $  <?php echo $rirow['price'] ?> </h5>
						<h4> Description:</h4>
						<p>  <?php echo $rirow['description'] ?> </p>

                        <form method="POST" action="">
    						<ul>
    							<li>
    								<div class="form-group quantity-box">
    									<label class="control-label">Quantité</label>
    									<input id="qty" name="qty" class="form-control" value="1" min="1" max="10" type="number">
    								</div>
    							</li>
    						</ul>

    						<div class="price-box-bar">
    							<div class="cart-and-bay-btn">
    								<button type="button" style="color: white" onclick="addtocart(<?php echo $rirow['id'] ?>)" class="btn hvr-hover" href="#">Ajouter au panier</button>
    							</div>
    						</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN  -->
<?php include 'footer.php'; ?>


