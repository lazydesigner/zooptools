<?php

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['url'])) {



    function isUrlValid($url)
    {
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200')) {
            return true;
        } else {
            return false;
        }
    }

    function fetchContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        curl_close($ch);

        if ($html === false) {
            return false;
        }

        // Parse HTML to extract content and images
        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // Extract text content within body, heading, and p tags
        $textContent = '';
        $xpath = new DOMXPath($dom);

        // Select heading tags (h1 to h6) and p tags within the body
        $nodes = $xpath->query("//body//h1 | //body//h2 | //body//h3 | //body//h4 | //body//h5 | //body//h6 | //body//p | //body//li ");

        foreach ($nodes as $node) {
            $tagName = $node->nodeName;

            // Add extra formatting for readability
            switch ($tagName) {
                case 'h1':
                    $textContent .= "\n\nH1-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'h2':
                    $textContent .= "\n\nH2-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'h3':
                    $textContent .= "\n\nH3-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'h4':
                    $textContent .= "\n\nH4-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'h5':
                    $textContent .= "\n\nH5-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'h6':
                    $textContent .= "\n\nH6-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'li':
                    $textContent .= "\n\nli-- " . trim($node->nodeValue) . "\n\n";
                    break;
                case 'p':
                    $textContent .= "\n\np-- " . trim($node->nodeValue) . "\n\n";
                    break;
            }
        }
        $status = '';
        if (!empty($textContent)) {
            $status = true;
        } else {
            $status = false;
        }
        return ['sta' => 'nothing is showing', 'text' => $textContent];
    }

    function downloadContent($content)
    {
        $currentDir = __DIR__;

        // Get the parent directory
        $parentDir = dirname($currentDir);
        $textFilePath = "../../downloads/converted_images/zooptools_" . date('Y-m-d_H-i-s') . '.txt';

        if (!file_exists("../../downloads/converted_images/")) {
            mkdir("../../downloads/converted_images/", 0777, true);
        }

        $textfilename = basename($textFilePath);

        file_put_contents($textFilePath, $content);
        return ['textFile' => $textfilename];
    }

    function Images_($user_url)
    {

        $result = fetchImages($user_url);

        if ($result) {
            return downloadFiles($result['images']);
        } else {
            return [];
        }
    }

    function fetchImages($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        curl_close($ch);

        if ($html === false) {
            return false;
        }
        $status = '';

        // Parse HTML to extract content and images
        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        // Extract image URLs
        $imageUrls = [];
        $imageTags = $dom->getElementsByTagName('img');
        foreach ($imageTags as $tag) {
            $imgSrc = $tag->getAttribute('src');
            if (!empty($imgSrc)) {
                // Handle relative URLs by converting to absolute URLs
                $absoluteUrl = getAbsoluteUrl($imgSrc, $url);
                $imageUrls[] = $absoluteUrl;
            } else {
                $imgSrc2 = $tag->getAttribute('data-src');
                if (!empty($imgSrc2)) {
                    $absoluteUrl = getAbsoluteUrl($imgSrc2, $url);
                    $imageUrls[] = $absoluteUrl;
                }
            }
        }
        if (!empty($imageUrls)) {
            $status = true;
        } else {
            $status = false;
        }

        return ['status' => $status, 'images' => $imageUrls];
    }

    function getAbsoluteUrl($relativeUrl, $baseUrl)
    {
        // If the image URL is already absolute, return it
        if (parse_url($relativeUrl, PHP_URL_SCHEME) != '') {
            return $relativeUrl;
        }
        // Build the absolute URL from base URL and relative path
        return rtrim($baseUrl, '/') . '/' . ltrim($relativeUrl, '/');
    }

    function downloadFiles($images)
    {
        $status = '';
        $zip = new \ZipArchive();
        $zipFilePath = "../../downloads/converted_images/zooptools_images_" . date('Y-m-d_H-i-s') . ".zip";
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === true) {
            foreach ($images as $imageUrl) {
                // Check if the URL is valid and get the image contents
                if (!empty($imageUrl)) {
                    $imageData = @file_get_contents($imageUrl);
                    if ($imageData !== false) {
                        $imageName = basename($imageUrl);
                        $zip->addFromString($imageName, $imageData);
                    }
                }
            }
            $zip->close();
        }

        $imagefilename = basename($zipFilePath);

        return ['zipFile' => $imagefilename];
    }

    function Content_($user_url)
    {

        $result = fetchContent($user_url);

        if ($result) {
            return downloadContent($result['text']);
        } else {
            echo 'no working';
        }
    }

    // ================================================

    if ($_POST['task'] == 'image') {
        if (isUrlValid($_POST['url'])) {
            $res = Images_($_POST['url']);

            $uniqueId = uniqid('zoop');
            $file = basename($res['zipFile']);
            $image_count = 1;
            // $con = mysqli_connect('localhost', 'root', '', 'zooptools');
            if ($con) {
                $query = "INSERT INTO image(`converted_image`, `unique_id`, `image_count`) VALUES('$file', '$uniqueId', $image_count)";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo json_encode(['status' => 200, 'a' => $res]);
                } else {
                    echo json_encode([
                        'status' => 500,
                    ]);
                }
            }


           
        } else {
            echo json_encode(['status' => 500]);
        }
    } elseif ($_POST['task'] == 'content') {
        if (isUrlValid($_POST['url'])) {
            $res = Content_($_POST['url']);
            $uniqueId = uniqid('zoop');
            $file = basename($res['textFile']);
            $image_count = 1;
            // $con = mysqli_connect('localhost', 'root', '', 'zooptools');
            if ($con) {
                $query = "INSERT INTO image(`converted_image`, `unique_id`, `image_count`) VALUES('$file', '$uniqueId', $image_count)";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo json_encode(['status' => 200, 'a' => $res]);
                } else {
                    echo json_encode([
                        'status' => 500,
                    ]);
                }
            }
        } else {
            echo json_encode(['status' => 500]);
        }
    }
} else {
    echo json_encode(['status' => 500, 'msg' => 'Invalid Request']);
}
