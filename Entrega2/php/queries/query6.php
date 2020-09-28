<?php include('../layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../config/connection.php");
        # Declare query.
        $query = "SELECT Personal.buq_id, Buque.buq_nombre, BuquePesquero.tipo_pesca, COUNT(Personal.buq_id) 
                  FROM Personal, BuquePesquero, Buque 
                  WHERE Personal.buq_id = BuquePesquero.buq_id 
                  AND Personal.buq_id = Buque.buq_id 
                  GROUP BY Buque.buq_nombre, Personal.buq_id, BuquePesquero.tipo_pesca 
                  HAVING COUNT(Personal.buq_id) = 
                    (SELECT MAX(maximo.valor) 
                    FROM 
                        (SELECT Personal.buq_id, COUNT(Personal.buq_id) AS valor 
                        FROM Personal, BuquePesquero 
                        WHERE Personal.buq_id = BuquePesquero.buq_id  
                        GROUP BY Personal.buq_id) 
                    AS maximo);";
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