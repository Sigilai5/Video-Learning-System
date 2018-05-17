<?php
$db = mysqli_connect('127.0.0.1','root','','vls');
if (isset($_GET['inp'])){
	$name=mysqli_real_escape_string($db,$_GET['inp']);

	$sql ="SELECT * FROM videos WHERE name LIKE '%$name%' OR video LIKE '%$name%'";

	$resp = mysqli_query($db,$sql);
	$rows = array();
	while($one = mysqli_fetch_assoc($resp)) {
		$rows[] = $one;
	};
	echo json_encode($rows);
}
?>