<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Privacy Policy';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';
    $canonical = 'privacy-policy';


$style = '';

ob_start();
?> 
<div class="container">
    <h1>Privacy policy</h1>
    <h2>Effective Date: [Jan 11 2025]</h2>
    <p>Here at ZoopTools, we take the integrity of your personal data seriously, so we inform you that we are committed to protecting your private information. This Privacy Policy effectively elucidates the modus operandi by which we collect, exploit, and secure the data you deliver to us during the usage of our website and utilities.</p>

    <p><b>1. Information We Collect:</b></p>
    <p>Free tools from ZoopTools have not the condition for users to create accounts or provide any personal information to them. Firstly, the data transmitted from our site or the data entered into our instruments are taken care of securely and get deleted shortly after processing is conducted.</p>
    <p><b>2. Data Usage:</b></p>
    <p>There is no data storage, data sales, or data sharing with third parties. <br>
Any personal information of our customers that we process with our tools is kept absolutely safe and private.
</p>

    <p><b>3. Cookies:</b></p>
    <p>ZoopTools utilizes cookies to enhance the web functionality and user experience. These cookies do not track personal information.</p>

    <p><b>4. Third-Party Links:</b></p>
    <p>Our site can have links to other websites. We are responsible neither for their privacy policies nor for their legal practices, but we advise you to read their respective policies.    </p>

    <p><b>5. Security:</b></p>
    <p>The most beneficial security practices have been exercised to make sure that your records are safe.</p> 
</div>
<?php
$tool_container = ob_get_clean(); 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>