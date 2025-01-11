<?php 
$download = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M13 12H16L12 16L8 12H11V8H13V12ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z"></path></svg>';
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php'; 
ob_start(); 

if(isset($_GET['from']) || isset($_GET['to'])){
    $b = strtolower($_GET['from']).'-to-'.strtolower($_GET['to']);
}

if(isset($_GET['crop'])){
    $b = strtolower($_GET['crop']);
}




$a = $_GET['id'];

// $con = mysqli_connect('localhost', 'root', '', 'zooptools');
if ($con) {
    $unique = 'zoop'.$a;
    $query = "SELECT * FROM image WHERE unique_id = '$unique'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header('Location: '.base_url().'');
    }
}



?>
    <style>
        #progress-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
        }

        #progress-bar {
            width: 0%;
            height: 20px;
            background-color: #4caf50;
            text-align: center;
            color: white;
            border-radius: 8px;
            transition: width 0.1s;
        }

        #status-text {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
        }

        a {
            cursor: pointer;
        }

        .p-bar {
            display: block;
        }
        .add-more-btn{
            min-width:150px;
            height: 40px;
            text-align: center;
            margin: auto;
            padding: 10px 15px;
            border: 0;
            cursor: pointer;
            border-radius: 5px;
            transition: .1s;
        }
        .add-more-btn:hover{
            background-color: #5a52d6;
            color: white;
            box-shadow: 0 0 6px 2px rgba(91, 82, 214, 0.54) 
        }
    </style>
<?php $style = ob_get_clean(); ?>
<?php ob_start(); ?>

    <div class="conversion-result">
    <h1>Download Your File</h1>
    <p style="text-align: center;">Please wait while your file is being prepared...</p>


        <div class="conversion-box">
            <div class="p-bar">
                <div id="status-text">Preparing File Please Wait...</div>
            </div>
            <span class="download-btn-border"><a class="download-btn" id='download-btn'><?=$download ?> Download Image</a></span>
        </div>

        <div style="display: flex;justify-content:center">
            <span><a href="<?= base_url($b) ?>"><button class="add-more-btn">+ Add More</button></a></span>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const progressBar = document.getElementById("progress-bar");
            const statusText = document.getElementById("status-text");

            // Define status messages to display at specific times
            const statusMessages = [
                "Preparing File Please Wait...",
                "Preparing File Please Wait...",
                "Preparing File Please Wait...",
                "Almost Done...",
                "Completed!"
            ];

            let progress = 0;
            let timeElapsed = 0;

            // Set the interval to run every 1 second (1000 milliseconds)
            const interval = setInterval(() => {
                timeElapsed += 1;
                // Update status text based on time elapsed
                if (timeElapsed === 2) {
                    statusText.innerText = statusMessages[0];
                } else if (timeElapsed === 8) {
                    statusText.innerText = statusMessages[3];
                } else if (timeElapsed >= 10) {
                    statusText.innerText = statusMessages[4];
                    document.querySelector('.p-bar').style.display = 'none'
                    document.getElementById('download-btn').setAttribute('href', '<?=base_url() ?>download/<?= rtrim(base64_encode($row['converted_image']), '='); ?>')
                    clearInterval(interval); // Stop the interval once done
                }
            }, 1000); // Update every second
        });
    </script>

<?php
$tool_container = ob_get_clean();



?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>