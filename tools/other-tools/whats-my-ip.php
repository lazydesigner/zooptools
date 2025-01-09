<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'whats-my-ip';


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
        width: 500px;
    }
</style>
<div class="image-container">
    <div class="outer-upload-container" id="outer-upload" style='text-align:center'>
        <h1 style="text-align: center;" id='whatmyip'></h1>
    </div>
</div>
  
    <script>
        // Get browser information using JavaScript
        const userInfoDiv = document.getElementById('userInfo');
        const userAgent = navigator.userAgent;
        const platform = navigator.platform;
        const language = navigator.language;

         
        // Fetch the IP address using an external API
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                document.getElementById('outer-upload').innerHTML = `<h1 style="text-align: center;" id='whatmyip'>YOUR IP: ${data.ip}</h1><p><strong>User Agent:</strong> ${userAgent}</p>`
               
            })
            .catch(error => console.error('Error fetching IP:', error));
    </script>

<?php $tool_container = ob_get_clean(); 


?>
<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>