<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

ob_start();
?> 
    <style> 
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
<style>
    .image-container {
        width: 100%;
        min-height: 85vh;
        display: grid;
        place-items: center;
    }

    .outer-upload-container {
        width: 500px;
    }
</style> 

<div class="image-container">
    <div class="outer-upload-container" id="outer-upload" style='text-align:center'>
    <h1>Website Color Extractor</h1>
    <p>Enter a website URL to extract all the colors used:</p>
    <input type="text" id="websiteUrl" placeholder="Enter website URL (e.g., https://example.com)">
    <button id="extractColors">Extract Colors</button>
</div></div>
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

                function getUniqueColors(colorArray) {
    // Normalize all colors to lowercase hex format
    const normalizedColors = colorArray.map(color => {
        // Check for named colors and convert them to hex, if necessary
        if (color === 'red') return '#FF0000';
        if (color === 'blue') return '#0000FF';
        if (color === 'green') return '#008000';
        if (color === 'white') return '#FFFFFF';
        if (color === 'black') return '#000000';
        if (color === 'gray') return '#808080';
        if (color === 'yellow') return '#FFFF00';
        if (color === 'cyan') return '#00FFFF';
        if (color === 'orange') return '#FFA500';
        // Add any other color names if needed

        // Return the color as-is if it’s already a hex or rgba string
        return color.toLowerCase();
    });

    // Remove duplicates by converting to a Set and back to an array
    const uniqueColors = [...new Set(normalizedColors)];

    return uniqueColors;
}

                const colors = await response.json();
                
                const colorGrid = document.getElementById('colorGrid');
                colorGrid.innerHTML = ''; // Clear previous results
                const uniqueColors = getUniqueColors(colors);
                uniqueColors.forEach(color => {
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
<?php $tool_container = ob_get_clean(); 


?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>