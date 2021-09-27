<?php 

include('db_connection.php');


if(isset($_POST['add'] )){
    $user_id = $_POST['user'];
    $category = $_POST['category'];
    $p_name = $_POST['p_name'];
    $p_disc = $_POST['p_disc'];
    $p_start = $_POST['p_start'];
    $p_cost = $_POST['p_cost'];
    $p_startDate = $_POST['p_startDate'];
    $p_endDate = $_POST['p_endDate'];
    $p_deliveryTime = $_POST['p_deliveryTime'];
    $p_companyName = $_POST['p_companyName'];

//image insert with random name
$v1=rand(1111,9999);
$v2=rand(1111,9999);
$v3=$v1.$v2;
$v3=md5($v3);
//image1
$p_image = $_FILES["img_add"]["name"];
$p_image_temp = $_FILES["img_add"]["tmp_name"];
$floder="product_image/".$v3.$p_image;
//image2
$p_image2 = $_FILES["img-add2"]["name"];
$p_image_temp2 = $_FILES["img-add2"]["tmp_name"];
$floder2="product_image/".$v3.$p_image2;
//image3
$p_image3 = $_FILES["img-add3"]["name"];
$p_image_temp3 = $_FILES["img-add3"]["tmp_name"];
$floder3="product_image/".$v3.$p_image3;
//image14
$p_image4 = $_FILES["img-add4"]["name"];
$p_image_temp4 = $_FILES["img-add4"]["tmp_name"];
$floder4="product_image/".$v3.$p_image4;
//move-upload image1
move_uploaded_file($p_image_temp,$floder);
//move-upload image2
move_uploaded_file($p_image_temp2,$floder2);
//move-upload image3
move_uploaded_file($p_image_temp3,$floder3);
//move-upload image4
move_uploaded_file($p_image_temp3,$floder3);


$qry="insert into product(user_id,pname,pcategory,pstart,pcost,pstartdate,penddate,pdeliverytime,pcompanyname,p_img,p_img2,p_img3,p_img4,pdisc,status)
                    values('$user_id','$p_name','$category','$p_start','$p_cost','$p_startDate','$p_endDate','$p_deliveryTime','$p_companyName ','$floder','$floder2','$floder3','$floder4','$p_disc','Under_process')";
mysqli_query($db,$qry) or die(mysqli_error($db));
echo "<script>alert('Added successfully')</script>";
$_SESSION['success']="succes added" ;


}


?>


