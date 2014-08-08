<?php
/* check image dimensions to determain how to scale it
 * @param dX the desired X dimension
 * @param dY the desired Y dimension
 * @param source the image source to check
 * @return what to scale by (Width or Height)
 * by rwebb3
 */
function howToScale($dX, $dY, $source){
	$targetAspect = $dX/$dY;
	list($img_width, $img_height) = getimagesize($source);
	$imgAspect = $img_width/$img_height;
	if ($imgAspect > $targetAspect){
		return "height";}
	else{
		return "width";}
}
?>
