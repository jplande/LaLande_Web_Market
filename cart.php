<?php include 'header.php';
include 'connection.php';

if (isset($_POST['update'])) {
    $up = mysqli_query($conn,"UPDATE cart set qty='{$_POST['qty']}' WHERE id='{$_POST['hide_id']}'");

}

 ?>




    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- Fin search(recherche) -->

    <!-- Debut Titre Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> Pannier </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                        <li class="breadcrumb-item active">Carte</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin  tout titre Box-->

    <!-- Debut Cart(Pannier)  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead >
                                <tr>
                                    <th>Images</th>
                                    <th>Titre</th>
                                    <th>Type</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$i = 1;
$totalamount = 0;
$si =  mysqli_query($conn,"SELECT * from products JOIN cart on cart.product_id=products.id WHERE cart.ip_address='{$ip_server}'");
while ($ri = mysqli_fetch_assoc($si)) {

    if($ri['type']=='article') { $type = 'Article'; } else { $type='Product'; }

  ?>


                                <tr id="cardit<?php echo $ri['id'] ?>">
                                    <td class="thumbnail-img">
                                        <a href="product_detail.php?id=<?php echo $ri['product_id'] ?>">  <img class="img-fluid" src="images/<?php echo $ri['image'] ?>" alt="" /> </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="product_detail.php?id=<?php echo $ri['product_id'] ?>"> <?php echo $ri['name'] ?> </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#"> <?php echo $type; ?> </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ <?php echo $ri['price'] ?></p>
                                    </td>
                                    <form action="" method="POST">
                                    <td class="quantity-box">
                                        <input type="number" name="qty" size="4" value="<?php echo $ri['qty']; ?>" min="0" step="1">
                                    </td>
                                    <td class="total-pr">
                                        <p>$ <?php echo $ri['price']*$ri['qty']; ?></p>
                                    </td>
                                  

                                    <td class="remove-pr">
                                         
                                             <input type="hidden" name="hide_id" value="<?php echo $ri['id'] ?> " >

                                             <button type="button" class="btn btn-danger btn-sm" onclick="removeproduct(<?php echo $ri['id'] ?>)" > <i class="fa fa-times"> </i> Enlever </button>
                                             <button type="submit" class="btn btn-sm btn-info" name="update" > <i class="fa fa-refresh"> </i> Update </button>

                                         
                                    </td>
                                    </form>
                                </tr>

<?php $totalamount += $ri['price']*$ri['qty']; } 
if(empty(mysqli_num_rows($si))) {
    echo '<tr> <td colspan="7"> <center> Aucun produit ajouter au pannier </center> </td> </tr>';
} ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Recap</h3>
                        <div class="d-flex">
                            <h4>Sub-Total</h4>
                            <div class="ml-auto font-weight-bold"> $  <?php echo $totalamount ?> </div>
                        </div>
                       <!--  <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div> -->
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $  <?php echo $totalamount ?> </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Valider</a> </div>
            </div>

        </div>
    </div>
    <!-- fin Cart(pannier) -->

   
<script>
    function removeproduct(id) {
        $.ajax({
        url:'ajax.php?h=removeproduct',
        type:'POST',
        data:{id:id},

        success:function(){
            $("#cardit"+id).hide();
            bootbox.alert('Produit Enlever');
        }
      })
    }
</script>

<?php include 'footer.php'; ?>