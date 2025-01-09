<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Terms And Condition - Zooptools';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';
    $canonical = 'terms-and-conditions';


$style = '';

ob_start();
?> 
<div class="container">
    <h1>Terms of Use</h1>
    <h2>Effective Date: Jan 11 2025</h2>
    <p>Welcome to ZoopTools! By using our website you agree to abide by the terms and conditions laid down by us. In the event that you do not agree, do not use our services, please.</p>
    <p><b>1. Use of Services:</b></p>
    <p>ZoopTools proposes free online tools for tasks such as image optimization, compression, cropping, meme generation, SEO assistance, and link shortening.
All the tools do not need registration are available through any modern web browser.
</p>

    <p><b>2. User Responsibilities:</b></p>
    <p>That you will use our tools under the law is your agreement. <br>
You should make sure that all of the material you upload is legal and compliant with the local laws.
</p>

    <p><b>3. Intellectual Property:</b></p>
    <p>All the content in ZoopTools, as well as the tools and the design, are protected by copyright law.
Reproduction, redistribution, or distortion of our tools or website content without obtaining official permission is strictly prohibited.
</p>

    <p><b>4. Disclaimer of Liability:</b></p>
    <p>ZoopTools is made "as is" without any warranties. <br>
Because our tools or services are the cause, we are not responsible for any damages.
</p>

    <p><b>5. Modifications:</b></p>
    <p>We have the right to alter the terms without advance notification. The use of the website will be seen as the acceptance of the modified terms once the updates are done, which means the terms of the agreement have been renewed. <br>
For inquiries regarding our Terms of Use, please contact us at [info@zooptools.com].
</p>




</div>

<?php
$tool_container = ob_get_clean(); 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>