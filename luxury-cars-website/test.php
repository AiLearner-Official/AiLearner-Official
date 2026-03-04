<?php
echo "<h1>Testing Your Setup</h1>";
echo "<p>Current directory: " . __DIR__ . "</p>";
echo "<p>PHP Version: " . phpversion() . "</p>";

// Check CSS file
$css_path = '../assets/css/style.css';
if (file_exists($css_path)) {
    echo "<p style='color: green;'>✓ CSS file exists: $css_path</p>";
} else {
    echo "<p style='color: red;'>✗ CSS file NOT found: $css_path</p>";
    echo "<p>Looking in: " . realpath('../assets/css/') . "</p>";
}

// List files in assets/css
echo "<h2>Files in assets/css:</h2>";
$css_dir = '../assets/css/';
if (is_dir($css_dir)) {
    $files = scandir($css_dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<p>$file</p>";
        }
    }
} else {
    echo "<p style='color: red;'>Directory not found: $css_dir</p>";
}

// Check if we can access images
echo "<h2>Test Image:</h2>";
echo "<img src='https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' alt='Test car'>";

echo "<h2>Quick Fix:</h2>";
echo "<p>If CSS is not loading, try these:</p>";
echo "<ol>";
echo "<li>Check if <code>assets/css/style.css</code> exists</li>";
echo "<li>Check file permissions (should be 644)</li>";
echo "<li>Try accessing CSS directly: <a href='../assets/css/style.css'>View CSS</a></li>";
echo "</ol>";
?>