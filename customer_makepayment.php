<?php include 'connection.php';
  $cid=$_SESSION['cust_id'];
extract($_GET);


if(isset($_POST['confirm_order'])){
    extract($_POST);


$dat=$date;

    $today = date("Y-m");

    if ($dat < $today) {
     alert(' Your card is expired!!!');
    }else{
     $q="UPDATE `tbl_booking` SET `status`='paid' WHERE `bk_id`='$bid'";
  
    update($q);

    
     
     $q2="INSERT INTO `tbl_payment` VALUES(NULL,'$bid',CURDATE())";
    insert($q2);

     $add_card="add_card";
    if($add_card =="add_card"){
         $qg="SELECT * FROM `tbl_card` WHERE `card_no`='$cnum' AND `card_name`='$cname'  and `customer_id`='$cid'";
        $rg=select($qg);
        if(sizeof($rg)==0){
          $q3="INSERT INTO `tbl_card` VALUES(NULL,'$cid','$cname','$cnum','$ctype','$date')";
          insert($q3);
        }
    }
  
    }
      alert('successfully');
    return redirect("customer_viewmyorders.php");
   

}

if(isset($_GET['choose'])){
  extract($_GET);
  $qx="SELECT * FROM `tbl_card`  WHERE `card_id`='$choose'";
  $rx=select($qx);
}
  
 ?>




<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="card mt-50 mb-50" style="height: 1200px" >
            
            <div class="nav">
                <ul class="mx-auto">
                  
                    <li class="active"><a href="#">Payment</a></li>
                </ul>
            </div>
<form  method="post" >
                            <?php 
  $qq="SELECT * FROM `tbl_card` WHERE `customer_id`='$cid'";
  $ry=select($qq);
  if(sizeof($ry)>0){
    foreach($ry as $row){ 
      $str = $row['card_no'];
       $str2 = substr($str, 12);
      ?>
            


                <span id="card-header">Saved cards:</span>
                <div class="row row-1">
                    <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/></div>
                    <div class="col-7">
                        <h5><?php echo $row['card_name']; ?></h5>
                          <p class="small mb-0">xxxx xxxx xxxx <?php echo $str2; ?></p>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <p class="mb-0"><a href="?choose=<?php echo $row['card_id']; ?>&bid=<?php echo $bid; ?>&ttamount=<?php echo $ttamount; ?>" class="btn btn-info btn-sm">Choose</a></p>
                    </div>
                </div>

                <?php 
  }
}
?>
              
                <span id="card-header">Add new card:</span>
                <div class="row-1">
                    <div class="row row-2">
                         <input type="text" name="cname" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_name']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                    </div>
                    <div class="row row-2">
                       <input type="text" id="typeText"  required="" pattern="[0-9]{16}" name="cnum" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="16" maxlength="16"   <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_no']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeText">Card Number</label>
                    </div>
                    <div class="row row-2">
                      <input type="text" id="typeText"  required=""  name="ctype" class="form-control form-control-lg" siez="17"
                          placeholder=""  <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_type']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeText">Card type</label>
                    </div>


                </div>
                <div class="row three" style="display: block;">
                    <div class="col-7">
                        <div class="row-1">
                            <div class="row row-2">
                                

                            </div>
                            <div class="row row-2">
                                 <input type="month" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" name="date" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                            </div>
                        </div>
                    </div>
                 <div style="display: flex;gap:80px;">
                    <div class="col-2" >
                           <label class="form-label" for="typeText">Cvv</label>
                         <input style="width: 120px" type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                         
                    </div>

                     <div class="d-flex justify-content-between mb-4" style="display: flex;">
                        
                      <p class="mb-2"><input style="position: relative;top: 20px;left: 110px" type="radio" name="add_card" value="add_card" id="">Save card details to wallet?</p>
                      <!-- <p class="mb-2">$4818.00</p> -->
                    </div>
                    </div>
                </div>
                 <input  type="submit" name="confirm_order" value="₹<?php echo $ttamount; ?> Confirm Order" class="btn btn-info btn-block btn-lg">
                    </div>
            </form>
        </div>
        <style type="text/css">
            body{
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    
}
.card{
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}


@media(max-width:767px){
    .card{
        width: 90%;
        padding: 1.5rem;
    }
}
@media(height:1366px){
    .card{
        width: 90%;
        padding: 8vh;
    }
}
.card-title{
    font-weight: 700;
    font-size: 2.5em;
}
.nav{
    display: flex;
}
.nav ul{
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh;
}
.nav li{
    padding: 1rem;
}
.nav li a{
    color: black;
    text-decoration: none;
}
.active{
    border-bottom: 2px solid black;
    font-weight: bold;
}

input{
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0;
}
form a{
    color:grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold;
}
form a:hover{
    color:grey;
    text-decoration: none;
}
form .row{
    margin: 0;
    overflow: hidden;
}
form .row-1{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden;
}
form .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .col-2,.col-7,.col-3{
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh;
}
form .row .col-2{
    padding-right: 0;
}

#card-header{
    font-weight: bold;
    font-size: 0.9rem;
}
#card-inner{
    font-size: 0.7rem;
    color: gray;
}
.three .col-7{
    padding-left: 0;
}
.three{
    overflow: hidden;
    justify-content: space-between;
}
.three .col-2{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden; 
}
.three .col-2 input{
    font-size: 0.7rem;
    margin-left: 1vh;
}
.btn{
    width: 100%;
    background-color: rgb(65, 202, 127);
    border-color: rgb(65, 202, 127);
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
input:focus::-webkit-input-placeholder { 
    color:transparent; 
}
input:focus:-moz-placeholder { 
    color:transparent; 
} 
input:focus::-moz-placeholder { 
    color:transparent; 
} 
input:focus:-ms-input-placeholder { 
    color:transparent; 
}
        </style>