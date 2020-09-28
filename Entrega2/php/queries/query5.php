<?php include('../layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../layout/connection.php");
        # Declare query.
        # Catch if the gender field is left unanswered.
        try {
            $genero = strtolower($_POST["genero"]);
        } catch (Exception $e) {
            # In case it is return an empty table.
            $genero = " ";
        }
        $puerto_nombre = strtolower($_POST["puerto_nombre"]);
        $query = "SELECT Personal.* 
                  FROM Personal, Atraque, Puerto 
                  WHERE Atraque.puerto_id = Puerto.puerto_id 
                  AND LOWER(Personal.genero) LIKE '%$genero%' 
                  AND LOWER(Personal.cargo) = 'capitan' 
                  AND Atraque.buq_id = Personal.buq_id 
                  AND LOWER(Puerto.puerto_nombre) LIKE '%$puerto_nombre%';";
        # Retrieve data array.
        $result = $db -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nacionalidad</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Pasaporte</th>
            <th>Cargo</th>
            <th>Buque</th>
        </tr>

        <?php
            foreach ($data as $item) {
                echo "<tr>
                    <td>$item[0]</td>
                    <td>$item[1]</td>
                    <td>$item[2]</td>
                    <td>$item[3]</td>
                    <td>$item[4]</td>
                    <td>$item[5]</td>
                    <td>$item[6]</td>
                    <td>$item[7]</td>
                    <td>$item[8]</td>
                </tr>";
            }
        ?>
    </table>

<?php include('../layout/footer.html'); ?>