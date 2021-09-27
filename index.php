<?php session_start();

if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
    echo "";
} else {
     echo "Please log in first to see this page.";
     header("Location:../user/html/register.php");
     die();
}
?>
<?php include 'template/header.php' ?>


<?php include 'template/nav_seller.php' ?>    
  

<?php 
if (isset($_GET['AddProduct'])) {
  include 'template/addproduct.php';  
}elseif (isset($_GET['ViewProduct'])) {
    include 'template/viewproduct.php';  
}elseif (isset($_GET['Account'])) {
    include 'template/profile.php';  
}else{
    include 'template/home.php'; 
}
?>    
  

<?php include 'template/footer.php' ?>
