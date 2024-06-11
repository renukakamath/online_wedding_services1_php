<?php include 'adminheader.php' ?>

 <?php 
 if ($user_type=="admin") { ?>
 

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <nav>        

<div class="container" style="background-color: white">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span></span></h1>
    <!--   <a href="logout.php" class="btn">logout</a> -->
   </div>

</div>

</body>
</html>


        


 <?php  }else{
 ?> 

  <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <nav>        

<div class="container" style="background-color: white">

   <div class="content">
      <h3>hi, <span>Staff</span></h3>
      <h1>welcome <span></span></h1>
    <!--   <a href="logout.php" class="btn">logout</a> -->
   </div>

</div>

</body>
</html>
<?php } ?>

<?php include 'footer.php' ?>
