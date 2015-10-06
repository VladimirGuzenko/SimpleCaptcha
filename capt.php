<?php
session_start();

if (isset($_GET['act'])){
		if ($_GET['act'] == "image"){
			image_create();
		}else if ($_GET['act'] == "chek"){
			
			if (isset($_GET['ans'])){
				$tmp_answer = (int)$_GET['ans'];
				if($_GET['ans']==$_SESSION['answer']){
					echo "true";
				}else{
					echo "false";					
				}
			}
			
		}
		
		
}else{
	
		exit;
}



function image_create(){

	header("Content-type: image/png");
	$string 	= $_GET['text'];
	$font 		= imageloadfont("font.gdf");
	$im     	= imagecreatefrompng("captsource.png");
	$color[0] 	= imagecolorallocate($im, 0, 0, 0);
	$color[1] 	= imagecolorallocate($im, 192, 192, 192);
	$color[2] 	= imagecolorallocate($im, 255, 255, 000);
	$color[3] 	= imagecolorallocate($im, 000, 128, 255);
	$A			= rand(0,9);//Диапазон для A
	$B			= rand(0,9);//Диапазон для B
	$answer		= 0;
	if ($B > $A){
		$tmp	= $B;
		$B		= $A;
		$A		= $tmp;
	}

	imagestring($im, $font, 5, rand(0,2), $A, $color[rand(0,3)]);
	if(rand(0,1)){
		imagestring($im, $font, 25, rand(0,4), '+', $color[2]);
		$answer = $A + $B;
	}else{
		imagestring($im, $font, 25, rand(0,4), '-', $color[rand(0,3)]);
		$answer = $A - $B;
	}
	imagestring($im, $font, 50, rand(0,2), $B, $color[rand(0,3)]);
	imagestring($im, $font, 78, 1, '=', $color[0]);
	imagepng($im);
	imagedestroy($im);
	$_SESSION['answer'] = $answer;
}
?>