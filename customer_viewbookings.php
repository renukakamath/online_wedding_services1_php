<?php include 'customerheader.php';
  $cid=$_SESSION['cust_id'];
extract($_GET);


 $q1="SELECT * FROM `tbl_booking`  INNER JOIN `tbl_media` USING(`m_id`)  INNER JOIN `tbl_hall` USING(`h_id`) INNER JOIN `tbl_food` USING(`f_id`)  WHERE `customer_id`='$cid' AND `status`='Pending'";
$res1=select($q1);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `tbl_booking` SET status='canceled' WHERE `bk_id`='$bid'";
    update($qu);
    

  

   alert("Successfully Canceled");

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


<h1 style="color: black;font-size: 40px">View Bookings</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
	
		<tr>
             <th>Image</th>
			<th>Customer</th>
			<th>Food </th>
			<th>Food Price</th>
			<th>Hall</th>
			<th>Hall Price</th>
			<th>Media</th>
			<th>Media Price</th>
			<th>Total price</th>
			<th>Booking Date</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
        $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`) where status='pending' and customer_id='$cid'";
        $res=select($q);
		$totalf=0;
        foreach ($res as $row) {
                $h=$row['h_rate'];
               echo $m=$row['m_rate'];
               echo $f=$row['f_rate'];
				$c=$row['capacity'];
              echo $total=$f*$c+$m+$h;
        	?>
       <tr>
       	<td><img src="<?php echo $row['h_image'] ?>" style="height: 100%; width: 100%;"></td>
			<td><?php echo $row['customer_name'] ?></td>
			<td><?php echo $row['f_name'] ?></td>
			<td>₹<?php echo $row['f_rate'] ?></td>
			<td><?php echo $row['h_name'] ?></td>
			<td>₹<?php echo $row['h_rate'] ?>Size:<?php echo $row['size'] ?></td>
			<td><?php echo $row['m_name'] ?></td>
			<td>₹<?php echo $row['m_rate'] ?></td>
			<td>₹<?php echo $total_price = ($row['f_rate'] * $row['capacity'] + $row['h_rate'] + $row['m_rate']) ; ?>/-</td>
					<?php $totalf = $totalf + $total_price; ?>
			<td><?php echo $row['bk_date'] ?></td>	

			<td align="center" colspan="7"><a class="btn btn-danger" style="background-color: green;color: white" href="customer_makepayment.php?ttamount=<?php echo $totalf ?>&bid=<?php echo $row['bk_id'] ?>">Pay Now</a>Total :₹<?php echo $total ?>/-</td>	
			 <td><a class=" btn btn-danger" style="background-color: red;color: white" type="button" href="?remove_item=<?php echo $row['bk_id']; ?>&bid=<?php echo $row['bk_id'] ?>&amount=<?php echo $total?>"/>Cancel</td>

			 	<td><a class="btn btn-danger" style="background-color: blue;color: white" href="customer_editbooking.php?bid=<?php echo $row['bk_id'] ?>">Change Booking</a></td>

		</tr>
      <?php 
}

      ?>

		 


	
	</table>
</center>
<?php include 'footer.php' ?>