<?php
$server = "jcbdatabase2025.free.nf";
$username = "if0_39127491_sampledb";
$password = "Database2025";
$database = "if0_39127491_sampledb";

$conn = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("failed", mysqli_connect_error());
    exit(1);
}
echo '<span style="display:inline-block; width:12px; height:12px; background-color:green; border-radius:50%;"></span>';
