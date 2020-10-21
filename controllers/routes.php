<?php

    //Adicionamos la siguiente cabecera para que conteste en formato JSON
    header('Content-Type: application/json');

    /*
    * Condicional de las dos rutas que obtiene GET
    * 1. Consultar uno
    * 2. Consultar todos
    */
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // 1. Condicional que verifica si existe un ID, esto para consultar de forma individual 
        if (isset($_GET["us_id"])) {
            
            $id = $_GET["us_id"];
            $usuario = $pdo->getUser($id);
            echo json_encode($usuario);
            exit();
            
        } else {
            
            // 2. Por defecto si NO existe un ID, se mostraran todos los elementos de la tabla
            $usuarios = $pdo->getAllUsers();
            echo json_encode($usuarios);
            exit();

        }
    }

    // Condicional de la ruta que obtiene POST, es decir, registrar un nuevo usuario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = $_POST;
        $respuesta = $pdo->insertUser($input);
        echo json_encode($respuesta);
    }

    // Condicional de la ruta que obtiene PUT, es decir, editar un usuario
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $input = $_GET;
        $respuesta = $pdo->updateUser($input);
        echo json_encode($respuesta);
    }
    
    // Condicional de la ruta que obtiene DELETE, es decir, eliminar un usuario
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET["us_id"])) {
            $id = $_GET["us_id"];
            $respuesta = $pdo->deleteUser($id);
        } else {
            $respuesta["mensaje"] = 'Requiere un ID';
        }
        echo json_encode($respuesta);
    }
?>