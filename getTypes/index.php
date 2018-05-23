<?php
$db = mysqli_connect('127.0.0.1','root','','vls');
$sql ="SELECT DISTINCT category FROM videos";

$resp = mysqli_query($db,$sql);
$rows = array();
while($one = mysqli_fetch_assoc($resp)) {
	$rows[] = $one;
};
echo json_encode($rows);
?>