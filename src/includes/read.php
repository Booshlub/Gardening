<?php	
	function getPhoto($name) {
		include("config.php");
		$querySingle = "SELECT location FROM upload WHERE id='{$name}'";
		$runSingle = mysqli_query($link, $querySingle);
		
		if($runSingle){
			return $runSingle;
		}else{
			$error = "This was not the content you were looking for...";
			return $error;
		}
	}
?>