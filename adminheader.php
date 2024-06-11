<?php include 'connection.php' ;




$user_type=$_SESSION['user_type'];



extract($_GET);

if ($user_type=="Staff") {

	$cid=$_SESSION['staff_id'];

}else if ($user_type=="admin") {

	$cid="0";
}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>




<!-- 	<a href="admin_hallmanagement.php">Hall Management</a>
	<a href="admin_foodmanagement.php">Manage Food</a>
	<a href="admin_mediamanagement.php">Manage Media</a>
	<a href="admin_viewbookings.php">Booking</a>
	<a href="salesreport.php">Booking Report</a>
	<a href="login.php">Logout</a> -->
<!DOCTYPE html>
<!--
Template Name: Chillaid
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Online Wedding Shop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
     <!--  <h1 class="logoname"><a href="home.php">Dre<span>a</span>m</a></h1> -->
       <img src="images/demo/dream.png" style="width: 150px;height: 40px" alt="logo">
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="admin_home.php">Home</a></li>


 <?php 
 if ($user_type=="admin") { ?>
 

 <li><a href="admin_managestaff.php">Manage Staff</a></li>
        
        


 <?php  }
 ?> 

        <li><a class="drop" href="#">Manage</a>
          <ul>
            <li><a href="admin_hallmanagement.php">Hall</a></li>
            <li><a href="admin_foodmanagement.php">Food</a></li>
            <li><a href="admin_mediamanagement.php">Media</a></li>
           
          </ul>
        </li>
        <li><a class="drop" href="#">Views</a>
         
              <ul>
                <li><a href="admin_Viewcustomeredit.php">Customer</a></li>
                <li><a href="admin_viewbookings.php">Booking</a></li>
                <li><a href="salesreport.php">Booking Report</a></li>
                
              </ul>
           
        </li> 
       <!--  <li><a href="#">Link Text</a></li>
        <li><a href="#">Link Text</a></li> -->
        <li><a href="login.php">Logout</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>



