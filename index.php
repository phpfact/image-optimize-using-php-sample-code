<?php

// The file concerned
$filename = 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format';

// https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80

// Maximum width and height

// Get new dimensions
$width = '';
$height = 1980;

// File type
header('Content-Type: image/jpg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

// Width or Height Blank
if(empty($width))
{
    $width = $width_orig;
}

if(empty($height))
{
    $height = $height_orig;
}


if ($width/$height > $ratio_orig) {
	$width = $height*$ratio_orig;
} else {
	$height = $width/$ratio_orig;
}

// Resampling the image
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);

imagecopyresampled($image_p, $image, 0, 0, 0, 0,
		$width, $height, $width_orig, $height_orig);

// Display of output image
imagejpeg($image_p, null, 80);

?>
