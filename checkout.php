<?php include 'connection.php';

@session_start();
 if(!isset($_SESSION['email'])) {
     header('location: login.php');
 }

$alert = true;
$alertmsg = '';

$query = mysqli_query($conn,"SELECT * from users WHERE email='{$_SESSION['email']}'");
$checkq = mysqli_fetch_assoc($query);

$totalamountfirst = 0;
$totalamount = 0;

$sifirst = mysqli_query($conn,"SELECT * from cart JOIN products on cart.product_id=products.id WHERE cart.ip_address='{$ip_server}'");
while ($rifirst = mysqli_fetch_assoc($sifirst)) {
     $totalamountfirst += $rifirst['price']*$rifirst['qty'];
}


if(isset($_POST['placeorderbtn'])) {

     if(!empty($_POST['txn_id'])){
        $txn_id = $_POST['txn_id'];
     } else {
        $txn_id = 'Cash on Delivery';
     }

    $orderno =  rand();


    if(!empty($totalamountfirst)) {
        mysqli_query($conn,"INSERT into orders (order_no,user_id,total,status,txn_id,contact,address,pay_way) VALUES ('{$orderno}','{$_SESSION['id']}','{$totalamountfirst}','Pending','{$txn_id}','{$_POST['contact']}','{$_POST['address']}','{$_POST['paymentMethod']}') "); 
        $insertid = mysqli_insert_id($conn);

        $si = mysqli_query($conn,"SELECT * from cart JOIN products on cart.product_id=products.id WHERE cart.ip_address='{$ip_server}'");
        while ($ri = mysqli_fetch_assoc($si)) {
           mysqli_query($conn,"INSERT into orders_detail (order_id,product_id,qty) VALUES ('{$insertid}','{$ri['product_id']}','{$ri['qty']}') ");
        }

        mysqli_query($conn,"DELETE from cart WHERE ip_address='{$ip_server}'");
        $alert = true;
        $alertmsg =  '<h3 style="color:green;font-weight:bold" > Success ! Your order Placed Successfully </h3> <br> ';

    } else {
        $alert = true;
        $alertmsg =  '<h3 style="color:red;font-weight:bold" > Failed ! No Item in Cart </h3> <br> ';
    }
    

} 




$si = mysqli_query($conn,"SELECT * from cart JOIN products on cart.product_id=products.id WHERE cart.ip_address='{$ip_server}'");
while ($ri = mysqli_fetch_assoc($si)) {
     $totalamount += $ri['price']*$ri['qty'];
}

include 'header.php';
 ?>


    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> BOUTIQUE </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>


    <div class="cart-box-main"> 

        <div class="container">
                 <?php  if($alert==true) { echo $alertmsg; } ?>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>addresse de facturation</h3>
                        </div>

                        <form class="needs-validation" action="" method="POST">
                        
                            <div class="mb-3">
                                <label for="firstName"> Name </label>
                                <input type="text" class="form-control" readonly id="username"  value="<?php echo $checkq['username'] ?>" required > 
                            </div> 
                        

                            <div class="mb-3">
                                <label for="address"> Addresse de livraison *</label>
                                <textarea name="address" class="form-control" required> <?php echo $checkq['address'] ?> </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="address"> Contact </label>
                                <input name="contact" class="form-control" value="<?php echo $checkq['contact'] ?>" required >
                            </div>

                            <div class="title-left">
                                <h3> Details </h3>
                            </div>   
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" value="Cash on Delivery" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit"> Cash on Delivery </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" value="Via Card" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit"> par Carte </label>
                                </div>
                            </div>

                           
                            <div class="col-md-12 mb-3" id="cardpaymentdiv" style="display: none;">
                                <label for="cc-number"> <b> numero carte de Credit </b> </label>
                                <input type="text" name="txn_id" class="form-control" id="cc-number" placeholder="Enter Card Number" >
                                <div class="invalid-feedback"> numero carte recommmandé </div>
                            </div>
                           

                            <button type="submit" style="color: white;float: right;" name="placeorderbtn" class="ml-auto btn hvr-hover"> Place Order </button>

                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                          <div class="col-md-12 col-lg-12">

                            <div class="title-left">
                                <h3> Details de Payment  </h3>
                            </div> 
                        
                            <div class="order-box">

                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub-Total</h4>
                                    <div class="ml-auto font-weight-bold"> $ <?php echo $totalamount ?> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Prix livraison</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> $ <?php echo $totalamount ?> </div>
                                </div>
                                <hr> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Fin Pannier -->

    <!-- Instagram  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


<?php include 'footer.php' ?>

<script type="text/javascript">
$(function () {
    $('input[type=radio]').change(function(){

        if($(this).val() =='Cash on Delivery') {
            $("#cardpaymentdiv").slideUp();
        } else {
            $("#cardpaymentdiv").slideDown();
        }     
      });
})
</script>