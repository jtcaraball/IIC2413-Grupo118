<?php include('layout/header.html') ?>

<!-- 
    General modeling principle taken from the Ayudantia2 web app example available at:
    https://github.com/IIC2413/Syllabus-2020-2/tree/master/Ayudantias/AY_02/example-app
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
        <label for="naviera_nombre">Nombre de naviera:</label>
        <input type="text" name="naviera_nombre">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 3: Buques que atracan en un puerto para un año.</h3>
    <form align="center" action="queries/query3.php" method="post">
        <label for="puerto_nombre">Nombre del puerto:</label>
        <input type="text" name="puerto_nombre">
        <br/>
        <label for="año">Año:</label>
        <input type="number" name="año" min="1970" max="2099" value=2020>
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 4: Buques en un puerto al mismo tiempo que otro buque.</h3>
    <form align="center" action="queries/query4.php" method="post">
        <label for="puerto_nombre">Nombre del puerto:</label>
        <input type="text" name="puerto_nombre">
        <br/>
        <label for="buque_nombre">Nombre del buque:</label>
        <input type="text" name="buque_nombre">
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
        <label for="puerto_nombre">Nombre del puerto:</label>
        <input type="text" name="puerto_nombre">
        <br/>
        <input type="submit" value="Buscar">
    </form>

    <h3 align="center">Consulta 6: Buques pesqueros con mayor cantidad de trabajadores.</h3>
    <form align="center" action="queries/query6.php" method="post">
        <input type="submit" value="Buscar">
    </form>

</body>

</html>