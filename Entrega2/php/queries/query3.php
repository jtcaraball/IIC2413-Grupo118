<?php include('..layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../config/connection.php");
        # Declare query.
        $año = $_POST["año"];
        $puerto_nombre = strtoupper($_POST["puerto_nombre"]);
        $query = "";
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
            <th>ID de Naviera</th>
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