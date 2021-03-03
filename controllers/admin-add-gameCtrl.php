<?php
$background = 'bgHomePage';
include(dirname(__FILE__).'/../utils/regexp.php');
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Studio.php');
require_once(dirname(__FILE__).'/../models/Platform.php');
require_once(dirname(__FILE__).'/../models/Game.php');
$errorsArray = [];
$user = new User ();
$listUser = $user->listUsers();

$studio = new Studio();
$listStudio = $studio->getAllStudio();

$platform = new Platform();
$listPlatform = $platform->getAllPlatform();

    //nettoyage du champ titre de jeu

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //nettoyage du champ titre de jeu
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $synopsis = trim(filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING));
          
        //nettoyage du champ studio
        $id_studio = intval(trim(filter_input(INPUT_POST, 'studio', FILTER_SANITIZE_NUMBER_INT)));
        $note = intval(trim(filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT)));
     
        //nettoyage du champ date de sortie
        $releaseDate = trim(filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
        
        //nettoyage du champ plateforme
        $platform = intval(trim(filter_input(INPUT_POST, 'platform', FILTER_SANITIZE_NUMBER_INT)));
        
        //nettoyage du champ test
        $test = trim(filter_input(INPUT_POST, 'test', FILTER_SANITIZE_STRING));

        $iframeYoutube = trim(filter_input(INPUT_POST, 'iframeYoutube', FILTER_SANITIZE_STRING));
      
        //nettoyage du champ les +
        $asset1 = trim(filter_input(INPUT_POST, 'asset1', FILTER_SANITIZE_STRING));
        $asset2 = trim(filter_input(INPUT_POST, 'asset2', FILTER_SANITIZE_STRING));
        $asset3 = trim(filter_input(INPUT_POST, 'asset3', FILTER_SANITIZE_STRING));
        $asset4 = trim(filter_input(INPUT_POST, 'asset4', FILTER_SANITIZE_STRING));
        
        //nettoyage du champ les -
        $default1 = trim(filter_input(INPUT_POST, 'default1', FILTER_SANITIZE_STRING));
        $default2 = trim(filter_input(INPUT_POST, 'default2', FILTER_SANITIZE_STRING));
        $default3 = trim(filter_input(INPUT_POST, 'default3', FILTER_SANITIZE_STRING));
        $default4 = trim(filter_input(INPUT_POST, 'default4', FILTER_SANITIZE_STRING));
        




            $game = new Game($title,$synopsis,$releaseDate,$test,$note,$iframeYoutube,$id_studio,$asset1,$asset2,$asset3,$asset4,$default1,$default2,$default3,$default4);
            $addGame = $game->addGame();


    }






if($_SERVER['REQUEST_METHOD'] == 'POST'){

var_dump($addGame);
}





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/admin-add-game.php');

include(dirname(__FILE__).'/../views/templates/footer.php');  

?>
