<?php
header('Content-Type: application/json');

$file = __DIR__ . '/data/geotags.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate required fields
    $required = ['title', 'description', 'latitude', 'longitude', 'city', 'author', 'zipcode'];
    foreach ($required as $field) {
        if (empty($data[$field])) {
            echo json_encode(['status' => 'error', 'message' => "Missing field: $field"]);
            exit;
        }
    }

    // Load existing data
    $geotags = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // Add a new geotag
    $geotags[] = $data;

    // Save to file
    file_put_contents($file, json_encode($geotags, JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'success', 'message' => 'Geotag added successfully!']);
    exit;
}

// Retrieve all geotags
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $geotags = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    echo json_encode($geotags);
    exit;
}
?>
