<?php

include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'error' => 'No image uploaded or upload error.']);
        exit;
    }

    $width = isset($_POST['width']) ? intval($_POST['width']) : null;
    $height = isset($_POST['height']) ? intval($_POST['height']) : null;

    if (!$width || !$height) {
        echo json_encode(['success' => false, 'error' => 'Invalid dimensions provided.']);
        exit;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    $fileType = mime_content_type($_FILES['image']['tmp_name']);

    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPEG, PNG, and WEBP are allowed.']);
        exit;
    }

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $originalFileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $originalFilePath = $uploadDir . $originalFileName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $originalFilePath)) {
        echo json_encode(['success' => false, 'error' => 'Failed to save uploaded image.']);
        exit;
    }

    // Load the uploaded image
    switch ($fileType) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($originalFilePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($originalFilePath);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($originalFilePath);
            break;
        default:
            echo json_encode(['success' => false, 'error' => 'Unsupported image type.']);
            exit;
    }

    // Create a new resized image
    $resizedImage = imagescale($image, $width, $height);

    if (!$resizedImage) {
        echo json_encode(['success' => false, 'error' => 'Failed to resize the image.']);
        exit;
    }

    // Apply filters to enhance the image
    imagefilter($resizedImage, IMG_FILTER_BRIGHTNESS, 10);  // Adjust brightness
    imagefilter($resizedImage, IMG_FILTER_CONTRAST, -5);    // Adjust contrast
    imagefilter($resizedImage, IMG_FILTER_SMOOTH, 5);       // Reduce noise
    imagefilter($resizedImage, IMG_FILTER_EDGEDETECT);      // Sharpen edges

    // Save the enhanced image
    $enhancedFileName = 'enhanced_' . $originalFileName;
    $enhancedFilePath = $uploadDir . $enhancedFileName;

    switch ($fileType) {
        case 'image/jpeg':
            imagejpeg($resizedImage, $enhancedFilePath, 90); // High quality
            break;
        case 'image/png':
            imagepng($resizedImage, $enhancedFilePath, 8);   // Optimal compression
            break;
        case 'image/webp':
            imagewebp($resizedImage, $enhancedFilePath, 90); // High quality
            break;
    }

    // Free memory
    imagedestroy($image);
    imagedestroy($resizedImage);

    // Delete the original file (optional)
    unlink($originalFilePath);

    echo json_encode(['success' => true, 'filePath' => $enhancedFilePath]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
