<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$title = 'Free Dummy Content Generator - Create Realistic Placeholder Text Instantly';
$description = "Generate realistic dummy content for free with ZoopTools' Dummy Content Generator. Perfect for web designers, developers, and content creators. No signups, no fees – try it now!";
$canonical = 'dummy-content-generator';

$style = '';

ob_start();
?>
<style>
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    form label {
        font-weight: bold;
    }

    form input,
    form textarea,
    form button,
    select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: 0;
    }

    #contentForm {
        max-width: 60%;
        margin: 0 auto;
    }

    form button {
        background: var(--primary-accent);
        color: #fff;
        cursor: pointer;
    }

    ::-webkit-inner-spin-button {
        display: none;
    }

    ::-webkit-outer-spin-button {
        display: n;
    }

    form button:hover {
        background: var(--primary-accent);
    }

    h2 {
        margin-top: 20px;
    }

    .content-div ul {
        list-style: none;
        padding: 0;
    }

    .content-div ul li {
        margin: 10px 0;
        padding: 10px;
        border-radius: 4px;
    }

    .content-div {
        width: 100%;
        max-height: 800px;
        overflow: auto;
    }
</style>
<div class="container">
    <h1 style="text-align: center;margin:3% 0">Dummy Content Generator - Create Realistic Placeholder Text in Seconds
    </h1>
    <form id="contentForm">
        <label for="type">Generate Content By:</label>
        <select id="type">
            <option value="paragraphs">Paragraphs</option>
            <option value="sentences">Sentences</option>
            <option value="words">Words</option>
        </select>

        <label for="count">Number of Items:</label>
        <input type="number" id="count" placeholder="Enter count" min="1" value="1" required>

        <label for="length">Paragraph Length (if applicable):</label>
        <select id="length">
            <option value="short">Short</option>
            <option value="medium">Medium</option>
            <option value="long">Long</option>
        </select>

        <button type="submit">Generate</button>
    </form>

    <div class="content-div">
        <h2>Generated Content:</h2>
        <div id="output"></div>
    </div>


    <p>Welcome to ZoopTools' Dummy Content Generator, the ultimate free tool for generating high-quality placeholder text for your projects. Our technology is capable of producing dummy content of the realism that developers, content creators, and web designers want. With the help of our application, you will be able to save some time as the task of creating dummy content is pretty straightforward. Just input your guidelines and generate an artificial model that almost feels like real content!
    </p>

    <h2>How to Use the Dummy Content Generator</h2>
    <ul>
        <li>Select Your Preferences: Choose the number of paragraphs, words or sentences you need. Add Title, list, and various others.</li>
        <li>Generate Content: Click the "Generate" button, and the program will then do its job by creating dummy content based on the constraints you have given.
        </li>
        <li>Copy and Use: Copy the material that was created and incorporate it into your design or project. You will move the content to your online assigned location, and you are done!
        </li>
    </ul>

    





</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const loremWords = "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua".split(" ");
        const form = document.getElementById("contentForm");
        const output = document.getElementById("output");
        const typeSelect = document.getElementById("type");
        const lengthSelect = document.getElementById("length");

        // Enable/disable paragraph length based on type
        typeSelect.addEventListener("change", () => {
            if (typeSelect.value === "paragraphs") {
                lengthSelect.disabled = false;
            } else {
                lengthSelect.disabled = true;
            }
        });

        // Handle form submission
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const type = typeSelect.value;
            const count = parseInt(document.getElementById("count").value);
            const length = lengthSelect.value;

            // Clear previous output
            output.innerHTML = "";

            if (type === "paragraphs") {
                generateParagraphs(count, length);
            } else if (type === "sentences") {
                generateSentences(count);
            } else if (type === "words") {
                generateWords(count);
            }
        });

        // Generate paragraphs
        function generateParagraphs(count, length) {
            const wordRange = length === "short" ? [20, 40] : length === "medium" ? [50, 100] : [120, 200];
            for (let i = 0; i < count; i++) {
                const wordCount = getRandomInt(wordRange[0], wordRange[1]);
                const paragraph = generateText(wordCount);
                output.innerHTML += `<p>${paragraph}</p>`;
            }
        }

        // Generate sentences
        function generateSentences(count) {
            for (let i = 0; i < count; i++) {
                const sentence = generateText(getRandomInt(8, 15));
                output.innerHTML += `<p>${sentence}.</p>`;
            }
        }

        // Generate words
        function generateWords(count) {
            const words = [];
            for (let i = 0; i < count; i++) {
                words.push(loremWords[Math.floor(Math.random() * loremWords.length)]);
            }
            output.innerHTML = words.join(" ");
        }

        // Generate random text
        function generateText(wordCount) {
            const words = [];
            for (let i = 0; i < wordCount; i++) {
                words.push(loremWords[Math.floor(Math.random() * loremWords.length)]);
            }
            return capitalizeFirstLetter(words.join(" "));
        }

        // Utility: Get random integer in range
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        // Utility: Capitalize first letter
        function capitalizeFirstLetter(text) {
            return text.charAt(0).toUpperCase() + text.slice(1);
        }
    });
</script>
<?php
$tool_container = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>