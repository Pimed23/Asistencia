<?php include 'AccesoDatos/Mysql.php' ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Asistencia | Login</title>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/all-plugins.js"></script>
        <script type="text/javascript" src="js/plugins-activate.js"></script>
        <script type="text/javascript" src="js/seccion.js"></script>

        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
        </script>

        <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
        <link href="css/estilos.css" rel=stylesheet>

    </head>
    <body>
        <div class="container">
            <div class="form_top">
                <h2>Lista de Asistencia</h2>
                <?php $mysql = new Mysql(); $mysql->dbConnect(); ?>
                <?php $data = $mysql->selectAll('Asistencia'); ?>
                <?php $asistencias = $data ?>
                <table style="width:100%">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Asistencia</th>
                    </tr>
                    <?php foreach($asistencias as $asistencia): ?>
                    <tr>
                        <td><?php echo $asistencia->getEstudiante()->getNombre(); ?></td>
                        <td><?php echo $asistencia->getEstudiante()->getApellido(); ?></td>
                        <td><?php echo $asistencia->getEstudiante()->getCorreo(); ?></td>
                        <td><?php echo $asistencia->getControl(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        </div>
    </body>
    <script type="text/javascript" src="js/mostrarCurso.js"></script>

</html>
