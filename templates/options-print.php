<?php
/**
 * Template Name: Options Print
 * @package Krank Theme
 */
?>
<dl>
<?php
foreach($krank as $key => $value):
	echo '<dt>'.$key.'</dt><dd>'.$value.'</dd>';
endforeach;
?>

</dl>