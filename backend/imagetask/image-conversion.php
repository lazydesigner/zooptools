<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $files = $_FILES['file'];
    $zipFilePath = '';

    if (!is_dir("../../downloads/converted_images/")) {
        mkdir("../../downloads/converted_images/", 0755, true);
    }

    $filetoremove = [];

    $isMultipleFiles = count($files['name']) > 1;
    if ($isMultipleFiles) {
        $datetime = new DateTime();
        $formattedDate = $datetime->format('Y-m-d_H-i-s');
        $zipFilePath = "../../downloads/converted_images/zooptools_images_$formattedDate.zip";
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE) !== true) {
            echo json_encode(['msg' => 'Failed to create ZIP file', 'status' => 500]);
            exit;
        }
    }

    for ($i = 0; $i < count($files['name']); $i++) {
        $tempName = $files['tmp_name'][$i];
        $fileName = basename($files['name'][$i]);
        $fileExtension = $files['type'][$i] === 'image/jpeg' ? 'image/jpg' : $files['type'][$i];
        $desiredFormat = 'image/' . $_POST['format'];
        $originalFormat = 'image/' . $_POST['from'];

        if ($files['error'][$i] !== 0) {
            echo json_encode(['msg' => 'Invalid file upload', 'status' => 403]);
            continue;
        }

        if ($originalFormat !== $fileExtension) {
            echo json_encode(['msg' => "Uploaded file is not a $originalFormat type. Found: $fileExtension", 'status' => 403]);
            continue;
        }

        $conversionResult = convertImage($tempName, $_POST['format'], $fileName);
        if (!$conversionResult['success']) {
            echo json_encode(['msg' => 'Failed to convert image', 'status' => 403]);
            continue;
        }

        $convertedFilePath = $conversionResult['filename'];
        if ($isMultipleFiles) {
            $zip->addFile($convertedFilePath, basename($convertedFilePath));
            $filetoremove[] = $convertedFilePath;
        } else {
            $zipFilePath = $convertedFilePath;
        }
    }

    if ($isMultipleFiles) {
        $zip->close();
        foreach ($filetoremove as $r) {
            unlink($r);
        }
    }

    $uniqueId = uniqid('zoop');
    $file = basename($zipFilePath);
    $image_count = count($files['name']);
    $con = mysqli_connect('localhost', 'root', '', 'zooptools');
    if ($con) {
        $query = "INSERT INTO image(`converted_image`, `unique_id`, `image_count`) VALUES('$file', '$uniqueId', $image_count)";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo json_encode([
                'status' => 200,
                'file' => basename($zipFilePath),
                'unique_id' => explode('zoop', $uniqueId)[1],
                'image_count' => count($files['name']),
            ]);
        } else {
            echo json_encode([
                'status' => 500,
            ]);
        }
    }
} else {
    echo json_encode(['msg' => 'Invalid Request', 'status' => 403]);
}

function convertImage($tempName, $format, $fileName)
{
    $imageInfo = getimagesize($tempName);
    $imageType = $imageInfo[2];
    $outputFormat = strtolower($format);
    $validFormats = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

    if (!in_array($outputFormat, $validFormats)) {
        return ['success' => false, 'msg' => 'Unsupported output format'];
    }

    $sourceImage = match ($imageType) {
        IMAGETYPE_JPEG => imagecreatefromjpeg($tempName),
        IMAGETYPE_PNG => imagecreatefrompng($tempName),
        IMAGETYPE_GIF => imagecreatefromgif($tempName),
        IMAGETYPE_BMP => imagecreatefrombmp($tempName),
        IMAGETYPE_WEBP => imagecreatefromwebp($tempName),
        default => null,
    };

    if (!$sourceImage) {
        return ['success' => false];
    }

    $outputPath = "../../downloads/converted_images/" . pathinfo($fileName, PATHINFO_FILENAME) . ".$outputFormat";

    match ($outputFormat) {
        'jpg', 'jpeg' => imagejpeg($sourceImage, $outputPath, 100),
        'png' => imagepng($sourceImage, $outputPath),
        'gif' => imagegif($sourceImage, $outputPath),
        'bmp' => imagebmp($sourceImage, $outputPath),
        'webp' => imagewebp($sourceImage, $outputPath, 100),
    };

    imagedestroy($sourceImage);
    return ['success' => true, 'filename' => $outputPath];
}
