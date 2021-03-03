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
    <main class="container">
        <div class="row">
            <div class="col-6 justify-content-center m-auto">
                <h2 class="m-auto col-6  ">Gestion des utilisateurs</h2>
            </div>    
            <div class="col-8 m-auto">
                <div class="tab-pane fade show active" id="userManagement" role="tabpanel"
                    aria-labelledby="list-profile-list">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nom Prénom</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($listUser as $value):?>
                            <tr>
                                <td><?= $value->lastname.' '.$value->firstname?></td>
                                <td><?= $value->pseudo?></td>
                                <td><?= $value->mail?></td>
                                <td><button type="submit">Supprimer</button></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div class="emptyFooter"></div>