<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'about-us';


$title = 'About Us - Zooptools';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$style = '';
$toextra = true;

ob_start();
?> 

<div class="container" style="margin: 4% auto;">
<h1 style="text-align: center;">About Us</h1>
<p>Welcome to ZoopTools, your one-stop shop for quick, hassle-free, and absolutely free online tools!</p>
<p>At ZoopTools, our goal is to simplify day-to-day digital activities with tools that are:</p>

<p><strong>Free to use:</strong> All the utilities we offer are completely free, and you do not need to register for any of them.</p>
<p><strong>Secure and Private:</strong> We are primarily concerned with your privacy and thus we make sure that no data is stored or shared during processing.</p>
<p><strong>Easy to Use:</strong> We succeed in making our tools user-friendly, that is, simple, intuitive, and quick.
Browser-Suitable: Our service is equally perfect for the desktop, your tablet, and the smartphone; ZoopTools is compatible with all the latest web</p>

<h2>The provided services are:</h2>
<p><strong>Image Optimization:</strong> Image optimization is the process of altering a photo to make it take up less space on the space and become faster.</p>
<p><strong>Image Editing:</strong> Make use of the crop, resize, and the edit functions with ease.</p>
<p><strong>Meme Generator:</strong> You can make funny memes in a matter of seconds.</p>
<p><strong>SEO Tools:</strong> The utilities we provide in the SEO suite will help you enhance your web site's performance further.</p>
<p><strong>Link Shortener:</strong> Create short links that are easy to share with other people really quickly.</p>

<p>At ZoopTools, we strongly believe in giving everyone the power to use tools that save time and are user-friendly. Whether you're a student, a professional, or just someone who functionalizes our platform, we are here to simplify your digital experience for you.</p>

Thank you for selecting ZoopTools! For all the issues or comments you may have, do not hesitate to call us to <a href="mailto:support.zooptools.com">support.zooptools.com</a> .
</div>

<?php
$tool_container = ob_get_clean(); 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>