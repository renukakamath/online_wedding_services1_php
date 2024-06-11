 <?php include 'adminheader.php';

 if (isset($_GET['uid'])) {
	extract($_GET);

	$h="select * from tbl_media where m_id='$uid'";
	$res=select($h);

}

if (isset($_POST['update'])) {
		extract($_POST);

		$a="update tbl_media set m_rate='$rate',m_type='$type',m_name='$name' where m_id='$uid'";
		update($a);
	alert('successfully');
	return redirect('admin_mediamanagement.php');
}
?>
		

 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
    
      <h3>Edit Media</h3>
		
	
			
			<input type="text" placeholder="Media name" required=""value="<?php echo $res[0]['m_name'] ?>" name="name">
		
		<input type="text" placeholder="Rate" required="" value="<?php echo $res[0]['m_rate'] ?>" name="rate">
		
			<input type="text" placeholder="Media type" required=""  value="<?php echo $res[0]['m_type'] ?>" name="type">
		
		
			<input type="submit" class="form-btn" value="Add Media" style="background-color: green;color: white" name="update" >
		
	   </form>

</div>
