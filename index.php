<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

   $select = $conn->query("SELECT * FROM jobs WHERE status = 1 ORDER BY created_at DESC LIMIT 50");
   
   $select->execute();
   
   $jobs = $select->fetchAll(PDO::FETCH_OBJ); 

   $searches = $conn->query("SELECT COUNT(keyword) AS count, keyword FROM searches
   GROUP BY keyword ORDER BY count DESC LIMIT 4");

    $searches->execute();

     $allSearches = $searches->fetchAll(PDO::FETCH_OBJ);

     

     

?>

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p></p>
            </div>
            <form method="post" action="search.php" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input name="job-title" type="text" class="form-control form-control-lg" placeholder="Job title">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="job-region" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                  <option>Anywhere</option>
                      <option>Dhaka</option>
                      <option>Khulna</option>
                      <option>Sylhet</option>
                      <option>Chittagong</option>
                      <option>Rajshahi</option>
                      <option>Mymensingh</option>
                      <option>Barishal</option>
                      <option>Rangpur</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="job-type"  class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option>Part Time</option>
                    <option>Full Time</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                  <h3>Trending Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                  <?php foreach($allSearches as $search) :?>
                    <li><a href="#" class=""><?php echo $search->keyword; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

     <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>
    
   

    

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Jobs List</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <?php foreach($jobs as $job) : ?>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="jobs/job-single.php?id=<?php echo $job->id; ?>"></a>
            <div class="job-listing-logo">
              <img src="users/user-images/<?php echo $job->company_image; ?>" alt="<?php echo $job->company_image; ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php echo $job->job_title; ?></h2>
                <strong><?php echo $job->company_name; ?></strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span><?php echo $job->job_region; ?>
              </div>
              <div class="job-listing-meta">
              <span class="badge badge-<?php if($job->job_type == 'Part Time') { echo 'danger' ;} else { echo 'success' ;} ?>"><?php echo $job->job_type; ?></span>
              </div>
            </div>
            
          </li>
          </br>
          <?php endforeach; ?>
         

          

          
        </ul>

     

      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Job?</h2>
            <p class="mb-0 text-white lead">Register to Apply and grab your dream job.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="<?php echo APPURL; ?>/auth/register.php" class="btn btn-warning btn-block btn-lg">Register</a>
          </div>
        </div>
      </div>
    </section>
    
<?php require "includes/footer.php"; ?> 