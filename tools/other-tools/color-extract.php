<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Color Extractor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .color-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .color-box {
            width: 100px;
            height: 100px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Website Color Extractor</h1>
    <p>Enter a website URL to extract all the colors used:</p>
    <input type="text" id="websiteUrl" placeholder="Enter website URL (e.g., https://example.com)">
    <button id="extractColors">Extract Colors</button>

    <div class="color-grid" id="colorGrid"></div>

    <script>
        document.getElementById('extractColors').addEventListener('click', async () => {
            const url = document.getElementById('websiteUrl').value;
            if (!url) {
                alert('Please enter a valid URL!');
                return;
            }

            try {
                const response = await fetch('<?=base_url() ?>extractcolor', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ url })
                });

                if (!response.ok) {
                    throw new Error('Failed to fetch colors. Please check the URL.');
                }

                const colors = await response.json();
                console.log(colors)
                const colorGrid = document.getElementById('colorGrid');
                colorGrid.innerHTML = ''; // Clear previous results

                colors.forEach(color => {
                    const colorBox = document.createElement('div');
                    colorBox.className = 'color-box';
                    colorBox.style.backgroundColor = color;
                    colorBox.innerHTML = `<span>${color}</span>`;
                    colorGrid.appendChild(colorBox);
                });
            } catch (error) {
                console.error(error);
                alert('An error occurred while extracting colors.');
            }
        });
    </script>
</body>
</html>
