<?php include 'customerheader.php';

  $cid=$_SESSION['cust_id'];
extract($_GET);


 $q1="SELECT * FROM `tbl_booking`  INNER JOIN `tbl_media` USING(`m_id`)  INNER JOIN `tbl_hall` USING(`h_id`) INNER JOIN `tbl_food` USING(`f_id`)  WHERE `customer_id`='$cid' AND `status`='Pending'";
$res1=select($q1);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `tbl_booking` SET status='Cancel and Refund' WHERE `bk_id`='$bid'";
    update($qu);
    

  

   alert("Your Booking Canceled ,refund within 2 days");

}
 ?>


  <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   


<style type="text/css">
		#tab th{
			background-color:  grey;
			color: white;
		}

		#tab ,#tab th,#tab td,#tab tr{
			border: none;
		}

		#tab a{


			border: none;
		}
</style>
<center>
	<br><br>


<h1 style="color: black;font-size: 40px">View Paid Bookings</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
<center>
	
		<tr>
			<th>Image</th>
			<th>Customer</th>
			<th>Food </th>
			<th>Food Price</th>
			<th>Hall</th>
			<th>Hall Price</th>
			<th>Media</th>
			<th>Media Price</th>
			<th>Total Price</th>
			<th>Booking Date</th>
			<th></th>
		</tr>
		<?php 
        $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`) where status='paid' and customer_id='$cid'";
        $res=select($q);
        foreach ($res as $row) {
                $h=$row['h_rate'];
                $m=$row['m_rate'];
                $f=$row['f_rate'];

               $total=$f+$m+$h;
$final_price;

        	?>
       <tr>
       	<td><img src="<?php echo $row['h_image'] ?>" height="100" width="100"></td>
			<td><?php echo $row['customer_name'] ?></td>
			<td><?php echo $row['f_name'] ?></td>
			<td>₹<?php echo $row['f_rate'] ?></td>
			<td><?php echo $row['h_name'] ?></td>
			<td>₹<?php echo $row['h_rate'] ?><br>size:<?php echo $row['size'] ?></td>
			<td><?php echo $row['m_name'] ?></td>
			<td>₹<?php echo $row['m_rate'] ?></td>
			<td>₹<?php echo $total_price = ($row['f_rate'] * $row['capacity'] + $row['h_rate'] + $row['m_rate']) ; ?>/-</td>
			<td><?php echo $row['bk_date'] ?></td>

			 <td><a class=" btn btn-danger" style="background-color: red;color: white" type="button" href="?remove_item=<?php echo $row['bk_id']; ?>&bid=<?php echo $row['bk_id'] ?>&amount=<?php echo $total?>"/>Cancel</td>
			 <td><a class="btn btn-danger" style="background-color: green;color: white"  href="bill.php?cmid=<?php echo $row['bk_id'] ?>">print</a></td>

		</tr>
      <?php  }

		 ?>


		  
	
	</table>
</center>
<?php include 'footer.php' ?>