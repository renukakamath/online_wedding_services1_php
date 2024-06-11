<?php include 'adminheader.php';
		
		

if (isset($_POST['food'])) {
	extract($_POST);

		echo$q11="select * from tbl_food where f_name='$name' ";
 		$res1=select($q11);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{

 $q1="insert into tbl_food values(null,'$cid','$rate','$type','Active','$name')";
	insert($q1);
	alert('successfully');
	return redirect('admin_foodmanagement.php');
}
}

if (isset($_GET['did'])) {
	extract($_GET);

	$m="delete from tbl_food where f_id='$did'";
	delete($m);
	alert('successfully');
	return redirect('admin_foodmanagement.php');

}
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

if (isset($_GET['iid'])) {
	extract($_GET);


	$q1="update tbl_food set f_status='InActive' where f_id='$iid'";
	update($q1);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	
	$q1="update tbl_food set f_status='Active' where f_id='$aid'";
	update($q1);
}

 ?>
  <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
      <h3>Add a new Food</h3>
		
	
			
	


	
			<input type="text" placeholder="food name" required=""  name="name">
			<input type="text" placeholder="Rate" required="" name="rate">
			<input type="text" placeholder="food type" required="" name="type">
			<input type="submit" class="form-btn " style="background-color: green;color: white" value="Add Hall" name="food">
	</form> 

</center>
</div>
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
	<h1 style="color: black;font-size: 40px">View food</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		<tr>

			<th>Food name</th>
			<th>Rate</th>
			<th>Food type</th>
			<th></th>
				<th></th>
					<th></th>
		</tr>
		<?php 
      $q="select * from tbl_food  where staff_id='$cid' and f_name <> 'none'";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      	<tr>
     <td><?php echo $row['f_name'] ?></td>
      <td><?php echo $row['f_rate'] ?></td>
      <td><?php echo $row['f_type'] ?></td>
      <td><a class="btn btn-success" style="background-color: #88ECFA;color: white" href="editfood.php?uid=<?php echo $row['f_id'] ?>">Edit</a></td>

        	<?php if ($row['f_status']=="Active") {
    			?>

            <td><a class="btn btn-success" style="background-color: #FA9188;color: white" href="?iid=<?php echo $row['f_id'] ?>">INACTIVE</a></td>
           

    		<?php 
    		}elseif ($row['f_status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" style="background-color:#98F896;color: white" href="?aid=<?php echo $row['f_id'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>
  </tr>
    <?php  }
	 ?>
		

	</table>
</center>
<?php include 'footer.php' ?>