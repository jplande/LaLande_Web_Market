<?php include 'header.php'; ?>

    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container" >
            <li class="text-center" style="background-image: url('images/banner01.jpeg');background-size: cover">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> REFERENCE <br> SNEAKERS </strong></h1> 
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center" style="background-image: url('images/banner02.jpeg');background-size: cover;"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> Introduction <br> Qualité </strong></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center" style="background-image: url('images/banner03.jpeg');background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> Commander maintenant <br> </strong></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center" style="background-image: url('images/banner04.jpeg');background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> Service Fiable <br> </strong></h1>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>




    <div class="about-box-main">

        <div class="container">
            <h1 style="color: #30A6C0;font-weight:bold;text-align: center;margin-bottom: 20px"> Message Vendeur </h1>


        <?php $sii = mysqli_query($conn,"SELECT * from admin_msg order by id DESC ");
        while ($rii = mysqli_fetch_assoc($sii)) {  ?>

            <div class="row">
                <div class="col-lg-12">  
                    <p> <?php echo $rii['description'] ?> </p>
                    <h2 class="noo-sh-title-top">  <?php echo $rii['title'] ?> </h2>
                    <b> Publier le: <?php echo date("d-m-Y", strtotime($rii['timestamp'])); ?> </b>
                </div>
            </div>


        <?php } ?>


        </div>
    </div>

<div class="box-add-products">
        <div class="container">
            <div class="row">


<?php $si = mysqli_query($conn,"SELECT * from products WHERE type !='article' order by id DESC limit 12");
while ($ri = mysqli_fetch_assoc($si)) {  ?>

                                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                            <div class="products-single fix" style="border:1px solid #30A6C0">
                                                <h5 id="priceheading"> Prix :  € <?php echo $ri['price'] ?> </h5> 
                                                <div class="box-img-hover">
                                                    
                                                    <img style="height: 300px" src="images/<?php echo $ri['image'] ?>" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <input id="qty" name="qty" class="form-control" value="1" min="1" max="10" type="hidden">
                                                        <a onclick="addtocart(<?php echo $ri['id'] ?>)" class="cart" href="#">Ajouter au pannier</a>
                                                    </div>


                                                </div>
                                                <div class="why-text">
                                                     <h4> <a href="product_detail.php?id=<?php echo $ri['id'] ?>"> <?php echo $ri['name'] ?> </a> </h4>
                                                     
                                                     <a class="btn btn-info form-control" href="product_detail.php?id=<?php echo $ri['id'] ?>"> Voir Details </a>
                                                </div>
                                            </div>
                                        </div>

                            <?php } ?>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php include 'footer.php'; ?>