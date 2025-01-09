<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

$title = 'Free Image Cropper – Crop Images Online in Seconds | Zooptools';
$description = 'Smoothly crop images online with Zooptools free image cropper. Quickly adjust images to perfect size and aspect ratio. Try Now!';
$canonical = 'crop-image';


ob_start() ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<style>
    #croppedCanvas {
        width: 50%;
        margin: auto;
        height: auto;
    }

    .crop-box-image {
        width: 50%;
        margin: auto;
        height: auto;
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
        width: 600px;
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

<div class="zooptools_crop">
    <div class="main">
    
    <div class="image-container">
    <div class="outer-upload-container">
    <h1 style="text-align: center;">Free image cropper: Easily crop images online</h1>
    <p style="text-align: center;font-size:small;">Smoothly crop images online with Zooptools free image cropper for stunning, quality visuals.</p>
        <div class="upload-container"  id="drag-and_drop_image">
            <div class="drop-area">
                <div class="drop-text">
                    <p>Drag & Drop your images here or</p>
                    <button id="fileSelectBtn">Click to Upload</button>
                </div>
            </div>
        </div>
</div>
</div>
    </div>
    <div>
        <style>
            #showthebtn{
                width:100%;
                margin: 4% auto;
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
            }
            #showthebtn button{
                width: auto;
                padding: 5px 10px;
                cursor: pointer;
            }
            #showthebtn button:first-child{background-color:transparent;color: var(--text-color);}
            #showthebtn button:nth-child(2){background-color:var(--primary-accent);color: var(--text-color);border: 0;}
            #showthebtn button:last-child{background-color: dodgerblue;color:white;border: 0;}
            .wait{
                position: fixed;
                display: none;
                top: 3%;
                right: 0;
                padding: 5px 10px;
                background-color: tomato;
                color: white;
            }
            #croppedCanvas, .crop-box-image{
                margin: 5% auto;
            }
        </style>
        <input type="file" id="imageInput" class="form-control" accept="image/*" hidden>
        <div class="crop-box-image">
            <img id="image" width="100%" height="100%" style="max-width: 100%; display: none;">
        </div>
        <div id="showthebtn" style="display: none;">
            <button id="rotateLeft" type="button">Rotate Left</button>
            <button id="rotateRight" type="button">Rotate Right</button>
            <button id="cropButton">Crop Image</button>
        </div>
    </div>
    <canvas id="croppedCanvas" style="display: none;"></canvas>
    <div class="wait" id="wait">
        <small>Your Image is Croping</small>
    </div>

</div>
<div class="container">
        


<h2>Crop Images Online – Free, Fast, and Easy with ZoopTools</h2>
<p>With ZoopTools crop image tool that is available online, you can make your visuals be great. Whether you need to post your images on social media, your website, or your client's projects. Our tool gives you precise cutting in a few steps. It's easy and within reach because it is compatible with any browser. You can easily download cropped images without being saved on our database. </p>
<p><b>Customized Crops:</b>  Select default settings (e.g., 1:1, 16:9 or 4:3) or set up preferential ratios as per your demands.</p>
<p><b>Cut Out Shapes:</b> Not just the usual rectangles! Display the unique figures of your shots by trying alternate shapes such as circles, hearts, or stars</p>
<p><b>Freehand Options:</b> Access our free-handed tool where you can pick the specific areas yourself as you wish consequently you have the best customization mode you can ever find.</p>
<p><b>Platform-Presets:</b> Effortlessly adjust your images for Instagram, Facebook, YouTube, and other channels by using the predefined size recommendations.</p>
    </div> 
<?php
$tool_container = ob_get_clean(); 
ob_start();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
    const imageInput = document.getElementById('imageInput');
    const imageElement = document.getElementById('image');
    const cropButton = document.getElementById('cropButton');
    const canvas = document.getElementById('croppedCanvas');
    DropZone = document.querySelector('#drag-and_drop_image');
    let cropper;
    var array_of_files = [];

    document.getElementById('drag-and_drop_image').addEventListener('click',()=>{
        document.getElementById('imageInput').click();
    })
    
   
    

    // document.getElementById('file-upload').addEventListener('change',()=>{
    //     var files = document.getElementById('file-upload').files;
    //     Object.values(files).forEach((file)=>{
    //         array_of_files.push(file)
    //     })
    //     list_of_files.innerHTML = '';

    //     show_files()
    // })

    DropZone.addEventListener('drop', (event) => {
        var files = event.dataTransfer.files[0]
        Showfrocrop(files)
    })
    imageInput.addEventListener('change',(event)=>{
        var file = event.target.files[0];
        Showfrocrop(file)
    })

    // When a user selects a file
    function Showfrocrop(file) {
        document.querySelector('.main').style.display = 'none';
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageElement.src = e.target.result;
                imageElement.style.display = 'block';
                document.getElementById('showthebtn').style.display = 'flex';

                // Initialize cropper or replace existing one
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(imageElement, {
                    aspectRatio: NaN, // Adjust the aspect ratio as needed
                    viewMode: 2,
                    dragMode: 'move', // Can only move the crop box
                    autoCropArea: 1, // Always create a 100% crop box

                });
            };
            reader.readAsDataURL(file);
        }
    };

    document.getElementById('rotateLeft').addEventListener('click', () => {
        cropper.rotate(-45);
    });

    document.getElementById('rotateRight').addEventListener('click', () => {
        cropper.rotate(45);
    });
    // When the user clicks the crop button
    cropButton.addEventListener('click', function() {
        const croppedCanvas = cropper.getCroppedCanvas();
        // Display the cropped image in the canvas
        canvas.style.display = 'block';
        canvas.width = croppedCanvas.width;
        canvas.height = croppedCanvas.height;
        const context = canvas.getContext('2d');
        context.drawImage(croppedCanvas, 0, 0);

        // Optionally, you can convert the cropped image to a data URL and submit it
        const croppedImageDataURL = croppedCanvas.toDataURL('image/jpeg');
        uploadCroppedImage(croppedImageDataURL);

        // You can now send `croppedImageDataURL` to the server using an AJAX request or store it
    });

 
    function uploadCroppedImage(dataUrl) {
        document.getElementById('wait').style.display='block'
        const formData = new FormData();
        formData.append('croppedImage[]', dataUrl);

        fetch('<?= base_url('crop-process') ?>', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
        document.getElementById('wait').style.display='none'
                window.location.href = '<?= base_url() ?>crop-image/download/' + data["u"] + ''
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
 ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        DropZone.addEventListener(event, (e) => {
            e.preventDefault();
            e.stopPropagation();
        })
    })


    // Use `uploadCroppedImage(croppedImageDataURL)` to send the cropped image to the server.
</script>
<?php
$script = ob_get_clean();

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>