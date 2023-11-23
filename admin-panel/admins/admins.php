<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

$select = $conn->query("SELECT * FROM admins");

$select->execute();
$admin = $select->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row" style="margin-top:100px">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($admin as $adminObj): ?>
                  <tr>
                      <th scope="row"><?php echo $adminObj->id; ?></th>
                      <td><?php echo $adminObj->adminname; ?></td>
                      <td><?php echo $adminObj->email; ?></td>   
                  </tr>
                  <?php endforeach; ?>


                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require "../layouts/footer.php"; ?>
  
