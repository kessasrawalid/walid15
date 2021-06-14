<header class="main-header" >
  <nav class="navbar navbar-static-top" style="background-color: black;">
    <div class="container" style="padding-right: 10px;
    padding-left:10px">
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse" >
        <ul class="nav navbar-nav" >
          <li><a href="index.php" class="navbar-brand" style="color: white
         ;"><b>WB shopping</b></a></li>
          <li class="dropdown" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;
            font-size: larger" >Categories<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
                $res=executeRequete("SELECT nom FROM categorie");
                if($res->num_rows>0)
                {
                    while($valeur=$res->fetch_assoc())
                    {
                        echo "<li><a href='categorie.php?categorie=".$valeur['nom'] ."'>".$valeur['nom']."</a></li>";
                    }
                }				
              ?>
            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group" >
              <input type="text" style=" width: 500px;
              margin-left: 120px;" class="form-control" id="navbar-search-input" name="keyword" placeholder="Rechercher..." required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="panier.php">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </li>
          <?php
            if(isset($_SESSION['idUtilisateur'])){
              $image = (!empty($user['image'])) ? 'images/'.$user['image'] : 'images/profile.jpg';
              echo '
                <li>
                  <a href="profile.php">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                  </a>
                </li>
                <li>
                  <a href="deconnexion.php">
                    se deconnecter
                  </a>
                </li>				
              ';
            }
            else{
              echo "
                <li ><a href='connexion.php' >se connecter </a></li>
                <li><a href='inscription.php'>s'inscrir</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>