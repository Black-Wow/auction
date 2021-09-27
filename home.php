<?php session_start();

if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
    echo "";
} else {
     echo "Please log in first to see this page.";
     header ('location:register.php');
     die();
}
?>
<?php include 'header.php';
include 'db_connection.php'
?>
     
<main class="main">
    
    <!-- Slide Section & info header-->
    <section class="slide-background">
        <div class="slide-container" id="slide-container">
            <div class="slide-content">
                <div class="owl-carousel owl-theme">
                    <div class="item"><img src="../img/bg3.png" alt=""></div>
                    <div class="item"><img src="../img/bg1.png" alt=""></div>
                    <div class="item"><img src="../img/b2.png" alt=""></div>
                </div>
            </div>

            <div class="why-us">
               <div class="why">
                <div class="work">
                    <div class="contentWrapper">
                        <div class="fact"> Why people <br> trust us</div>
                    </div>
                   </div>
                </div>
            
               <div class="work">
                    <div class="contentWrapper">
                        <div class="fact"> 20 Years</div>
                        <div class="describtion">in the Auction market</div>
                    </div>
                    
                </div>
               
               <div class="work">
                    <div class="contentWrapper">
                        <div class="fact">With us</div>
                        <div class="describtion"> Your auction will be save</div>
                    </div>
                    
               </div>
               <div class="work">
                    <div class="contentWrapper">
                        <div class="fact"> Payment</div>
                        <div class="describtion">Payment can be done with many ways and save</div>
                    </div>
                   
               </div>
            </div>
        </div>
    </section>
    

    <section id="simlier_auction" class="latest_auction">
      <b>Car product </b>
      <div class="owl-carousel  owl-theme">
      <?php 
       $sql="SELECT * FROM product where status='accepted' and pcategory ='Car'";
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
    
     <!-- End Of Slide Section & Info Header-->
   
    <!-- Start Of Body-->
    <section class="body">    
        <div class="body-content">
            <div class="current-aucton">
                
           </div>
    <section id="simlier_auction" class="latest_auction">
      <b>Laptop product </b>
      <div class="owl-carousel  owl-theme">
      <?php 
       $sql="SELECT * FROM product where status='accepted' and pcategory ='Laptop'";
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
    <section class="body">    
        <div class="body-content">
            
   

           

            <div class="advatge">
            <p>OUR ADVANTAGES </p>
                <div class="container">
                   
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title"> Any region in the world </div>
                        <div class="about-info">is possible to deliver to </div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title"> Czech Republic, Poland</div>
                        <div class="about-info">Countries of our european warehouses  </div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title">PRIORITIES </div>
                        <div class="about-info"></div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title">$ and €</div>
                        <div class="about-info">we accept</div>
                    </div>
                </div>

            </div>
   <section id="simlier_auction" class="latest_auction">
      <b>Beds product </b>
      <div class="owl-carousel  owl-theme">
      <?php 
       $sql="SELECT * FROM product where status='accepted' and pcategory ='Bed'";
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
            <div class="about">
            <p>ABOUT COMPANY</p>
                <div class="container">
                   
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title"> ABOUT US </div>
                        <div class="about-info">For many years The «Ormatek» group of companies is a reliable partner and supplier for clients around the world. We are proud to give healthy sleep to millions of people from different countries. </div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title"> WHAT DO WE OFFER?</div>
                        <div class="about-info">For many years The «Ormatek» group of companies is a reliable partner and supplier for clients around the world. We are proud to give healthy sleep to millions of people from different countries. </div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title">PRIORITIES </div>
                        <div class="about-info"></div>
                    </div>
                    <div class="content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="title">COOPERATION</div>
                        <div class="about-info"></div>
                    </div>
                </div>
            </div>

            <div class="advatge  bid-advatge">
            <p>How To Bid? </p>
                <div class="container">
                    <div class="content advatge-content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="about-info">YOU SHOULD HAVE BLANCE IN YOUR ACCOUNT </div>
                    </div>
                    <div class="content advatge-content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="about-info"> PICK YOUR PRODUCT TO BID </div>
                    </div>
                    <div class="content advatge-content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="about-info"> WE CONTACT WITH THE WINNER</div>
                    </div>
                    <div class="content advatge-content"> 
                        <i class="fa fa-question-circle logo" style="font-size:65px"></i>
                        <div class="about-info">WE SEND YOU THE PRODUCT </div>
                    </div>
                   
                </div>

            </div>


        </div> 
    </section>
    <!-- End Of Body-->
</main>
       <!-- Start Of Footer-->
       <sction class="footer">
        <div class="footer-header">
            <div class="subscribe">
               <h4>SUBSCRIBE TO OUR NEELIST</h4>
                <input type="text"><button> SUBSCRIBE</button>

            </div>
            <div class="findus-on">
               <h4>Find Us On:</h4>
           
                   <a href="#" class="fa fa-facebook"></a>
                   <a href="#" class="fa fa-twitter"></a>
                   <a href="#" class="fa fa-instagram"></a>
                   <a href="#" class="fa fa-pinterest"></a>
                   <a href="#" class="fa fa-skype"></a>
           
           </div>
        </div>
      
       <div class="footer-content">
          <div class="customer-help">
               <h1>Bidder Care</h1>
               <ul>
                   <li><a href="">Contact Us</a></li>
                   <li><a href="">FAQ</a></li>
                   <li><a href="">Payment</a></li>
                   <li><a href="">Track Order</a></li>
               </ul>
           </div>
            <div class="customer-help">
               <h1>LeGAL</h1>
               <ul>
                   <li><a href="">Terms & Conditions</a></li>
                   <li><a href="">Privacy & Cookies Policy </a></li>
               </ul>
           </div>
           <div class="customer-help">
               <h1>   ABOUT US</h1>
               <ul>
                   <li><a href=""> About Us  </a></li>
               </ul>

               <h1> SHIPPING & RETURNS</h1>
               <ul>
                   <li><a href=""> Shipping & Delivery  </a></li>
               </ul>
           </div>
           <div class="logo-f">
               <img src="../img/logo2.jpg" alt=""><p>Online Auction</p>
           </div>
       </div>
    
       <h5>Copyright © 2021 Abdullah MD. All rights reserved.
       </h5>
   </sction>
    <!-- End Of Footer-->

</body>
</html>
<script src="../js/jqeury/jquery.min.js"></script>
<script src="../js/owlcarousel/owlcarousel.min.js"></script>
<script src="../js/sign.js"></script> 
<script>
  
$(document).ready(function(){
    $('#slide-container .owl-carousel').owlCarousel({
	items: 1,
    autoplay:true,
    autoplayTimeout:2500,
    autoplayHoverPause:true,
	loop: true,
	nav: true,
	dots: false,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
})

$('.owl-carousel').owlCarousel({
	items:3,
  padding:0,
  margin:-10,
  autoplay:true,
	loop: true,
	nav: true,
	dots: false,
    
})

  
});

</script>
<!-- Show password js-->
<script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
</script>
<script>
    const searchBtn = document.getElementById('search-btn');
    const search = document.getElementById('search');
    const tip = document.getElementById('tip');
    
    var i = 0;
    var message = "Find Product...";
    var typeSpeed = 200;
    
    searchBtn.addEventListener('click', () => {
      search.style.width = '70%';
      search.style.paddingLeft = '60px';
      search.style.cursor = 'text';
      search.focus();
      
      typeWriter();
    });
    
    search.addEventListener('keydown', () => {
      tip.style.visibility = "visible";
      tip.style.opacity = 1;
    });
    
    function typeWriter() {
      if (i < message.length) {
        msg = search.getAttribute('placeholder') + message.charAt(i);
        search.setAttribute('placeholder', msg);
        i++;
        setTimeout(typeWriter, typeSpeed);
      }
    }
        </script>