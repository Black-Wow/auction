<?php include 'db_connection.php'; ?>
<?php include 'header.php'; ?>

<?php session_start();

if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
    echo "";
} else {
     echo "Please log in first to see this page.";
     header ('location:register.php');
     die();
}
?>

<section class="product-page">

  <section id="product-main" class="product-main"> 
    <div class="header-productBox">
      <div class="title">Product</div>
      <div class="fliter">
        <select name="" id="">
          <option value="">Desualt Sorting</option>
          <option value="">Desualt Sorting</option>
          <option value="">Desualt Sorting</option>
        </select>
      </div>
    </div> 
    <div class="porduct-container-main">
        <div class="product-content-main">
          <?php 
          
        $sql="select * from product where status='accepted' ";
        
        $res =mysqli_query($db,$sql);
        $check_faculity=mysqli_num_rows($res) > 0;
        if ($check_faculity) {
            while($row = mysqli_fetch_assoc($res))
            {
                
?> 
          
          <div  class="product-card-main">
            <div class="product-img-main">
              <img src="../../agent/<?php echo $row['p_img'] ?>" alt="product img">
            </div>
            <div class="product-dtails-main">
              <p class="name"><?php echo $row['pname'] ?></p>
              <button><a href="<?php printf('%s ?item_id=%s','product_Dtailes.php',$row['id']); ?>">Bid</a></button>
             
            </div>  
            <div class="product-Bid-main">
              <p ><?php echo $row['pdisc'] ?></p>
            </div>   
          </div>
          <?php } }
            
           
            ?>
        </div>
    </div>
  </section>

 
  
</section>



<?php include 'footer.php'; ?>