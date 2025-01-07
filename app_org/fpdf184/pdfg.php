<?php
require('mysql_table.php');
class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Report',0,1,'C');
	$this->Ln(5);
	// Ensure table header is printed
	parent::Header();
}
}
?>
