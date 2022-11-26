<?php
    class App{

        public function run(){
            session_start();
            if(isset($_GET['method'])){
                $metodo = $_GET['method'];
            }else{
                $metodo = 'login';   
            }

            $this->$metodo();

        }

        public function login(){
            require_once ("../public/views/login.php");

        }

        public function home(){
            if(isset($_SESSION["user"])){
                //SI EXISTE USUARIO EN LA SESION ENTRARA AL HOME
                require_once ("../public/views/home.php");

            }else{

                header("Location: ?method=login");
            }
            
        }

        public function addPerson(){

            require_once ("../public/views/addPerson.php");

        }

        public function removePerson(){

            require_once ("../public/views/removePerson.php");

        }

        public function selectPerson(){

            require_once ("../public/views/selectPerson.php");

        }

        public function updatePerson(){

            require_once ("../public/views/updatePerson.php");

        }

        public function addEmpresa(){

            require_once ("../public/views/addEmpresa.php");

        }

        public function removeEmpresa(){

            require_once ("../public/views/removeEmpresa.php");

        }

        public function selectEmpresa(){

            require_once ("../public/views/selectEmpresa.php");

        }

        public function updateEmpresa(){

            require_once ("../public/views/updateEmp.php");

        }

        public function credenciales(){

            require_once ("conecta.php");

            try {

                $bd = new PDO(DSN,USUARIO,CLAVE);
                $sql = "select * from credenciales";
                $registros = $bd->query($sql);

                if($registros->rowCount() > 0 ) {

                    foreach($registros as $fila){
                        //DESCIFRAR LA CONTRASENIA
                        $descifrar = password_verify($_POST["psword"], $fila["password"]);

                        if($fila["usuario"] == $_POST["user"]) {

                            if( $descifrar == true ) {
                                //CREAR EL USUARIO EN SESION Y SE INJECTAN LAS TABLAS XML
                                $_SESSION["user"] = $_POST["user"];
                                $this->addEmpresaXml();
                                $this->addUsuarioXml();
                                header ("Location: ?method=home");

                            } else {
    
                                header("Location: ?method=login");
    
                            } 

                        } else {

                            header("Location: ?method=login");
                        }
                        
                    }

                } else {

                    header("Location: ?method=login");
                }

            } catch (PDOException $e) {

                header("Location: ?method=login");
            }   
        }
        
        public function inUser($name, $surname, $direction, $telefono){
            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);

            if( $name == '' ) {
                return false;
            }

            if( $surname == '' ) {
                return false;
            }

            if( $direction == '' ) {
                return false;
            }

            if( $telefono == '' ) {
                return false;
            }

            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sentencia = $bd->prepare("INSERT INTO persona (Nombre,Apellidos,Direccion,Telefono) VALUES (?,?,?,?)");

            $sentencia->bindParam(1, $name);
            $sentencia->bindParam(2, $surname);
            $sentencia->bindParam(3, $direction);
            $sentencia->bindParam(4, $telefono);
            
            $sentencia->execute();

            return $sentencia;
            
            
        }

        public function postUser(){
            
            $name = $_POST["username"];
            $surname = $_POST["surname"];
            $direction = $_POST["direction"];
            $telefono = $_POST["telefono"];
            /*$ficheroNombre = $_FILES["fichero"]["name"]; //Nombre
            $ficheroTmpNombre = $_FILES["fichero"]["tmp_name"]; //Contenido

            //TODO: METER EN SESSION LA RUTA 
            $pathUpload = "../public/uploads/". $ficheroNombre;

            try{
                $resultFile = move_uploaded_file ( $ficheroTmpNombre , $pathUpload );
            } catch (Exception $e) {
                $resultFile = false;
            }*/

            $resultBD = $this->inUser( $name , $surname, $direction, $telefono );

            if($resultBD){

                /*$URLPath = 'http://mvc.local/uploads/'. $ficheroNombre;
                $_SESSION['img']['persona'][$name] = $URLPath;*/

                header("Location: ?method=home");

            } else {
                //DEVOLVERA UN ERROR
                header("Location: ?method=addPerson&result=NOK");

            }
            
        }

        public function findUser(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["nombre"] = $_POST["nombre"];
            $id = $_SESSION["nombre"];
            $sql = "SELECT * FROM persona WHERE Nombre='$id'";
            $registros = $bd->query($sql);
            
            if( $registros->rowCount() > 0 ) {

                foreach($registros as $fila) {

                    print "Usuario encontrado: " . $fila["Nombre"] . " " . $fila["Apellidos"] . "  /Direccion:" . $fila["Direccion"] . "  /Telefono:" . $fila["Telefono"];

                }

            } else {

                header("Location: ?method=selectPerson");

            }
        }

        public function findAll(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $sql = "SELECT * FROM persona";
            $registros = $bd->query($sql);
            
            if( $registros->rowCount() > 0) {

                foreach($registros as $fila) {

                    print "<br>Nombre: " . $fila["Nombre"] . " " . $fila["Apellidos"] . "  /Direccion:" . $fila["Direccion"] . "  /Telefono:" . $fila["Telefono"];

                }
            }
        }

        public function removeUser(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["username"] = $_POST["username"];
            $user = $_SESSION["username"];
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT Nombre FROM persona WHERE Nombre='$user'";
            $registros = $bd->query($sql);

            if( $registros->rowCount() > 0) {

                $sentencia = $bd->prepare("DELETE FROM persona WHERE Nombre='$user'");
                $sentencia->bindParam(1, $user);
                $sentencia->execute();
                header("Location: ?method=home");

            }else{

                header("Location: ?method=removePerson");

            }
        }

        public function updateUser(){
            
            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["nombre"] = $_POST["nombre"];
            $user = $_SESSION["nombre"];
            $_SESSION["nombreNuevo"] = $_POST["nombreNuevo"];
            $newUser = $_SESSION["nombreNuevo"];
            $_SESSION["apellidoNuevo"] = $_POST["apellidoNuevo"];
            $newSurname = $_SESSION["apellidoNuevo"];
            $_SESSION["direccionNueva"] = $_POST["direccionNueva"];
            $newDirection = $_SESSION["direccionNueva"];
            $_SESSION["telefonoNuevo"] = $_POST["telefonoNuevo"];
            $newPhone = $_SESSION["telefonoNuevo"];
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT Nombre FROM persona WHERE Nombre='$user'";
            $registros = $bd->query($sql);

            if( $registros->rowCount() > 0) {

                $sentencia = $bd->prepare("UPDATE persona SET Nombre='$newUser',Apellidos='$newSurname',Direccion='$newDirection',Telefono='$newPhone' WHERE Nombre='$user'");
                $sentencia->bindParam(1, $newUser);
                $sentencia->bindParam(2, $newSurname);
                $sentencia->bindParam(3, $newDirection);
                $sentencia->bindParam(4, $newPhone);
                $sentencia->execute();
                header("Location: ?method=home");

            } else {

                header("Location: ?method=updateUser");

            }

        }

        public function inEmp($empName, $direccion, $telefono, $email){
            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);

            if( $empName == '' ) {
                return false;
            }

            if( $direccion == '' ) {
                return false;
            }

            if( $telefono == '' ) {
                return false;
            }

            if( $email == '' ) {
                return false;
            }

            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sentencia = $bd->prepare("INSERT INTO empresa (Nombre,Direccion,Telefono,email) VALUES (?,?,?,?)");

            $sentencia->bindParam(1, $empName);
            $sentencia->bindParam(2, $direccion);
            $sentencia->bindParam(3, $telefono);
            $sentencia->bindParam(4, $email);
            
            $sentencia->execute();
            
            return $sentencia;

        }

        public function removeEmp(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["empname"] = $_POST["empname"];
            $user = $_SESSION["empname"];
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT Nombre FROM empresa WHERE Nombre='$user'";
            $registros = $bd->query($sql);

            if( $registros->rowCount() > 0) {

                $sentencia = $bd->prepare("DELETE FROM empresa WHERE Nombre='$user'");
                $sentencia->bindParam(1, $user);
                $sentencia->execute();
                header("Location: ?method=home");

            }else{

                header("Location: ?method=removeEmpresa");
            }
        }

        public function findEmp(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["nombre"] = $_POST["nombre"];
            $id = $_SESSION["nombre"];
            $sql = "SELECT * FROM empresa WHERE Nombre='$id'";
            $registros = $bd->query($sql);
            
            if( $registros->rowCount() > 0) {

                foreach($registros as $fila) {

                    print "<br>Usuario encontrado: Nombre: " . $fila["Nombre"] . "  /Direccion:" . $fila["Direccion"] . "  /Telefono:" . $fila["Telefono"] . $fila["email"];;
                }

            } else {

                header("Location: ?method=selectEmpresa");
            }
        }

        public function findAllEmp(){

            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $id = $_SESSION["nombre"];
            $sql = "SELECT * FROM empresa";
            $registros = $bd->query($sql);
            
            if($registros->rowCount() > 0 ){

                foreach($registros as $fila) {

                    print "<br>Nombre: " . $fila["Nombre"] . "  /Direccion:" . $fila["Direccion"] . "  /Telefono:" . $fila["Telefono"] . $fila["email"];

                }

            } else {

                header("Location: ?method=selectEmpresa");
            }
        }

        public function updateEmp(){
            
            require_once ("conecta.php");
            $bd = new PDO(DSN,USUARIO,CLAVE);
            $_SESSION["nombreOld"] = $_POST["nombreOld"];
            $emp = $_SESSION["nombreOld"];
            $_SESSION["nombreNuevo"] = $_POST["nombreNuevo"];
            $newEmp = $_SESSION["nombreNuevo"];
            $_SESSION["direccionNueva"] = $_POST["direccionNueva"];
            $newDirection = $_SESSION["direccionNueva"];
            $_SESSION["telefonoNuevo"] = $_POST["telefonoNuevo"];
            $newTelefono = $_SESSION["telefonoNuevo"];
            $_SESSION["emailNuevo"] = $_POST["emailNuevo"];
            $newEmail = $_SESSION["emailNuevo"];
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT Nombre FROM empresa WHERE Nombre='$emp'";
            $registros = $bd->query($sql);

            if( $registros->rowCount() > 0) {

                $sentencia = $bd->prepare("UPDATE empresa SET Nombre='$newEmp',Direccion='$newDirection',Telefono='$newTelefono',email='$newEmail' WHERE Nombre='$emp'");
                $sentencia->bindParam(1, $newUser);
                $sentencia->bindParam(2, $newDirection);
                $sentencia->bindParam(3, $newTelefono);
                $sentencia->bindParam(4, $newEmail);
                $sentencia->execute();
                header("Location: ?method=home");

            } else {

                header("Location: ?method=updateEmp");

            }

        }

        public function xmlToArray($xmlPath){

            if(file_exists($xmlPath)) {

                $strXml = file_get_contents($xmlPath);
                $arrayXml = new SimpleXMLElement($strXml);

                if(count($arrayXml) > 0) {

                    return $arrayXml;

                } else {

                    return false;
                }

            } else { 

                return false;
            }
        }

        public function addEmpresaXml(){

            //TODO: METER EN SESION LA RUTA;
            $arrayXml = $this->xmlToArray("../datosNecesarios/agenda.xml"); 

            if($arrayXml != false) {

                foreach( $arrayXml->contacto as $contacto ) {
				
                    if( $contacto['tipo'] == 'empresa' ) {

                        $nombre = $contacto->nombre;
                        $direccion = $contacto->direccion;
                        $telefono = $contacto->telefono;
                        $email = $contacto->email;

                        $this->inEmp($nombre, $direccion, $telefono, $email);

                    }
                    
                }

            }

        }

        public function addUsuarioXml(){

            $arrayXml = $this->xmlToArray("../datosNecesarios/agenda.xml"); 

            if($arrayXml != false){

                foreach( $arrayXml->contacto as $contacto ) {
				
                    if( $contacto['tipo'] == 'persona' ) {
                        
                        $nombre = $contacto->nombre;
                        $apellidos = $contacto->apellidos;
                        $direction = $contacto->direccion;
                        $telefono = $contacto->telefono;
                        $this->inUser($nombre, $apellidos, $direction, $telefono);

                    }
                    
                }

            }

        }


        public function postEmpresa(){
            
            $empName = $_POST["empname"];
            $direccion = $_POST["direction"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];
            /*$ficheroNombre = $_FILES["fichero"]["name"]; //Nombre
            $ficheroTmpNombre = $_FILES["fichero"]["tmp_name"]; //Contenido

            //TODO: METER EN SESSION LA RUTA 
            $pathUpload = "../public/uploads/". $ficheroNombre;

            try{
                $resultFile = move_uploaded_file ( $ficheroTmpNombre , $pathUpload );
            } catch (Exception $e) {
                $resultFile = false;
            }*/

            $resultBD = $this->inEmp( $empName , $direccion, $telefono, $email );

            if($resultBD){

                /*$URLPath = 'http://mvc.local/uploads/'. $ficheroNombre;
                $_SESSION['img']['empresa'][$empName] = $URLPath;*/

                header("Location: ?method=home");

            } else {

                header("Location: ?method=addEmpresa&result=NOK");

            }
            
        }

}