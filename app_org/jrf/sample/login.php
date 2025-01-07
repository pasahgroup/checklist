<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>BETTING</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">
 <div class="container">
  <?php

if(isset($_POST["username"]) && isset($_POST["password"])){
  $username=$_POST['username'];
  $password=$_POST['password'];

$ch = curl_init();

curl_setopt_array($ch, array(
  CURLOPT_URL => 'https://mobilehardware.co.tz/letsgo/app/user.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('action' => 'login_user','username' => $username,'password' =>$password),
));

$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
  echo $e;
}
else {
  $decoded = json_decode($resp,true);
//  var_dump($decoded);
if( $decoded['user'] !=null)
{
$datas = $decoded['user'];

  var_dump($datas);
}
}

curl_close($ch);
$arrayData = json_decode($resp, true);

  //$i=0;
foreach ($arrayData as $data) {

if(isset($data)){

$adminLogin=$data['is_admin'];
$sessionID=$data['id'];
$_SESSION['id'] =$data['id'];
$_SESSION['is_admin'] =$data['is_admin'];

if ($adminLogin=='yes'){
 //Access files accoding to the user accessing level

 header('Location: index.php');
}
elseif($adminLogin=='no')
{
  echo 'Something is wrong in login or User was not validated';
  header('Location: login.php');
}
else
{
  echo 'Something is wrong';
  header('Location: login.php');
}
}
?>

<?php

}
}
?>
          
<!-- Form to submit data -->
  <form class="login-form" action="" method="POST">

       <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" value="" name="username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="password" value="" name="password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
         <a class="btn btn-success btn-lg btn-block" type="submit" href="user_reg.php">Signup</a>
      </div>
    </form>
    </div>

 <?PHP  
include("includes/nav.php");
include("includes/footer.php");
 ?>
</body>

</html>
