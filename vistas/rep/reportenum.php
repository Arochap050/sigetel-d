<?php

$permitted_chars = '0123456789';
$permitted = '0123456789';

// Output: 54esmdr0qf 
$control_a = substr(str_shuffle($permitted_chars), 0, 2);
$control_as = substr(str_shuffle($permitted_chars), 0, 6);

$print_a = "A-21".$control_a."-".$control_as;

$control_d = substr(str_shuffle($permitted), 0, 2);
$control_ds = substr(str_shuffle($permitted), 0, 6);

$print_d = "D-10".$control_d."-".$control_ds;

//$print2 = "A-21".$codigo."-".$codigos;

echo $print_a;
echo "<br>";
echo $print_d;
echo "<br>";
//echo "-";
//echo mt_rand();