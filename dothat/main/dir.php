<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

function resize_image($file, $percent) {
	$filename = $file;
	$percent = $percent;
	list($width, $height) = getimagesize($filename);
	$new_width = $width * $percent;
	$new_height = $height * $percent;
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	ob_start();
	imagejpeg($image_p, null, 50);
	$r = 'src="data:image/jpeg;base64,'.base64_encode(ob_get_clean()).'"';
	imagedestroy($image_p);
	return $r;
}

if(isset($_GET['img'])) {
	$pic = glob("data/image/*.{jpg}", GLOB_BRACE);
	$dir = sizeof($pic);
	$srcs = array();
	foreach ($pic as $key => $value) {
		array_push($srcs, resize_image($value, 0.25));
	}
	echo json_encode($srcs);
	
}

?>
