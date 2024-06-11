<?php include 'customerheader.php' ;
  $cid=$_SESSION['cust_id'];
  extract($_GET);


  $q1="select curdate() as m";
  $re2=select($q1);




$qw="select * FROM tbl_booking INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) WHERE bk_id='$bid' ";
$res=select($qw);





if (isset($_POST['update'])) {
    extract($_POST);
 echo$d=$date;
    echo$exp=date("Y-m-d");
    if ($d < $exp) {
        alert('Not Availabe');
    }else{

 $mi="select * from tbl_booking where  h_id='$h' and  bk_date='$date'  and (status='paid' or status='pending')";
   $ren=select($mi);
   if (sizeof($ren)>0) {
    alert('already Booked');
   }else{

   echo $qm="update tbl_booking set f_id='$f' ,h_id='$h' ,m_id='$m',bk_date='$date ' where bk_id='$bid' ";
    update($qm);
     alert('successfully');
    return redirect('customer_viewbookings.php');
  }
}

}


?>
 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
      <h3>Booking</h3>
    <form method="post">
        
                <h1>Ender Food</t1>
                <select name="f">
                    <option value="<?php echo $res[0]['f_id'] ?>"><?php echo $res[0]['f_name']  ?></option>
                    <option>---Select---</option>
                   
                    <?php 

                     $q1="select * from tbl_food where f_status='Active'";
                     $res1=select($q1);

                      foreach ($res1 as $row) {?>
                      <option value="<?php echo $row['f_id'] ?>"><?php echo $row['f_name'] ?></option>
                     <?php  }

                     ?>
                </select>
           
                <h1>Ender Hall</h1>
                <select name="h">
                    <option value="<?php echo $res[0]['h_id'] ?>"><?php echo $res[0]['h_name']  ?></option>
                    <option>---Select---</option>
                    
                    <?php 
                   $q2="select * from tbl_hall where h_status='Active'";
                   $res2=select($q2);
                   foreach ($res2 as $row) {?>
                  <option value="<?php echo $row['h_id'] ?>"><?php echo $row['h_name'] ?></option>
                 <?php }

                     ?>
                </select>
       
                <h1>Ender Media</h1>
                <select name="m">
                     <option value="<?php echo $res[0]['m_id'] ?>"><?php echo $res[0]['m_name'] ?></option>
                    <option>---Select---</option>
                    
                    <?php 
                  $q3="select * from tbl_media where m_status='Active'";
                  $res3=select($q3);
                  foreach ($res3 as $row) {?>
                  <option value="<?php echo $row['m_id'] ?>"><?php echo $row['m_name'] ?></option>
                <?php   }

                     ?>
                </select>
             
                <h1>Booking Date</h1>
                <td><input type="date" value="<?php echo $res[0]['bk_date'] ?> " min="<?php echo $re2[0]['m'] ?>"  name="date">
                <input type="submit" style="background-color: green;color: white" name="update"  >
                
      
    </form>
  
  </div>
</center>
<?php include 'footer.php' ?>


