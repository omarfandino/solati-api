<?php
    
    /*
    * Adicionamos el modelo, aqui trabajaremos solo la parte de base de datos
    */
    require_once 'models/database.php';

    /*
    * Generamos la instancia una sola vez, para esto nos ayudamos con el patron Singleton
    */
    $pdo = Database::getInstance();

    /*
    * Adicionamos la rutas generadas para nuestro API (CRUD)
    */
    require_once 'controllers/routes.php';

    // Rutas generadas
    /*
     * Consultar todos los usuarios
     * GET | http://solati.ideoweinc.com/
    */

    /*
     * Consultar usuario especifico dependiendo su ID
     * GET | http://solati.ideoweinc.com/?us_id=1
    */

    /*
     * Crear un nuevo Usuario
     * POST | http://solati.ideoweinc.com/
     * Cargar via POST los siguientes datos y en el mismo orden
     * {
     *      "us_nombre":"Omar",
     *      "us_edad":"28",
     *      "us_cargo":"Desarrollo"
     * }
    */

    /*
     * Editar un nuevo Usuario existente por su ID
     * Cargar via GET los siguientes datos
     * PUT | http://solati.ideoweinc.com/?us_nombre=<NOMBRE>&us_edad=<EDAD>&us_cargo=<CARGO>&us_id=<ID>
    */

    /*
     * Eliminar usuario especifico dependiendo su ID
     * DELETE | http://solati.ideoweinc.com/?us_id=1
    */

?>
