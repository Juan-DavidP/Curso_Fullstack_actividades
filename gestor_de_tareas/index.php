<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("tareas.txt")) {
    //Leer la informacion almacenada previamente
    $strJson = file_get_contents("tareas.txt");

    //convertir la informacion tipo JSON y almacenarla en el array
    $aTareas = json_decode($strJson, true);
} else {
    //Si el archivo no existe crearemos el archivo y el array 
    curl_file_create("tareas.txt");
    $aTareas = array();
}

if ($_POST) {
    //Si la informacion viene por el metodo POST la almacenaremos en variables
    $prioridad = $_POST["slctPrioridad"];
    $estado = $_POST["slctEstado"];
    $usuario = $_POST["txtUsuario"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtaDescripcion"];

    if (isset($_GET["editar"]) && $_GET["editar"] >= 0) {

        //donde se va a editar
        $pos = $_GET["editar"];
        //editar una tarea existente
        $aTareas[$pos] = array(
            "prioridad" => $prioridad,
            "fecha" => date("d/m/Y"),
            "estado" => $estado,
            "usuario" => $usuario,
            "titulo" => $titulo,
            "descripcion" => $descripcion,

        );
        
    } else {
        //Si no es una tarea existente creo una nueva tarea
        $aTareas[] = array(
            "prioridad" => $prioridad,
            "fecha" => date("d/m/Y"),
            "estado" => $estado,
            "usuario" => $usuario,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    }

    //convertir el array en un objeto tipo JSON
    $strJson = json_encode($aTareas, true);

    //Almacenar el JSON en tareas.txt
    file_put_contents("tareas.txt", $strJson);
}

if (isset($_GET["eliminar"]) && $_GET["eliminar"] >= 0) {
    //Tomar la posicion que se va a eliminar
    $pos = $_GET["eliminar"];

    //eliminar la posicion
    unset($aTareas[$pos]);

    //convertir el array en Json para su posterior envio al archivo y asi validar la eliminacion
    $strJson = json_encode($aTareas, true);
    file_put_contents("tareas.txt", $strJson);
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>Gestor de tareas</title>
</head>

<body>
    <main class="container">
        <div class="col-12">
            <div class="row">
                <h1 class="text-center py-5">Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-4">
                    <label for="slctPrioridad">Prioridad</label>
                    <select name="slctPrioridad" id="slctPrioridad" class="form-control" required>
                        <?php
                        switch ($aTareas[$_GET["editar"]]["prioridad"]):
                            case 'Alta': ?>
                                <option disabled value="">Seleccionar</option>
                                <option selected value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                                <?php break; ?>
                            <?php
                            case 'Media': ?>
                                <option disabled value="">Seleccionar</option>
                                <option value="Alta">Alta</option>
                                <option selected value="Media">Media</option>
                                <option value="Baja">Baja</option>
                                <?php break; ?>
                            <?php
                            case 'Baja': ?>
                                <option disabled value="">Seleccionar</option>
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option selected value="Baja">Baja</option>
                                <?php break; ?>

                            <?php
                            default: ?>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                                <?php break; ?>
                        <?php endswitch; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Estado</label>
                    <select name="slctEstado" id="slctEstado" class="form-control" required>
                        <?php
                        switch ($aTareas[$_GET["editar"]]["estado"]):
                            case 'por empezar': ?>
                                <option disabled value="">seleccionar</option>
                                <option selected value="por empezar">Por empezar</option>
                                <option value="Pediente">Pediente</option>
                                <option value="terminado">Terminado</option>
                                <?php break; ?>
                            <?php
                            case 'pendiente': ?>
                                <option value="" disabled>Seleccionar</option>
                                <option value="por empezar">Por empezar</option>
                                <option selected value="Pediente">Pediente</option>
                                <option value="terminado">Terminado</option>
                                <?php break; ?>
                            <?php
                            case 'terminado': ?>
                                <option value="" disabled>Seleccionar</option>
                                <option value="por empezar">Por empezar</option>
                                <option value="Pediente">Pediente</option>
                                <option selected value="terminado">Terminado</option>
                                <?php break; ?>

                            <?php
                            default: ?>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="por empezar">Por empezar</option>
                                <option value="Pediente">Pediente</option>
                                <option value="terminado">Terminado</option>
                                <?php break; ?>
                        <?php endswitch; ?>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Usuario</label>
                    <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aTareas[$_GET["editar"]]["usuario"] : ""; ?>" required>
                </div>
                <div class="col-12">
                    <label for="txtTitulo">Título</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aTareas[$_GET["editar"]]["titulo"] : ""; ?>" required>
                </div>
                <div class="col-12">
                    <label for="">Descripción</label>
                    <textarea name="txtaDescripcion" id="txtaDescripcion" cols="10" rows="2" class="form-control" required><?php echo isset($_GET["editar"]) && $_GET["editar"] >= 0 ? $aTareas[$_GET["editar"]]["descripcion"] : ""; ?></textarea>
                </div>
                <div class="col-5 py-2 mx-auto text-center">
                    <button type="submit" class="btn btn-primary ">Enviar</button>
                    <a href="index.php" class="btn btn-secondary ">Cancelar</a>
                </div>
        </form>
        <div class="col-12"></div>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Fecha de inserción</th>
                    <th>Título</th>
                    <th>prioridad</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    <?php

                    foreach ($aTareas as $pos => $tarea) : ?>
                        <tr>
                            <td><?php echo $pos + 1; ?></td>
                            <td><?php echo $tarea["fecha"];?></td>
                            <td><?php echo $tarea["titulo"]; ?></td>
                            <td><?php echo $tarea["prioridad"]; ?></td>
                            <td><?php echo $tarea["usuario"]; ?></td>
                            <td><?php echo $tarea["estado"]; ?></td>
                            <td><a href="?editar=<?php echo $pos; ?>" class="fa-regular fa-pen-to-square btn btn-primary" style="color: #FFFFFF;"></a></td>
                            <td><a href="?eliminar=<?php echo $pos; ?>" class="fa-solid fa-trash-can btn btn-danger" style="color: #FFFFFF;"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>