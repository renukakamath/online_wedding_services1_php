<?php include 'publicheader.php';



if (isset($_POST['login'])) {
    extract($_POST);

  $q="select * from tbl_login where username='$uname' and password='$pwd'";
    $res=select($q);
    if (sizeof($res)>0) {

           $_SESSION['username']=$res[0]['username'];
           $lid=$_SESSION['username'];
           
         $_SESSION['user_type']=$res[0]['user_type'];
         $user_type=$_SESSION['user_type'];

        if ($res[0]['user_type']=="admin") {

            return redirect('admin_home.php');
        }elseif ($res[0]['user_type']=="Customer") {

            $q1="select * from tbl_login where username='$uname' and status='InActive'";
        $res1=select($q1);
        if (sizeof($res1)>0) {
            alert('Inactive');
        }else{


            $q2="select * from tbl_customer inner join tbl_login using (username) where username='$lid'";
            $res2=select($q2);
            if (sizeof($res2)>0) {
                 $_SESSION['cust_id']=$res2[0]['customer_id'];
                     $cid=$_SESSION['cust_id'];
           return redirect('customer_home.php');


            }
            
        }

        }elseif ($res[0]['user_type']=="Staff") {

    $q1="select * from tbl_login where username='$uname' and status='InActive'";
        $res1=select($q1);
        if (sizeof($res1)>0) {
            alert('Inactive');
        }else{


         $q="select * from tbl_staff inner join tbl_login using (username) where username='$lid'";
         $res=select($q);
         if (sizeof($res)>0) {
                $_SESSION['staff_id']=$res[0]['staff_id'];
            $cid=$_SESSION['staff_id'];
            return redirect('admin_home.php');

        }
         }      
        }
    }else{
        alert('invalid username and password');
    }

}



 ?>





   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
   
      <input type="email" name="uname" required placeholder="enter your email">
      <input type="password" name="pwd" required placeholder="enter your password">
      <input type="submit" name="login" value="login now" class="form-btn">
      <p>don't have an account? <a href="registration.php">register now</a></p>
   </form>

</div>

<?php include 'footer.php' ?>