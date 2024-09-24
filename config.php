<?php
$conn = new mysqli("localhost", "root", "", "comment_database");

if (!$conn) {
    echo "Connection failed";
    exit;
}
