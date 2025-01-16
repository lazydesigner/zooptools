
<?php
include_once '../routes.php';
include_once '../inc/icons.php';
$title = "Free Online Tools for Daily Tasks | Zooptools";
$crop = '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="38" viewBox="0 0 24 24" fill="currentColor"><path d="M15 17V19H6C5.44772 19 5 18.5523 5 18V7H2V5H5V2H7V17H15ZM17 22V7H9V5H18C18.5523 5 19 5.44772 19 6V17H22V19H19V22H17Z"></path></svg>';
$link = '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="38" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6V8H5V19H16V14H18V20C18 20.5523 17.5523 21 17 21H4C3.44772 21 3 20.5523 3 20V7C3 6.44772 3.44772 6 4 6H10ZM21 3V11H19L18.9999 6.413L11.2071 14.2071L9.79289 12.7929L17.5849 5H13V3H21Z"></path></svg>';
// $description = "";

ob_start(); ?>
<style>
    .tools-container {
        width: 80%;
        min-height: 700px;
        margin: 5% auto;
    }

    .tools-grid {
        margin: 3% auto;
        display: grid;
        grid-template-columns: repeat(3, minmax(24%, 1fr));
        grid-auto-rows: auto;
    }

    .grid-item {
        width: 100%;
        min-height: 200px;
        padding: 5%;
    }

    .tool-o {
        width: 100%;
        height: 100%;
        border: 1px solid var(--primary-accent);
        border-radius: 5.5px 18px;
        padding: 3px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .tool {
        width: 100%;
        height: 100%;
        background-color: var(--primary-accent);
        padding: 1rem;
        box-shadow: 0 0 4px 1px var(--shadow);
        border-radius: 2.5px 15px 2.5px 15px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .tool-o:hover {
        transform: translateY(-5px);
    }

    .tool:hover {
        background-color: var(--hover-accent);
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        color: var(--primary-accent);
    }
    @media (max-width:600px){
        .tools-container{width: 95%;}
        .tools-grid {
        margin: 3% auto;
        display: grid;
        grid-template-columns: repeat(2, minmax(24%, 1fr));
        grid-auto-rows: auto;
    }
    }
    @media (max-width:400px){
        .tools-grid { 
        grid-template-columns: repeat(1, minmax(24%, 1fr)); 
    }
    .grid-item { 
        padding: 2%;
    }
    }
</style>
<?php $style = ob_get_clean(); ?>
<!-- Start Storing New Content to tool container -->
<?php ob_start() ?>
<div class="tools-container">
    <div class="tools-grid">
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>image-compressor">
                    <div class="tool">
                        <div class="tool-img">
                            <?= $image_compress ?>
                        </div>
                        <p>Image Compression</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>crop-image">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $crop ?>
                        </div>
                        <p>Crop Image</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>rotate-image-online ">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $flip ?>
                        </div>
                        <p>Rotate Image</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>watermark-image">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $common ?>
                        </div>
                        <p>Watermark Image</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>resize-image">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $image_resize ?>
                        </div>
                        <p>Image Resize</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>png-to-jpg">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $png_to_jpg ?>
                        </div>
                        <p>PNG to JPG</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>jpg-to-png">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $jpg_to_png ?>
                        </div>
                        <p>JPG to PNG</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>webp-to-png">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $webp_to_png ?>
                        </div>
                        <p>WEBP to PNG</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>web-content-extractor">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $content_extract ?>
                        </div>
                        <p>Extract Content</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>website-image-extractor">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $image_extract ?>
                        </div>
                        <p>Extract Images</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>sip-calculator">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $calculator ?>
                        </div>
                        <p>SIP Calculator</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>compound-interest-calculator">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $calculator ?>
                        </div>
                        <p>CI Calculator</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>ppf-calculator">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $calculator ?>
                        </div>
                        <p>PPF Calculator</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>fake-tweet-generator">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $tweet ?>
                        </div>
                        <p>Tweet Generator</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>resume-builder">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $resume ?>
                        </div>
                        <p>Resume Builder</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>bulk-url-opner">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $link ?>
                        </div>
                        <p>Bulk Url Opner</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>url-list-cleaner">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $UrlCleaner  ?>
                        </div>
                        <p>Url List Cleaner</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item">
            <div class="tool-o">
                <a href="<?= base_url() ?>word-counter">
                    <div class="tool">
                        
                        <div class="tool-img">
                            <?= $counter ?>
                        </div>
                        <p>Word Counter</p>
                        <small>ZoopTools: Simplifying digital tasks for everyone</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $tool_container = ob_get_clean(); ?>

<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>