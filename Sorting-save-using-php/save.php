<?php
include 'dbh.php';
$list=$_POST['list'];


$output=array();

$list= parse_str($list, $output);
$save= implode(",", $output['item']);
echo $save;
$result=mysqli_query($conn,"UPDATE sortGrid SET data='$save'" );

