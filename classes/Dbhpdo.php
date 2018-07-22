<?php

class Dbhpdo{

        private  $databaseHost;
        private  $databaseName;
        private  $databaseUsername;
        private  $databasePassword;
        private  $charset;

        protected function connection (){
                $this->databaseHost     = 'localhost';
                $this->databaseName     = 'test';
                $this->databaseUsername = 'root';
                $this->databasePassword = '';
                $this->charset          = 'utf8mb4';

                try {
                    $Conn = new PDO("mysql:host={$this->databaseHost};dbname={$this->databaseName}", $this->databaseUsername, $this->databasePassword);
                    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $Conn;
                } catch(PDOException $e) {
                    echo "connection failed" . $e->getMessage();
                }

        }
}
