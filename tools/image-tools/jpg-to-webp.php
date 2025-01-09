<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$title = 'Convert JPG to  WEBP Online - Free & Easy JPG to WEBP Converter';
$description = 'Using our Free Online JPG to WEBP Converter, you can minimize your load, in terms of space, time, and efforts.';
$canonical = 'jpg-to-webp';

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
    ?>
<h2>Start Converting Your JPG Images to WEBP Today!</h2>
<p>Don’t Let your image formats be an obstacle to your time.</p>

<h3>Convert JPG to WEBP in Seconds – Fast, Free, and No Bother!</h3>
<p>Are you in need of a quick and reliable method to modify JPG files to WEBP layout? Our Free Online JPG to WEBP Converter will be of top assistance! Whether you are reducing the size of images for your website, saving space in storage, or loading the website faster, this tool allows you to affect the conversion process effortlessly.</p>

<h3>Why Convert JPG to WEBP?</h3>
<ul>
    <li>Smaller File Sizes: WEBP pictures are 30% smaller than JPGs notwithstanding no loss of the quality.</li>
    <li>Faster Websites: Cut down on the load time of pictures and your website will be as quick as flash.    </li>
    <li>Modern Compatibility: Most of today's browsers can process images in the form of WEBP, so it is the most suitable format for web images.</li>
</ul>
<h3>Who Can Benefit from This Tool?</h3>
<ul>
    <li>Web Developers: Image innovation for quicker websites.</li>
    <li>Content Creators: The producers of the media can save storage without the loss of the viewable case of the content.</li>
    <li>Marketers: Your web content needs to be tuned to load faster in order to secure a higher search ranking.</li>
    <li>Refine the standard for professional or personal utilization.</li>
</ul>

<?php
$tool_container = ob_get_clean();  
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>