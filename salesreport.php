<?php include 'adminheader.php';
 
extract($_GET);



 ?>
 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
  <h3>SEARCH Booking</h3>
  <form method="post">
   <input type="date" name="daily" >
       <input type="month" name="monthly">
     <input type="text" name="customer" placeholder="Search by Customer">

     <input type="submit" name="sale" class="form-btn" style="background-color: green;color: white" value="SEARCH">
    
  </form>
</center>



<style type="text/css">
    #tab th{
      background-color:  grey;
      color: white;
    }

    #tab ,#tab th,#tab td,#tab tr{
      border: none;
    }

    #tab a{
      background-color: 
#abf58e
 !important;
      border: none;
    }
</style>
</form></div>
<center>
 <h1 style="color: black;font-size: 40px">View Bookings</h1>
  <table class="table"  id="tab"  style="margin: 10px 30px ;width: 1000px;color: black">
    
  <th>image</th>
    <th>Customer</th>
      <th>Food </th>
      <th>Food Price</th>
      <th>Hall</th>
      <th>Hall price</th>
      <th>Media</th>
      <th>Media price</th>
      <th>Total price</th>
      <th>Booking Date</th>
        
           
    </tr>

  <h2><a class="btn btn-success" style="background-color: green;color: white" href="sales.php">PRINT</a></h2>
  
    <?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`) where bk_date='$daily' and status='paid' ";
           }
            else if ($monthly!="") {

            
             $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`) where bk_date like '$monthly%' and status='paid' ";

             }
           

           else if ($customer!="") {

            
            $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`)  where customer_name like '$customer%' and status='paid' ";

            }
          }
             else{
            $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`) where status='paid'";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {
        ?>
    <tr>
      <td><img src="<?php echo $row['h_image'] ?>" height="100" width="100"></td>
   <td><?php echo $row['customer_name'] ?></td>
      <td><?php echo $row['f_name'] ?></td>
      <td>₹<?php echo $row['f_rate'] ?></td>
      <td><?php echo $row['h_name'] ?></td>
      <td>₹<?php echo $row['h_rate'] ?> <br>size:<?php echo $row['size'] ?></td>
      <td><?php echo $row['m_name'] ?></td>
      <td>₹<?php echo $row['m_rate'] ?></td>
      <td>₹<?php echo $total_price = ($row['f_rate'] * $row['capacity'] + $row['h_rate'] + $row['m_rate']) ; ?>/-</td>
      <td><?php echo $row['bk_date'] ?></td>
        
       
        
    </tr>
  
     <?php
       }


     ?>
  </table>
  </form>
</center>
<?php include 'footer.php' ?>