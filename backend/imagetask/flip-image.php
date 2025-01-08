<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
        ? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
        : $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'error' => 'No image uploaded or upload error.']);
        exit;
    }

    $flipType = $_POST['flipType'] ?? 'horizontal';
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    $fileType = mime_content_type($_FILES['image']['tmp_name']);

    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPEG, PNG, and GIF are allowed.']);
        exit;
    }

    $uploadDir = '../../downloads/converted_images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
        echo json_encode(['success' => false, 'error' => 'Failed to upload image.']);
        exit;
    }

    // Load the image
    switch ($fileType) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($filePath);
            break;
        case 'image/png':
            $image = imagecreatefrompng($filePath);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($filePath);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($filePath);
            break;    
        default:
            echo json_encode(['success' => false, 'error' => 'Unsupported image type.']);
            exit;
    }

    // Preserve transparency for PNG
    if ($fileType === 'image/png' || $fileType === 'image/webp') {
        imagesavealpha($image, true);
        $transparentColor = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $transparentColor);
    }

    // Flip the image
    $flipConstant = $flipType === 'horizontal' ? IMG_FLIP_HORIZONTAL : IMG_FLIP_VERTICAL;
    if (!imageflip($image, $flipConstant)) {
        echo json_encode(['success' => false, 'error' => 'Failed to flip the image.']);
        exit;
    }

    $outputFilePath = $uploadDir . 'flipped_' . $fileName;

    // Save the flipped image
    switch ($fileType) {
        case 'image/jpeg':
            imagejpeg($image, $outputFilePath);
            break;
        case 'image/png':
            imagesavealpha($image, true); // Preserve transparency in the output file
            imagepng($image, $outputFilePath);
            break;
        case 'image/gif':
            imagegif($image, $outputFilePath);
            break;
        case 'image/webp':
            imagesavealpha($image, true);
            imagewebp($image, $outputFilePath);
            break;
            
    }

    // Free memory
    imagedestroy($image);

    $uniqueId = uniqid('zoop');
    $file = basename($outputFilePath);
    $image_count = 1;

        $query = "INSERT INTO image(`converted_image`, `unique_id`, `image_count`) VALUES('$file', '$uniqueId', $image_count)";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo json_encode([
                'success' => true,
                'filePath' => $outputFilePath,
                'u' => explode('zoop', $uniqueId)[1],
                'image_count' => 1,
            ]);
            unlink($filePath);
        }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
