<?php  include 'connection.php';
@session_start();

$alert = false;
$alertmsg = '';
if (isset($_POST['submit'])) {
  
   $query = mysqli_query($conn,"SELECT * from users WHERE email='{$_POST['email']}'");
   $checkq = mysqli_num_rows($query);

   if ($checkq) {
       $alert = true;
       $alertmsg =  "<br> <div class='alert alert-danger'> Email existe deja  </div> <br>";
   } else {


    $query = mysqli_query($conn,"INSERT into users (username,email,password,contact,address) VALUES ('{$_POST['name']}','{$_POST['email']}','{$_POST['password']}','{$_POST['contact']}','{$_POST['address']}')");

    $insertid = mysqli_insert_id($conn);

       $_SESSION['email'] = $_POST['email'];
       $_SESSION['id'] = $insertid;

       $alert = true;
       $alertmsg =  "<br> <div class='alert alert-success'> Inscription Reussi </div> <br> ";
       header('location: compte.php');
   }
}

include 'header.php';
?>

    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2> INSCRIPTION </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                        <li class="breadcrumb-item active"> Inscription </li>
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
                <label> Nom </label>
                <input type="text" name="name" class="form-control" id="name" placeholder="ton Nom" required />
              </div>

              <div class="form-group">
                <label> Email </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ton Email" required />
              </div>

              <div class="form-group">
                <label> Mot de Passe <br> ( Minimum 7 caracters. Au moin 1 caractere special, 1 numeror et une majuscule) </label>
                <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[\W_]).{7,}" name="password" id="password" placeholder=" Minimum 7 characters. Au moinq un caractere special , un chifffre et une majuscule." required />
              </div>

              <div class="form-group">
                <label> Contact </label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Your Contact" required />
              </div>

              <div class="form-group">
                <label> Addresse </label>
                <textarea class="form-control" name="address" id="address"  required >  </textarea>
              </div>

              <div class="form-action">
                <button type="submit" name="submit"  class="btn btn-primary form-control" > Sauvegarder et enregistrer </button>
              </div>

               <a href="login.php" style="color: white"> Déja utilisateur ? se connecter  </a>
                        

                    </form>
              </div>
          </div>
      </div>
    </div>
</div>


<?php include 'footer.php'; ?>

