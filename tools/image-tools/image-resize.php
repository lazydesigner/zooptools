<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

    $title = 'Free Image Resizer - Resize Photos Online Instantly';
    $description = "Resize images for free with ZoopTools' Image Resizer. Optimize photos for social media, websites, and more. No signups, no fees – try it now!";
    $canonical = 'resize-image';
ob_start(); ?>
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

    .upload-container {
        /* max-width: 500px; */
        width: 100%;
        padding: 20px;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .drop-area {
        border: 2px dashed var(--primary-accent);
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .drop-area:hover {
        background-color: #f0f0ff;
    }

    .drop-text p {
        font-size: 1.2em;
        color: #333;
    }

    .drop-text button {
        padding: 10px 20px;
        background-color: var(--primary-accent);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        margin-top: 10px;
    }

    .drop-text button:hover {
        background-color: #5a52d6;
    }

    .setting-btn {
        display: none;
    }

    .setting-btn label {
        display: block;
    }

    .flex-setting {
        display: flex;
        gap: 10px;
    }

    .flex-setting input {
        width: 100%;
        height: 40px;
        outline: 0;
    }

    ::-webkit-outer-spin-button {
        display: none;
    }

    ::-webkit-inner-spin-button {
        display: none;
    }

    #resizeButton, #reupload {
        border: 0;
        display: block;
        padding: 15px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    #reupload{background-color: lightcoral;}
    #reupload:hover{background-color: lightsalmon;}

    #resizeButton:hover {
        background-color: lightgreen;
        color: dodgerblue;
    }

    @media (max-width:600px) {
        .outer-upload-container {
            width: 100%;
        }
    }
</style>
<?php
$style = ob_get_clean();

ob_start();
?>
<div class="image-container">
    <div class="outer-upload-container" id="outer-upload-container">
        <h1 style="text-align: center;">Image Resizer - Resize Your Images for Free in Seconds</h1>
        <div class="upload-container" id="drag-and_drop_image">
            <div class="drop-area">
                <div class="drop-text">
                    <p>Drag & Drop your images here or</p>
                    <button id="fileSelectBtn">Click to Upload</button>
                </div>
            </div>
        </div>
    </div>

    <div class="setting-btn" id="setting-btn">
        <img id="preview" style="width: 200px;" alt="Image Preview">

        <input type="file" id="fileInput" hidden accept="image/*"><br><br>
        <div class="flex-setting">
            <div><label for="width">Width:</label>
                <input type="number" id="width" placeholder="Enter width">
            </div>
            <div>
                <label for="height">Height:</label>
                <input type="number" id="height" placeholder="Enter height"><br><br>
            </div>
        </div>
        <div class="flex-setting"><button id="resizeButton">Resize and Download</button>
        <button id="reupload">Re-Upload</button></div>
        <br><br>
        <canvas id="canvas" style="display: none;"></canvas>
    </div>

    <div class="container">
        <p>Welcome to ZoopTools' Image Resizer, an extremely convenient free tool for making images smaller or larger in a snap. Whether you are a blogger, a designer, or a social media fan, our tool is capable of helping you modify images to be perfect for any platform without sacrificing quality. Resize, compress, and download images in only a few clicks – no software or sign-ups are needed!</p>

        <h2>Perfect For:</h2>
        <ul>
            <li><strong>Bloggers:</strong> Resize images to fit your blog layout perfectly.</li>
            <li><strong>Social Media Users:</strong> Optimize images for Instagram, Facebook, Twitter, and more.</li>
            <li><strong>Web Designers:</strong> Resize images for websites and apps without losing quality.</li>
            <li><strong>Photographers:</strong> Quickly adjust the dimensions of the image for their portfolios or client deliveries.</li>
            <li><strong>E-commerce Sellers:</strong> Resize product images for online stores like Amazon, eBay, or Shopify.
            </li>
        </ul>

        <h2>Supported Image Formats</h2>
        <ul>
            <li>JPG/JPEG</li>
            <li>PNG</li>
            <li>GIF</li>
            <li>BMP</li>
            <li>SVG (coming soon)</li>
        </ul>

        <h2>Example Use Cases</h2>
        <ul>
            <li>Social Media Posts: Resize images to fit Instagram (1080x1080), Facebook (1200x630), or Twitter (1200x675).</li>
            <li>Website Banners: Optimize banner images for your website or blog.</li>
            <li>Profile Pictures: Resize images for LinkedIn, YouTube, or other platforms.</li>
            <li>Email Newsletters: Resize images to fit email templates perfectly</li>
        </ul>

    </div>

</div>

<?php
$tool_container = ob_get_clean();
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>
<script>
    document.getElementById('drag-and_drop_image').addEventListener('click', () => {
        document.getElementById('fileInput').click();
    })
    document.getElementById('reupload').addEventListener('click', () => {
        document.getElementById('fileInput').click();
    })

    const fileInput = document.getElementById('fileInput');
    const resizeButton = document.getElementById('resizeButton');
    const preview = document.getElementById('preview');
    const canvas = document.getElementById('canvas');
    const widthInput = document.getElementById('width');
    const heightInput = document.getElementById('height');
    const picaInstance = new pica();

    let originalImage;

    // Load and preview the image
    fileInput.addEventListener('change', (event) => {
        document.getElementById('outer-upload-container').style.display = 'none';
        document.getElementById('setting-btn').style.display = 'block';
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                const img = new Image();
                img.src = e.target.result;
                img.onload = () => {
                    originalImage = img;
                };
            };
            reader.readAsDataURL(file);
        }
    });

    // Resize and download the image
    resizeButton.addEventListener('click', async () => {
        const width = parseInt(widthInput.value);
        const height = parseInt(heightInput.value);

        if (!width || !height) {
            alert('Please enter valid width and height!');
            return;
        }

        if (!originalImage) {
            alert('Please select an image!');
            return;
        }

        // Hidden intermediate canvas for processing
        const tempCanvas = document.createElement('canvas');
        tempCanvas.width = originalImage.width;
        tempCanvas.height = originalImage.height;
        const tempCtx = tempCanvas.getContext('2d');

        // Draw original image on the intermediate canvas
        tempCtx.drawImage(originalImage, 0, 0);

        // Set the visible canvas dimensions to user-specified values
        canvas.width = width;
        canvas.height = height;

        try {
            // Use Pica to resize while ensuring transparency
            await picaInstance.resize(tempCanvas, canvas, {
                alpha: true, // Ensures alpha transparency
                unsharpAmount: 80,
                unsharpRadius: 0.6,
                unsharpThreshold: 2
            });

            // Convert the canvas content to a Blob and trigger download
            canvas.toBlob((blob) => {
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = 'resized_image.png';
                link.click();
                URL.revokeObjectURL(url);
            }, 'image/png');
        } catch (error) {
            console.error('Error resizing image:', error);
            alert('Failed to resize the image. Please try again.');
        }
    });
</script>


<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>