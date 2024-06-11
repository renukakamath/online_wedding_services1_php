<?php include 'adminheader.php' ;

extract($_GET);
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
			background-color: 
#abf58e
 !important;
			border: none;
		}
</style>
<center>
	<br><br>
<h1 style="color: black;font-size: 40px">View Payment</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		
		<tr>
			<th>Customer</th>
			<th>Booking Date </th>
			<th>payment date</th>
			
		</tr>
		<?php 
        $q="SELECT * FROM tbl_payment inner join tbl_booking using (bk_id) inner join tbl_customer using (customer_id) where customer_id='$cid'";
        $res=select($q);
        foreach ($res as $row) {?>
       <tr>
			<td><?php echo $row['customer_name'] ?></td>
			
			<td><?php echo $row['bk_date'] ?></td>
			<td><?php echo $row['payment_date'] ?></td>
			
		</tr>
      <?php  }

		 ?>
	
	</table>
</center>
</body></div>
<?php include 'footer.php' ?>