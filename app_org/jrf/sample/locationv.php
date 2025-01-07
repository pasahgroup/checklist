<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');

// $v=75;
 $v = $_GET['idx'];
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("idx"=>$v);
$PHPJasperXML->load_xml_file("locationv.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file
?>
