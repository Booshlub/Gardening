<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

function resizeimage($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imageCreateFromJpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imageCreateFromPng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imageCreateFromGif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;

    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
           unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile");	
}

//echo "\nResized!";

function addPhoto($main_img, $description, $photographer_Name) {
		include('config.php');
		$mask = mysqli_real_escape_string($link,$main_img);
		//Nested if block
		if($_FILES['main_img']['type'] == "image/jpg" || $_FILES['main_img']['type'] == "image/jpeg"){
			$targetpath = "img/{$main_img}";
				if(move_uploaded_file($_FILES['main_img']['tmp_name'],$targetpath)){
					$qstring = "INSERT INTO photos VALUES(null, '$main_img','$description','listtest','$photographer_Name')";
					$result = mysqli_query($link,$qstring);
					
					$list_img = "img/small_".$main_img;
					//$list_img = resize_image('max','img/{$main_img}','img/{$main_img}_small.jpg',100,100);
					//resizeimage($newWidth, $targetFile, $originalFile)
					resizeimage('100', $list_img, $targetpath);
					$list_name = "small_".$main_img;
					
					$qstring = "UPDATE photos SET list_name = '$list_name' WHERE photo_name = '$main_img'";
					$result = mysqli_query($link,$qstring);
				}
		}
		mysqli_close($link);
}
?>