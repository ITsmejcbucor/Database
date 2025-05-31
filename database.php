<?php
// database_connect.php

// 1) Your InfinityFree DB credentials
$server   = "sql307.infinityfree.com";
$username = "if0_39127491";
$password = "Database2025";
$database = "if0_39127491_sampledb";

// 2) Attempt to connect
$conn = mysqli_connect($server, $username, $password, $database);

// 3) If connection fails, stop and print the error
if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit(1);
}

// 4) Connection succeeded: no CSS output
// You can uncomment the next line if you want a simple confirmation message:
// echo "Connected successfully.";
