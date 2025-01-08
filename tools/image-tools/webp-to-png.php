<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$title = 'Convert WEBP to PNG Online - Free & Easy WEBP to PNG Converter';
$description = 'Use our Free Online Bulk Image Converter WEBP images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$style = '';

ob_start();
?>
<script>
     const from_ = 'webp';
     const to_ = 'png';
     const validImageTypes = ['image/webp'];
</script>
<?php
$one = 'WEBP';
$two = 'PNG';
$accept_image_type = 'image/webp';

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/components/drag-and-drop.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/components/drag-and-drop.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/components/drag-and-drop.php';

$tool_container = ob_get_clean(); 


?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>