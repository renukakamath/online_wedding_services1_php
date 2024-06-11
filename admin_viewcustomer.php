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
<h1 style="color: black;font-size: 40px">View Customer</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		


	<tr>
				<th>SNo</th>
			   <th>First Name</th>
			   <th>District</th>
			   <th>Pincode</th>
			    <th>City</th>
				<th>State</th>
				<th>Address</th>
				<th>Phone</th>
			
				<th>Date Joined</th>

				
			</tr>
			<?php 

     $q="select * from tbl_customer  inner join tbl_login using (username) where customer_id='$cid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['customer_name'] ?></td>
    		<td><?php echo $row['customer_district'] ?></td>
			<td><?php echo $row['customer_pincode'] ?></td>
    		<td><?php echo $row['customer_city'] ?></td>
    		<td><?php echo $row['customer_state'] ?></td>
    		
    		<td><?php echo $row['customer_house_name'] ?></td>
    		<td><?php echo $row['customer_phone'] ?></td>

    	
    		
    		<td><?php echo $row['date_added'] ?></td>
			
    	
    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
	</div>
</center>
<?php include 'footer.php' ?>