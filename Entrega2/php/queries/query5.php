<?php include('..layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../config/connection.php");
        # Declare query.
        $genero = strtoupper($_POST["genero"]);
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
            <th>Nacionalidad</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Pasaporte</th>
            <th>Cargo</th>
            <th>ID de Buque</th>
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