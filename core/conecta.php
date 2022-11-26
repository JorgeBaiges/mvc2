<?php

            const DSN = "mysql:dbname=agenda;host=db";
            const USUARIO = "root";
            const CLAVE = "password";

            try{
                $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
                $bd = new PDO(DSN,USUARIO,CLAVE);
                
            }catch(PDOException $e){
                print $e->getMessage();
            }