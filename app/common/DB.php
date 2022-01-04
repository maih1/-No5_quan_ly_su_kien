<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "no5";
<<<<<<< HEAD

=======
>>>>>>> 95abc06530d83d1339c813e414c29c3a51a002b0
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>