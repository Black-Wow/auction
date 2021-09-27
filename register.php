<?php include 'login.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagecss/index4.css">
    <link rel="stylesheet" href="register1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
     
    <!-- Owlcareusel css-->
    <link rel="stylesheet" href="../css/owlcarousel/owlcarousel.min.css">
    <link rel="stylesheet" href="../css/owlcarousel/owlcarousel.defult.min.css">
    <script src="../js/jqeury/jquery.min.js"></script>
    <title>Online Auction</title>
    
</head>
<body>
<section class="header" >
        <div class="nav"  style="background-color: black;">
            <div id="nav-up-dub">
                <div class="first-nav-dub">
                <div class="content-nav">
                    <a href="home.php">Home</a>
                    <a href="">About</a>
                    <a href="">Contact</a>
                </div> 
                <div class="content-select" >
                    <Select>
                        <option value="">Yemen</option>
                        <option value="">Saudi Arabia</option>
                        <option value="">India</option>
                    </Select>
                </div>
                </div>
            </div>
        </div>
        <div class="nav-content" >
           
             <!--Start Of First Navgition-->
             <div class="first-nav" >
                 
               <div class="logo"><a href="home.html"><img src="../img/logo2 .png"alt="logo" ><br> online Auction </a></li></div> 
              
            </div>
            
            <!-- End Of First Navgition-->
            
            <!-- Start Of Second Navgition-->
         
             
        </div>
       
    <section id="register" class="register">
    <div><img src="../css/img/aa.png" alt=""></div>
        <div class="container">
            
            <div id="register_input" class="register_input">
                <h1>Hello</h1>
              <div class="title">
                  <span>Create an account</span>
              </div>
              <div class="register_box">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>#" method="POST" >

                    <div class="radio_btn flex">
                        <label for="customer">customer</label><br>
                        <input type="radio" id="customer" name="type" value="1">
                        <label for="Seller">Seller</label><br>
                        <input type="radio" id="Seller" name="type" value="2">
                        
                        
                    </div>
                    <div class="Profile-errorMessage">
                        <?php echo "<p class='note'>". $typeErr."</p>";?>
                        </div>
                    <div class="name flex">
                          <div>
                          <p>First Name <span>*</span></p>
                          <input type="text" name="name" value="<?php
                           if(empty($_POST['name'])){
                                echo "";
                            }else {
                                echo $_POST['name'] ;
                                } ?>">
                          <div class="Profile-errorMessage">
                          <?php echo "<p class='note'>". $nameErr."</p>";?>
                        
                         
                          </div>
                          </div>
                          <div>
                          <p>Last Name <span>*</span></p>
                          <input type="text" name="lastname" value="<?php
                           if(empty($_POST['lastname'])){
                                echo "";
                            }else {
                                echo $_POST['lastname'] ;
                                } ?>">
                          <div class="Profile-errorMessage">
                          <?php echo "<p class='note'>". $lnameErr."</p>";?>
                          </div>
                          </div>
                    </div>
                    <div class="mail_phone">
                      <p>Email <span>*</span></p>
                      <input type="text" name="email" value="<?php
                           if(empty($_POST['email'])){
                                echo "";
                            }else {
                                echo $_POST['email'] ;
                                } ?>">
                      <div class="Profile-errorMessage">
                      <?php echo "<p class='note'>". $emailErr."</p>";?>
                     
                    </div>
                      <p>Phone Number <span>*</span></p>
                      <input type="number" name="phoneno" value="<?php
                           if(empty($_POST['phoneno'])){
                                echo "";
                            }else {
                                echo $_POST['phoneno'] ;
                                } ?>">
                      <div class="Profile-errorMessage">
                      <?php echo "<p class='note'>".$phoneErr."</p>";?>
                      
                      </div>
                    </div>
                    <div class="password flex">
                        <div>
                            <p>Password (min 6 characters) <span>*</span></p>
                            <input type="password" name="password" >
                            <div class="Profile-errorMessage">
                            <?php echo "<p class='note'>". $passErr."</p>";?>
                            </div>
                        </div>
                        <div>
                                <p>Confiirm Password <span >*</span></p>
                                <input type="password" name="confirmpassword" >
                            <div class="Profile-errorMessage">
                            <?php echo "<p class='note'>". $cpassErr."</p>";?>
                            </div>
                        </div>
                    </div>
                    <div class="input_field checkbox_option">
                        <input type="checkbox" name="term" id="cb1">
                        <label for="cb1">I agree with <a href="" style="color: blue;
                         text-decoration: underline; "> terms and conditions</a></label>
                        <div class="Profile-errorMessage">
                            <?php echo "<p class='note'>". $termErr."</p>";?>
                        </div>
                        <a href="#"  class="signbtnlogin" id="loginshow"> I already have an account </a>
                    </div>
                        
                    
                    <div class="confirm">
                        <input class="button" type="submit" name="create" value="Register">
                    </div>
                </form>
              </div>
            </div>

            
            <section class="modal-reg-login">

        <!--Start Of Login-->
        
        <div id="login-modal" class="login-modal">
            <div class="modal-container"> 
              
                <div class="modal-content">
                        <div class="ModalHeader">
                            <div class="Title">Sign In</div>
                        </div>
                        <div class="ModalBody">
                            <form action="register.php" method="post">
                                <div class="username input"> 
                                    <label for="username"><p>Email</p></label>
                                    <input type="text"  name="email"   >
                                    <p style="color: red;"><?php echo $emailErr ?></p>
                                </div>
                            
                                <div class="password input">
                                    <label for="password"><b>Password</b></label>
                                   
                                    <label class="forgetPass"><b>Forget Password</b></label>
                                    <input type="password" name="password" id="password-field" >
                                    <p style="color: red;"><?php echo $passErr ?></p>
                                </div>
                                <a href="#" id="regshow" class="signbtnlogin">Have account already?</a>
                                <input class="signbtn"  type="submit" value="Sign in" name="login">
                                <p style="color: red;"><?php echo $userErr ?></p>

                            </form>
                        </div> 
                </div>
            </div>
       </div>
     

       <!--End Of Login-->

         <script>
             var btn= document.getElementById("loginshow");
             var login=document.getElementById("login-modal");
             var btn1= document.getElementById("regshow");
             var reg=document.getElementById("register_input");

             btn.addEventListener('click', ()=>{
                 login.style.display="block";
                 login.style.left="0"
                 reg.style.top="-800";
                 reg.style.display="none";

             })
             btn1.addEventListener('click', ()=>{
                 reg.style.top="0px";
                 reg.style.display="block";
                 login.style.display="none";
             })
         </script>

        <div class="forgot-password-model">
            <div class="model-container">
                <div class="model-content">

                </div>
            </div>
       </div>

     </section>
        </div>
    </section>
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