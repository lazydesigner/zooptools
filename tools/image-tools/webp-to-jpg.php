<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$style = '';

ob_start();
?>
<script>
     const from_ = 'webp';
     const to_ = 'jpg';
     const validImageTypes = ['image/webp'];
</script>
<?php
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