<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class Picture {
            private $_id;
            private $_title;
            private $_id_game;
         
            
            private $_pdo;
            
            public function __construct(  $title = null, $idGame = null,$id = null ){
               
                $this->_title = $title;
                $this->_id_game = $idGame;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }

            public function getHomePictures(){
                try {
                    $sql = 'SELECT * FROM `picture` WHERE `title` LIKE \'%homepage%\' ;';
                       // préparation de la requête
                       $sth = $this->_pdo->query($sql);
                       $listpictures = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listpictures;
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
            public function addPicture($id){
                try {
                    $sql = 'INSERT INTO `PICTURE` (title, id_game) VALUE (:title, :id_game) ;';
                       // préparation de la requête
                       $sth = $this->_pdo->prepare($sql);
                       $sth->bindValue(':title',$this->_title,PDO::PARAM_STR);
                       $sth->bindValue(':id_game', $id,PDO::PARAM_INT);
                     
                       return $sth->execute();
                }catch  (PDOException $e) {
                    
                    return false;
                }   
            }
        }