<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


include_once '../../inc/icons.php';

$canonical = 'web-content-extractor';

$title = 'Free Website Text Extractor | Extract & Download Content Online - ZoopTools';
$description = "Easily extract body content from any URL with ZoopTools' Website Text Extractor. No sign-up, no extensions required. Download text files instantly for free!";

$style = '';

ob_start();
?>
 <div style="text-align: center;"><h1>🔍 Website Text Extractor</h1> 
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
        <p>Need to quickly extract content from a webpage? Zoop Tools' <strong>Website Text Extractor</strong> makes it easy to pull the body text from any URL and download it as a plain text file. Perfect for researchers, writers, and SEO professionals who need clean, readable text without distractions.</p>

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
            .how-box svg{color:#FF6600!important; background-color: #FF6600!important;}

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
                <h2 style=" text-align:center;margin-bottom:0" class="shadow-text">How to Use the Website Text Extractor</h2>
                <span class="main-text">How to Use the Website Text Extractor</span>
            </div>
            <p style="text-align: center;margin:4px">Using ZoopTools is as Easy as 1-2-3!</p>
            <div class="why-flex">
                <div class="how-box">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $url ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Enter a URL</strong></p>
                    <small>Paste the web page link in the provided input box.</small>
                </div>
                <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
                <div class="how-box">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $btnclick ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Click Extract</strong></p>
                    <small>Our tool automatically pulls the main body content from the page.</small>
                </div>
                <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
                <div class="how-boxx">
                    <strong style="font-size: 3rem;color:#FF6600"><?= $image_extract ?></strong>
                    <p style="font-size: 1.5rem;margin:0"><strong>Download the Text File</strong></p>
                    <small>Save the extracted content directly to your device as a .txt file.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="text-align: start;">
        <h2>Who Can Benefit From This Tool?</h2>
        <ul>
            <li><b>Writers:</b> Quickly pull content for inspiration or analysis.</li>
            <li><b>Researchers:</b> Extract clean text for academic or professional purposes.</li>
            <li><b>SEO Professionals:</b> Analyze on-page content to optimize your own websites.</li>
            <li><b>Content Creators:</b> Gather data for competitor analysis or idea generation.</li>
        </ul>

        <h3>FAQs About the Website Text Extractor</h3>
        <p><strong>Q: What can be extracted using the tool? </strong></p>
        <p><b>A:</b>The main body content of a webpage is extracted while the tool excludes ads, headers, and sidebars.</p>

        <p><b>Q: Can the tool extract any number of times? </b></p>
        <p><b>A:</b>No, you can use the tool as many times as you like, completely free of charge.</p>

        <p><b>Q: Would this be effective on all sites? </b></p>
        <p><b>A:</b> Our tool works on most of the publicly accessible web pages. We can not access content that requires any password or sign-up or login. </p>
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