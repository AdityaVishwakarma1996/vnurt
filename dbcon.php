<?php 

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'emailphp1';


$con =mysqli_connect($server, $user, $password, $db);

if($con)
{
	echo "success";
}else{
echo	"failed";
}

 ?>