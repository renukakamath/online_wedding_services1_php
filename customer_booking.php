<?php include 'customerheader.php' ;
  $cid=$_SESSION['cust_id'];


  $q1="select curdate() as m";
  $re=select($q1);

  extract($_GET);
if (isset($_POST['booking'])) {
	extract($_POST);




	echo$d=$date;
	echo$exp=date("Y-m-d");
	if ($d < $exp) {
		alert('Not Availabe');
	}else{


  $ri="select * from tbl_media inner join tbl_hall using (staff_id) inner join tbl_food using (staff_id) where f_id='1' and h_id='1' and m_id='1' ";
  $res1=select($ri);

  if (sizeof($res1)>0) {
    alert(' No Bookings');
  }else{



	 $mi="select * from tbl_booking where  h_id='$h' and  bk_date='$date'  and (status='paid' or status='pending')";
	 $ren=select($mi);
	 if (sizeof($ren)>0) {
	 	alert('already Booked');
	 }else{

	$q="insert into tbl_booking values(null,'$f','$h','$m','$date','$cid','pending')";
	insert($q);
	alert('successfully');
	return redirect('customer_viewbookings.php');
 }
}
}
}

?>




<div class="bgded overlay light" style="background-color: white">

  <section id="services" class="hoc container clear"> 
     <h1 style="color: black;font-size: 40px" align="center">Hall</h1>
    <ul class="nospace group elements elements-three">
    	<?php 
      $q="select * from tbl_hall where h_status='Active' and h_name!='none'  ";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      <li class="one_third">
        <article><img src="<?php echo $row['h_image'] ?>" height="100" width="100">
          <h6>Hall name:<?php echo $row['h_name'] ?></h6>
            <h6>Capacity:<?php echo $row['capacity'] ?></h6>
            <h6>Size:<?php echo $row['size'] ?></h6>
            <h6>Rate:₹<?php echo $row['h_rate']; ?>/-</h6>
            <h6>Place:<?php echo $row['place'] ?></h6>
         
        </article>
      </li>
     <?php }?>
    
    </ul>

    <!-- ################################################################################################ -->
  </section>
</div>

<div class="bgded overlay light" style="background-color: green">
  <section id="services" class="hoc container clear"> 
      <h1 style="color: black;font-size: 40px" align="center">Food</h1> 
    <ul class="nospace group elements elements-three">
    	<?php 
      $q="select * from tbl_food  where f_status='Active' and f_name!='none'";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      <li class="one_third">
        <article><a href="#"><i class=""></i></a>
          <h6>Food name:<?php echo $row['f_name'] ?></h6>
           
            <h6>Type:<?php echo $row['f_type'] ?></h6>
            <h6>Rate:₹<?php echo $row['f_rate']; ?>/-</h6>
         
        </article>
      </li>
     <?php }?>
    
    </ul>

    <!-- ################################################################################################ -->
  </section>
</div>

<div class="bgded overlay light" style="background-color: red">
  <section id="services" class="hoc container clear"> 
      <h1 style="color: black;font-size: 40px" align="center">Media</h1>
    <ul class="nospace group elements elements-three">
    	<?php 
      $q="select * from tbl_media where m_status='Active' and m_name!='none'  ";
      $res=select($q);
      foreach ($res as $row ) {
      	?>
      <li class="one_third">
        <article><a href="#"><i class=""></i></a>
          <h6>Media Name:<?php echo $row['m_name'] ?></h6>
            <h6>Type:<?php echo $row['m_type'] ?></h6>
            <h6>Rate:₹<?php echo $row['m_rate'] ?>/-</h6>
          
         
        </article>
      </li>
     <?php }?>
    
    </ul>

    <!-- ################################################################################################ -->
  </section>
</div>


   
<div class="form-container" style="background: white">

  



<center>
	<h1 style="color: black;font-size: 40px">Booking Now</h1>
	<form method="post" style="color: black">
		<h1> Enter Food</h1>
		<select name="f">
					<option>---Select---</option>
        
					<?php 

                     $q1="select * from tbl_food where f_status='Active'";
                     $res1=select($q1);

                      foreach ($res1 as $row) {?>
                      <option value="<?php echo $row['f_id'] ?>">  <?php echo $row['f_name'] ?></option>
                     <?php  }

					 ?>
				</select>
				<th> Enter Hall</th>
				<select name="h">
					<option>---Select---</option>
         
					<?php 
                   $q2="select * from tbl_hall where h_status='Active' ";
                   $res2=select($q2);
                   foreach ($res2 as $row) {?>
                  <option value="<?php echo $row['h_id'] ?>">  <?php echo $row['h_name'] ?></option>
                 <?php }

					 ?>
				</select>
			
				<th> Enter Media</th>
				<select name="m">
					<option>---Select---</option>
          
					<?php 
                  $q3="select * from tbl_media where m_status='Active'";
                  $res3=select($q3);
                  foreach ($res3 as $row) {?>
                  <option value="<?php echo $row['m_id'] ?>"><?php echo $row['m_name'] ?></option>
                <?php   }

					 ?>
				</select>
			
				<th> Enter Booking Date</th>
			<input type="date" min="<?php echo $re[0]['m'] ?>"  name="date">
			<input type="submit" class="form-btn" name="booking">
		
	
	</form>
</center>

<style type="">
	


.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}



</style>
<?php include 'footer.php' ?>


