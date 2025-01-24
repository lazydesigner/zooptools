<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$canonical = 'word-counter';

$title = 'Word Counter';
// $description = 'Use our Free Online Bulk Image Converter JPG images to PNG format with proper compression methods. Zooptools also have other converter tools. Try them now.';


$style = '';

ob_start();
?> 
<style>
    h1{text-align:center}
    input, textarea{
        width:100%;
        display:block;
        margin:10px 0;
        outline:0;
        padding:5px
    }
    textarea{
        resize:vertical;

    }
    button{
        width:fit-content;
        height:40px;
        padding:0 10px;
        background-color:var(--primary-accent);
        cursor:pointer;
        border:0;
        cursor:pointer; 
    }
</style>

<div class="container">
    <div class="image-container">
    <div class="outer-upload-container">
<h1>Word Counter Application</h1>
 
<input type="text" id="urlInput" placeholder="Enter website URL (e.g., https://example.com)">
<button onclick="countWordsFromURL()">Count Words from URL</button>
 
<textarea id="textInput" rows="20" placeholder="Paste your content here..."></textarea>
<button onclick="countWordsFromTextarea()">Count Words from Textarea</button>
 

<h2>Word Count: <span id="wordCount">0</span></h2>

<div id="output"></div>
</div></div></div>
<?php
$tool_container = ob_get_clean(); 
ob_start(); ?>
<script>
        async function countWordsFromURL() {
            const url = document.getElementById('urlInput').value.trim();
            if (!url) {
                alert("Please enter a valid URL.");
                return;
            }

            try {
                const response = await fetch(url);
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");

                // Ignore header, nav, and footer
                const ignoredElements = doc.querySelectorAll('header, nav, footer');
                ignoredElements.forEach(el => el.remove());

                // Extract meaningful text
                const bodyText = doc.body.innerText || "";
                const wordCount = countWords(bodyText);
                displayWordCount(wordCount);
            } catch (error) {
                alert("Error fetching the URL or processing the content. Make sure the URL is accessible.");
                console.error(error);
            }
        }

        function countWordsFromTextarea() {
            const text = document.getElementById('textInput').value.trim();
            const wordCount = countWords(text);
            displayWordCount(wordCount);
        }

        function countWords(text) {
            // Count words (exclude empty strings)
            return text.split(/\s+/).filter(word => word).length;
        }

        function displayWordCount(wordCount) {
            document.getElementById('wordCount').innerText = wordCount;
        }
    </script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>