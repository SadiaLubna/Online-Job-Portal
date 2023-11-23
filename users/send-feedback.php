<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 
//show applicants 81 num line_important
<a class="btn btn-success text-white" href="<?php echo APPURL; ?>/users/send-feedback.php?id=<?php echo $jobApp->worker_id; ?>" role="button" >Send Feedback</a>




    //$get_categories = $conn->query("SELECT * FROM categories ");
    //$get_categories->execute();

    //$get_category = $get_categories->fetchAll(PDO::FETCH_OBJ);
    if(isset($_POST['submit'])) {

        $interview_date = $_POST['interview_date'];
        $message = $_POST['message'];
        
     


        $insert = $conn->prepare("INSERT INTO feedbacks ( interview_date, message) VALUES( :interview_date, :message)");

         $insert->execute([

          ':interview_date' => $interview_date,
          ':message' => $message,
          

         ]);

         header("location: ".APPURL."/users/send-feedback.php");
        
      }
    



?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Send Feedback</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo APPURL; ?>">Home</a> <span class="mx-2 slash">/</span>
              
              <span class="text-white"><strong>Send Feedback</strong></span>
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
                <h2>Send Feedback</h2>
              </div>
            </div>
          </div>
         
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" action="send-feedback.php" method="post">
            
         
              <div class="form-group">
                <label for="job-location">Interview Date</label>
                <input name="interview_date" type="text" class="form-control" id="" placeholder="e.g. 20-12-2022">
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Message</label> 
                  <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Write Message here"></textarea>
                </div>
              </div>

         
              
              <div class="col-lg-4 ml-auto">
                  <div class="row">  
                    <div class="col-6">

                      <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;"  value="Send Feedback">
                    </div>
                  </div>
              </div>


            </form>
          </div>

         
        </div>
       
      </div>
    </section>
    
<?php require "../includes/footer.php"; ?>
