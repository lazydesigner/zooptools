<?php 
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

    .preview-area {
        margin-top: 20px;
    }

    .preview-area h3 {
        font-size: 1.2em;
        margin-bottom: 10px;
    }

    .preview-images {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .preview-images img {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid #eaeaea;
    }

    @media (max-width:600px) {
        .outer-upload-container {
            width: 100%;
        }
    }
</style>
<?php
$style = ob_get_clean();
?>

<div class="image-container">
    <div class="outer-upload-container">
        <h1 style="text-align: center;">Convert Your Image</h1>
        <div class="upload-container" id="drag-and_drop_image">
            <div class="drop-area">
                <div class="drop-text">
                    <p>Drag & Drop your images here or</p>
                    <button id="fileSelectBtn">Click to Upload</button>
                </div>
                <input type="file" name="" id="file-upload" class="hidden-file-input" accept="<?= $accept_image_type ?>" multiple hidden>
            </div>
        </div>

        <div class="uploaded-file-box" id="uploaded-file-box">
            <div class="add-more-file" id="add-more-file">
                Add More
            </div>
            <div class="list-of-files" id="list-of-files"></div>
            <div class="uploaded-file-action">
                <button class="btn btn-primary" id="convert">Convert All </button>
            </div>
        </div>
        <div class="p-bar">
            <div id="status-text">Initializing...</div>
            <div id="progress-container">
                <div id="progress-bar">0%</div>
            </div>
        </div>
    </div>
</div>

<div class="success-msg"></div>

<?php ob_start(); ?>

<script>
    let formData = new FormData();
    async function UploadImage() {
        formData.append('from', from_)
        formData.append('format', to_)

        // 
        const xhr = new XMLHttpRequest();

        // Update the progress bar
        xhr.upload.addEventListener('progress', function(event) {
            if (event.lengthComputable) {
                const percentComplete = (event.loaded / event.total) * 100;
                document.querySelector('.p-bar').style.display = 'block'

                console.log(percentComplete);
                // document.getElementById('progress-bar').style.width = percentComplete + '%';
                // document.getElementById('progress-bar').innerText = Math.round(percentComplete) + '%';
            }
        });

        // Handle response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Display server response in an alert or element
                    let data = JSON.parse(xhr.responseText);
                    pro(data["unique_id"])
                    // console.log(data)
                } else {
                    document.getElementById('convert').disabled = fasle;
                    document.getElementById('convert').style.backgroundColor = 'dodgerblue';
                }
            }
        };

        xhr.open('POST', '<?= base_url() ?>convert-image', true);
        xhr.send(formData);
        // 



        // fetch('<?= base_url() ?>convert-image',{
        //     method :'post',
        //     body:formData
        // }).then(response=>response.json())
        // .then(data=>{
        //     if(data['status'] == 200){
        //         window.location.href = '<?= base_url() ?>'+from_+'-to-'+to_+'/download/'+data["u"]+''
        //     }
        // })
        // .catch(e=>console.log(e))
    }
    // ======================
    // 
    function pro(u) {
        const progressBar = document.getElementById("progress-bar");
        const statusText = document.getElementById("status-text");

        // Define status messages to display at specific times
        const statusMessages = [
            "Reading image...",
            "Processing...",
            "Converting...",
            "Almost done...",
            "Completed!"
        ];

        let progress = 0;
        let timeElapsed = 0;

        // Set the interval to run every 1 second (1000 milliseconds)
        const interval = setInterval(() => {
            timeElapsed += 1;
            progress = (timeElapsed / 10) * 100; // Calculate percentage

            // Update progress bar width and text
            progressBar.style.width = progress + "%";
            progressBar.innerText = Math.floor(progress) + "%";

            // Update status text based on time elapsed
            if (timeElapsed === 2) {
                statusText.innerText = statusMessages[0];
            } else if (timeElapsed === 4) {
                statusText.innerText = statusMessages[1];
            } else if (timeElapsed === 6) {
                statusText.innerText = statusMessages[2];
            } else if (timeElapsed === 8) {
                statusText.innerText = statusMessages[3];
            } else if (timeElapsed >= 10) {
                statusText.innerText = statusMessages[4];
                document.querySelector('.p-bar').style.display = 'none'
                window.location.href = '<?= base_url() ?>' + from_ + '-to-' + to_ + '/download/' + u + ''
                // document.getElementById('download-btn').setAttribute('href','')
                clearInterval(interval); // Stop the interval once done
            }
        }, 1000); // Update every second
    };
    // 
    // ======================



    var list_of_files = document.getElementById('list-of-files');
    var array_of_files = [];

    document.getElementById('drag-and_drop_image').addEventListener('click', () => {
        document.getElementById('file-upload').click();
    })
    document.getElementById('add-more-file').addEventListener('click', () => {
        document.getElementById('file-upload').click();
    })

    document.getElementById('file-upload').addEventListener('change', () => {
        var files = document.getElementById('file-upload').files;
        Object.values(files).forEach((file) => {
            array_of_files.push(file)
        })
        list_of_files.innerHTML = '';

        show_files()
    })


    document.querySelector('.success-msg').addEventListener('click', () => {
        document.querySelector('.success-msg').style.display = 'none';
    })


    DropZone = document.querySelector('#drag-and_drop_image');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        DropZone.addEventListener(event, (e) => {
            e.preventDefault();
            e.stopPropagation();
        })
    })


    function Delete_file(i) {
        array_of_files.splice(i, 1)
        list_of_files.innerHTML = '';
        show_files()
    }


    DropZone.addEventListener('drop', (event) => {
        var files = event.dataTransfer.files
        let valid = false;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            // Check if the file's type is valid
            if (!validImageTypes.includes(file.type)) {
                alert(`Invalid file type: ${file.name}.`);
                valid = false;
                break; // Exit the loop on invalid file
            }
            valid = true;

            array_of_files.push(file);
        }

        if (valid) {
            list_of_files.innerHTML = '';
            show_files()
            add_files_to_input()
        }

    })

    document.getElementById('convert').addEventListener('click', () => {
        document.getElementById('convert').disabled = true;
        document.getElementById('convert').style.backgroundColor = 'grey';
        // formData = new FormData()
        array_of_files.forEach((f) => {
            formData.append('file[]', f)
        })
        UploadImage()
        // document.getElementById('form-submit').addEventListener('submit',()=>{})
    })

    function add_files_to_input() {
        var fileInput = document.getElementById('file-upload')

        // Creating a DataTransfer instance to add files to the input element
        const dataTransfer = new DataTransfer();
        array_of_files.forEach((file) => {
            dataTransfer.items.add(file);
        });
        fileInput.files = dataTransfer.files;
    }

    function show_files() {
        document.getElementById('drag-and_drop_image').style.display = 'none';
        document.getElementById('uploaded-file-box').style.display = 'block';
        array_of_files.forEach((file, i) => {
            list_of_files.innerHTML += '    <div class="uploaded-file" id="uploaded-file"><div class="file-info"><p>' + file.name + '</p><small>' + (file.size / (1024)).toFixed(2) + ' KB</small></div> <div class="file-output"><p>Output: <b>' + to_ + '</b></p><span onclick=Delete_file(' + i + ')>X</span></div></div>';
        })
    }
</script>

<?php $script = ob_get_clean();  ?>