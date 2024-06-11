<?php include 'adminheader.php';
		
		

if (isset($_POST['media'])) {
	extract($_POST);

	echo$q11="select * from tbl_media where m_name='$name' ";
 		$res1=select($q11);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{

 $q1="insert into tbl_media values(null,'$cid','$rate','$type','Active','$name')";
	insert($q1);
	alert('successfully');
	return redirect('admin_mediamanagement.php');
}
}

if (isset($_GET['did'])) {
	extract($_GET);

	$m="delete from tbl_media where m_id='$did'";
	delete($m);
	alert('successfully');
	return redirect('admin_mediamanagement.php');

}


if (isset($_GET['iid'])) {
	extract($_GET);


	$q1="update tbl_media set m_status='InActive' where m_id='$iid'";
	update($q1);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	
	$q1="update tbl_media set m_status='Active' where m_id='$aid'";
	update($q1);
}

 ?>
 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
    
      <h3>Add A New Media</h3>
		
	
			
			

		
			
			<input type="text" placeholder="Media name" required=""   name="name">
		
		
			<input type="text" placeholder="Rate" required=""  name="rate">
		
		
			<input type="text" placeholder="Media type" required=""  name="type">
	
		<input type="submit" class="form-btn" value="Add Media" style="background-color: green;color: white" name="media">
	


	

	   </form>

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
</center>
<center>
<center>
	<h1 style="color: black;font-size: 40px">View Media</h1>
	<table class="table"  id="tab" 	style="margin: 10px 30px ;width: 1000px;color: black">
		
		<tr>

			<th>Media Name</th>
			<th>Rate</th>
			<th>Food type</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<?php 
      $q="select * from tbl_media  where staff_id='$cid' and m_name <> 'none'";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      	<tr>
     <td><?php echo $row['m_name'] ?></td>
      <td><?php echo $row['m_rate'] ?></td>
      <td><?php echo $row['m_type'] ?></td>
      <td><a  class="btn btn-success"  style="background-color: #88ECFA;color: white" href="editmedia.php?uid=<?php echo $row['m_id'] ?>">Edit</a></td>

    		<?php if ($row['m_status']=="Active") {
    			?>

            <td><a class="btn btn-success" style="background-color: #FA9188;color: white" href="?iid=<?php echo $row['m_id'] ?>">INACTIVE</a></td>
           

    		<?php 
    		}elseif ($row['m_status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" style="background-color:#98F896;color: white" href="?aid=<?php echo $row['m_id'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>
  </tr>
    <?php  }
	 ?>
		

	</table>
</center>
<?php include 'footer.php' ?>