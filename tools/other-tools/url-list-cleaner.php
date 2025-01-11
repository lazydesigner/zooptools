<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


$title = 'URL List Cleaner Tool - Zooptools';
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
    ol li {
        margin: 1% 0;
    }


</style>

<div class="container"><div class="image-container">
    <div class="outer-upload-container">
    <h1>URL List Cleaner – Your Ultimate URL Optimization Tool   </h1>
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


<p>URL List Cleaner from ZoopTools is an efficient and flexible solution for managing the URL list without any glitches. This tool is meant to clean up your URLs, make them feel uniform, keep them ready for every project whether you are a developer, a marketer, or an SEO genius.</p>

<p><b>Comprehensive Features</b></p>
<ol>
    <li><b>Trim to Root:</b> Extract only the root domain from complex URLs.</li>
    <small>Example: https://example.com/blog/post → https://example.com</small>
    <li><b>Trim to Subfolder:</b> Retain only specific subfolder paths for targeted tasks.</li>
    <li><b>Remove Duplicate URLs:</b> Automatically identify and remove repeated links while keeping the first occurrence.
    </li>
    <li><b>Remove Duplicate Domains:</b> Simplify lists by eliminating multiple entries of the same domain. </li>
    <li><b>Add or Remove Protocols:</b></li>
    <small>Remove http://, https://, http://www., or https://www. from URLs.</small><br>
    <small>Add secure https:// or customizable http://www. as needed.</small>
    <li><b>Add or Remove Trailing Slash:</b> Flexibly include or remove the trailing "/" at the end of URLs to match your formatting standards.</li>
    <li><b>Control 'www':</b> Add or remove "www" for consistent URL presentation.</li>
</ol>

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