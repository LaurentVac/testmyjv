<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/controllers/adminCtrl.php">Accueil admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/controllers/admin-add-gameCtrl.php">Ajout de test<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/controllers/management-userCtrl.php">Gestion d'utilasateurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/controllers/admin-add-studioCtrl.php">Ajout de studio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container "> 
        <div class="row"> 
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Ajout de test</h2>
            </div>       
            <form class="col-8 m-auto bg-light"  method="POST">
                    
                    <!-- titre du jeu -->
                    <div class="form-group">
                        <label for="title"><strong>Titre du jeu</strong></label>
                        <input type="text" class="form-control" id="title" name="title"
                            aria-describedby="title" value="<?=$title ?? ''?>">
                        <div id="titleGame_error" class="form-text formError">
                            <?= $errorsArray['titleGame_error'] ?? ''?>
                        </div>
                    </div>
                    <!-- studio de developpement -->
                    <div class="form-group">
                        <label for="studioGame"><strong>Studio</strong></label>
                        
                        <select name="studioName" id="studioGame">
                            <?php foreach($listStudio as $value): ?>
                                <option  value="<?= $value->id?>"><?= $value->studioName ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="studioGame_error" class="form-text formError">
                            <?= $errorsArray['studioGame_error'] ?? ''?>
                        </div>
                    </div>
                    <!-- date de sortie -->
                    <div class="form-group">
                        <label for="releaseDate"><strong>Date de sortie</strong> </label>
                        <input type="date" class="form-control" id="releaseDate" name="releaseDate"
                            aria-describedby="releaseDate" value="">
                        <div id="releaseDate_error" class="form-text formError">
                            <?= $errorsArray['releaseDate_error'] ?? ''?>
                        </div>
                    </div>
                    <!-- plateforme -->
                    <div class="form-group">
                        <div class="form-check form-check-inline ">
                            <label ><strong>Plateforme</strong></label>
                            <?php foreach($listPlatform as $value): ?>
                            <input class="form-check-input ml-1" type="checkbox"  value="<?= $value->id ?>">
                            <label class="form-check-label" ><?= $value->platform ?></label>
                            <?php endforeach ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="test"><strong>Test</strong></label>
                        <textarea class="form-control"  id="test" name="test" >
                            <?= $test ?? ''?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="note"><strong>Note</strong></label>
                        <input type="number" min="0" max="20" class="form-control"  id="note" name="note" value="<?= $note ?? ''?> ">
                                                  
                    </div>
                    <div class="form-group">
                        <label for="iframeYoutube"><strong>Lien Youtube</strong></label>
                        <input type="text"  class="form-control"  id="iframeYoutube" name="iframeYoutube" value="<?= $iframeYoutube ?? ''?> ">
                                                  
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="asset1"><strong>Les + </strong></label>
                            <input type="text" class="form-control" id="asset1" name="asset1"
                                aria-describedby="asset1" placeholder="Atout 1" value="<?=$asset1 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="asset2" name="asset2"
                                aria-describedby="asset2" placeholder="Atout 2" value="<?=$asset2 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="asset3" name="asset3"
                                aria-describedby="asset3" placeholder="Atout 3" value="<?=$asset3 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="asset4" name="asset4"
                                aria-describedby="asset4" placeholder="Atout 4" value="<?=$asset4 ?? ''?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="default1"><strong>Les - </strong></label>
                            <input type="text" class="form-control" id="default1" name="default1"
                                aria-describedby="default1" placeholder="Default 1" value="<?=$default1 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="default2" name="default2"
                                aria-describedby="default2" placeholder="Default 2" value="<?=$default2 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="default3" name="default3"
                                aria-describedby="default3" placeholder="Default 3" value="<?=$default3 ?? ''?>">
                            <input type="text" class="form-control mt-1" id="default4" name="default4"
                                aria-describedby="default4" placeholder="Default 4" value="<?=$default4 ?? ''?>">
                        </div>
                        <div class="form-group col-12">
                            <label class="col-6" for="imgMenu"><strong>Image de menu</strong></label>
                            <input class="col-6" type="file" name='imgMenu' id="imgMenu">
                            <label class="col-6"for="imgPrincipal"><strong>Image principale</strong></label>
                            <input class="col-6"type="file" name='imgPrincipal' id="imgPrincipal">
                            <label class="col-6"for="imgCarousel"><strong>Image de caroussel</strong></label>
                            <input class="col-6"type="file" name='imgcarousel' id="imgcarousel">
                            <label class="col-6"for="imgcarousel2"><strong>Image de caroussel 2</strong></label>
                            <input class="col-6"type="file" name='imgcarousel2' id="imgcarousel2">
                            <label class="col-6"for="imgcarousel3"><strong>Image de caroussel 3</strong></label>
                            <input class="col-6"type="file" name='imgcarousel3' id="imgcarousel3">
                            <label class="col-6"for="imgcarousel4"><strong>Image de caroussel 4</strong></label>
                            <input class="col-6"type="file" name='imgcarousel4' id="imgcarousel4">
                        </div>
                    </div>
                    <button type="submit" class="btn buttonNav">Ajouter</button>
            </form>
        </div>
    </div> 