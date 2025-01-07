<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');

$v=7;
$data=[
    [
            'id' => 1,
            // 'sample1_date' => '2999-12-31',
            // 'sample1_itemname' => 'override item 1',
            // 'sample1_qty' => 10,
            // 'sample1_uom' => 'PCS',
       ],
       [
        
            'id' => 2,
            // 'sample1_date' => '3999-12-31',
            // 'sample1_itemname' => 'override item 2',
            // 'sample1_qty' => 30,
            // 'sample1_uom' => 'pair',
        ],
      

];


$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parameter1"=>$v);
$PHPJasperXML->load_xml_file("report2.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->arraysqltable=$data;
$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file
?>


