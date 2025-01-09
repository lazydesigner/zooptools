<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Bulk Url Opner - Zooptools';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$canonical = 'bulk-url-opner';
$style = '';

ob_start();
?> 
<style>
    textarea{
        width:100%        
    }

    #open_url{
        width:150px;
        height:40px;
        border:0;
        cursor:pointer;
        font-size:1rem;
        margin:10px 0;
    }
    #open_url:hover{background-color:lightgreen;color:white}


</style>

<div class="container"><div class="image-container">
<div class="outer-upload-container">
    <h1>Bulk Url Opner</h1>
<textarea name="" id="urlInput" cols="30" rows="20"></textarea><br>
<button id="open_url" onclick="openUrlsInNewTabs()">open urls</button></div></div>
</div>

<?php
$tool_container = ob_get_clean();  
ob_start(); ?>
 <script>
        async function openUrlsInNewTabs() {
            var urlInput = document.getElementById('urlInput').value;
            var urls = urlInput.split('\n').filter(url => url.trim() !== ''); // Split URLs by newline and remove empty entries
            
            for (const url of urls) {
                var trimmedUrl = url.trim();
                var fullUrl = (trimmedUrl.includes('://') ? trimmedUrl : 'https://' + trimmedUrl);
                
                var anchor = document.createElement('a');
                anchor.href = fullUrl;
                anchor.target = '_blank';
                anchor.innerText = 'Open: ' + fullUrl;
                
                document.body.appendChild(anchor);
                
                // Click on the anchor tag to open the URL in a new tab
                anchor.click();
                
                // Wait for a short delay before proceeding to the next iteration
                await new Promise(resolve => setTimeout(resolve, 1000)); // Adjust the delay time as needed
                
                // Remove the anchor tag
                anchor.remove();
            }
        } 

        function runAnchor(){
            const u = document.querySelectorAll('a') 
            u.forEach((e,i)=>{
                setTimeout(()=>{
                    e.click()   
                },i*1000)
            })
        }
        </script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>