<?PHP
   session_start();
   include("includes/head.php");
   if ($_SESSION['is_admin'] =="yes") {
   include("includes/main.php");
    }
    elseif($_SESSION['is_admin'] =="yes"){
     include("includes/client.php"); 
    }
    else
    {
echo header('Location: logout.php');
    }
?>