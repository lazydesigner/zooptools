<?php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php'; 

$filenames = base64_decode($_GET['filename']);

$filePath = "../downloads/converted_images/" . $filenames;

// if (file_exists($filePath)) {
//     return $this->response->download($filePath, null, true)
//         ->setHeader('Content-Type', mime_content_type($filePath))
//         ->setHeader('Content-Disposition', 'attachment; filename="' . $filenames . '"')
//         ->setHeader('Content-Length', filesize($filePath));
// } else {

//     // header ('Location');
// }
  

// Check if the file exists
if (file_exists($filePath)) {
    // Get the file's content type
    $fileInfo = mime_content_type($filePath); // Example: 'application/pdf'

    // Get the file's basename
    $fileName = basename($filePath);

    // Set headers
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $fileInfo);
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . filesize($filePath));
    header('Pragma: public');
    header('Cache-Control: must-revalidate');

    // Clear the output buffer
    ob_clean();
    flush();

    // Read and output the file
    readfile($filePath);
    header('Location:'.base_url().'');

    exit; // Stop further execution
} else {
    header('Location:'.base_url().'');
}
?>
