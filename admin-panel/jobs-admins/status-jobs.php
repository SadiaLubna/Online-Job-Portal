<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

if(isset($_GET['id']) AND isset($_GET['status'])) {
    $id = $_GET['id'];
   $status=$_GET['status'];
    if($status ==1) {
        $update = $conn->prepare("UPDATE jobs SET status = 0 WHERE id = '$id'");
        $update ->execute();
        header("location: ".ADMINURL."/jobs-admins/show-jobs.php");

        
    } else {
        $update = $conn->prepare("UPDATE jobs SET status = 1 WHERE id = '$id'");
        $update ->execute();
        header("location: ".ADMINURL."/jobs-admins/show-jobs.php");
    } 
    
} else {
    header("location: htttp://localhost/jobboard/404.php");
}

?>


<?php require "../layouts/header.php"; ?>
