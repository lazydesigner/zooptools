<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';

include_once '../../inc/icons.php';

$canonical = 'website-image-extractor';
$title = 'Free Website Image Extractor | Extract & Download Images Online - ZoopTools';
$description = 'Extract and download images from any URL with ZoopTools Website Image Extractor. No sign-up or extensions required. Get all images instantly for free!';
$style = '';
$toextra = true;

ob_start();
?>
<div style="text-align: center;">
    <h1>🔍 Website Image Extractor</h1>
    <!-- <p>Enter a website URL below to extract its content and images effortlessly!</p></div> -->
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
    <div class='container'>
        <p>Need images from a webpage? ZoopTools’ <strong>Website Image Extractor</strong> lets you quickly extract all the images from any URL and download them hassle-free. Whether you need images for inspiration, research, or analysis, our tool makes the process simple and efficient.</p>

        <!-- <h2></h2> -->





    </div>
    <style>
        .why-flex {
            margin-top: 4%;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            gap: 5%;
            text-align: center;
            font-weight: 600;
        }

        .why-img {
            max-width: 100px;
            margin: auto;
            text-align: center;
        }

        .how-img {
            max-width: 200px;
            align-self: self-start;

        }

        .how-box,
        .how-boxx {
            position: relative;
            margin-top: 3%;
            flex: 1;
        }

        .how-box::after {
            content: url(<?= base_url('assets/images/right-arrow.png') ?>);
            position: absolute;
            width: 10px;
            bottom: -170% !important;
            right: 20%;
            transform: scale(0.4);
            /* Scales the image to 50% of its original size */
        }

        .why-box {
            /* White background for a clean look */
            flex: 1;
            padding: 10px 20px;
            border-radius: 10px;
            /* Smoothly rounded corners */
            box-shadow: 0 4px 6px var(--text-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Smooth hover effect */
            text-align: center;
            /* Centered text content */
        }

        .why-box:hover {
            transform: translateY(-5px);
            /* Slight lift on hover */
            box-shadow: 0 0 3px 1px var(--text-color);
            /* Enhanced white shadow on hover */
        }

        .why-box p {
            font-size: 1rem;
        }

        .content-gap {
            /* height: 60vh; */
            display: grid;
            align-items: center;
        }

        /*  */
        .testimonials {
            margin-top: 5%;
            background-color: #1e1e1e;
            /* Dark background for contrast */
            color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #bbb;
            margin-bottom: 40px;
        }

        .testimonial-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .testimonial-card {
            background-color: #282828;
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .user-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .user-feedback {
            font-size: 1rem;
            font-style: italic;
            margin-bottom: 15px;
            color: #ddd;
        }

        .user-name {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .user-role {
            font-size: 0.9rem;
            color: #aaa;
        }

        @media (max-width:800px) {
            .content-gap {
                height: auto;
            }

            .how-box::after {
                bottom: -30%;
                right: 10%;
                transform: scale(0.2);
                /* Scales the image to 50% of its original size */
            }
        }

        @media (max-width:600px) {
            .content-gap {
                height: auto;
            }

            .why-box {
                margin: 10px 0;
            }

            .how-box,
            .how-boxx {
                flex: 100%;
            }

            .how-box::after {
                display: none;
            }
        }

        .text-container {
            position: relative;
            text-align: center;
            display: inline-block;
        }

        .shadow-text {
            position: absolute;
            top: -100%;
            /* Adjust vertical position of shadow */
            left: 50%;
            /* Adjust horizontal position of shadow */
            /* transform: translateX(-50%); */
            /* font-size: 200%; Shadow text is 2x larger */
            color: rgba(0, 0, 0, 0.1);
            /* Shadow color and opacity */
            z-index: 0;
            /* Place shadow behind */
            transform: scale(1.3) translateX(-37.5%);
            /* Enlarges the shadow text */
        }

        .main-text {
            position: relative;
            font-size: 1.5rem;
            color: #000;
            /* Main text color */
            z-index: 1;
            /* Place main text in front */
        }
    </style>
    <div class="container">


        <div class="content-gap" style="padding: 3% 0;">

            <div class="text-container">
                <h2 style=" text-align:center;margin-bottom:0" class="shadow-text">How to Use the Website Image Extractor</h2>
                <span class="main-text">How to Use the Website Image Extractor</span>
            </div>
            <p style="text-align: center;margin:4px">Using ZoopTools is as Easy as 1-2-3!</p>
            <div class="why-flex">
                <div class="how-box">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $url ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Enter a URL</strong></p>
                    <small>Copy the link from the website that you plan to extract the images from, and then paste it here.</small>
                </div>
                <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
                <div class="how-box">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $btnclick ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Click Extract</strong></p>
                    <small>Our website automatically scans the webpage and then displays all the images.</small>
                </div>
                <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
                <div class="how-boxx">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $image_extract ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Download Images</strong></p>
                    <small>Simply select the images one by one or you can choose to download all of them at once.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="text-align: start;">
        <h2>Who Can Benefit From This Tool?</h2>
        <ul>
            <li><b>Graphic Designers:</b> Quickly gather visual inspiration from different sources.</li>
            <li><b>Researchers:</b> Extract images for projects or analysis.</li>
            <li><b>Content Creators:</b> Collect images for blogs, videos, or presentations.</li>
            <li><b>Digital Marketers:</b> Analyze visual elements from competitors' websites.</li>
        </ul>

        <h3>FAQs About the Website Image Extractor</h3>
        <p><strong>Q: What kinds of images can be extracted?</strong></p>
        <p><b>A:</b> The tool extracts all visible images in any format like JPEG, PNG, and GIF from a webpage.</p>

        <p><b>Q: Is there a limit to the number of extractions?</b></p>
        <p><b>A:</b> No, there is no limit. You can get images from a large number of pages without any restrictions or fees.</p>

        <p><b>Q: Is this tool applicable on every website?</b></p>
        <p><b>A:</b> Our tool can help you to extract images from any accessible site.</p>
    </div>
    <div class="container">
        <div class="content-gap" style="padding: 3% 0;">
            <div class="text-container">
                <h2 class="shadow-text">Why Choose ZoopTools?</h2>
                <span class="main-text">Why Choose ZoopTools?</span>
            </div>

            <div class="why-flex">
                <div class="why-box">
                    <div class="why-img">
                        <img src="<?= base_url('assets/images/3.png') ?>" width="100%" height="100%" alt="Image Converter Tool">
                    </div>
                    <p>100% Free: Never charge for it, No hidden costs and subscriptions.</p>
                </div>
                <div class="why-box">
                    <div class="why-img">
                        <img src="<?= base_url('assets/images/4.png') ?>" width="100%" height="100%" alt="Image Converter Tool">
                    </div>
                    <p>Privacy Guaranteed: Your data is never stored or shared.</p>
                </div>
                <div class="why-box">
                    <div class="why-img">
                        <img src="<?= base_url('assets/images/5.png') ?>" width="100%" height="100%" alt="Image Converter Tool">
                    </div>
                    <p>Fast and Easy: Get results in seconds with minimal effort.</p>
                </div>
                <div class="why-box">
                    <div class="why-img">
                        <img src="<?= base_url('assets/images/6.png') ?>" width="100%" height="100%" alt="Image Converter Tool">
                    </div>
                    <p>Cross-Platform Compatible: It will work, whatever the device is, on any modern browser.</p>
                </div>
            </div>
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
            url.append('task', 'image');
            fetch('<?= base_url() ?>extraction', {
                    method: 'post',
                    body: url
                }).then(response => response.json())
                .then(data => {
                    if (data['status'] == 200) {
                        document.getElementById('extract_btn').innerText = "Extract";
                        document.getElementById('result').style.display = 'block';
                        document.getElementById('filename').innerHTML = '<b>' + data['a']['zipFile'] + '</b>';
                        document.getElementById('linkbtn').innerHTML = '<b>' + data['a']['zipFile'] + '</b>';
                        document.getElementById('forbtn').innerHTML = '<a href="<?= base_url() ?>downloads/converted_images/' + data['a']['zipFile'] + '" download><button>Download</button></a>';
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