<?php include 'connection.php';
extract($_GET);
 $r=$_SESSION['res'];

 ?>

 <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <form method="post">
                    <h1 align="center" style="color:white">Booking Report</h1>
</div>
</div>
</div></div></div>  
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 

<div id="div_print" >
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Booking Report
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #111-222
            </small>
        </h1>
        
        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="" onclick="printDiv()" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Wedding Services</span>
                        </div>
                    </div>
                </div>
                 <!-- .row -->

                     <br><br> <br>
                     
                   <div class="mt-4">
                    <table class="table" style="width: 1000px">
                   
                       
                           <tr style="background-color: red !important;color: white" class="row text-600 text-white bgc-default-tp1 py-25">
                            <th></th>
                <th>Customer</th>
      <th>Food </th>
      <th>Hall</th>
      <th>Media</th>
      <th>Booking Date</th>
                           </tr>

		<?php 

       
      $res=$r;
       $slno=1;
       foreach ($res as $row) {
      ?>
        
        
     <tr align="center">
        <td><img src="<?php echo $row['h_image'] ?>" height="100" width="100"></td>
          <td><?php echo $row['customer_name'] ?></td>
            <td><?php echo $row['f_name'] ?><?php echo $row['f_type'] ?> , <?php echo $row['f_rate'] ?> ₹</td>
            <td><?php echo $row['h_name'] ?><?php echo $row['h_rate'] ?> ₹ ,<?php echo $row['size'] ?>, <?php echo $row['capacity'] ?></td>
            <td><?php echo $row['m_name'] ?><?php echo $row['m_rate'] ?> ₹, <?php echo $row['m_type'] ?></td>
            <td><?php echo $row['bk_date'] ?></td>
        
     
    </tr>
     <?php
       }


		 ?>
	</table>


       <!-- <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">2</div>
                            <div class="col-9 col-sm-5">Web hosting</div>
                            <div class="d-none d-sm-block col-2">1</div>
                            <div class="d-none d-sm-block col-2 text-95">$15</div>
                            <div class="col-2 text-secondary-d2">$15</div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1">3</div>
                            <div class="col-9 col-sm-5">Software development</div>
                            <div class="d-none d-sm-block col-2">--</div>
                            <div class="d-none d-sm-block col-2 text-95">$1,000</div>
                            <div class="col-2 text-secondary-d2">$1,000</div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">4</div>
                            <div class="col-9 col-sm-5">Consulting</div>
                            <div class="d-none d-sm-block col-2">1 Year</div>
                            <div class="d-none d-sm-block col-2 text-95">$500</div>
                            <div class="col-2 text-secondary-d2">$500</div>
                        </div>
                    </div> -->

    
      <div class="row border-b-2 brc-default-l2"></div>

<!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>-->



         
      <div class="row mt-3">
                       
<hr>
                        <div class="col-12 col-sm-12 text-grey text-90 order-first order-sm-last" >
                            <div class="row my-2" style="float: right;">
                                <!-- <div class="col-7 text-right"> -->
                                   
                                <!-- </div>
                                <div class="col-sm-5 " >  -->
                                    <span class="text-120 text-secondary-d1" style="padding-left: 1em;"> <!-- SubTotal<?php echo $row[0]['CTotal_Amt']?> </span>
                                <!-- </div> -->
                            </div>

                          

                         
                        </div>

                        <div class="col-12 col-sm-12 text-grey text-90 order-first order-sm-last" >
                          

                            <hr>
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2"style="float: right;">
                                <!-- <div class="col-7 text-right"> -->
                                    
                                <!-- </div>
                                <div class="col-5 "> -->
                                    <span class="text-150 text-success-d3 opacity-2" style="padding-left: 1em;"><!-- Total Amount<?php echo $row[0]['CTotal_Amt']?> --></span>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                     <!-- <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            
                        </div> -->

                    <hr />

            
   

                    <div style="margin-bottom: 30px;"> 
                        <span style="color: red;">place keep this Booking Report safe.... <br>Thank you for your business</span>
                        <!-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</center>



<style>
    body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}



</style>



