<?php
include "phpqrcode/qrlib.php";

$file = 'jr-qrcode.png'; 
$data = 'http://joserobinson.com/'; 

QRcode::png($file);
?>