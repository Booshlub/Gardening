<?php
	include ('config.php');
	$MemberID = $_GET['MemberID'];
	$PhotoID = $_GET['PhotoID'];
	$myQuery = "SELECT * FROM `reactions` WHERE MemberID=$MemberID AND PhotoID=$PhotoID";
	$result = mysqli_query($link, $myQuery);
	$res_array = [];
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($res_array,$row);
	}
	echo json_encode($res_array);
?>