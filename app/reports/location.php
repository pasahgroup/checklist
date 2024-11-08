<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../PHPJasperXMLSubReport.inc.php");
include_once("../PHPJasperXML.inc.php");
// include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->load_xml_file("report2.jrxml");
$PHPJasperXML->load_xml_file("locationv.jrxml");
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>

