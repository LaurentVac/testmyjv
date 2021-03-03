<?php 


require_once(dirname(__FILE__).'/../models/Picture.php');

$pic = new Picture();
$picture = $pic->getHomePictures();

var_dump($picture);
foreach($picture as $valeur)
echo $valeur->title ;