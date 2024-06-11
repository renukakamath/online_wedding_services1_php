<?php include 'adminheader.php' ?>
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
			background-color: 
#abf58e
 !important;
			border: none;
		}
</style>
<center>
<h1 style="color: black;font-size: 40px">View Bookings</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		
	
		<tr>
			<th>image</th>
			<th>Customer</th>
			<th>Food </th>
			<th>Food price</th>
			<th>Hall</th>
			<th>Hall price</th>
			<th>Media</th>
			<th>Media price</th>
			<th>Total price</th>
			<th>Booking Date</th>
			<th>status</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
        $q="SELECT * FROM `tbl_booking` INNER JOIN `tbl_food` USING(`f_id`)INNER JOIN `tbl_hall` USING (`h_id`) INNER JOIN`tbl_media` USING (`m_id`) INNER JOIN `tbl_customer` USING (`customer_id`)";
        $res=select($q);
        foreach ($res as $row) {?>
       <tr>
       	 <td><img src="<?php echo $row['h_image'] ?>" height="100" width="100"></td>
			<td><?php echo $row['customer_name'] ?></td>
			<td><?php echo $row['f_name'] ?></td>
			<td>₹<?php echo $row['f_rate'] ?></td>
			<td><?php echo $row['h_name'] ?></td>
			<td> ₹<?php echo $row['h_rate'] ?><br>size:<?php echo $row['size'] ?></td>
			<td><?php echo $row['m_name'] ?></td>
			<td>₹<?php echo $row['m_rate'] ?> </td>
			<td>₹<?php echo $total_price = ($row['f_rate'] * $row['capacity'] + $row['h_rate'] + $row['m_rate']) ; ?>/-</td>
			<td><?php echo $row['bk_date'] ?></td>
			<td><?php echo $row['status'] ?></td>
			<td><a class="btn btn-success" href="admin_viewcustomer.php?cid=<?php echo $row['customer_id'] ?>">Customer</a></td>
			<td><a   class="btn btn-success" href="admin_viewpayment.php?cid=<?php echo $row['customer_id'] ?>">Payment</a></td>

		</tr>
      <?php  }

		 ?>
	
	</table>
</form>
</div>
</center>
<?php include 'footer.php' ?>