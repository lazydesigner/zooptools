<?php
// server.php
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);
    $url = $data['url'];

    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo json_encode(['error' => 'Invalid URL']);
        exit;
    }

    // Fetch the website's HTML content
    $html = @file_get_contents($url);
    if ($html === false) {
        echo json_encode(['error' => 'Failed to fetch website content']);
        exit;
    }

    // Extract CSS from inline <style> tags
    preg_match_all('/<style.*?>(.*?)<\/style>/is', $html, $inlineStyles);

    // Extract external CSS files
    preg_match_all('/<link.*?href=["\'](.*?\.css)["\'].*?>/is', $html, $externalStyles);

    $allStyles = $inlineStyles[1];
    foreach ($externalStyles[1] as $cssUrl) {
        if (strpos($cssUrl, 'http') === false) {
            $cssUrl = rtrim($url, '/') . '/' . ltrim($cssUrl, '/');
        }
        $cssContent = @file_get_contents($cssUrl);
        if ($cssContent !== false) {
            $allStyles[] = $cssContent;
        }
    }

    // Combine all styles into a single string
    $css = implode(' ', $allStyles);

    // Extract color codes using regex
    preg_match_all('/#([a-f0-9]{3,6})\b|rgba?\((.*?)\)|\b[a-z]+\b/i', $css, $matches);
    $colors = array_unique($matches[0]); // Remove duplicates

    // Filter out invalid named colors (e.g., CSS property names matching the regex)
    $validColors = array_filter($colors, function($color) {
        // Check if it's a hex, rgb, rgba, or valid named color
        return preg_match('/^#([a-f0-9]{3}|[a-f0-9]{6})$/i', $color) || 
               preg_match('/^rgba?\((\d{1,3},\s?){2,3}\d{1,3}\)$/i', $color) || 
               in_array(strtolower($color), [
                   'red', 'blue', 'green', 'black', 'white', 'gray', 'yellow', 
                   'purple', 'orange', 'pink', 'brown', 'lime', 'cyan', 'teal'
               ]);
    });

    echo json_encode(array_values($validColors)); // Return unique valid colors
    exit;
}
