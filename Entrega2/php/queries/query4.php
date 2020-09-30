<?php include('../layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../layout/connection.php");
        # Declare query.
        $buque_nombre = strtolower($_POST["buque_nombre"]);
        $puerto_nombre = strtolower($_POST["puerto_nombre"]);
        $query = "SELECT Buque.*, Atraque.puerto_id 
                  FROM (
                    SELECT Atraque.* 
                    FROM Buque, Puerto, Atraque 
                    WHERE LOWER(Puerto.puerto_nombre) LIKE '%$puerto_nombre%'
                    AND Atraque.puerto_id = Puerto.puerto_id
                    AND LOWER(Buque.buq_nombre) LIKE '%$buque_nombre%'
                    AND Atraque.buq_id = Buque.buq_id
                  ) 
                  AS Foo, Buque, Atraque 
                  WHERE (
                        ((Atraque.fecha_atraque >= Foo.fecha_atraque AND Atraque.fecha_atraque <= Foo.fecha_salida) 
                        OR 
                        (Atraque.fecha_salida >= Foo.fecha_atraque AND Atraque.fecha_salida <= Foo.fecha_salida)) 
                    OR 
                        ((Atraque.fecha_atraque <= Foo.fecha_atraque AND Atraque.fecha_salida >= Foo.fecha_salida) 
                        OR 
                        (Atraque.fecha_atraque >= Foo.fecha_atraque AND Atraque.fecha_salida <= Foo.fecha_salida))
                  ) 
                  AND Atraque.buq_id <> Foo.buq_id
                  AND Atraque.puerto_id = Foo.puerto_id 
                  AND Buque.buq_id = Atraque.buq_id;";
        # Retrieve data array.
        $result = $db -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Patente</th>
            <th>Naviera</th>
            <th>País de registro</th>
            <th>Puerto ID</th>
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
                </tr>";
            }
        ?>
    </table>

<?php include('../layout/footer.html'); ?>