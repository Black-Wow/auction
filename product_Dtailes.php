<?php 
include 'db_connection.php';
include 'bid.php';
session_start();
date_default_timezone_set('Asia/Calcutta');


if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
    echo "";
} else {
     echo "Please log in first to see this page.";
     header ('location:register.php');
     die();
}
?>
<?php
include 'header.php';
?>

  
    <section id="product_details_body" class="product_details_body">
        <div class="container_countdown">
            <h4 id="headline">Countdown to start Bidding:</h4>
            <div id="countdown">
              <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
              </ul>
            </div>
        </div>
        
<?php 
$item_id = $_GET['item_id']; 

$sql="select * from product";
$sql1="select  MAX(product_price) from bid where product_id ='$item_id'";
        $res =mysqli_query($db,$sql); 
        $res2 =mysqli_query($db,$sql1);
        $check_faculity=mysqli_num_rows($res) > 0;
        $check_faculity2= mysqli_num_rows($res2) > 0;
        if ($check_faculity) {
            while($row = mysqli_fetch_assoc($res))
            {
                if ($row['id'] == $item_id ) { 
                  $cate=$row['pcategory'];
              ?>
              
            <!--=============================start of php & and script for count down======================================-->
            <script>
              var hs= document.getElementById('headline');

              if( <?php echo strtotime($row['pstartdate'])   ?> ){
                       // Set the date we're counting down to
                       var countDownDate = <?php echo strtotime($row['pstartdate'])  ?> * 1000;
                        // Get today's date and time 
                       var now = <?php 
                       
                       $t=time();
                       
                       echo $t *1000 ;
                        ?> ;
                       // Update the count down every 1 second
                       var x = setInterval(function() {
                       
                        // Get today's date and time 
                         now = now + 1000;
                           
                         // Find the distance between now and the count down date
                         var distance = countDownDate - now ;
                           
                         // Time calculations for days, hours, minutes and seconds
                         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) );
                         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                           
                         // Output the result in an element with id="demo"
                         document.getElementById("days").innerHTML = days ;
                         document.getElementById("hours").innerHTML= hours ;
                         document.getElementById("minutes").innerHTML= minutes ;
                         document.getElementById("seconds").innerHTML= seconds ;
                           
                         // If the count down is over, write some text 
                         if (distance < 0) {
                           clearInterval(x);
                  
                        document.getElementById("days").innerHTML = "0";
                         document.getElementById("hours").innerHTML= "0" ;
                         document.getElementById("minutes").innerHTML= "0" ;
                         document.getElementById("seconds").innerHTML= "0" ;
                         }
                         
                       }, 1000);
                       }

                      else  if( <?php echo strtotime($row['penddate'])  ?> ){
                       // Set the date we're counting down to
                       hs.innerHTML = 'COUNTDOWN TO END BIDDING:';
                       var countDownDate1 = <?php echo strtotime($row['penddate'])  ?> * 1000;
                        // Get today's date and time 
                       var now1 = <?php 
                       
                       $t=time();
                       
                       echo $t *1000 ;
                        ?> ;
                       // Update the count down every 1 second
                       var x1 = setInterval(function() {
                       
                        // Get today's date and time 
                         now1 = now1 + 1000;
                           
                         // Find the distance between now and the count down date
                         var distance1 = countDownDate1 - now1 ;
                           
                         // Time calculations for days, hours, minutes and seconds
                         var days = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                         var hours = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) );
                         var minutes = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                         var seconds = Math.floor((distance1 % (1000 * 60)) / 1000);
                           
                         // Output the result in an element with id="demo"
                         document.getElementById("days").innerHTML = days ;
                         document.getElementById("hours").innerHTML= hours ;
                         document.getElementById("minutes").innerHTML= minutes ;
                         document.getElementById("seconds").innerHTML= seconds ;
                           
                         // If the count down is over, write some text 
                         if (distance < 0) {
                           clearInterval(x1);
                  
                        document.getElementById("days").innerHTML = "0";
                         document.getElementById("hours").innerHTML= "0" ;
                         document.getElementById("minutes").innerHTML= "0" ;
                         document.getElementById("seconds").innerHTML= "0" ;
                         }
                         
                       }, 1000);}
                      
              </script>
              <!--=============================End of php & and script for count down======================================-->
          <div class="product_details">
            <div class="product__photo">
                <div class="photo-container" >
                    <div class="photo-main" >
                        <div class="product-img-main"><img id="img-main" src="../../agent/<?php echo $row['p_img']; ?>" alt="no img"></div>
                    </div>
                    <div class="photo-album">
                        <ul>
                            <li ><div class="product-img-small"><img class="small-img" src="../../agent/<?php echo $row['p_img']; ?>" alt="no img"></div></li>
                            <li ><div class="product-img-small"><img class="small-img" src="../../agent/<?php echo $row['p_img2']; ?>" alt="no img"></div></li>
                            <li ><div class="product-img-small"><img class="small-img" src="../../agent/<?php echo $row['p_img3']; ?>" alt="no img"></div></li>
                            <li ><div class="product-img-small"><img class="small-img" src="../../agent/<?php echo $row['p_img4']; ?>" alt="no img"></div></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product__info">
                
            <form action="<?php printf('%s ?item_id=%s','product_Dtailes.php',$row['id']); ?>" method="POST">
                <div class="title">
                    <h1><?php echo $row['pname']; ?></h1>
                    <span>COD: <?php echo $row['id']; ?></span>
                    <br>
                    <span>BY: <?php echo $row['pcategory']; ?></span> 
                </div>
                <?php 
                     if ($check_faculity2) {
                     while($row2 = mysqli_fetch_assoc($res2))
                     {
                   ?>
    
                <div class="price">
                    R$ <span><?php echo $row2 ['MAX(product_price)']; ?> </span>
                </div>
                <?php   
                     }
                     }
                    
                   ?>
               
              
                
                <p style="color:black; font-size: 1.3em; word-spacing: 1.3px; letter-spacing: 1.3px;margin: 20px 0;">Actual Cost : R$ <span style="padding-left: 0.15em;font-size: 1em;"><?php echo $row['pcost']; ?></span> </p>
               
                <p style="color:black; font-size: 1.3em; word-spacing: 1.3px; letter-spacing: 1.3px;margin: 30px 0;">Started Bid : R$ <span style="padding-left: 0.15em;font-size: 1em;"><?php echo $row['pstart']; ?></span> </p>
                <p class="dateennn" style="color:black; font-size: 1.3em; word-spacing: 1.3px; letter-spacing: 1.3px;margin: 20px 0;">Date :  <span style="padding-left: 0.15em;font-size: 1em;"><?php  
                   $fromdate =  $row['pstartdate'];
                   $begindate = date("Y-m-d H:i:s",strtotime($fromdate));
                   $duedate =  $row['penddate'];
                   $closedate = date("Y-m-d H:i:s",strtotime($duedate));
                   
                   $now = new DateTime();
                   $startdate = new DateTime($begindate);
                   $enddate = new DateTime( $duedate);
                if($startdate > $now ) {
                  $duedate =  $row['pstartdate'];
                  $closedate = date( "F j, Y, g:i:s a",strtotime($duedate));
                  echo "Start On" . "\t" . $closedate;
            }elseif($enddate < $now){
              
             
             echo"EXPIRE";
              
            }elseif($startdate <= $now &&  $enddate >= $now){
              $duedate =  $row['penddate'];
              $closedate = date( "F j, Y, g:i:s a",strtotime($duedate));
              echo "End On " . "\t" . $closedate;
            }
                ?></span> </p>
               <br>
                 
                    <input type="text" id="bidammount"  class="amount"  name="bidamount">
                    
              
                <?php  
               
               $duedate =  $row['penddate'];
               $closedate = date("Y-m-d H:i:s",strtotime($duedate));
               $now = new DateTime();
               $enddate = new DateTime( $duedate);
              if($enddate < $now){
               
              echo "<style>
                .amount{
                  display: none;
                }
                .btnBidding{
                  display: none;
                }
               </style>";
              }
             ?>
               <?php
              $email=$_SESSION['email'];
              $qry="SELECT * from register where email='$email'";
              $result = mysqli_query($db,$qry);
              if(mysqli_num_rows($result) > 0 ){
                while($row= mysqli_fetch_assoc($result)){
              
                ?>
             
              <input type="hidden" name="user_id" value="<?php echo $row['lid_user']; }} ?>" >
              <input type="hidden" name="item_id" value="<?php echo $item_id  ?>" >
              <button ype="submit" id="btnBidding"  name="btnBidding" class="bid--btn">Click To Bid</button> 
            </div>
        </form>
        </div>
    </section>
    <section class="bidders-describtion">
        <div class="bidders-describtion-container1">
          <div class="btn-bid-disk">
          <?php  
          $sql="SELECT count(bid_id) as count from bid where product_id='$item_id' ";
       $res =mysqli_query($db,$sql);
       $data = mysqli_fetch_assoc($res);
          ?>
          <button id="openB"> BiDDERS LIST(<?php echo $data["count"]; ?>)</button></div>
          <div class="bidders-describtion-container"> 
          <div id="bidders-content" class="bidders-content">  <?php 
       $sql="SELECT register.name ,bid.product_price,bid.product_id, bid.Date from bid Left JOIN register ON bid.user_id = register.lid_user; ";
       $res =mysqli_query($db,$sql);
       $check_faculity=mysqli_num_rows($res) > 0;
       if ($check_faculity) {
           while($row = mysqli_fetch_assoc($res))
           {
              if ($row['product_id'] == $item_id) {
               
             ?>
          
             <span><?php echo $row["name"]?> </span> bidded $<?php echo $row["product_price"] ?> on  $<?php echo $row["Date"] ?>
             <br>
             <br>
          
             <?php }
        }
      }
        ?>
            
            </div>
    
          
             
          </div>
        </div>
        
    </section>
    <?php  
        }
    }
}
  ?>


            

    <section id="simlier_auction" class="latest_auction">
      <b>Related product </b>
      <div class="owl-carousel owl-theme">
      <?php 
       $sql="SELECT * FROM product where pcategory='$cate'
       ORDER BY RAND()  
       LIMIT 10;";
       $res =mysqli_query($db,$sql);
       $check_faculity=mysqli_num_rows($res) > 0;
       if ($check_faculity) {
           while($row = mysqli_fetch_assoc($res))
           {
              
               
             ?>
          
          <div class="item">
            <div id="product-card-main1" class="product-card-main1">
              <div class="product-img-main1">
                <img src="../../agent/<?php echo $row['p_img']; ?>" alt="product img">
              </div>
              <div class="product-dtails-main1">
                <p class="name"><?php echo $row['pname']; ?></p>
              
                <button><a href="<?php printf('%s ?item_id=%s','product_Dtailes.php',$row['id']); ?>">Bid</a></button>
              </div>   
              <div class="product-Bid-main">
                <p ><?php echo $row['pdisc']; ?></p>
              </div>
              
            </div>
          </div>
          <?php }}?>
      </div>
    </section>
    
    

    
      
</body>
</html>
<script src="../js/jqeury/jquery.min.js"></script>
<script src="../js/owlcarousel/owlcarousel.min.js"></script>
<script>
       $('.owl-carousel').owlCarousel({
	items:3,
  padding:0,
  margin:-10,
  autoplay:true,
	loop: true,
	nav: true,
	dots: false,
    
})

</script>
<script>
        var productImg=document.getElementById('img-main');
        var smallimg=document.getElementsByClassName('small-img');
        smallimg[0].onclick = function(){
            productImg.src =smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            productImg.src =smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            productImg.src =smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            productImg.src =smallimg[3].src;
        }
</script>
<script>
        
        var oprn1=document.getElementById("openB");
        var bidders=document.getElementById("bidders-content");
      
        oprn1.addEventListener("click",() =>{
    
          bidders.classList.toggle("active")
        })
      
</script>