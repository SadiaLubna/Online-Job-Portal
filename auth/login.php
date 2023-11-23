<?php require "../config/config.php"; ?>

<?php require "../includes/header.php"; ?>

<?php 

if(isset($_SESSION['username'])){

  header("location: ".APPURL."");

}
if(isset($_POST['submit'])){

    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('some inputs are empty')</script>";
    } else {


    //checked for the form submission
    //we need to grab the data
    //do the query with the email only
    //we are going to execute and then fetch the data
    //check for the rowcount
    //check for the password


    
    $email =$_POST['email'];
    $password =$_POST['password'];

    $login =$conn->query("SELECT * FROM users WHERE email = '$email'");
    $login->execute();

    $select = $login->fetch(PDO::FETCH_ASSOC );

    if($login->rowCount() > 0) {
      if(password_verify($password, $select['mypassword'])){
        
        $_SESSION['username'] = $select['username'];
        $_SESSION['id'] = $select['id'];
        $_SESSION['type'] = $select['type'];
        $_SESSION['email'] = $select['email'];
        $_SESSION['image'] = $select['img'];
        $_SESSION['cv'] = $select['cv'];

        header("location: ".APPURL."");

      } else {
        echo "<script>alert('invalid user')</script>";

      }
    } else {
      echo "<script>alert('invalid user')</script>"; 

    }

  }
}


?>



 
 
    <section class="site-section">
      <div class="container">
        <div class="row">
      
          <div class="col-md-12">
            <form action="login.php" class="p-4 border rounded" method="POST">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="email" id="fname" class="form-control" placeholder="Email address" name="email">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password" name="password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Log In" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>



<?php require "../includes/footer.php"; ?>

