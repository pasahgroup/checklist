<!DOCTYPE html>
<?php 
include("includes/head.php");
include("includes/main.php");

?>

<body>
  <!-- Update Code -->
  <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://mobilehardware.co.tz/letsgo/app/manipulate.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS => array('action' => 'manipulate','status' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>


    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> User updating</h3>
            <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                      <li><i class="fa fa-files-o"></i>Update user</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Update user
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">ID<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="user_id" name="user_id" type="text" value="<?php echo $_GET['id']?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">First name<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="fname" name="fname" type="text" 
                       alue="<?php echo $_GET['first_name']?>" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Last name<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="lname" type="text" name="lname" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Phone</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="phone" type="number" name="phone"  required/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Account</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="account" type="number" name="account"  required/>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Admin <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="admin" name="admin" type="text" required />
                      </div>
                    </div>
                    
                     <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Username <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="username" name="username" type="text" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="password" name="password" type="text" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-success" type="submit">Update</button>
                         <button class="btn btn-cancel" type="button">Cancel</button>
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
