  <?php include 'adminheader.php';

  if (isset($_GET['uid'])) {
	extract($_GET);

	$h="select * from tbl_food where f_id='$uid'";
	$res=select($h);

}

if (isset($_POST['update'])) {
		extract($_POST);

		$a="update tbl_food set f_rate='$rate',f_type='$type',f_name='$name' where f_id='$uid'";
		update($a);
	alert('successfully');
	return redirect('admin_foodmanagement.php');
}

  ?>

  <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
      <h3>Edit Food</h3>
		
	
			<input type="text" placeholder="food name" required="" value="<?php echo $res[0]['f_name'] ?>" name="name">
		
	
			<input type="text" placeholder="Rate" required="" value="<?php echo $res[0]['f_rate'] ?>" name="rate">
	
			<input type="text" placeholder="food type" required="" value="<?php echo $res[0]['f_type'] ?>" name="type">
	<input type="submit" class="form-btn" value="Add Hall" style="background-color: green;color: white" name="update">

	</center>
</div>
	
	