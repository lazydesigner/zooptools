<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
    $url = filter_var($_POST['url'], FILTER_VALIDATE_URL);

    if ($url) {
        $html = file_get_contents($url);

        if ($html !== false) {
            libxml_use_internal_errors(true);
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            $body = $dom->getElementsByTagName('body')->item(0);

            echo json_encode([
                'content' => trim($body ? $body->textContent : '')
            ]);
        } else {
            echo json_encode(['error' => 'Failed to fetch content.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid URL.']);
    }
    exit;
}
?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$canonical = 'word-counter';

$title = 'Online Free Word Counter - Accurate and Fast';
$description = 'Website Word Count is a free online tool that counts the words in seconds with full accuracy. Copy and paste any text or URL into our free online word counter.';


$style = '';

ob_start();
?>
<style>
    h1 {
        text-align: center
    }

    input,
    textarea {
        width: 100%;
        display: block;
        margin: 10px 0;
        outline: 0;
        padding: 5px
    }

    textarea {
        resize: vertical;

    }

    button {
        width: fit-content;
        height: 40px;
        padding: 0 10px;
        background-color: var(--primary-accent);
        cursor: pointer;
        border: 0;
        cursor: pointer;
    }
    table{ width:100%; border: 1px solid black ; border-spacing: 0; margin: 3% 0;  }
    table th, table td{padding:1%; border: 1px solid black}
    table tr th{background-color:black; color:white; font-size: small; border: 1px solid white}



</style>

<div class="container">
    <div class="image-container">
        <div class="outer-upload-container">
            <h1>Zooptools Word Counter - The Ultimate Word Counting Tool</h1>

            <h3>Analyze URL Content</h3>
            <form id="urlForm" method="POST">
                <input type="text" name="url" id="urlInput" placeholder="Enter website URL Ex:- https://example.com" required>
                <p id="loading"></p>
                <button type="submit">Fetch and Analyze</button>
            </form>

            <h3>Analyze Text Content</h3>
            <textarea id="textInput" rows="10" placeholder="Paste your text here..."></textarea>
            <p id="loading"></p>
            <button id="analyzeButton">Analyze Text</button>

            <div class="output" id="results"></div>


            <div id="output"></div>
        </div>
    </div>
    <p>The Zooptools Word Counter is your go-to solution for accurate, fast, and user-friendly word counting. Whether you're drafting an article, writing an essay, or simply curious about your word usage, our tool stands out by offering capabilities that go beyond the basics. With the ability to count words from pasted content or directly from any given URL, Zooptools provides unmatched convenience and flexibility.
    </p>

    <h2>Who Can Benefit from ZoopTools?</h2>
    <p>ZoopTools caters to a wide variety of users, making it versatile for personal, academic, or professional purposes:</p>

    <p><strong>Bloggers and Content Writers</strong></p>
    <p>Are you working on an SEO-optimized blog? ZoopTools helps ensure that your content meets word count benchmarks for better search engine ranking. Quickly track character and word counts for your article's headlines, meta descriptions, and body content.</p>
    <p><strong>Students and Teachers</strong></p>
    <p>Students often face strict word count requirements for essays and assignments. ZoopTools ensures your work stays within limits, saving you from missed marks or excessive editing. Teachers can also use it to verify assignment lengths quickly.</p>
    <p><strong>Professionals Across Industries</strong></p>
    <p>From marketing specialists drafting concise campaign messages to legal professionals preparing precise documents, ZoopTools finds its place in every workspace. The URL analysis feature is especially helpful for industry research and reviews.</p>

    <h2>How to Use ZoopTools online word counter?</h2>
    <h3>Using ZoopTools is effortless:</h3>
    <p><b>1. Option 1 -</b> Paste your text in the input box to instantly see words count.</p>
    <p><b>2. Option 2 -</b> Input a URL, and see the word count for the entire webpage analyzed in seconds.</p>
    <p><b>3.</b> Access detailed insights for better control over your writing!</p>
    <p>ZoopTools transforms the way you assess word and character counts. Whether you're writing an academic paper, crafting a viral blog, or reviewing content online, it’s the ultimate all-in-one word counting tool. Easily accessible, multifunctional, and secure—get started with ZoopTools today!</p>


</div>
<?php
$tool_container = ob_get_clean();
ob_start(); ?>

<script>
    document.getElementById('urlForm').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('loading').innerText = 'Reading...';
        const url = document.getElementById('urlInput').value;
        fetch('', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ url })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                displayResults(data.error);
            } else {
                analyzeText(data.content);
                document.getElementById('loading').innerText = '';
            }
        })
        .catch(err => displayResults('Error fetching data.'));
    });

    document.getElementById('analyzeButton').addEventListener('click', function() {
        const text = document.getElementById('textInput').value;
        document.getElementById('loading').innerText = 'Reading...';
        analyzeText(text);
    });

    function analyzeText(text) {
        const wordCount = text.split(/\s+/).filter(word => word).length;
        const sentenceCount = text.split(/[.!?]+/).filter(sentence => sentence.trim()).length;
        const charCount = text.replace(/\s+/g, '').length;
        const paragraphCount = text.split(/\n+/).filter(paragraph => paragraph.trim()).length;
        const readingTime = Math.ceil(wordCount / 200);
        const speakingTime = Math.ceil(wordCount / 130);
        const readingLevel = Math.max(1, Math.ceil(4 + (0.05 * (wordCount / sentenceCount || 1))));

        displayResults(`
        <table>
        <thead>
        <tr>
        <th>Word Count</th>
        <th>Sentence Count</th>
        <th>Character Count</th>
        <th>Paragraph Count</th>
        <th>Reading Time</th>
        <th>Speaking Time</th>
        <th>Reading Level</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>${wordCount}</td>
        <td>${sentenceCount}</td>
        <td>${charCount}</td>
        <td>${paragraphCount}</td>
        <td>${readingTime} min</td>
        <td>${speakingTime} min</td>
        <td>${readingLevel}</td>
        </tr>
        </tbody> 
        </table>    
        `);
    }

    function displayResults(html) {
        document.getElementById('results').innerHTML = html;
        document.getElementById('loading').innerText = '';
    }
</script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>