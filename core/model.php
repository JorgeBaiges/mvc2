<?php
    namespace Core;

    require_once '../config/db.php';
    use const Config\DSN;
    use const Config\USER;
    use const Config\PASSWORD;

    class Model{
        protected static function db(){
            try{
                $db = new \PDO(DSN, USER, PASSWORD);
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                
            }catch(\PDOException $e){
                echo $e->getMessage();
            }
            return $db;
        }
    }
