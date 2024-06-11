
<?php include 'adminheader.php';
extract($_GET);


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    $q="insert into tbl_login values('$uname','$pwd','Staff','Active')";
     insert($q);
  $q1="insert into tbl_staff values(null,'$uname','$fname','$district','$pin','$city','$address','$state','$num','$salary','$datejoin') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managestaff.php');
}
}

if (isset($_GET['iid'])) {
	extract($_GET);

	$q="update tbl_login set status='InActive' where username='$iid'";
	update($q);
	$q1="update tbl_staff set status='InActive' where username='$iid'";
	update($q1);

}
if (isset($_GET['aid'])) {
	extract($_GET);

	$q="update tbl_login set status='Active' where username='$aid'";
	update($q);
	$q1="update tbl_staff set status='Active' where username='$aid'";
	update($q1);
}


if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from tbl_staff where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update tbl_staff set staff_name='$fname' ,staff_district='$district',staff_pincode='$pin',staff_city='$city',staff_house_name='$address',staff_state='$state',staff_phone='$num',staff_salary='$salary',date_added='$datejoin'where staff_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managestaff.php');

 }

 if (isset($_GET['did'])) {
    extract($_GET);

    $qr="delete from tbl_staff where staff_id='$did'";
    delete($qr);
    alert('sucessfully');
   return redirect('admin_managestaff.php');
 }




?>

 <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background: white">
   
<div class="form-container" style="background: white">

   <form action="" method="post">
    
      <h3>Add New Staff</h3>
   <?php  if (isset($_GET['uid'])) { ?>
     <input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_name'] ?>" name="fname" placeholder="First Name">
      <input type="text" required="" class="form-control" name="district" value="<?php echo $res[0]['staff_district'] ?>">
      <input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['staff_pincode'] ?>" name="pin" placeholder="Pincode">

      <input type="text" required="" value="<?php echo $res[0]['staff_city'] ?>" class="form-control" name="city" placeholder="City">
          <input type="text" required="" name="address" value="<?php echo $res[0]['staff_house_name'] ?>" placeholder="Address">
    
      <input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_state'] ?>" name="state">

<input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['staff_phone'] ?>" class="form-control" name="num" placeholder="Phone Number">

<input type="text" required="" class="form-control" value="<?php echo $res[0]['staff_salary'] ?>" name="salary">

<input type="date" required="" class="form-control" value="<?php echo $res[0]['date_added']?>" name="datejoin">

<input type="submit" name="update" value="UPDATE" style="background-color: green;color: white" class="form-btn">

      
     <?php }else{ ?>
 <input type="text" required="" class="form-control"  name="fname" placeholder="First Name">
     	<input type="text" required="" class="form-control"  name="district" placeholder="District">
     	<input type="text" required="" pattern="[0-9]{6}" class="form-control"  name="pin" placeholder="Pincode">

     	<input type="text" required=""  class="form-control" name="city" placeholder="City">

     	 <input type="text" required="" name="address"  placeholder="Address">

     	<input type="text" required="" class="form-control"  placeholder="States" name="state">

     	<input type="text" required="" pattern="[0-9]{10}" class="form-control" name="num" placeholder="Phone Number">

     	<input type="text" required=""  placeholder="Salary" class="form-control"name="salary">
     	<input type="date" required="" class="form-control"  name="datejoin">
     	<input type="email" required="" class="form-control"  name="uname" placeholder="Enter email of the staff">

     	<input type="password" required="" class="form-control" name="pwd" placeholder="Create Password For Staff">

     	<input type="submit" name="staffreg" value="Add Staff" style="background-color: green;color: white" class="form-btn">

     	<?php } ?>


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
	<h1 style="color: black;font-size: 40px">View Staff</h1>
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
				<th>Salary</th>
			
				<th>Date Joined</th>
				<th></th>
<th></th>
<th></th>				
			</tr>
			<?php 

     $q="select * from tbl_staff inner join tbl_login using (username) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['staff_name'] ?></td>
    		<td><?php echo $row['staff_district'] ?></td>
			<td><?php echo $row['staff_pincode'] ?></td>
    		<td><?php echo $row['staff_city'] ?></td>
    		<td><?php echo $row['staff_state'] ?></td>
    		
    		<td><?php echo $row['staff_house_name'] ?></td>
    		<td><?php echo $row['staff_phone'] ?></td>
    	
    		<td><?php echo $row['staff_salary'] ?></td>
    		<td><?php echo $row['date_added'] ?></td>
			
    	

    		<?php if ($row['status']=="Active") {
    			?>

            <td><a class="btn btn-success" style="background-color: #FA9188;color: white" href="?iid=<?php echo $row['username'] ?>">INACTIVE</a></td>
           

    		<?php 
    		}elseif ($row['status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" style="background-color:#98F896;color: white" href="?aid=<?php echo $row['username'] ?>">ACTIVE</a></td>
    		<?php 
    		} ?>
    		   <td><a class="btn btn-success"  style="background-color: #88ECFA;color: white" href="?uid=<?php echo $row['staff_id'] ?>">UPDATE</a></td>
    		   <td><a class="btn btn-success" style="background-color: #FA9188;color: white"  href="?did=<?php echo $row['staff_id'] ?>">Delete</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>


 

<?php include 'footer.php' ?>