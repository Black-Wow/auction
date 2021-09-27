<?php
session_start();



$nameErr = $lnameErr = $userErr = $emailErr = $passErr = $cpassErr =$typeErr  = $phoneErr =  $termErr ="" ;
$name = $lname = $email = $pass = $cpass =$type  = $phone = $term = "";
$db =mysqli_connect("localhost","root","","auction");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['create'])){
$type = isset($_POST['type']);
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phoneno'];
$pass = $_POST['password'];
$cpass = $_POST['confirmpassword'];
$term = isset($_POST['term']);


//checking name

if (empty($_POST["name"])) {
  $nameErr = "Name is required";
} else {
  $name = test_input($_POST["name"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }
}

//checking Lastname
if (empty($_POST["lastname"])) {
  $lnameErr = "Name is required";
} else {
  $lname = test_input($_POST["lastname"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $lnameErr = "Only letters and white space allowed";
  }
}

//checking phoneno
if (empty($_POST["phoneno"])) {
  $phoneErr = "phone is required";
}
else
{
$phone = test_input($_POST["phoneno"]);
$mobilenumber = "/^[0-9][0-9]{9}$/" ;  //the mobile number starting from 0 to 9
if (preg_match($mobilenumber, $phone) === 1)
{
  $phoneErr="";
}else{
  $phoneErr = "mobile number is not valid ";
}
}


//checking email
if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}


//checking type
if (empty($_POST["type"])) {
  
  $typeErr = "Gender is required";
} else {
  $type = test_input($_POST["type"]);
}


//checking term
if (empty($_POST["term"])) {
  
  $termErr = "Gender is required";
} else {
  $term = test_input(isset($_POST["type"]));
}

if(empty($pass)){
  $passErr= " Password is requrid";
} else {
  $pass = test_input($pass);
}

if(empty($cpass)){
  $cpassErr= "Confirm Password is requrid";
}else {
  $cpass = test_input($cpass);

  if($pass != $cpass){
    $cpassErr= "Confirm Password not match";
  }
}

$user_check_query="SELECT * FROM register WHERE email = '$email' LIMIT 1";
$result = mysqli_query($db,$user_check_query);
$user =mysqli_fetch_assoc($result);
if($user) {
    if ($user['email'] === $email) {
      $emailErr = "Email already exist co";
}
}

$user_check_query2="SELECT * FROM seller WHERE email = '$email' LIMIT 1";
$result2 = mysqli_query($db,$user_check_query2);
$user2 =mysqli_fetch_assoc($result2);
if($user2) {
    if ($user2['email'] === $email) { 
      $emailErr = "Email already exist se";
}
}

if($nameErr=="" && $lnameErr=="" && $emailErr=="" && $passErr=="" && $cpassErr=="" && $typeErr=="" && $phoneErr=="" && $termErr=="" ) {
  

 if ($type ==1) {
       $pass1=md5($pass);
        $query ="INSERT INTO register (name,lastName,email,phoneno,password) 
                          VALUES ('$name','$lastname','$email','$phone','$pass')";
        mysqli_query($db,$query ) or die(mysqli_error($db));
        $_SESSION['email'] =$email;
        echo "<script>alert('Registerd suucssfully')</script>";
        header("location:.home.php");
     
        
    }elseif($type == 2){
      $pass1=md5($pass);
      $query ="INSERT INTO seller (name,lastName,email,phoneno,password) 
                        VALUES ('$name','$lastname','$email','$phone','$pass')";
      mysqli_query($db,$query) or die(mysqli_error($db));

      $_SESSION['email'] =$email;
      echo "<script>alert('Registerd suucssfully')</script>";
      header("location:../../agent/index.php");
        
    }
  }
  }

  






//login form

if(isset($_POST['login'])){
 $email = $_POST['email'];
 $pass = $_POST['password'];

 if(empty($pass)){
  $passErr= " Password is requrid*";
} else {
  $pass = test_input($pass);
}
if (empty($_POST["email"])) {
  $emailErr = "Email is required*";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format*";
  }
}


  $pass1=md5($pass);
  $query = "SELECT * FROM register WHERE email ='$email' And password= '$pass'";
  $result = mysqli_query($db,$query);
  if(mysqli_num_rows($result) == 1){
    $_SESSION['email'] =$email;
    header("location:home.php");
    }else{
     $userErr= "passwod Or username is wrong";
}

  $query2 = "SELECT * FROM seller WHERE email ='$email' And password= '$pass'";
  $result2 = mysqli_query($db,$query2);
  if(mysqli_num_rows($result2) == 1){
    $_SESSION['email'] =$email;
    
    header("location:../../agent/index.php");
  
    }else{
     $userErr= "passwod Or username is wrong";
}
$query3 = "SELECT * FROM admin WHERE email ='$email' And password= '$pass'";
$result3 = mysqli_query($db,$query3);
if(mysqli_num_rows($result3) == 1){
  
  $_SESSION['email'] =$email;
  
  header("location:../../admin/index.php");

  }else{
   $userErr= "passwod Or username is wrong";
}
}



        














?>





