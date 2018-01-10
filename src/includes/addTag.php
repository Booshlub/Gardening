<?php
	include ('config.php');
	
	$tagName = $_GET['name'];
	$tagX = $_GET['x'];
	$tagY = $_GET['y'];
	$photoId = $_GET['photoID'];
	$linkP = 'www.whatever.com';
	$myQuery = "INSERT INTO Reactions(MemberID, PhotoID, TagName, X, Y, link)  VALUES('1', $photoId, '$tagName', $tagX, $tagY, '$linkP')";

	$result = mysqli_query($link, $myQuery);
?>