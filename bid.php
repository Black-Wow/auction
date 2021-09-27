<?php

include 'db_connection.php';
date_default_timezone_set('Asia/Calcutta');
$item_id = $_GET['item_id'];
$sql="select * from product";
$res =mysqli_query($db,$sql); 
$check_faculity=mysqli_num_rows($res) > 0;
$sql1="select  MAX(product_price) from bid where product_id ='$item_id'";


if ($check_faculity) {
    while($row = mysqli_fetch_assoc($res))
    {
if ($row['id'] == $item_id) { 
    $fromdate =  $row['pstartdate'];
    $begindate = date("Y-m-d H:i:s",strtotime($fromdate));
    $duedate =  $row['penddate'];
    $closedate = date("Y-m-d H:i:s",strtotime($duedate));
    $enddate = new DateTime( $duedate);
    $now = new DateTime();
    $startdate = new DateTime($begindate);
    $res2 =mysqli_query($db,$sql1);
    $check_faculity2= mysqli_num_rows($res2) > 0;
    if ($check_faculity2) {
        while($row2 = mysqli_fetch_assoc($res2))
        {
            if($enddate < $now){
                
                $high= $row2['MAX(product_price)'];

                $qry = "UPDATE bid SET State='Winner' WHERE product_id ='$item_id' and product_price='$high'";
                         
                mysqli_query($db,$qry ) or die(mysqli_error($db));

            }

if (isset($_POST['btnBidding'])) {
    $item_id = $_POST['item_id'];
    $user_id = $_POST['user_id'];
    $item_price = $_POST['bidamount'];

        
            if($startdate > $now ) {
                echo "<script>alert('The bid not start yet')</script>";
            }elseif($enddate < $now){
                echo "<script>alert('the bid is end')</script>";
                $high= $row2['MAX(product_price)'];

                $qry = "UPDATE bid SET State='Winner' WHERE product_id ='$item_id' and product_price='$high'";
                         
                mysqli_query($db,$qry ) or die(mysqli_error($db));

            }elseif($startdate <= $now &&  $enddate >= $now){
          
      
                    $cdate=date("Y-m-d H:i:s");
            if($item_price >  $row2['MAX(product_price)'] && $item_price > $row['pstart'] ){
                $query ="INSERT INTO bid (user_id,product_id,product_price,Date) 
                VALUES ('$user_id','$item_id','$item_price','$cdate')";
                mysqli_query($db,$query);
                echo "<script>alert('Bided suucssfully')</script>";
            }else{
                echo "<script>alert('Your Bid is not counted for the amount is lower than the highest bid or does not exceed the starting bid')</script>";
            }
             }
        }
}
}
}
}

}

?>