<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$title = 'Best Online Image Compressor';
$description = 'Zooptools is the best tool to compress images with ultimate optimization in JPEG, PNG and WEBP formats. Image Compressor Online.';
$canonical = 'image-compressor';

ob_start() ?>
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

    @media (max-width:600px) {
        .outer-upload-container {
            width: 100%;
        }
    }
</style>

<?php
$style = ob_get_clean();

ob_start(); ?>

<div class="zooptools_conversion" id="zooptools_conversion">
    <div class="global-setting">
        <button>Advance Setting</button>
        <div class="image-setting-i">
            <div class="c-form-group">
                <small onclick="resetGlobal()" style="cursor:pointer">reset</small>
            </div>
            <div class="c-form-group">
                <label for="quality">Quality</label><br>
                0<input type="range" id="global-quality" step="0.1" min="0.1" max="1" value="0.8">100
            </div>
            <div class="c-form-group">
                <label for="output-format">Output</label>
                <select id="global-output-format">
                    <option value="null">Default</option>
                    <option value="image/jpeg">JPEG</option>
                    <option value="image/png">PNG</option>
                </select>
            </div>
            <div class="c-form-group">
                <label for="resize-width">Resize Width (px):</label>
                <input type="number" id="global-resize-width" placeholder="Enter desired width" min="50">
            </div>
        </div>
    </div>
    <div class="image-container">
        <div class="outer-upload-container">
            <h1 style="text-align: center;">Compress Your Image</h1>
            <div class="upload-container" id="drag-and_drop_image">
                <div class="drop-area">
                    <div class="drop-text">
                        <p>Drag & Drop your images here or</p>
                        <button id="fileSelectBtn">Click to Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="file" id="image-upload" multiple accept=".jpeg,.jpg,.png" hidden />

</div>

<div class="compress" id="compress">
    <div class="compress-flex">
        <button id="addMore">Add More</button>

    </div>
    <div class="compress-setting-box">
        <div class="compress-setting-outer" id="cso">
        </div>
        <button id="compress-btn" disabled>Compress Image</button>
    </div>
</div>
<div class="setting-containerrrr">

    <div class="show-setting-containerrrr">
        <canvas id="canvas" style="display:none;"></canvas>
        <a id="download-btn" style="display:none;" download>Download Compressed Image</a>
    </div>

</div>
<div class='container'>
<h2>Supercharge Your Website Speed with Zooptools Image Compression Tools</h2>
<p>Is your website moving at a snail's pace? The issue could be your image files. Slow-loading images can annoy your visitors and lower your search engine performance as well.</p>
<p>The answer lies in image compression tools, as your weapons are (for the rest) lightning website performance. These tools can shrink the uploaded file size by nearly 80% without taking away the visual quality, thus they are crucial for:</p>

<ul>
    <li>Bloggers aiming for a smooth reading process.</li>
    <li>Owners enhancing the customer service experience.    </li>
    <li>Web developers speeding up the process for clients.</li>
</ul>
<p>To find out what are the best image compression tools follow us:</p>
<ul>
    <li>Use intelligent compression algorithms correctly.</li>
    <li>Process many images in bulk using a computer for utmost efficiency.</li>
    <li>Provide a faster, more pleasant user experience.</li>
</ul>

<h2>Is It Safe to Compress Images?</h2>
<p>Yes, definitely! With our free image compression service, your original files remain as they are in your system, allowing you to be confident that reverting them back to the original form is always possible. Furthermore, our secured, automated system makes sure that all uploaded data will be wiped out within 24 hours, so no one can invade your private space or get some security issue with your data. Compress without fear of data loss due to the secure deletion of your files. Compress with confidence!</p>

<!-- <div>
    <p><strong>Tags-</strong></p>
    <span>lossy compression</span>
    <span>image quality</span>
    <span>lossless compression</span>
    <span>large image</span>
    <span>image optimization tool</span>
    <span>online image optimizer</span>
    <span>image compressor</span>
    <span>straight forward resizer</span>
    <span>online image optimizer tool</span>
    <span>optimal website performance</span>
    <span>original file size</span>
    <span>online compressor</span>
    <span>large file</span>
    <span>picture compressor</span>
    <span>compress image</span>
    <span>image compression</span>
    <span>compress photo image</span>
    <span>photo compressor</span>
    <span>compress pictures</span>
    <span>image optimizer</span>
    <span>Multitple images compressor</span>
    <span>bulk resizer</span>
</div> -->
</div>


<?php $tool_container = ob_get_clean();
ob_start() ?>

<script>
    DropZone = document.querySelector('#drag-and_drop_image');
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        DropZone.addEventListener(event, (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    document.getElementById('addMore').addEventListener('click', () => {
        document.getElementById('image-upload').click();
    })

    let imageFilesArray = [];
    let imageFilesArray2 = [];
    let imagetype = [];
    DropZone.addEventListener('drop', (event) => {
        files = event.dataTransfer.files;
        Object.values(files).forEach((file) => {
            imageFilesArray.push(file)
        })
        Showfile()
    });

    DropZone.addEventListener('click', () => {
        document.getElementById('image-upload').click();
    })

    document.getElementById('image-upload').addEventListener('change', (e) => {
        files = e.target.files;
        Object.values(files).forEach((file) => {
            imageFilesArray.push(file)
        })
        Showfile()
    })

    function Delete_file(i) {
        imageFilesArray.splice(i, 1)
        document.getElementById('cso').innerHTML = '';
        Showfile()
    }

    function resetGlobal() {
        document.getElementById('global-resize-width').value = '';
        document.getElementById('global-quality').value = '0.8';
    }

    function Showfile() {
        document.getElementById('zooptools_conversion').style.display = 'none';
        document.getElementById('compress').style.display = 'block';

        document.getElementById('cso').innerHTML = '';
        imageFilesArray.forEach((file, i) => {
            document.getElementById('cso').innerHTML += '<div class=compress-setting><div class=image-info><small>' + file.name + '</small><br><small><b>' + file.size + ' KB</b></small></div><div class=image-setting-box><div class=image-setting style=display:none><div class=show-setting>S</div><div class=image-setting-i><div class=c-form-group><label for=quality>Quality</label><br>0<input id=quality' + i + ' min=0.1 type=range value=0.8 max=1 step=0.1>100</div><div class=c-form-group><label for=output-format>Output</label> <select id=output-format' + i + '><option value="' + file.type + '" selected>Default<option value=image/jpeg>JPEG<option value=image/png>PNG</select></div><div class=c-form-group><label for=resize-width>Resize Width (px):</label> <input id=resize-width' + i + ' min=50 type=number placeholder="Enter desired width(>100)"></div></div></div><span onclick="Delete_file(' + i + ')">X</span></div></div>';
        })
        // document.getElementById('cso').innerHTML += '<button  id="compress-btn">Compress</button>';
        compressImage()
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>
<script>
    // Dropfilename = fileInput2;
    document.getElementById('compress-btn').addEventListener('click', Upload_);

    async function Upload_() {
        const watermark = new FormData();
        imageFilesArray2.forEach((fe) => {
            watermark.append('croppedImage[]', fe);
        })
        imagetype.forEach((fe) => {
            watermark.append('extension[]', fe);
        })


        // Send the image data to the server
        await fetch('<?= base_url('crop-process') ?>', {
            method: 'POST',
            body: watermark,
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            console.log(data)
            window.location.href = '<?= base_url() ?>image-compressor/download/' + data["u"] + ''
            // console.log(data)
        })
    }

    async function compressImage() {
        document.getElementById('compress-btn').disabled = true
        document.getElementById('compress-btn').innerText = 'Working...';
        imageFilesArray2 = []
        imagetype = []


        const processingPromises = imageFilesArray.map((file, i) => {
            return new Promise((resolve, reject) => {

                let global_resizeWidth = document.getElementById('global-resize-width').value;
                let global_quality = parseFloat(document.getElementById('global-quality').value);
                let global_outputFormat = document.getElementById('global-output-format').value;

                let resizeWidth = document.getElementById('resize-width' + i).value;
                let quality = parseFloat(document.getElementById('quality' + i).value);
                let outputFormat = document.getElementById('output-format' + i).value;

                if (global_quality > 0.8 || global_quality < 0.8) {
                    quality = global_quality;
                }

                if (global_outputFormat !== 'null') {
                    outputFormat = global_outputFormat;
                }
                if (global_resizeWidth != '') {
                    resizeWidth = global_resizeWidth;
                }


                // Check if a file is uploaded
                if (imageFilesArray.length === 0) {
                    alert('Please upload an image.');
                    return;
                }

                let filename = file.name.split('.')[0];
                let image = new Image();
                let reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                    image.onload = async function() {
                        try {
                            let canvas = document.getElementById('canvas');
                            const downloadBtn = document.getElementById('download-btn');

                            // Set the target canvas size based on the resize width and aspect ratio
                            let aspectRatio = image.height / image.width;
                            let targetWidth = resizeWidth ? parseInt(resizeWidth) : image.width;
                            let targetHeight = targetWidth * aspectRatio;

                            canvas.width = targetWidth;
                            canvas.height = targetHeight;

                            // Compress and resize using Pica
                            let picaInstance = pica();
                            await picaInstance.resize(image, canvas, {
                                quality: quality,
                                unsharpAmount: 80,
                                unsharpRadius: 0.6,
                                unsharpThreshold: 2,
                                alpha: true // for PNG images, helps with transparency
                            });

                            // Determine the output format based on the original format if not specified
                            if (!outputFormat || outputFormat === 'null') {
                                outputFormat = file.type; // retain original file format
                            }

                            // Convert canvas to Blob with desired quality and format
                            let blob = await picaInstance.toBlob(canvas, outputFormat, outputFormat === 'image/png' ? undefined : quality);

                            // Create a preview of the image and allow downloading
                            let compressedImageUrl = URL.createObjectURL(blob);

                            function blobToBase64(blob) {
                                return new Promise((resolve2, reject2) => {
                                    let reader = new FileReader();
                                    reader.onloadend = () => resolve2(reader.result);
                                    reader.onerror = reject2;
                                    reader.readAsDataURL(blob);
                                });
                            }

                            blobToBase64(blob).then(base64Image => {
                                imageFilesArray2.push(base64Image);


                                if (outputFormat === 'image/jpeg') {
                                    imagetype.push('jpeg');
                                } else if (outputFormat === 'image/png') {
                                    imagetype.push('png');
                                }
                            })
                            resolve();
                        } catch (error) {
                            reject(error); // Reject if there's an error during compression
                        }

                    };
                };


                reader.readAsDataURL(file);
            })
        });

        try {
            await Promise.all(processingPromises);

            document.getElementById('compress-btn').innerText = 'Compress Now';
            document.getElementById('compress-btn').disabled = false

        } catch (error) {
            console.error("Error processing images:", error);
        }
    }
</script>




<?php
$script = ob_get_clean();

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>