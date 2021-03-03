<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Platform {
            private $_id;
            private $_platform;
         
            
            private $_pdo;
            
            public function __construct(  $platform = null,$id = null ){
               
                $this->_platform = $platform;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function getAllPlatform(){
                try {
                    $sql = 'SELECT * FROM `platform` ;';
                       // préparation de la requête
                       $sth = $this->_pdo->query($sql);
                       $listplat= $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listplat;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
        }