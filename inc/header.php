<header>
        <div class="container">
        <nav class="nav">
        <a href="<?= base_url() ?>" class="logo"><img src="<?= base_url('assets/images/logo.png') ?>" width="100%" height="100%" alt=""></a>
            <div class="togglemenu" onclick="toggleMenuBtn()"><?= $mobile ?></div>
            <div class="nav-flex" id="nav-flex">
                <div class=" nav-link"><a>Image Conversion<?= $arrow ?></a>
                    <div class="dropdown">
                        <a href="<?= base_url('png-to-jpg') ?>">PNG To JPEG</a>
                        <a href="<?= base_url('png-to-webp') ?>">PNG To WEBP</a>
                        <a href="<?= base_url('jpg-to-png') ?>">JPEG To PNG</a>
                        <a href="<?= base_url('jpg-to-webp') ?>">JPEG To WEBP</a>
                        <a href="<?= base_url('webp-to-png') ?>">WEBP To PNG</a>
                        <a href="<?= base_url('webp-to-jpg') ?>">WEBP To JPEG</a>
                    </div>

                </div>
                <div class=" nav-link"><a>Image Compression <?= $arrow ?></a>
                    <div class="dropdown">
                        <a href="<?= base_url('image-compressor') ?>">Image Compressor</a>
                        <a href="<?= base_url('image-compressor') ?>">Compress PNG</a>
                        <a href="<?= base_url('image-compressor') ?>">Compress JPEG</a>
                    </div>
                </div>
                <div class="nav-link"><a href="<?= base_url('crop-image') ?>">Crop Image</a></div>
                <div class=" nav-link"><a>More <?= $arrow ?></a>
                    <div class="dropdown">
                        <a href="<?= base_url('web-content-extractor') ?>">Web Content Extractor</a>
                        <a href="<?= base_url('website-image-extractor') ?>">Website Image Extractor</a>
                        <a href="<?= base_url('watermark-image') ?>">Watermark Image</a> 
                        <a href="<?= base_url() ?>resize-image">Resize Image</a>
                        <a href="<?= base_url() ?>flip-image">Flip Image</a>
                        <a href="<?= base_url() ?>whats-my-ip">Whats My IP</a>
                        <a href="<?= base_url() ?>bulk-url-opner">Bulk Url Opner</a>
                        <a href="<?= base_url() ?>url-list-cleaner">Url List Cleaner</a>
                        <a href="<?= base_url() ?>word-counter">Word Counter</a>
                    </div>
                </div>
                <!--<div class="nav-link light" id="theme-toggle" onclick="toggleTheme()"><a><?= $light ?></a></div>-->
            </div>
        </nav>
        </div>
    </header>