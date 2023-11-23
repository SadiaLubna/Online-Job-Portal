<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM jobs WHERE id='$id' ");
    $delete->execute();
    
    header("location: ".ADMINURL."/jobs-admins/show-jobs.php");
} else {
    header("location: htttp://localhost/jobboard/404.php");
}

?>

<?php require "../layouts/footer.php"; ?>
