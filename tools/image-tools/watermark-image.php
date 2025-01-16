<?php
$txt = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M13 6V21H11V6H5V4H19V6H13Z"></path></svg>';

$delete = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgba(212,0,0,1)"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM6 10V20H18V10H6ZM9 12H11V18H9V12ZM13 12H15V18H13V12ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9Z"></path></svg>';

$image = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M11.2703 12.2162L15 6L23 21H2L9 8L11.2703 12.2162ZM12.3897 14.2378L14.9873 19H19.6667L14.8976 10.058L12.3897 14.2378ZM5.34843 19H12.6516L9 12.2185L5.34843 19ZM5.5 8C4.11929 8 3 6.88071 3 5.5C3 4.11929 4.11929 3 5.5 3C6.88071 3 8 4.11929 8 5.5C8 6.88071 6.88071 8 5.5 8Z"></path></svg>';

$font_color = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M15.2459 14H8.75407L7.15407 18H5L11 3H13L19 18H16.8459L15.2459 14ZM14.4459 12L12 5.88516L9.55407 12H14.4459ZM3 20H21V22H3V20Z"></path></svg>';

$font_bg_t = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M5 5V19H19V5H5ZM4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM9.86885 15L9.04918 17H6.83333L11 7H13L17.1667 17H14.9508L14.1311 15H9.86885ZM10.6885 13H13.3115L12 9.8L10.6885 13Z"></path></svg>';

$font_bg = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM9.86885 15H14.1311L14.9508 17H17.1667L13 7H11L6.83333 17H9.04918L9.86885 15ZM10.6885 13L12 9.8L13.3115 13H10.6885Z"></path></svg>';

$font_size = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M10 6V21H8V6H2V4H16V6H10ZM18 14V21H16V14H13V12H21V14H18Z"></path></svg>';

$italic = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M15 20H7V18H9.92661L12.0425 6H9V4H17V6H14.0734L11.9575 18H15V20Z"></path></svg>';

$bold = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="rgb(58, 99, 81)"><path d="M8 11H12.5C13.8807 11 15 9.88071 15 8.5C15 7.11929 13.8807 6 12.5 6H8V11ZM18 15.5C18 17.9853 15.9853 20 13.5 20H6V4H12.5C14.9853 4 17 6.01472 17 8.5C17 9.70431 16.5269 10.7981 15.7564 11.6058C17.0979 12.3847 18 13.837 18 15.5ZM8 13V18H13.5C14.8807 18 16 16.8807 16 15.5C16 14.1193 14.8807 13 13.5 13H8Z"></path></svg>';


include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

    $title ='Free online Watermarking Tool | Zooptools';
    $description = 'Our Free Watermarking Tool personalize your content by adding text, logos, or shapes to your photos. Try it now.';
    $canonical = 'watermark-image';


ob_start();
?>

<style>
    .image-container {
        width: 100%;
        min-height: 85vh;
        display: grid;
        place-items: center;
    }

    .outer-upload-container {
        width: 600px;
        text-align:center
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/konva/8.0.3/konva.min.js"></script>
<?php
$style = ob_get_clean();

ob_start();
?>
<div class="zooptools_conversion watermark">

    <style>
        #watermarkcontainer {
            width: 600px;
            height: auto;
            position: relative;
        }

        #upload-section {
            margin-bottom: 20px;
        }

        #textOptions {
            margin-bottom: 20px;
            display: none;
        }
    </style>
    <div class="zooptools_conversion" id="zooptools_conversion">
        <div class="image-container">
            <div class="outer-upload-container">
            <h1>Add Watermark to Images For Free </h1>
            <p>Easily protect and increase the significance of your visual content in a few steps. Watermarking of Zooptools offers the image tool which lets you personalize the watermarked content by adding text, logos, or shapes to your photos, thus ensuring that they remain yours alone.</p>
                <div class="upload-container" id="drag-and_drop_image">
                    <div class="drop-area">
                        <div class="drop-text">
                            <p>Drag & Drop your images here or</p>
                            <button id="fileSelectBtn">Click to Upload</button>
                        </div>
                    </div>
                </div>
                <input type="file" id="imageLoader" accept="image/*" hidden />
            </div>
        </div>
    </div>
    <div class="watermark-flex">
        <div class="watermark-action">
            <div id="textOptions" class="textOptions">
                <div class="text-opacity" id="font-size" style="background-color: transparent;">
                    <div class="text-opacity-box">
                        <label for="fontSize"><?= $font_size ?></label>
                        <div id="font-size-range"><input type="range" id="fontSize" min="10" max="100" value="30"></div>
                    </div>
                </div>
                <div class="text-bg">

                    <label for="bgColor"><?= $font_bg ?></label>
                    <input type="color" id="bgColor" hidden value="#ffffff">
                    <label for="toggleBg"><?= $font_bg_t ?></label>
                    <input type="checkbox" id="toggleBg" hidden>
                </div>
                <div class="text-color">
                    <label for="textColor"><?= $font_color ?></label>
                    <input type="color" hidden id="textColor" value="#000000">
                </div>

                <div class="font-style" id="fontStyle">
                    <label for="bold"><?= $bold ?></label>
                    <input type="checkbox" hidden name="" value="bold" id="bold">
                    <label for="italic"><?= $italic ?></label>
                    <input type="checkbox" hidden value="italic" name="" id="italic">
                </div>
                <div class="text-opacity" id="opacity-text" style="background-color: transparent;">
                    <div class="text-opacity-box">
                        <img src="<?= base_url('public/images/transparent.png') ?>" width="100%" height="100%" alt="">
                        <div id="opacity-text-range"><input type="range" id="textopacityRange" min="0" max="1" step="0.1" value="1"></div>
                    </div>
                </div>


                <label id="deleteText" class="watermark-btn2"><?= $delete ?></label>
            </div>
            <div id="watermarkcontainer"></div>
        </div>
        <div class="watermark-pannel">
            <div style="align-self:flex-start;">
                <div id="upload-section">
                    <!-- Add Text Watermark -->
                    <label id="addTextWatermarkBtn" class="watermark-btn"><span><?= $txt ?></span><span> Add Text</span></label>
                    <br><br>

                    <!-- Add Image Watermark -->
                    <label for="imageWatermarkLoader" class="watermark-btn"><span><?= $image ?></span> <span>
                            Add Image
                        </span></label>
                    <input type="file" id="imageWatermarkLoader" hidden accept="image/*" /><br><br>

                    <div class="water-image" id="water-image">
                        <div class="opacity" id="opacity">
                            <div class="opacity-box">
                                <img src="<?= base_url('public/images/transparent.png') ?>" width="100%" height="100%" alt="">
                                <div id="range_img"><input type="range" id="opacityRange" min="0" max="1" step="0.1" value="1"></div>
                            </div>
                        </div>

                        <label id="deleteImageWatermark" class="watermark-btn"><span><?= $delete ?></span><span>Delete</span></label>
                    </div>
                </div>

                <br><br>

                <div id="action-btn"><button style="align-self:baseline;" class="saveImage" id="saveImage">Save Image</button></div>

            </div>

            <!-- Text Options (for styling text live) -->

        </div>
    </div>
</div>
<div class="container">
        <!-- <p >Easily protect and increase the significance of your visual content in a few steps. Watermarking of Zooptools offers the image tool which lets you personalize the watermarked content by adding text, logos, or shapes to your photos, thus ensuring that they remain yours alone.</p> -->
    <h2 >What is the Purpose of Watermarking?</h2>
    <p >Watermarks safeguard your intellectual property, act as a warning against unauthorized use, and are a promotional tool for your brand. The act of adding a watermark to your image adds a professional touch to your visuals and simultaneously affirms your rights.</p>

    <h3 >Characteristics:</h3>
    <ul>
        <li>Customizable Watermarks: You can put your text, logo, or shape where you want to and customize the size, transparency, color, and placement of the watermarks. </li>
        <li>Convenience: You can insert your image directly, or through the URL, Dropbox, or Google Drive.</li>
        <li>Freedom: You can be made by free drawing, element merging, or saved as PDFs if you need them.</li>
        <li>Versatile Formats: Your watermarked image will be available to download in different formats, such as JPG, PNG, or SVG.</li>
    </ul>
        </div> 
<?php
$tool_container = ob_get_clean();
ob_start();
?>
<script>
    document.getElementById('opacity').addEventListener('click', (e) => {
        e.stopPropagation()
        document.getElementById('range_img').style.display = 'block'
    })
    document.getElementById('opacity-text').addEventListener('click', (e) => {
        e.stopPropagation()
        document.getElementById('opacity-text-range').style.display = 'block'
    })
    document.getElementById('font-size').addEventListener('click', (e) => {
        e.stopPropagation()
        document.getElementById('font-size-range').style.display = 'block'
    })

    document.addEventListener('click', () => {
        document.getElementById('range_img').style.display = 'none'
        document.getElementById('font-size-range').style.display = 'none'
        document.getElementById('opacity-text-range').style.display = 'none'
    })
</script>

<script>
    let originalWidth, originalHeight;

    var backgroundImage = null;
    var imageWatermark = null;
    var selectedTextWatermark = null;
    var selectedTextBackground = null;
    var extension = '';
    var image_name = '';
    var stage
    var layer
    var transformer

    // Initialize transformer


    // Handle the drag and drop for background image
    DropZone = document.querySelector('#drag-and_drop_image');
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        DropZone.addEventListener(event, (e) => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    DropZone.addEventListener('drop', (event) => {
        const files = event.dataTransfer.files;
        LoadtheImage(files[0]);
    });

    var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', function(e) {

        LoadtheImage(e.target.files[0]);
    });
    DropZone.addEventListener('click', () => {
        imageLoader.click();
    });





    function LoadtheImage(file) {
        document.querySelector('.watermark-flex').style.display = 'flex'

        const container2 = document.getElementById('watermarkcontainer');
        const containerWidth2 = container2.offsetWidth; // Get the container width

        // Set the height dynamically based on image or any aspect ratio you desire
        // Here, let's say we have a predefined aspect ratio
        const aspectRatio2 = 16 / 9;
        const containerHeight2 = containerWidth2 / aspectRatio2;

        let maxDisplayWidth = containerWidth2; // Maximum width for display
        let maxDisplayHeight = containerHeight2; // Maximum height for display

        document.getElementById('zooptools_conversion').style.display = 'none'
        extension = file.name.split('.').pop().toLowerCase();
        image_name = file.name;
        var reader = new FileReader();
        reader.onload = function() {
            var img = new Image();
            img.src = reader.result;



            img.onload = function() {

                originalWidth = img.naturalWidth;
                originalHeight = img.naturalHeight;

                // Scale down if image exceeds max display size
                let displayWidth = originalWidth;
                let displayHeight = originalHeight;
                const aspectRatio = originalWidth / originalHeight;

                if (originalWidth > maxDisplayWidth || originalHeight > maxDisplayHeight) {
                    if (originalWidth > originalHeight) {
                        displayWidth = maxDisplayWidth;
                        displayHeight = maxDisplayWidth / aspectRatio;
                    } else {
                        displayHeight = maxDisplayHeight;
                        displayWidth = maxDisplayHeight * aspectRatio;
                    }
                }



                stage = new Konva.Stage({
                    container: 'watermarkcontainer',
                    width: displayWidth,
                    height: displayHeight,
                });

                layer = new Konva.Layer();
                stage.add(layer);

                transformer = new Konva.Transformer({
                    visible: false, // Initially hidden
                });
                layer.add(transformer); // Add it to the layer


                if (backgroundImage) {
                    backgroundImage.destroy();
                }

                backgroundImage = new Konva.Image({
                    image: img,
                    width: displayWidth,
                    height: displayHeight,
                });
                layer.add(backgroundImage);
                layer.moveToBottom();
                layer.batchDraw();
            };
        };
        reader.readAsDataURL(file);
    }

    // Add a text watermark with background
    document.getElementById('addTextWatermarkBtn').addEventListener('click', function addTextWatermarkWithBackground() {
        var textNode = new Konva.Text({
            text: 'Watermark Text',
            x: stage.width() / 2,
            y: stage.height() / 2,
            fontSize: 30,
            fontFamily: 'Arial',
            fill: '#000',
            draggable: true
        });

        var textBackground = new Konva.Rect({
            x: textNode.x(),
            y: textNode.y(),
            width: textNode.width(),
            height: textNode.height(),
            fill: 'transparent',
            draggable: true
        });

        layer.add(textBackground);
        layer.add(textNode);
        layer.batchDraw();

        // Update background size and position when text is transformed
        textNode.on('transform', function() {
            textBackground.width(textNode.width() * textNode.scaleX());
            textBackground.height(textNode.height() * textNode.scaleY());
            textBackground.rotation(textNode.rotation());
            textBackground.x(textNode.x());
            textBackground.y(textNode.y());
            layer.batchDraw();
        });

        textNode.on('dragmove', function() {
            textBackground.x(textNode.x());
            textBackground.y(textNode.y());
            layer.batchDraw();
        });

        // Handle text editing
        textNode.on('dblclick  dbltap', function() {
            // Create a textarea for editing
            var textarea = document.createElement('textarea');
            document.body.appendChild(textarea);
            textarea.value = textNode.text();

            // Get the bounding box of the textNode
            var textPosition = textNode.getClientRect();
            var stageBox = stage.container().getBoundingClientRect();

            // Adjust textarea's position based on the textNode's absolute position
            textarea.style.position = 'absolute';
            textarea.style.borser = '0';
            textarea.style.outline = '0';
            textarea.style.padding = '1px';
            textarea.style.top = stageBox.top + textPosition.y + 'px'; // Adjust for the container's offset
            textarea.style.left = stageBox.left + textPosition.x + 'px';
            textarea.style.width = textNode.width() - textNode.padding() * 2 + 'px';
            textarea.style.height = textNode.height() + 'px'; // Set height to match textNode's height

            // Apply rotation to textarea based on textNode's rotation
            var rotation = textNode.rotation(); // Get rotation angle of the textNode
            textarea.style.transformOrigin = 'top left'; // Set transform origin to the top left
            textarea.style.transform = `rotate(${rotation}deg)`; // Rotate the textarea

            // Set focus to textarea
            textarea.focus();

            // Handle Enter key to save text
            textarea.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    textNode.text(textarea.value);
                    textBackground.width(textNode.width() * textNode.scaleX());
                    textBackground.height(textNode.height() * textNode.scaleY());
                    layer.batchDraw();
                    document.body.removeChild(textarea);
                }
            });

            // Handle blur to save text when textarea loses focus
            textarea.addEventListener('blur', function() {
                textNode.text(textarea.value);
                textBackground.width(textNode.width() * textNode.scaleX());
                textBackground.height(textNode.height() * textNode.scaleY());
                layer.batchDraw();
                document.body.removeChild(textarea);
            });
        });


        // Select the text watermark and attach transformer
        textNode.on('click', function(e) {
            e.cancelBubble = true;
            selectedTextWatermark = textNode;
            selectedTextBackground = textBackground;
            // console.log(textNode.text())

            transformer.nodes([textNode]); // Attach transformer to textNode
            transformer.show(); // Ensure the transformer is visible
            transformer.moveToTop();
            layer.batchDraw(); // Redraw the layer to show the transformer

            document.getElementById('textOptions').style.display = 'flex';
        });

        // Deselect transformer when clicking on the stage
        stage.on('click tap', function(e) {
            document.getElementById('textOptions').style.display = 'none';
            document.getElementById('water-image').style.display = 'none';
            if (e.target === stage) {
                transformer.nodes([]); // Detach transformer
                transformer.hide(); // Hide transformer when nothing is selected
                layer.batchDraw();
                return;
            } else {
                // If clicking on a shape, you might want to show the transformer for that shape
                // Get the clicked node (e.g., image or text)
                const clickedNode = e.target;

                // If the clicked node is a Konva.Shape (e.g., image or text), you can attach the transformer
                if (clickedNode instanceof Konva.Image || clickedNode instanceof Konva.Text) {
                    transformer.nodes([]); // Attach transformer to the clicked shape
                    transformer.hide(); // Show the transformer for the clicked shape
                    layer.batchDraw();
                }
            }
        });
    });

    // Apply text color change
    document.getElementById('textColor').addEventListener('input', function() {
        if (selectedTextWatermark) {
            selectedTextWatermark.fill(this.value);
            layer.batchDraw();
        }
    });

    // Apply background color change only if the checkbox is checked
    document.getElementById('bgColor').addEventListener('input', function() {
        if (this.value) {
            document.getElementById('toggleBg').checked = true
        }
        if (selectedTextBackground && document.getElementById('toggleBg').checked) {
            this.previousElementSibling.classList.add('label-class')
            selectedTextBackground.fill(this.value);
            layer.batchDraw();
        }
    });

    // Toggle background transparency or color
    document.getElementById('toggleBg').addEventListener('change', function() {
        if (selectedTextBackground) {
            if (this.checked) {
                document.getElementById('toggleBg').checked = false
                selectedTextBackground.fill('transparent');
                document.getElementById('bgColor').previousElementSibling.classList.remove('label-class')
            } else {
                document.getElementById('toggleBg').checked = false
                selectedTextBackground.fill('transparent');
                document.getElementById('bgColor').previousElementSibling.classList.remove('label-class')
            }
            layer.batchDraw();
        }
    });

    // Handle font size changes
    document.getElementById('fontSize').addEventListener('input', function() {
        if (selectedTextWatermark) {
            selectedTextWatermark.fontSize(this.value);
            selectedTextBackground.width(selectedTextWatermark.width() * selectedTextWatermark.scaleX());
            selectedTextBackground.height(selectedTextWatermark.height() * selectedTextWatermark.scaleY());
            layer.batchDraw();
        }
    });

    document.getElementById('textopacityRange').addEventListener('input', function() {
        selectedTextWatermark.opacity(this.value);
        layer.batchDraw();
    });



    document.getElementById('bold').addEventListener('input', function() {
        const previousLabel = this.previousElementSibling;
        if (this.checked) {
            if (previousLabel && previousLabel.tagName.toLowerCase() === 'label') {
                // Do something with the label
                previousLabel.classList.toggle('label-class')
            }
            selectedTextWatermark.fontStyle(this.value);
            layer.batchDraw();
        } else {
            if (previousLabel && previousLabel.tagName.toLowerCase() === 'label') {
                // Do something with the label
                previousLabel.classList.toggle('label-class')
            }
            selectedTextWatermark.fontStyle('normal');
            layer.batchDraw();
        }
    })

    document.getElementById('italic').addEventListener('input', function() {
        const previousLabel = this.previousElementSibling;
        if (this.checked) {

            if (previousLabel && previousLabel.tagName.toLowerCase() === 'label') {
                // Do something with the label
                previousLabel.classList.toggle('label-class')
            }
            selectedTextWatermark.fontStyle(this.value);
            layer.batchDraw();
        } else {

            if (previousLabel && previousLabel.tagName.toLowerCase() === 'label') {
                // Do something with the label
                previousLabel.classList.toggle('label-class')
            }
            selectedTextWatermark.fontStyle('normal');
            layer.batchDraw();
        }
    })


    // Delete text watermark
    document.getElementById('deleteText').addEventListener('click', function() {
        if (selectedTextWatermark) {
            selectedTextWatermark.remove();
            selectedTextBackground.remove();
            selectedTextWatermark = null;
            selectedTextBackground = null;
            transformer.nodes([]); // Clear transformer
            transformer.hide(); // Hide transformer after deletion
            layer.batchDraw();
            document.getElementById('textOptions').style.display = 'none';
        }
    });

    // Handle image watermark loading and transforming
    var imageWatermarkLoader = document.getElementById('imageWatermarkLoader');
    imageWatermarkLoader.addEventListener('change', function(e) {
        var reader = new FileReader();
        reader.onload = function() {
            var img = new Image();
            img.src = reader.result;
            img.onload = function() {
                if (imageWatermark) {
                    imageWatermark.destroy();
                }

                imageWatermark = new Konva.Image({
                    image: img,
                    x: stage.width() / 3,
                    y: stage.height() / 3,
                    width: 150,
                    height: 150,
                    draggable: true
                });
                layer.add(imageWatermark);
                layer.batchDraw();

                imageWatermark.on('click', function(e) {
                    e.cancelBubble = true;
                    transformer.nodes([imageWatermark]);
                    transformer.show(); // Ensure transformer is visible
                    transformer.moveToTop();
                    layer.batchDraw();
                    document.getElementById('textOptions').style.display = 'none';
                    document.getElementById('water-image').style.display = 'flex';
                });

                stage.on('click', function(e) {
                    if (e.target === stage) {
                        transformer.nodes([]);
                        transformer.hide();
                        document.getElementById('water-image').style.display = 'flex';
                        layer.batchDraw();
                    }
                });

                document.getElementById('opacityRange').addEventListener('input', function() {
                    imageWatermark.opacity(this.value);
                    layer.batchDraw();
                });
            };
        };
        reader.readAsDataURL(e.target.files[0]);
    });

    // Delete image watermark
    document.getElementById('deleteImageWatermark').addEventListener('click', function() {
        if (imageWatermark) {
            imageWatermark.remove();
            imageWatermark = null;
            transformer.nodes([]);
            transformer.hide();
            layer.batchDraw();
        }
        document.getElementById('water-image').style.display = 'none';
    });

    // Save final image with watermark
    document.getElementById('saveImage').addEventListener('click', function() {
        // var dataURL = stage.toDataURL();

        // Create a downloadable image URL after the image is added to the canvas
        const downloadButton = document.createElement('a');
        downloadButton.textContent = 'Download Image';
        downloadButton.style.display = 'block';
        downloadButton.classList.add('saveImage');
        downloadButton.style.marginTop = '20px';

        // Convert the Konva canvas to data URL
        var dataURL = stage.toDataURL({
            mimeType: `image/${extension}`, // Use correct MIME type based on the file extension
            quality: 1, // Full quality for the image
            pixelRatio: 1 // Default pixel ratio
        });

        // Create a downloadable object URL
        downloadButton.href = dataURL;
        downloadButton.download = `${image_name}`; // Name of the downloaded image

        console.log(dataURL)

        // Append the download button to the body or a specific container
        document.getElementById('action-btn').replaceChild(downloadButton, document.getElementById('saveImage'));

        const watermark = new FormData();
        watermark.append('croppedImage[]', dataURL);
        watermark.append('extension[]', extension);

        // Send the image data to the server
        fetch('<?= base_url('crop-process') ?>', {
            method: 'POST',
            body: watermark,
        }).then(function(response) {
            return response.json();
        }).then(function(data) {
            window.location.href = '<?= base_url() ?>watermark-image/download/' + data["u"] + ''
        }).catch(function(error) {
            console.error('Error:', error);
        });
    });
</script>

<?php
$script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>