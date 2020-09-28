<?php include('../layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../config/connection.php");
        # Declare query.
        $año = $_POST["año"];
        $año_low = $año - 1;
        $año_up = $año + 1;
        $puerto_nombre = strtolower($_POST["puerto_nombre"]);
        $query = "SELECT Atraque.fecha_atraque, Buque.*, Puerto.puerto_nombre 
                  FROM Buque, Atraque, Puerto 
                  WHERE LOWER(Puerto.puerto_nombre) LIKE '%$puerto_nombre%' 
                  AND Atraque.puerto_id = Puerto.puerto_id 
                  AND Atraque.buq_id = Buque.buq_id 
                  AND Atraque.fecha_atraque > '$año_low-12-31 23:59:59' 
                  AND Atraque.fecha_atraque < '$año_up-01-01 00:00:00' 
                  ORDER BY Atraque.fecha_atraque;";
        # Retrieve data array.
        $result = $db -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>País de registro</th>
            <th>Patente</th>
            <th>Naviera</th>
        </tr>

        <?php
            foreach ($data as $item) {
                echo "<tr>
                    <td>$item[0]</td>
                    <td>$item[1]</td>
                    <td>$item[2]</td>
                    <td>$item[3]</td>
                    <td>$item[4]</td>
                </tr>";
            }
        ?>
    </table>

<?php include('../layout/footer.html'); ?>