<?php
// database_connect.php

// 1) Your InfinityFree (or Free.NF) DB credentials
$server   = "jcbdatabase2025.free.nf";
$username = "if0_39127491_sampledb";
$password = "Database2025";
$database = "if0_39127491_sampledb";

// 2) Attempt to connect
$conn = mysqli_connect($server, $username, $password, $database);

// 3) If connection fails, stop and print the error
if (mysqli_connect_errno()) {
    // “failed” followed by the actual MySQL error
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit(1);
}

// 4) Connection succeeded: print a little green circle
echo '<span style="display:inline-block; width:12px; height:12px; background-color:green; border-radius:50%;"></span>';
