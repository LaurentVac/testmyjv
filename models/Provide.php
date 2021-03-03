<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Picture {
            private $_id;
            
            private $_id_platform;
         
            
            private $_pdo;
            
            public function __construct(  $idGame = null, $idPlatform = null, ){
               
             
                $this->_id_game = $idGame;
                $this->_id_platform= $idPlatform;
                $this->_pdo = Database::connect();
            }

            public function addPlatformForGame($idGame,$idPlatform){
                try {
                    $sql = 'INSERT INTO `provide` (id, id_platform) VALUE ( :id , :id_platform);';
                    $sth = $this->_pdo->prepare($sql);
                    $sth->bindValue(':id',$idGame, PDO::PARAM_INT);
                    $sth->bindValue(':id_platform',$idPlatform, PDO::PARAM_INT);
                    return $sth->execute();
                } catch  (PDOException $e) {
                    echo 'Connexion échouée : ' . $e->getMessage();
                    return false;
                } 
            }
        }
