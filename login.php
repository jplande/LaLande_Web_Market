<?php 
include 'connection.php';
@session_start();

$alert = false;
$alertmsg = '';

if (isset($_POST['submit'])) {
  
   $query = mysqli_query($conn,"SELECT * from users WHERE email='{$_POST['email']}' AND password='{$_POST['password']}'");
   $checkq = mysqli_num_rows($query);

   if ($checkq) {

        $ftch = mysqli_fetch_assoc($query);
        $alert = true;
        $alertmsg =  "<br><br> <h3 style='color:green'> Login Reussi </h3>";
        $_SESSION['email'] = $ftch['email'];
        $_SESSION['id'] = $ftch['id'];

    header('location: compte.php');
   } else {
       $alert = true;
       $alertmsg =  "<br><br> <div class='alert alert-danger'> Invalide Details </div>";
     
   }
}
include 'header.php'; 
?>

    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> LOGIN </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active"> Login </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<div class="container">
    <div class="row">
          <div class="col-md-2"> </div>
          <div class="col-md-8 col-sm-8"> 
              <div class="testi-details">
                  <div class="contact-info">
                    
                     <div class="space"></div>

                    <form action="" method="post" style="background-color: #30A6C0;padding: 50px;color: white;opacity: 0.9;margin: 50px" >

                      <?php if($alert==true) {
                        echo $alertmsg;
                      } ?>

                    <div class="form-group">
                      <label> Email </label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                    </div>

                    <div class="form-group">
                      <label> Mot de passe </label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required />
                    </div>

                    <div class="form-action">
                      <button type="submit" name="submit" class="btn btn-primary form-control"> Login </button>
                    </div> 

                          <a href="inscription.php" style="color: white"> Nouveau ? S'inscrire  </a>
                        </div>

                    </form>
              </div>
          </div>
      </div>
    </div>
</div>


<?php include 'footer.php'; ?>

