<?php

    class Login{
        /**
         * 1- preparar la consulta -> prepare
         * 2- establecer el modo de recuperacion: FETCH_CLASS, FETCH_ASSOC
         * 3- ejecutar la consulta -> execute
         * 4- recuperar los registros: fetch (un registro) / fetchAll (devuelve los registros)
         */
        
        protected $nombreusu = null;
        protected $password = null;
        
        public static function all(){
            $dsn = "mysql:host=db;dbname=demo";
            $usuario = "dbuser";
            $password = "secret";

            try{
                $db = new PDO($dsn, $usuario, $password);
                $sentencia = $db->prepare("SELECT * FROM credenciales");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sentencia->setFetchMode(PDO::FETCH_CLASS,"login");
                $sentencia->execute();

                $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS,"login");
                foreach($credenciales as $credencial){
                    print "<br>NOMBRE: " . $credencial->nombreusu;
                    print "<br>PASSWORD: " . $credencial->password;
                }


                /*while($obj = $sentencia->fetch()){
                    print "<br>NOMBRE: " . $obj->nombreusu;
                    print "<br>PASSWORD: " . $obj->password;
                }*/

            }catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
        }
    }

    print "<h2>Recuperando registros</h2>";
    Login::all();