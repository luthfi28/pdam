<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pdam";

    $conn = new mysqli($servername, $username, $password);
    $conn->select_db("pdam");

    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?> 