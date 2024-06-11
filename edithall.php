<?php include 'adminheader.php';\
extract($_GET);

if (isset($_GET['uid'])) {
	extract($_GET);

	$h="select * from tbl_hall where h_id='$uid'";
	$res=select($h);

}

if (isset($_POST['update'])) {
		extract($_POST);


    $dir = "uploads/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{
        	$a="update tbl_hall set capacity='$capa',size='$size',h_rate='$rate',place='$place',h_name='$name',h_image='$target' where h_id='$uid'";
		update($a);
	alert('successfully');
	return redirect('admin_hallmanagement.php');
    }
    else
    {
        echo "file uploading error occured";
    }

	
}



 ?>
 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Edit hall</h3>

 	<input type="text" placeholder="hall name" value="<?php echo $res[0]['h_name'] ?>" name="name">
		<input type="text" placeholder="Capacity" value="<?php echo $res[0]['capacity'] ?>" name="capa">
		<input type="text" placeholder="Size" value="<?php echo $res[0]['size'] ?>" name="size">
		<input type="text" placeholder="Rate" value="<?php echo $res[0]['h_rate'] ?>" name="rate">
		<input type="file" name="img">
		
	<input type="text" placeholder="place" value="<?php echo $res[0]['place'] ?>" name="place">
		<input type="submit" style="background-color: green;color: white" name="update">

		</center>
</div>
	
	

