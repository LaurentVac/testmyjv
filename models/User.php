<?php
// 
     require_once(dirname(__FILE__).'/../utils/Database.php');
        class User {
            private $_id;
            private $_firstname;
            private $_lastname;
            private $_mail;
            private $_pseudo;
            private $_passwd;
            private $_created_at;
            private $_authorize;
            private $_admin;
            private $_deleted_at;
            
            private $_pdo;
            
            public function __construct(  $firstname = null, $lastname = null,  $mail = null, $pseudo = null, $passwd = null, $authorize = null, $admin = null, $deleted_at = null,$id = null ){
               
                $this->_firstname = $firstname;
                $this->_lastname = $lastname;
                $this->_mail = $mail;
                $this->_pseudo =  $pseudo;
                $this->_passwd = $passwd;
              
                $this->_authorize = $authorize;
                $this->_admin = $admin;
                $this->_delete_at = $deleted_at;
                $this->_id = $id;
                $this->_pdo = Database::connect();
            }
            public function isNotExistMail($mail){         
                if(isset($mail)){
                     $sql = 'SELECT COUNT(*) AS `mail` FROM `user` WHERE `mail` = ? ;';
                     $sth = $this->_pdo->prepare($sql);
                     $sth->execute([$mail]);
                     $mailExist = $sth->fetch(PDO::FETCH_ASSOC);
                     // var_dump($mailExist);
                     if($mailExist['mail'] == 0){
                         return true;
                     }else{
                         return false;
                     } 
                 }           
             }
             public function isNotExistPseudo($pseudo){         
                if(isset($pseudo)){
                     $sql = 'SELECT COUNT(*) AS `pseudo` FROM `user` WHERE `pseudo` = ? ;';
                     $sth = $this->_pdo->prepare($sql);
                     $sth->execute([$pseudo]);
                     $pseudoExist = $sth->fetch(PDO::FETCH_ASSOC);
                     // var_dump($pseudoExist);
                     if($pseudoExist['pseudo'] == 0){
                         return true;
                     }else{
                         return false;
                     } 
                 }           
             }
            public  function addUser(){     
                try{
                    $sql = "INSERT INTO `user` (firstname, lastname, mail, pseudo, passwd )
                         VALUES (:firstname, :lastname, :mail, :pseudo, :passwd);";
            
                    // préparation de la requête
                    $sth = $this->_pdo->prepare($sql);

                    // association des marqueurs nominatif via méthode bindvalue
                    $sth->bindValue(':firstname', $this->_firstname, PDO::PARAM_STR);
                    $sth->bindValue(':lastname', $this->_lastname, PDO::PARAM_STR);
                    $sth->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
                    $sth->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
                    $sth->bindValue(':passwd', $this->_passwd, PDO::PARAM_STR);

                    $result = $sth->execute();
                    var_dump($result);
                    // $this->_last_id = $this->_pdo->lastInsertId();
                    return $result;                          
                }catch (PDOException $e) {
                    
                    return false;
                }           
            }

            public function listUsers(){
                try {
                    $sql = 'SELECT * FROM `user`;';
                       // préparation de la requête
                       $sth = $this->_pdo->query($sql);
                       $listUser = $sth->fetchAll(PDO::FETCH_OBJ);
                       return $listUser;
                }catch  (PDOException $e) {
                    
                    return false;
                }           
            }
        }