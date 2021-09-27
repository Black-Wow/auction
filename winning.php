<?php 
include_once("db_connection.php");

//Set variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
//Test PayPal API URL
$paypal_email = 'sama.ali413@gmail.com';
?>
<title> Paypal Integration in PHP</title>

                <div class="porduct-container-main">
                    <div class="product-content-main">
                    <?php
		$sql = "SELECT MAX(product_price),bid.State,bid.user_id ,product.id,product.pname,product.p_img from bid Left JOIN product ON bid.product_id = product.id WHERE bid.State='winner' AND bid.user_id = '$id'  GROUP BY id; ";
		$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
		while( $row = mysqli_fetch_assoc($resultset) ) {
        ?> 
                        <form action="<?php echo $paypal_url; ?>" method="post">			 
                      <div  class="product-card-main">
                        <div class="product-img-main">
                          <img src="../../agent/<?php echo $row['p_img'] ?>" alt="product img">
                        </div>
                        <div class="product-dtails-main">
                          <p class="name"><?php echo $row['pname'] ?></p>
                          <button style="background-color: transparent;"><input type="image" name="submit" border="0"
			src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
			<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >    
                         </button>

                        </div>  
                        <div class="product-Bid-main">
                          <p ><?php echo $row['MAX(product_price)']; ?></p>
                        </div>   
                      </div>
                      
                        
                   
			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo $row['pname']; ?>">
			<input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
			<input type="hidden" name="amount" value="<?php echo $row['MAX(product_price)']; ?>">
			<input type="hidden" name="currency_code" value="USD">			
			<!-- URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>						
			<!-- payment button. -->
			
			</form>
            <?php } ?>
                    </div>
                </div>
            
    
	