<?php include('../layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../layout/connection.php");
        # Declare query.
        $naviera_nombre = strtolower($_POST["naviera_nombre"]);
        $query = "SELECT Buque.* 
                  FROM Buque, Naviera 
                  WHERE LOWER(Naviera.nav_nombre) 
                  LIKE '%$naviera_nombre%' 
                  AND Buque.nav_id = Naviera.nav_id;";
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