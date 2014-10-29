<?php

$fecha_ida = "10/10/10";

echo substr($fecha_ida,1,4);

$d=mktime(0, 0, 0, 8, 12, 2014);
echo "Created date is " . date("Y-m-d", $d);

?>