<?php
$con = new mysqli ("localhost","root","","014_uasga");

if ($con -> connect_errno) {
	echo "Failed to connect to MySQLI: " . $con -> connect_error;
	exit();
}
?>