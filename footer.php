    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
			
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4> A Propos  </h4>
                            <p> Nous sommes tous axés sur les achats en ligne, ce qui vous fera gagner du temps et des efforts. Nous avons une gamme de tous les produits différents pour hommes et femmes. Avec des prix imbattables. Dans la boutique, vous pourrez voir les nouvelles offres et offres plus souvent.
  </p> 
														
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget" style="color: white !important">
							<h4> Liens Important </h4>
							<ul class="list-time" >
								<li> <a href="index.php" style="color: white !important"> Acceuil </li>     
                                <li> <a href="about.php"style="color: white !important"> Nous </li>
                                <li> <a href="contact.php" style="color: white !important"> Contacté Nous </li> 
                                <li> <a href="cart.php" style="color: white !important"> Pannier </li> 
                                <li> <a href="login.php" style="color: white !important"> Login </li> 
                                <li> <a href="Inscription.php" style="color: white !important"> Inscription </li> 
							</ul>
						</div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Contacté Nous</h4>
                            <ul>
                                <li>
                                    <p> <i class="fas fa-map-marker-alt"></i> Addresse: France Sainté <br> B23 G13 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i> &nbsp; Phone: &nbsp; &nbsp; <a style="color: white" href="tel:+1-888705770">+33-688 705 770 </a></p>
                                </li>
                                <li>
                                     <p><i class="fas fa-envelope"></i> &nbsp; Email: &nbsp; &nbsp;<a href="mailto:ecommercestore0@gmail.com" style="color: white"> Lalandeecommerce@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Fin Footer  -->


 

    <a href="#" id="back-to-top" title="Back to top" style="display: none;"> <i class="fa fa-arrow-up"> </i> </a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</body>


<script>
    function cart_button() {
       $.ajax({
            url:'ajax.php?h=view_cart',
            type:'POST',

            success:function(data) {
                $("#ajaxdiv").html(data);
            }
       });
    }


  function addtocart(id)  {

    var qty =  $("#qty").val();

      $.ajax({
        url:'ajax.php?h=addtocart',
        type:'POST',
        data:{id:id,qty:qty},

        success:function(){
            bootbox.alert('Produit Ajouter dans votre pannier');
        }
      })
   }

</script>

</html>