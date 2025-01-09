<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'Url List Cleaner - Zooptools';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';

$canonical = 'url-list-cleaner';
$style = '';

ob_start();
?> 
<style>
    textarea{
        width:100%;
        resize:vertical;
        padding:10px;
        outline:0;
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
    .container button{
        width:120x;
        height:40px;
        cursor:pointer;
        background-color:var(--primary-accent);
        border-radius:5px;
        margin:5px auto;
        border:0;
        padding:5px 12px;
        text-align:center;
    }
    .container button:hover{
        color:white
    }


</style>

<div class="container"><div class="image-container">
    <div class="outer-upload-container">
    <h1>URLs Cleaner Tool</h1>
    <textarea id="inputUrls" rows="20" placeholder="Enter URLs separated by a newline..."></textarea>
    <button onclick="extractDomainNames()">Trim To Root</button>
    <button onclick="extractDomainAndSubdirectories()">Trip To Subfolder</button>
    <button onclick="removeDuplicateDomains()">Remove Duplicate Domains</button>
    <button onclick="removeDuplicateUrls()">Remove Duplicate URLs</button>
    <button onclick="removeHttp()">Remove HTTP</button>
    <button onclick="addHttpsWWW()">Add https://www</button>
    <button onclick="addHttps()">Add https://</button> 
    </div>
</div>
</div>

<?php
$tool_container = ob_get_clean();  
ob_start(); ?>
 <script>
        function getUrls() {
            const input = document.getElementById('inputUrls').value;
            return input.split('\n').map(url => url.trim()).filter(Boolean);
        }

        function displayOutput(result) {
            document.getElementById('inputUrls').value = result.join('\n');
        }

        function removeDuplicateUrls() {
            const urls = getUrls();
            const uniqueUrls = [...new Set(urls)];
            displayOutput(uniqueUrls);
        }

        function extractDomainNames() {
            const urls = getUrls();
            const domains = urls.map(url => {
                try {
                    return new URL(url).hostname.replace(/^www\./, '');
                } catch {
                    return '';
                }
            }).filter(Boolean);
            displayOutput(domains);
        }

        function extractDomainAndSubdirectories() {
            const urls = getUrls();
            const domainAndPaths = urls.map(url => {
                try {
                    const { hostname, pathname } = new URL(url);
                    return `${hostname.replace(/^www\./, '')}${pathname}`;
                } catch {
                    return '';
                }
            }).filter(Boolean);
            displayOutput(domainAndPaths);
        }

        function removeDuplicateDomains() {
            const urls = getUrls();
            const domains = urls.map(url => {
                try {
                    return new URL(url).hostname.replace(/^www\./, '');
                } catch {
                    return '';
                }
            }).filter(Boolean);
            const uniqueDomains = [...new Set(domains)];
            displayOutput(uniqueDomains);
        }

        function removeHttp() {
            const urls = getUrls();
            const modifiedUrls = urls.map(url => url.replace(/^http:\/\//, ''));
            // const modifiedUrls = urls.map(url => url.replace(/^http:\/\//, '').replace(/^https:\/\//, ''));
            displayOutput(modifiedUrls);
        }

        function addHttpsWWW() {
            const urls = getUrls();
            const modifiedUrls = urls.map(url => {
                const cleanUrl = url.replace(/^http:\/\//, '').replace(/^https:\/\//, '').replace(/^www\./, '');
                return `https://www.${cleanUrl}`;
            });
            displayOutput(modifiedUrls);
        }

        function addHttps() {
            const urls = getUrls();
            const modifiedUrls = urls.map(url => {
                const cleanUrl = url.replace(/^http:\/\//, '').replace(/^https:\/\//, '').replace(/^www\./, '');
                return `https://${cleanUrl}`;
            });
            displayOutput(modifiedUrls);
        }
    </script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>