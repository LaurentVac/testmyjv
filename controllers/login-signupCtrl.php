<?php
 
 require_once(dirname(__FILE__).'/../utils/regexp.php');
 require_once(dirname(__FILE__).'/../models/User.php');
    $errorsArray = array();
    $usersArray =[];
    $success= null;
    $error = null;


    // Contrôle du formulaire d'inscription
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscription'])){
            // NAME
            // On verifie l'existance et on nettoie
            $lastname = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
            //On test si le champ n'est pas vide
            if(!empty($lastname)){
                // On test la valeur
                $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$lastname);
                if($testRegex == false){
                    $errorsArray['name_error'] = 'Le nom n\'est pas valide';
                }
            }else{
                $errorsArray['name_error'] = 'Le champ n\'est pas rempli';
            }
            //******************************************************************** */
            // FIRSTNAME
            // On verifie l'existance et on nettoie
            $firstname = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
            //On test si le champ n'est pas vide
            if(!empty($firstname)){
                // On test la valeur
                $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$firstname);

                if($testRegex == false){
                    $errorsArray['firstname_error'] = 'Le prénom n\'est pas valide';
                }
            }else{
                $errorsArray['firstname_error'] = 'Le champ n\'est pas rempli';
            }
            // ***************************************************************
            //pseudo
            // On verifie l'existance et on nettoie
            $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));        
            //On test si le champ n'est pas vide
            if(!empty($pseudo)){
                // On test la valeur
                $testRegex = preg_match('/^([a-zA-Z0-9-_]{2,36})$/',$pseudo);
                if($testRegex == false){
                    $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
                }
            }else{
                $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
            }
         // ***********************************************************
         // EMAIL
         // On verifie l'existance et on nettoie
         $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
         var_dump($mail) ;
     
         //On test si le champ n'est pas vide
         if(!empty($mail)){
             // On test la valeur
             $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            
     
             if($testMail == false){
                 $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
             }
         }else{
             $errorsArray['mail_error'] = 'Le champ n\'est pas rempli';
         } var_dump($testMail);
        // **************************************************************
        // confirmation d'email
        $confirmMail = trim(filter_input(INPUT_POST, 'confirmMail', FILTER_SANITIZE_EMAIL));

        if(!empty($confirmMail)){

            $testConfirmMail = filter_var($confirmMail, FILTER_VALIDATE_EMAIL);

            if($confirmMail != $testMail){
                $errorsArray['confirm_mail_error'] = 'Les champs mail doivent être identique';
            }
        }else{
            $errorsArray['confirm_mail_error'] = 'Le champ n\'est pas rempli';
        }

        //**********************************************
        //Mot de passe
        $passwd =  trim(filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING));
        echo $passwd;
        if(!empty($passwd)){ 
            echo $passwd;
            $testRegexPassword = preg_match( '/^[0-9]{2}$/',$passwd);
            var_dump($testRegexPassword);
            if($testRegexPassword == false){

                $errorsArray['password_error'] = 'Le mot de passe doit contenir au minimum 10 caractères dont au moins 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés';

            }
        }else{
            $errorsArray['password_error'] = 'Le champ n\'est pas rempli';
        }
        //Confirmation de mot de passe
        $confirmPassword = trim(filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING));
        if(!empty($confirmPassword)){
            // (?=.{10,}$)(?=(?:.*?[A-Z]){2})(?=.*?[a-z])(?=(?:.*?[0-9]){2}).*
            $testRegexPassword = preg_match( '/^[0-9]{2}$/',$confirmPassword);
            if($testRegexPassword == false){
                $errorsArray['confirm_password_error'] = 'Le mot de passe doit contenir au moins 10 caractères dont 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés';
            }

            if($confirmPassword != $passwd){
                $errorsArray['confirm_password_error'] = 'Les champs mot de passe doivent être identiques';
            }
        }else{
            $errorsArray['confirm_password_error'] = 'Le champ n\'est pas rempli';
        }


        if(empty($errorsArray)){
            $user = new User( $firstname , $lastname ,  $confirmMail , $pseudo , $confirmPassword);
            if($user->isNotExistMail($mail)){
               if($user->isNotExistPseudo($pseudo)){
                
                $addUser = $user->addUser();
                $success = 'vous êtes bien enregistré.';
                }else{
                    $errorsArray['pseudo_error'] = 'Le pseudo est déjà utisilisé veuillez en saisir un nouveau';
                }    
            }else{
                $errorsArray['mail_error'] = 'Le mail existe déjà veuillez en saisir un nouveau';
            }
   
        }
    }
    //FIN DE CONTROLE DU FORMULAIRE D'INSCRIPTION
    //***********************************************************
    //***********************************************************

       // Contrôle du formulaire d'inscription
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // EMAIL
         // On verifie l'existance et on nettoie
         $loginMail = trim(filter_input(INPUT_POST, 'loginmail', FILTER_SANITIZE_EMAIL));
     
         //On test si le champ n'est pas vide
         if(!empty($loginMail)){
             // On test la valeur
             $testMail = filter_var($loginMail, FILTER_VALIDATE_EMAIL);
     
             if($testMail == false){
                 $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
             }
         }else{
             $errorsArray['mail_error'] = 'Le champ n\'est pas rempli';
         }

         /*********************************************************** */
         /*Mot de passe*/
         $loginPassword =  trim(filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING));
        if(!empty($loginPassword)){ 
            $testRegexPassword = preg_match( '/^(?=.{10,}$)(?=(?:.*?[A-Z]){2})(?=.*?[a-z])(?=(?:.*?[0-9]){2}).*$/',$loginPassword);
            if($testRegexPassword == false){

                $errorsArray['loginpassword_error'] = 'Le mot de passe doit contenir au minimum 10 caractères dont au moins 2 majuscules, 1minuscule et 2 chiffres. Les caractères spéciaux ne sont pas autorisés';

            }
        }else{
            $errorsArray['loginpassword_error'] = 'Le champ n\'est pas rempli';
        }
    }
    // fin de contrôle du formulaire d'authentification
    //**********************************************************
     var_dump($errorsArray);

    $background = 'bgHomePage';
    
    
    include(dirname(__FILE__).'/../views/templates/header.php');

    include(dirname(__FILE__).'/../views/login-signup.php');
    
    include(dirname(__FILE__).'/../views/templates/footer.php');   
    
    //var_dump($usersArray);
    //  include(dirname(__FILE__).'fichier atrouver');
?>
