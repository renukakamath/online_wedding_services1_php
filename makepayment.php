<?php include 'customerheader.php';
  $cid=$_SESSION['cust_id'];
extract($_GET);
if(isset($_POST['confirm_order'])){
    extract($_POST);


    echo $dat=$date;

    echo $today = date("Y-m");

    if ($dat < $today) {
     alert(' Your card is expired!!!');
    }else{
     $q="UPDATE `tbl_booking` SET `status`='paid' WHERE `bk_id`='$bid'";
  
    update($q);

    
     
     $q2="INSERT INTO `tbl_payment` VALUES(NULL,'$bid',CURDATE())";
    insert($q2);

     $add_card="add_card";
    if($add_card =="add_card"){
        echo $qg="SELECT * FROM `tbl_card` WHERE `card_no`='$cnum' AND `card_name`='$cname'  and `customer_id`='$cid'";
        $rg=select($qg);
        if(sizeof($rg)==0){
          echo$q3="INSERT INTO `tbl_card` VALUES(NULL,'$cid','$cname','$cnum','$ctype','$date')";
          insert($q3);
        }
    }
  
    }

    // return redirect("customer_view_my_orders.php");
   

}

if(isset($_GET['choose'])){
  extract($_GET);
  $qx="SELECT * FROM `tbl_card`  WHERE `card_id`='$choose'";
  $rx=select($qx);
}
  
 ?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">
            

            <div class="row">
            
              <div class="col-lg-7">
               
                <hr>

                <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have 4 items in your cart</p>
                  </div>
                  <div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>
                </div> -->
              

                
<?php 
  $qq="SELECT * FROM `tbl_card` WHERE `customer_id`='$cid'";
  $ry=select($qq);
  if(sizeof($ry)>0){
    foreach($ry as $row){ 
      $str = $row['card_no'];
       $str2 = substr($str, 12);
      ?>

  
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <!-- <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div> -->
                        <div class="ms-3">
                          <h5><?php echo $row['card_name']; ?></h5>
                          <p class="small mb-0">xxxx xxxx xxxx <?php echo $str2; ?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <!-- <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">2</h5>
                        </div> -->
                        <div style="width: 80px;">
                          <p class="mb-0"><a href="?choose=<?php echo $row['card_id']; ?>&bid=<?php echo $bid; ?>&ttamount=<?php echo $ttamount; ?>" class="btn btn-info btn-sm">Choose</a></p>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                    </div>
                </div>
                 
<?php 
  }
}
?>
 
              </div>

              <!-- <div class="col-lg-4" ></div> -->
              <div class="col-lg-4" >
              <form action="" method="post">
                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                      <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar"> -->
                    </div>

                    <!-- <p class="small mb-2">Card type</p> -->
                    <a href="#!" type="submit" class="text-white"><img class="me-2" width="45px"
              src="assets/img/visa.svg"
              alt="Visa" /></a>
                    <a href="#!" type="submit" class="text-white"><img class="me-2" width="45px"
                src="assets/img/amex.svg"
              alt="American Express" /></a>
                    <a href="#!" type="submit" class="text-white"><img class="me-2" width="45px"
              src="assets/img/mastercard.svg"
              alt="Mastercard" /></a>
                    <a href="#!" type="submit" class="text-white"> <img class="me-2" width="45px"
              src="assets/img/paypals.png"
              alt="PayPal acceptance mark" /></a>

                    <form class="mt-4" method="post" >
                      <div class="form-outline form-white mb-4" style="margin-top: 20px;">
                        <input type="text" name="cname" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_name']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText"  required="" pattern="[0-9]{16}" name="cnum" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="16" maxlength="16"   <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_no']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeText">Card Number</label>
                      </div>

                       <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText"  required=""  name="ctype" class="form-control form-control-lg" siez="17"
                          placeholder=""  <?php if(isset($_GET['choose'])){ ?>  value="<?php echo $rx[0]['card_type']; ?>" readonly <?php } ?> />
                        <label class="form-label" for="typeText">Card type</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="month" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" name="date" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                
                    <div class="d-flex justify-content-between mb-4">
                        
                      <p class="mb-2"><input type="radio" name="add_card" value="add_card" id="">Save card details to wallet?</p>
                      <!-- <p class="mb-2">$4818.00</p> -->
                    </div>
                    
                    <div class="d-flex justify-content-between mb-4">
                        
                    <input  type="submit" name="confirm_order" value="₹<?php echo $ttamount; ?> Confirm Order" class="btn btn-info btn-block btn-lg">
                    </div>

                    
                    </input>

                  </div>
                </div>

                </form>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>





  

<?php include 'footer.php'; ?>
