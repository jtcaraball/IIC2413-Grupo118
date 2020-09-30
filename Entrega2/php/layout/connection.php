<?php
    try {
        # Import connection credentials for the database.
        require('credentials.php');
        # Store de database as a variable.
        $db = new PDO("pgsql:
            dbname=$databaseName;
            host=localhost;
            port=5432;
            user=$user;
            password=$password
        ");
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: $e";
    }
?>