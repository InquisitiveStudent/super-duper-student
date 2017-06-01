<!--database handler-->
<?php

$conn=new mysqli('localhost','root','','sortable');
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

?>