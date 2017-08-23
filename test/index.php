<?php
header('HTTP/1.1 200 Okay');
header('Content-type: text/plain');
header('Any-header: any-value');
session_start();
if (!isset($_SESSION['sid'])) {
    $_SESSION['sid'] = 'rand' . rand(0, 228);
} else {
    echo $_SESSION['sid'];
}
file_put_contents('php://output', 'Any data');
echo "Any data with new line\n";