<?php include 'publicheader.php' ;

if (isset($_POST['cusreg'])) {
	extract($_POST);
	echo$q1="select * from tbl_login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
   $q="insert into tbl_login values('$uname','$pwd','Customer','Active')";
     insert($q);
  $q1="insert into tbl_customer values(null,'$uname','$fname','$district','$pin','$city','$address','$state','$num','$date') ";
   insert($q1);
   alert('sucessfully');
   return redirect('registration.php');
}
}
?>





   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
     
    <input type="text" required="" name="fname" placeholder="First Name">
   <input type="text" required=""  name="district" placeholder="District">
     <input type="text" required="" pattern="[0-9]{6}"name="pin" placeholder="Pincode">
     <input type="text" required=""  name="city" placeholder="City">
     <input type="text" required=""  name="address" placeholder="Address">
   <input type="text" required="" name="state" placeholder="state">
   <input type="text" required="" pattern="[0-9]{10}" name="num" placeholder="Phone Number">
     <input type="date" required=""  name="date" placeholder="Date of Birth">
    <input type="email" required=""  name="uname" placeholder="Enter Your email">
    <input type="password" required=""  name="pwd" placeholder="Create Password">
     <input type="submit" name="cusreg" value="SUBMIT" class="form-btn">
      
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>
<?php include 'footer.php' ?>
