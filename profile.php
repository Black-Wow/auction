<?php include 'header.php'; ?>
<?php include 'profile_update.php';?>
<?php

if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
    echo "";
} else {
     echo "Please log in first to see this page.";
     header ('location:register.php');
     die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagecss/index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
     
    <!-- Owlcareusel css-->
    <link rel="stylesheet" href="../css/owlcarousel/owlcarousel.min.css">
    <link rel="stylesheet" href="../css/owlcarousel/owlcarousel.defult.min.css">
    <script src="../js/jqeury/jquery.min.js"></script>
    <title>Online Auction</title>
</head>
<body>
    <section id="profile" class="profile">
        <div class="container">
            <div class="sidebar_profile">
                <aside class="sidebar">
                    <h1>Profile Settings</h1>
                    <ul>
                        <li id="btn-user-info" ><a  class="isactive" >User Info</a></li>
                        <li id="btn-wining-bids"><a>Wining bids</a></li>
                       
                        <li id="btn-change-password"><a>Change Password</a></li>

                        
                    </ul>
                
                </aside>
            </div>


            <div id="perofile_content" class="content" style="display: block;">

          
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
            <div class="image_conttent input-flex">
            <?php 
        
          $sql="SELECT * from register where lid_user='$id' ";
          
          $res =mysqli_query($db,$sql);
         $check_faculity=mysqli_num_rows($res) > 0;
          if ($check_faculity) { 
              while($row = mysqli_fetch_assoc($res))
              {
                
                  
  ?>    
 
            <div class="image">
                        <label for="preview_img">
                        <img id="preview" src="<?php echo $row['p_img'] ?>" alt="">
                       </label>
                    </div>
                    <input id="preview_img" type="file" onchange="loadimgSmall1(event);" name="p_img" id="image_ch"  hidden >
                     <script>
                      var img1 =document.getElementById('preview')
                         function loadimgSmall1(event){
                         img1.src=URL.createObjectURL(event.target.files[0])
                         }
                     </script>
                    <div class="name">
                        <h1><?php echo $row['name'] ?></h1>
                        <p><?php echo $row['email'] ?></p>
                    </div>
                </div>
                <div class="pro-details ">
                    <div class="inputs">
                       <div class="input-flex">
                        <div>
                            <p>Name</p>
                            <input type="text" name="name" value="<?php echo $row['name'] ?>">
                        </div>
                        <div>
                            <p>Last Name</p>
                            <input type="text" name="lastname" value="<?php echo $row['lastName'] ?>">
                        </div>
                       </div> 
                       <div class="input-flex">
                        <div>
                            <p>Phone Number</p>
                            <input type="number" name="phoneno" value="<?php echo $row['Phoneno'] ?>">
                        </div>
                        <div>
                            <p>Address</p>
                            <input type="text" name="address" value="<?php echo $row['address'] ?>">
                        </div>
                       </div>
                       <div class="input-flex" >
                        <div>
                            <p>Country</p>
                            <input type="text" name="country" value="<?php echo $row['country'] ?>">
                         </div>
                         <div>
                            <p>State / Reigon</p>
                            <input type="text" name="State" value="<?php echo $row['states'] ?>">
                        </div>
                       </div>
                    </div>
                </div>
                <div class="Save_btn">
                    <button type="submit" name="save_change" >Save Change</button>
                </div>
            </div>
            <?php
              }}
              ?>
            








            <div id="change_password" class="change-pass">
                <h1>Change Password</h1>
                <p>Current Pssword:</p> <input type="text" name="password"> <span> <?php echo $passErr ;?></span>
                <br>
                <p>New Password:</p> <input type="text" name="password_new"> <span> <?php echo $passnewErr ;?></span>
                <br>
                <p>Confirem Password:</p><input type="text" name="confirmpassword"> <span> <?php echo $cpassErr ;?></span>
                <div class="Save_btn">
                    <button type="submit" name="password_change" > Change Password</button>
                </div>
            </div>
            </form>  








            
            <div id="wining_bids" class="wining_bids">
               <?php include 'winning.php' ?>
            </div>











          
        </div>
    </section>



<!-- =================================script sidebar ===================================-->
<script>
        $('#btn-user-info').click(function() {
        $("#btn-user-info a").addClass("isactive");
        $("#btn-wining-bids a").removeClass("isactive");
        $("#btn-watchlist a").removeClass("isactive");
        $("#btn-change-password a").removeClass("isactive");
        $("#perofile_content").show();
        $("#perofile_content").addClass("isactive");
        $("#wining_bids").hide();
        $("#change_password").hide();
        $("#watchlist").hide();
       
});
$('#btn-wining-bids').click(function() {
        $("#btn-user-info a").removeClass("isactive");
        $("#btn-wining-bids a").addClass("isactive");
        $("#btn-watchlist a").removeClass("isactive");
        $("#btn-change-password a").removeClass("isactive");
        $("#perofile_content").hide();
        $("#wining_bids").show();
        $("#change_password").hide();
        $("#watchlist").hide();
       
});
$('#btn-watchlist').click(function() {
        $("#btn-user-info a").removeClass("isactive");
        $("#btn-wining-bids a").removeClass("isactive");
        $("#btn-watchlist a").addClass("isactive");
        $("#btn-change-password a").removeClass("isactive");
        $("#perofile_content").hide();
        $("#wining_bids").hide();
        $("#change_password").hide();
        $("#watchlist").show();
       
});
$('#btn-change-password').click(function() {
        $("#btn-user-info a").removeClass("isactive");
        $("#btn-wining-bids a").removeClass("isactive");
        $("#btn-watchlist a").removeClass("isactive");
        $("#btn-change-password a").addClass("isactive");
        $("#perofile_content").hide();
        $("#wining_bids").hide();
        $("#change_password").show();
        $("#watchlist").hide();
       
});

       
    </script>
</body>    
</html>