<?php include('..layout/header.html'); ?>

<body>
    <?php
        # Import database object.
        require("../config/connection.php");
        # Declare query.
        $query = "";
        # Retrieve data array.
        $result = $db -> prepare($query);
        $result -> execute();
        $data = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombre</th>
        </tr>

        <?php
            foreach ($data as $item) {
                echo "<tr>
                    <td>$item[1]</td>
                </tr>";
            }
        ?>
    </table>

<?php include('../layout/footer.html'); ?>