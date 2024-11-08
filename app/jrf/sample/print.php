<!-- <!DOCTYPE html> -->
<?php 
include("includes/head.php");
include("includes/main.php");
include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');
?>
<!-- <html> -->

 <?php
 if (isset($_POST['print'])){
// $v=75;
 $v = $_GET['idx'];
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("idx"=>$v);
$PHPJasperXML->load_xml_file("locationv.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file
}
?>

<?php
 if (isset($_POST['printx'])){

$v=8;
 $vID = $_GET['idx'];

$xml =  simplexml_load_file("locationv.jrxml");

$PHPJasperXML = new PHPJasperXML();
$PHPJasperXML->xml_dismantle($xml);

$PHPJasperXML->sql ="SELECT * FROM locations WHERE ID =8";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");
}
?>
<body>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Sample Printing-By Wawa</h3>
            <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                      <li><i class="fa fa-files-o"></i>Print Sample Report</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Reports
              </header>
            <div class="panel-body">
                <div class="form">
                   <form action="location.php" method="POST" onSubmit="return validate(this)" enctype="multipart/form-data">
                                    
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">ID by Romarirk<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control " id="id" type="text" name="id" required />
                      </div>
                      <div class="col-lg-2">
                         <button class="btn btn-success" type="submit" name="print">Print: parameter via xml</button>
                      </div>
                    </div>
                  </form>
                </div>
             </div>

           <div class="panel-body">
               <div class="form">
                   <form action="print.php" method="POST" onSubmit="return validate(this)" enctype="multipart/form-data">
                                    
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">ID<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class="form-control " id="idx" type="text" name="idx" required />
                      </div>
                      <div class="col-lg-2">
                       <button class="btn btn-success" type="submit" name="print">Print: parameter via php</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
            <!-- page end-->
      </section>
    </section>

<?PHP  
include("includes/nav.php");
include("includes/footer.php");
 ?>
</body>
</html>
