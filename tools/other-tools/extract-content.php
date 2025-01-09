<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'web-content-extractor';

$style = '';

ob_start();
?>
 <div style="text-align: center;"><h1>🔍 Website Content Extractor</h1>
    <p>Enter a website URL below to extract its content and images effortlessly!</p></div>
    <div class="zooptools_conversion">
        <div class="extract_url">
            <div class="inner_extract_url">
                <input type="url" placeholder="Enter Website Url" name="url" id="url">
                <div class="btn"><button id="extract_btn">Extract</button></div>
            </div>
        </div>
        <div class="result" id="result">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">
                            <p>Your File (<span id="filename"><b>Filename</b></span>) is ready to download</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 85%;border-radius: 10px 0 0 10px;">
                            <div id="linkbtn"></div>
                        </td>
                        <td id="forbtn" style="width: 15%;border-radius: 0 10px 10px 0"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
$tool_container = ob_get_clean(); 
ob_start(); ?>

<script>
    const extract_btn = document.querySelector('#extract_btn');
    extract_btn.addEventListener('click', () => {
        document.getElementById('extract_btn').innerText = "Processing...";
        const url = new FormData();
        url.append('url', document.querySelector('#url').value);
        url.append('task', 'content');
        fetch('<?= base_url() ?>extraction', {
                method: 'post',
                body: url
            }).then(response => response.json())
            .then(data => { 
                if (data['status'] == 200) {
                    document.getElementById('extract_btn').innerText = "Extract";
                    document.getElementById('result').style.display = 'block';
                    document.getElementById('filename').innerHTML = '<b>' + data['a']['textFile'] + '</b>';
                    document.getElementById('linkbtn').innerHTML = '<b>' + data['a']['textFile'] + '</b>';
                    document.getElementById('forbtn').innerHTML = '<a href="<?=base_url() ?>downloads/converted_images/' + data['a']['textFile'] + '" download><button>Download</button></a>';
                    // console.log(data['a']['textFile'])
                } else {
                    document.getElementById('extract_btn').innerText = "Extract";
                    alert('Url Is not Valid or Website is not Working')
                }
            })
    })
</script>

<?php
$script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>