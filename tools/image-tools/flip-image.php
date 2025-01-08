<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


ob_start();
?>
<div class="container">
    <style>
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

        .flip-options {
            display: none;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .flip-options label {
            display: inline-block;
            padding: 7px 12px;
            cursor: pointer;
            margin: 10px 0;
            border-radius: 3px;
            border: 1px solid lightblue;
        }

        .flip-options button {
            border: 0;
            width: 150px;
            height: 40px;
            padding: 7px 12px;
            cursor: pointer;
            margin: 10px 0;
            display: inline-block;
        }

        .flip-options button:hover {
            background-color: lightblue;
        }

        .flip-options .color {
            background-color: lightblue;
        }

        #result {
            max-width: 200px;
            display: none;
        }
        #downloadthisfile{
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            margin: 2% auto;
            width: 150px;
            height: 40px;
            border: 0;
            cursor: pointer;
            background-color: lightseagreen;
            color: white;
        }
    </style>
    <div class="" style="max-width: 60%;margin:3% auto">
        <h1 style="text-align: center;">Flip Your Image</h1>
        <!-- <form id="uploadForm" enctype="multipart/form-data"> -->
        <div class="upload-container" id="drag-and_drop_image">
            <div class="drop-area">
                <div class="drop-text">
                    <p>Drag & Drop your images here or</p>
                    <button id="fileSelectBtn">Click to Upload</button>
                </div>
                <input type="file" name="" id="file-upload" class="hidden-file-input" accept="image/*" required hidden>
            </div>
        </div>
        <div id="result" style="margin:auto;margin-top: 20px;">
            <h3>Preview Image:</h3>
            <img src="" width="100%" id="previewImage" alt="Flipped Image" />
        </div>
        <!-- <input type="file" name="image" id="image" accept="image/*" required /> -->
        <div class="flip-options" id="flip-options" style="margin-top:3%">
            <label for="horizontal" class="color">
                Horizontal
            </label><input type="radio" name="flipType" value="horizontal" id="horizontal" checked hidden />
            <label for="vertical">
                Vertical
            </label> <input type="radio" name="flipType" value="vertical" id="vertical" hidden />
            <button type="button" onclick="uploadImage()">Upload & Flip</button>
            <button type="button" onclick="newupload()">New Upload</button>
        </div>
        <!-- </form> -->

    </div>
</div>
<?php
$tool_container = ob_get_clean();
ob_start();
?>
<script>
    document.querySelectorAll('[name="flipType"]').forEach(option => {
        option.addEventListener('change', function() {
            document.querySelectorAll('[name="flipType"]').forEach(o => o.previousElementSibling.classList.remove('color'))
            if (option.checked) {
                option.previousElementSibling.classList.add('color')
            }
        })
    })

    var array_of_files = [];

    document.getElementById('drag-and_drop_image').addEventListener('click', () => {
        document.getElementById('file-upload').click();
    })
    function newupload(){document.getElementById('file-upload').click();}

    document.getElementById('file-upload').addEventListener('change', () => {
        document.getElementById('drag-and_drop_image').style.display='none'
        document.getElementById('result').style.display='grid'
        document.getElementById('flip-options').style.display='flex'
        var files = document.getElementById('file-upload').files[0];
        var imageDsp = document.getElementById('previewImage');
        let oFReader = new FileReader();
        oFReader.readAsDataURL(files);
        oFReader.onload = function(ofEvent) {
            imageDsp.src = ofEvent.target.result;
        }
    })


    DropZone = document.querySelector('#drag-and_drop_image');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        DropZone.addEventListener(event, (e) => {
            e.preventDefault();
            e.stopPropagation();
        })
    })

    DropZone.addEventListener('drop', (event) => {
        document.getElementById('drag-and_drop_image').style.display='none'
        document.getElementById('result').style.display='grid'
        document.getElementById('flip-options').style.display='flex'
        event.preventDefault(); // Prevent default browser behavior
        var file = event.dataTransfer.files[0]

        var fileInput = document.getElementById('file-upload')

        // Creating a DataTransfer instance to add files to the input element
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
        var imageDsp = document.getElementById('previewImage');
        let oFReader = new FileReader();
        oFReader.readAsDataURL(file);
        oFReader.onload = function(ofEvent) {
            imageDsp.src = ofEvent.target.result;
        }
    })


    function uploadImage() {
        const formData = new FormData();
        // const formData = new FormData(document.getElementById('uploadForm'));
        var fileInput = document.getElementById('file-upload').files[0]
        const flipType = document.querySelector('input[name="flipType"]:checked').value;
        formData.append("flipType", flipType);
        // array_of_files.forEach((f) => {
        formData.append('image', fileInput);
        // })

        fetch("<?= base_url() ?>flipimage", {
                method: "POST",
                body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    document.getElementById("result").innerHTML = `<h3>Flipped Image:</h3>
              <img src="<?= base_url() ?>downloads/converted_images/${data.filePath}" width="100%" alt="Flipped Image" />
              <a href="<?=base_url() ?>downloads/converted_images/${data.filePath}" download  id="downloadthisfile">Download</a>
              <small>Your File Will Be Downloaded Soon</small>
              `;
                } else {
                    alert(data.error || "Something went wrong!");
                }
                setTimeout(()=>{
                   document.getElementById('downloadthisfile').click()
                },3000)
            })
            .catch((err) => {
                console.error(err);
                alert("Failed to process the image.");
            });
    }
</script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>