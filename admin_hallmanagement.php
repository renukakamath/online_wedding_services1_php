<?php include 'adminheader.php';
		
		

if (isset($_POST['hal'])) {
	extract($_POST);

	echo$q11="select * from tbl_hall where h_name='$name' ";
 		$res1=select($q11);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{




    $dir = "uploads/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{
        echo $q1="insert into tbl_hall values(null,'$cid','$capa','$size','$rate','$place','Active','$name','$target')";
	insert($q1);
	alert('successfully');
	return redirect('admin_hallmanagement.php');
    }
    else
    {
        echo "file uploading error occured";
    }
    


 }
}

if (isset($_GET['did'])) {
	extract($_GET);

	$m="delete from tbl_hall where h_id='$did'";
	delete($m);
	alert('successfully');
	return redirect('admin_hallmanagement.php');

}


if (isset($_GET['iid'])) {
	extract($_GET);


	$q1="update tbl_hall set h_status='InActive' where h_id='$iid'";
	update($q1);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q1="update tbl_hall set h_status='Active' where h_id='$aid'";
	update($q1);
}

 ?>
 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Add a new hall</h3>
	
	


			<input type="text" placeholder="hall name"  name="name">
			<input type="text" placeholder="Capacity" name="capa">
			<input type="text" placeholder="Size" name="size">
			<input type="text" placeholder="Rate" name="rate">
			<input type="text" placeholder="place" name="place">
			<input type="file" name="img">
			<input type="submit" style="background-color: green;color: white" name="hal">
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
	<h1 style="color: black;font-size: 40px">View Hall</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		
		<tr>
			<th>Image</th>
<th>Hall name</th>

			<th>Capacity</th>
			<th>Size</th>
			<th>Rate</th>
			<th>Place</th>

			<th></th>
			<th></th>
			<th></th>
		</tr>
		<?php 
      $q="select * from tbl_hall  where staff_id='$cid' and h_name <> 'none' ";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      	<tr>
      		<td><img src="<?php echo $row['h_image'] ?>" height="50" width="50"></td>
      		<td><?php echo $row['h_name'] ?></td>
      <td><?php echo $row['capacity'] ?></td>
      <td><?php echo $row['size'] ?></td>
      <td><?php echo $row['h_rate'] ?></td>
      <td><?php echo $row['place'] ?></td>
      <td><a class="btn btn-success" style="background-color: #88ECFA;color: white" href="edithall.php?uid=<?php echo $row['h_id'] ?>">Edit</a></td>

      	<?php if ($row['h_status']=="Active") {
    			?>

            <td><a class="btn btn-success" style="background-color:#FA9188;color: white" href="?iid=<?php echo $row['h_id'] ?>">INACTIVE</a></td>
           

    		<?php 
    		}elseif ($row['h_status']=="InActive") {
    			?> 
    			<td><a class="btn btn-success" style="background-color:#98F896;color: white" href="?aid=<?php echo $row['h_id'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>
  </tr>
    <?php  }
	 ?>
		

	</table>
</center>
<?php include 'footer.php' ?>