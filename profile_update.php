<?php 
include'db_connection.php';
session_start();
$emailErr = $passErr = $cpassErr = $passnewErr ="";
$email = $id = $pass = $cpass = $passnew ="";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $email=$_SESSION['email'];
  $qry="SELECT * from register where email='$email'";
  $result = mysqli_query($db,$qry);
  if(mysqli_num_rows($result) > 0 ){
    while($row= mysqli_fetch_assoc($result)){
   
   $id= $row['lid_user'];
   
    }}
if(isset($_POST['save_change'])){
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phoneno'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['State'];
    $v1=rand(1111,9999);
    $v2=rand(1111,9999);
    $v3=$v1.$v2;
    $v3=md5($v3);
    
    //image1
    $p_image = $_FILES["p_img"]["name"];
    $p_image_temp = $_FILES["p_img"]["tmp_name"];
    $floder="profile_img/".$v3.$p_image;
    
//move-upload image1
move_uploaded_file($p_image_temp,$floder);
  
    $qry = "UPDATE register SET name='$name', lastname='$lastname', address='$address', phoneno='$phone', country='$country', states='$state' ,p_img='$floder' WHERE lid_user ='$id'";
             
    mysqli_query($db,$qry ) or die(mysqli_error($db));
    echo "<script>alert('Updated successfully')</script>";
    


}   




if(isset($_POST['password_change'])){
    $pass = $_POST['password'];
    $pass_new = $_POST['password_new'];
    $cpass = $_POST['confirmpassword'];
 



    if(empty($pass)){
        $passErr= " Current Password is requrid";
      } else {
        $pass = test_input($pass);
      }

      if(empty($pass_new)){
        $passnewErr= " New Password is requrid";
      } else {
        $passnew = test_input($pass_new);
      }
      
      if(empty($cpass)){
        $cpassErr= "Confirm Password is requrid";
      }else {
        $cpass = test_input($cpass);
      
        if($pass_new != $cpass){
          $cpassErr= "Confirm Password not match";
        }
      }

$user_check_query="SELECT * FROM register WHERE lid_user = '$id' ";
$result = mysqli_query($db,$user_check_query);
$user =mysqli_fetch_assoc($result);
if($user) {
    if ($user['Password'] != $pass) {
      $passErr = "Current password  not match ";
}
}    

if($emailErr=="" && $passErr=="" && $cpassErr=="" && $passnewErr=="") {
  

    $qry = "UPDATE register SET password='$pass_new' WHERE lid_user='$id' and password='$pass'";
             
    mysqli_query($db,$qry ) or die(mysqli_error($db));

    echo "<script>alert('your password updated succssefully')</script>";
    
    

}
}


?>