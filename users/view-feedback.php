<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<!-- Retrieve feedbacks from database -->
<?php 



if(isset($_GET['id'])) {
  
  
    $id = $_GET['id'];
    
    if($_SESSION['id'] !== $id ) {

      header("location: ".APPURL."");
      
    }

    $select = $conn->query("SELECT * FROM feedbacks WHERE id = '$id'");
if (!$select) {
  die('Query failed: ' . $conn->errorInfo());
}
$profile = $select->fetch(PDO::FETCH_OBJ);


   


    $getFeedbacks = $conn->prepare("SELECT * FROM feedbacks WHERE id = :id");
    $getFeedbacks->execute(array(':id' => $id));
    $getFeedback = $getFeedbacks->fetchAll(PDO::FETCH_OBJ);

  } else {
      echo "404";
  }
?>

<!-- VIEW FEEDBACK -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="text-white font-weight-bold">View Feedback</h1>
        <div class="custom-breadcrumbs">
          <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>View Feedback</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="site-section">
  <div class="container">

    <div class="row align-items-center mb-5">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <div>
            <h2>Feedback</h2>
          </div>
        </div>
      </div>
    </div>

    <!-- Display feedbacks in a table -->
    <div class="row mb-5">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Interview Date</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($getFeedback as $feedback): ?>
  <tr>
    <td><?php echo $feedback->interview_date; ?></td>
    <td><?php echo $feedback->message; ?></td>
  </tr>
<?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</section>

<?php require "../includes/footer.php"; ?>