<?php
$arrow = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>';
$light = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px;color:rgb(255, 102, 0)" viewBox="0 0 24 24" fill="rgb(255, 102, 0)"><path d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z"></path></svg>';

$dark = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px; " viewBox="0 0 24 24" fill="rgb(255, 102, 0)"><path d="M9.8216 2.23796C9.29417 3.38265 9 4.65697 9 6C9 10.9706 13.0294 15 18 15C19.343 15 20.6174 14.7058 21.762 14.1784C20.7678 18.6537 16.7747 22 12 22C6.47715 22 2 17.5228 2 12C2 7.22532 5.3463 3.23221 9.8216 2.23796ZM18.1642 2.29104L19 2.5V3.5L18.1642 3.70896C17.4476 3.8881 16.8881 4.4476 16.709 5.16417L16.5 6H15.5L15.291 5.16417C15.1119 4.4476 14.5524 3.8881 13.8358 3.70896L13 3.5V2.5L13.8358 2.29104C14.5524 2.1119 15.1119 1.5524 15.291 0.835829L15.5 0H16.5L16.709 0.835829C16.8881 1.5524 17.4476 2.1119 18.1642 2.29104ZM23.1642 7.29104L24 7.5V8.5L23.1642 8.70896C22.4476 8.8881 21.8881 9.4476 21.709 10.1642L21.5 11H20.5L20.291 10.1642C20.1119 9.4476 19.5524 8.8881 18.8358 8.70896L18 8.5V7.5L18.8358 7.29104C19.5524 7.1119 20.1119 6.5524 20.291 5.83583L20.5 5H21.5L21.709 5.83583C21.8881 6.5524 22.4476 7.1119 23.1642 7.29104Z"></path></svg>';

$mobile = '<svg xmlns="http://www.w3.org/2000/svg" style="width:20px" viewBox="0 0 24 24" fill="currentColor"><path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z"></path></svg>';

 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title: Contains main keywords for SEO -->
    <title><?php echo $title ?? 'Best Tool Website to make your life easy' ?></title>

    <!-- Meta Description: Summarizes page content, displayed in search results -->
    <meta name="description" content="<?php echo $description ?? 'Find Out Latest Tools that will make your life easy. All kind of  tools are available for you day to day life' ?>">

    <!-- Robots Meta Tag: Tells search engines how to index the page -->
    <meta name="robots" content="index, follow">

    <!-- Canonical Tag: Prevents duplicate content issues by specifying the preferred version of the page -->
    <link rel="canonical" href="<?= base_url() ?><?= $canonical ?? '' ?>">

    <!-- Open Graph Tags: Optimizes content for social sharing -->
    <meta property="og:title" content="<?php echo $title ?? 'Best Tool Website to make your life easy' ?>">
    <meta property="og:description" content="<?php echo $description ?? 'Find Out Latest Tools that will make your life easy. All kind of  tools are available for you day to day life' ?>">
    <meta property="og:image" content="https://zooptools.com/assets/images/logo.png">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card Tags: Optimizes content for Twitter -->
    <meta name="twitter:title" content="<?php echo $title ?? 'Best Tool Website to make your life easy' ?>">
    <meta name="twitter:description" content="<?php echo $description ?? 'Find Out Latest Tools that will make your life easy. All kind of  tools are available for you day to day life' ?>">
    <meta name="twitter:image" content="https://zooptools.com/assets/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon: Adds a small icon in browser tab -->
    <link rel="icon" href="<?= base_url() ?>assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/base.css">
    <!-- Structured Data: JSON-LD for rich snippets (schema markup) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Best Tool Website to make your life easy",
            "description": "Find Out Latest Tools that will make your life easy. All kind of  tools are available for you day to day life",
            "url": "https://zooptools.com"
        }
    </script>

    <?php echo $style ?? ''; ?>

</head>

<body>
    <?php include 'header.php'; ?>

    <?php echo $tool_container ?? '404' ?>

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
            bottom: -70%;
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
                <h2 class="shadow-text">Why Choose ZoopTools?</h2>
                <span class="main-text">Why Choose ZoopTools?</span>
            </div>
            <p style="text-align:center">Your One-Stop Solution for Smart and Simple Web Tools!</p>

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
        
    <div class="content-gap" style="padding: 3% 0;">
        
        <div class="text-container">
        <h2 style=" text-align:center;margin-bottom:0" class="shadow-text">How It Works Section</h2>
                <span class="main-text">How It Works Section</span>
            </div>
        <p style="text-align: center;margin:4px">Using ZoopTools is as Easy as 1-2-3!</p>
        <div class="why-flex">
            <div class="how-box">
                <strong style="font-size: 3rem;color:#FF6600">1</strong>
                <p style="font-size: 1.5rem;margin:0"><strong>Select a Tool</strong></p>
                <p>Choose from a wide range of free tools.</p>
            </div>
            <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
            <div class="how-box">
                <strong style="font-size: 3rem;color:#FF6600">2</strong>
                <p style="font-size: 1.5rem;margin:0"><strong>Upload or Enter Your Data</strong></p>
                <p>No registration required!</p>
            </div>
            <!-- <div class="how-img">
                <img src="<?= base_url('assets/images/right-arrow.png') ?>" width="100%" height="100%" alt="Image Converter Tool"></div> -->
            <div class="how-boxx">
                <strong style="font-size: 3rem;color:#FF6600">3</strong>
                <p style="font-size: 1.5rem;margin:0"><strong>Get Results Instantly</strong></p>
                <p>Download, share, or copy your output in seconds.</p>
            </div>
        </div>
    </div>
    </div>
    
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Users Say</h2>
            <p class="section-subtitle">See how ZoopTools has helped users simplify their digital tasks!</p>

            <div class="testimonial-cards">
                <!-- Testimonial Card 1 -->
                <div class="testimonial-card">
                    <img src="<?= base_url('assets/images/images.jpg') ?>" alt="User Photo" class="user-photo">
                    <p class="user-feedback">"ZoopTools is a real breakthrough! The tools are rapid, energy-saving, and extremely user-friendly itself."</p>
                    <h4 class="user-name">Emily R.</h4>
                    <span class="user-role">Digital Marketer</span>
                </div>

                <!-- Testimonial Card 2 -->
                <div class="testimonial-card">
                    <img src="<?= base_url('assets/images/images (1).jpg') ?>" alt="User Photo" class="user-photo">
                    <p class="user-feedback">"I have used several web tools, but ZoopTools is the simplest and most reliable."</p>
                    <h4 class="user-name">John D.</h4>
                    <span class="user-role">Freelance Designer</span>
                </div>

                <!-- Testimonial Card 3 -->
                <div class="testimonial-card">
                    <img src="<?= base_url('assets/images/images (2).jpg') ?>" alt="User Photo" class="user-photo">
                    <p class="user-feedback">"This was awesome! ZoopTools has turned out to be a great tool for us working people who need to handle our work quickly and efficiently"</p>
                    <h4 class="user-name">Sophia L.</h4>
                    <span class="user-role">Content Creator</span>
                </div>
            </div>
            <!-- <small style="text-align: start;margin-top:1%">Join thousands of users who rely on ZoopTools for fast and secure online tools.</small> -->
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script>
        function toggleMenuBtn() {
            let nav_flex = document.getElementById('nav-flex').classList.toggle('shownav-link');
        }
    </script>
    <?php echo $script ?? ''; ?>
</body>

</html>