<?php

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize inputs
    $images = isset($_POST['croppedImage']) && is_array($_POST['croppedImage']) ? $_POST['croppedImage'] : [];
    $ext = isset($_POST['extension']) && is_array($_POST['extension']) ? $_POST['extension'] : [];
    
    if (empty($images)) {
        echo json_encode(['status' => 400, 'msg' => 'No images provided']);
        exit;
    }

    $zipFilePath = '';
    $zipFilePath2 = '';
    $zip = new ZipArchive();
    $datetime = new DateTime();
    $formattedDate = $datetime->format('Y-m-d_H-i-s.u');
    $listoffiletoberemoved = [];
    
    // Directory for storing images
    $convertedDir = "../../downloads/converted_images/";
    if (!file_exists($convertedDir)) {
        mkdir($convertedDir, 0777, true);
    }

    if (count($images) > 1) {
        $zipFilePath2 = $convertedDir . "zooptools_images_" . $formattedDate . ".zip";
        if ($zip->open($zipFilePath2, ZipArchive::CREATE) !== true) {
            echo json_encode(['msg' => 'Failed to create ZIP file', 'status' => 500]);
            exit;
        }
    }

    foreach ($images as $i => $image) {
        // Determine the correct extension
        $currentExt = !empty($ext[$i]) && in_array($ext[$i], ['jpeg', 'jpg', 'png']) ? $ext[$i] : 'jpeg';

        // Clean the base64 data
        $base64Prefix = "data:image/{$currentExt};base64,";
        $image = str_replace($base64Prefix, '', $image);
        $image = str_replace(' ', '+', $image);

        // Decode base64 data
        $decodedImage = base64_decode($image);
        if ($decodedImage === false) {
            echo json_encode(['msg' => 'Failed to decode image', 'status' => 400]);
            exit;
        }

        // Generate unique filename
        $currentDate = uniqid();
        $outputFilename = "zooptools_image_{$currentDate}.{$currentExt}";
        $outputFilePath = $convertedDir . $outputFilename;
        $listoffiletoberemoved[] = $outputFilePath;
        // Save the image to the file system
        if (file_put_contents($outputFilePath, $decodedImage)) {
            // If multiple images, add them to the ZIP
            if (count($images) > 1) {
                $zip->addFile($outputFilePath, $outputFilename);
                // unlink($outputFilePath); // Remove individual file after adding to ZIP
            } else {
                $zipFilePath = $outputFilePath; // Single file path
            }
        } else {
            echo json_encode(['msg' => 'Failed to save the image', 'status' => 500]);
            exit;
        }
    }

    // Close the ZIP if it was created
    if (count($images) > 1) {
        $zip->close();
        $zipFilePath = $zipFilePath2; // Set ZIP file as the response path
    }
if(count($listoffiletoberemoved) > 1){
    forEach($listoffiletoberemoved as $remove){
        unlink($remove);
    }
}

    // Database insertion
    $uniqueId = uniqid('zoop');
    $file = basename($zipFilePath);
    $imageCount = count($images);
    // $con = mysqli_connect('localhost', 'root', '', 'zooptools');
    if ($con) {
        $query = "INSERT INTO image (`converted_image`, `unique_id`, `image_count`) VALUES ('$file', '$uniqueId', $imageCount)";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo json_encode([
                'status' => 200,
                'file' => $file,
                'u' => explode('zoop', $uniqueId)[1],
                'image_count' => $imageCount,
            ]);
        } else {
            echo json_encode(['status' => 500, 'msg' => 'Database insertion failed']);
        }
    } else {
        echo json_encode(['status' => 500, 'msg' => 'Failed to connect to database']);
    }
} else {
    echo json_encode(['status' => 405, 'msg' => 'Invalid request method']);
}
?>
