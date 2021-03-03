<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Studio {
            private $_id;
            private $_studioName;
         
            
            private $_pdo;
            
            public function __construct(  $studioName = null,$id = null ){
               
                $this->_studioName = $studioName;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function getAllStudio(){
                try {
                    $sql = 'SELECT * FROM `studio` ;';
                       // préparation de la requête
                       $sth = $this->_pdo->query($sql);
                       $listStudio = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listStudio;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }

            public function addStudio(){
                try {
                    $sql = 'INSERT INTO `studio` ( studioName) VALUE ( :studioName);';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':studioName',$this->_studioName, PDO::PARAM_STR);
                   
                    return $sth->execute();
                } catch  (PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                    return false;
                } 
            }
        }