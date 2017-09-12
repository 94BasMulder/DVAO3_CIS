<?php
$json = file_get_contents('http://localhost:81/DVAO3_CIS/index.php/welcome/getUser/1');
$obj = json_decode($json);
//echo $obj->pass;

 ?>
