<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if(!isset($_SESSION['adminname'])){

  header("location: ".ADMINURL."");
  
}
 if(isset($_POST['submit'])){

  if(empty($_POST['adminname']) OR empty($_POST['email']) OR empty($_POST['password']) ){
      echo "<script>alert('some inputs are empty')</script>";
  } else {

  $adminname = $_POST['adminname'];
  $email = $_POST['email'];
  $password = $_POST['password'];


//checking for usename or pass abailability


$insert = $conn->prepare("INSERT INTO admins (adminname, email, mypassword)
VALUES (:adminname, :email, :mypassword)");

$insert->execute([
':adminname' => $adminname,
':email' => $email,
':mypassword' =>  password_hash($password, PASSWORD_DEFAULT)
]);

}

 

}




 

?>


       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" >
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require "../layouts/footer.php"; ?>

