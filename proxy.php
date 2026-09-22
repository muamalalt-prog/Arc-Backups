<?php
// proxy.php
// A simple PHP proxy to fetch websites and bypass CORS

// 1. Allow any website (like your offline HTML file) to request data from this script
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 2. Check if a URL was provided
if (!isset($_GET['url'])) {
    http_response_code(400);
    echo json_encode(["error" => "No URL provided"]);
    exit;
}

$url = $_GET['url'];

// 3. Initialize cURL to fetch the website
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Follow redirects (crucial for lots of sites)
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

// 4. Spoof the User-Agent so we look like a real Windows Chrome Browser, not a PHP bot
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36");

// 5. Execute the fetch
$html = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// 6. Return the response back to your HTML Portal
if ($http_code >= 400 || $html === false) {
    http_response_code(500);
    echo json_encode([
        "error" => "Failed to fetch URL",
        "http_code" => $http_code,
        "curl_error" => $error
    ]);
} else {
    // Return the raw HTML wrapped in JSON (matches the format your HTML expects)
    echo json_encode([
        "contents" => $html
    ]);
}
?>
