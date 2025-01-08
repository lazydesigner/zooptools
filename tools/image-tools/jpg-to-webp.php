<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$title = 'Convert JPG to  WEBP Online - Free & Easy JPG to WEBP Converter';
$description = 'Use our Free Online Bulk Image Converter JPG images to WEBP format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$style = '';

ob_start();
?>
<script>
     const from_ = 'jpg';
     const to_ = 'webp';
     const validImageTypes = ['image/jpeg', 'image/jpg'];
</script>
<?php
$one = 'JPG';
$two = 'WEBP';
$accept_image_type = '.jpg,.jpeg';

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