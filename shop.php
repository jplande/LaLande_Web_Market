 <?php include 'header.php';
 include 'connection.php';
?>


    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> PRODUCTS </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active"> Products </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin titre Box -->

    <!-- Debut Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box" >
              

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">

<?php
if(isset($_POST['searchbtn'])) { 
$si = mysqli_query($conn,"SELECT * from products WHERE name LIKE '%{$_POST['search']}%'");  }

if(isset($_GET['cat'])) { 
$si = mysqli_query($conn,"SELECT * from products WHERE cat='{$_GET['cat']}'");   }
while ($ri = mysqli_fetch_assoc($si)) {  ?>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix" style="border:1px solid #30A6C0">
                                                <h5 id="priceheading"> Price :  $ <?php echo $ri['price'] ?> </h5> 
                                                <div class="box-img-hover">
                                                    
                                                    <img style="height: 300px" src="images/<?php echo $ri['image'] ?>" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <input id="qty" name="qty" class="form-control" value="1" min="1" max="10" type="hidden">
                                                        <a onclick="addtocart(<?php echo $ri['id'] ?>)" class="cart" href="#">Add to Cart</a>
                                                    </div>


                                                </div>
                                                <div class="why-text">
                                                     <h4> <a href="product_detail.php?id=<?php echo $ri['id'] ?>"> <?php echo $ri['name'] ?> </a> </h4>
                                                     
                                                     <a class="btn btn-info form-control" href="product_detail.php?id=<?php echo $ri['id'] ?>"> oir Details </a>
                                                </div>
                                            </div>
                                        </div>

                            <?php } ?>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   
<!--   $V*x+qojksaU -->
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <!-- <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div> -->
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                   
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            

                                            <?php $cat =  mysqli_query($conn,"SELECT * from category");
                                      while($rowcat = mysqli_fetch_assoc($cat)) { 
                                        echo '<a class="list-group-item list-group-item-action active" href="shop.php?cat='.$rowcat['id'].'">'.$rowcat['name'].' <small class="text-muted"></small> </a>';
                                    } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->



<script>
   function  addtocart(id)  {

    var qty = '1';

      $.ajax({
        url:'ajax.php?h=addtocart',
        type:'POST',
        data:{id:id,qty:qty},

        success:function(){
            alert('Produit ajouter au Pannier');
        }
      })
   }
</script>


 <?php include 'footer.php'; ?>