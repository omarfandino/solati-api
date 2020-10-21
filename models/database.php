<?php

class Database {

    // Contenedor Instancia de la clase
    private static $instance = NULL;
    public $db = NULL;

    // Constructor privado, previene la creación de objetos via new
    private function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=ideoweinc_solati_api", "ideoweinc_solati_user", "Solati123");
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    // Clone no permitido
    private function __clone() { }

    // Metodo Singleton
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
    
    // Consulta para obtener todos los usuarios
    public function getAllUsers()    {
        $sql_leer = "SELECT * FROM usuarios";
        $sentencia_leer = $this->db->prepare($sql_leer);
        $sentencia_leer->execute();
        $resultados = $sentencia_leer->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // Consulta individual, para obtener un usuario en especifico
    public function getUser( $id )    {
        $sql_unico = "SELECT * FROM usuarios WHERE us_id=?";
        $sentencia_leer_unico = $this->db->prepare($sql_unico);
        $sentencia_leer_unico->execute(array(
            $id
        ));
        $resultado_unico = $sentencia_leer_unico->fetch(PDO::FETCH_ASSOC);
        return $resultado_unico;
    }

    // Metodo para insertar un usuario en base de datos, requiere de un objeto JSON tipo POST
    public function insertUser( $input )    {
        $sql_agregar = "INSERT INTO usuarios (us_nombre, us_edad, us_cargo) VALUES (?, ?, ?)";
        $sentencia_agregar = $this->db->prepare($sql_agregar);
        $sentencia_agregar->execute(array(
            $input["us_nombre"],
            $input["us_edad"],
            $input["us_cargo"]
        ));
        $newUser = $this->db->lastInsertId();
        if ($newUser) {
            $resultado["id"] = $newUser;
            $resultado["mensaje"] = "Nuevo usuario registrado!";
        } else {
            $resultado["mensaje"] = "ERROR: Usuario NO registrado!";
        }
        return $resultado;
    }

    // Metodo para actualizar un usuario en base de datos, requiere de un objeto JSON tipo GET
    public function updateUser( $input )    {
        $sql_editar = "UPDATE usuarios SET us_nombre=?, us_edad=?, us_cargo=? WHERE us_id=?";
        $sentencia_editar = $this->db->prepare($sql_editar);
        $editUser = $sentencia_editar->execute(array(
            $input["us_nombre"],
            $input["us_edad"],
            $input["us_cargo"],
            $input["us_id"]
        ));
        if ($editUser) {
            $resultado["id"] = $input["us_id"];
            $resultado["mensaje"] = "Usuario actualizado!";
        } else {
            $resultado["mensaje"] = "ERROR: Usuario NO actualizado!";
        }
        return $resultado;
    }

    // Metodo para eliminar un usuario en base de datos, requiere de un ID enviado por GET
    public function deleteUser( $id )    {
        $sql_eliminar = "DELETE FROM usuarios WHERE us_id=?";
        $sentencia_eliminar = $this->db->prepare($sql_eliminar);
        $deleteUser = $sentencia_eliminar->execute(array(
            $id
        ));
        if ($deleteUser) {
            $resultado["id"] = $id;
            $resultado["mensaje"] = "Eliminado!";
        } else {
            $resultado["mensaje"] = "ERROR: Usuario NO eliminado!";
        }
        return $resultado;
    }
}

?>