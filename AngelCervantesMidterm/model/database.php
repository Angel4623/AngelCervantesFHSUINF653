<?php 

    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zippyusedautos";

        try {
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            $error_message = "Database Error: ";
            $error_message .= $e->getMessage();

        }
        return $db;
    }
?>