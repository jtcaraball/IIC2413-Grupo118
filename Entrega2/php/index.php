<?php include('layout/header.html') ?>

<!-- 
    IMPORTANTE: No esta implementado un sistema de catch para formas mal enviadas
    como por ejemplo si se enviase una celda sin completar o un checkbox sin marcar.
-->

<body>

    <h1 align="center">Consultas</h1>

    <br>

    <h3 align="center">Consulta 1: Nombre de todas las navieras.</h3>
    <form align="center" action="queries/query1.php" method="post">
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 2: Buques de una naviera.</h3>
    <form align="center" action="queries/query2.php" method="post">
        <label for="naviera_name">Nombre de naviera:</label>
        <input type="text" name="naviera_name">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 3: Buques que atracan en un puerto para un año.</h3>
    <form align="center" action="queries/query3.php" method="post">
        <label for="puerto_name">Nombre del puerto:</label>
        <input type="text" name="puerto_name">
        <br/>
        <label for="naviera_name">Año:</label>
        <input type="number" name="año" min="1970" max="2099">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 4: Buques en un puerto al mismo tiempo que otro buque.</h3>
    <form align="center" action="queries/query4.php" method="post">
        <label for="puerto_name">Nombre del puerto:</label>
        <input type="text" name="puerto_name">
        <br/>
        <label for="buque_name">Nombre del buque:</label>
        <input type="text" name="buque_name">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 5: Capitanes de un genero que hayan pasado por un puerto.</h3>
    <form align="center" action="queries/query5.php" method="post">
        <label for="hombre">Mujer</label>
        <input type="radio" name="genero" value="mujer">
        <label for="hombre">Hombre</label>
        <input type="radio" name="genero" value="hombre">
        <br/>
        <label for="puerto_name">Nombre del puerto:</label>
        <input type="text" name="puerto_name">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 6: Buque con mayor cantidad de trabajadores.</h3>
    <form align="center" action="queries/query6.php" method="post">
        <input type="submit" value="Buscar">
    </form>

</body>

</html>