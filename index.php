<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/footerme.css">
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9" style="width: 95%;">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
						  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
						  <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
						  <li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
		                </ol>
		                <div class="carousel-inner" style="height: 450px;" >
		                  <div class="item active" >
		                    <img src="images/image1.jpg" alt="Premier slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/image2.jpg" alt="Deuxieme slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/image3.jpg" alt="Troisieme slide">
		                  </div>
						  <div class="item">
		                    <img src="images/image4.jpg" alt="Troisieme slide">
		                  </div>
						  <div class="item">
		                    <img src="images/image5.jpg" alt="Troisieme slide">
		                  </div>
						  
						  <div class="item">
		                    <img src="images/image7.jpg" alt="Troisieme slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2>Top Ventes de ce mois</h2>
		       		<?php
		       			$mois = date('m');
						$annee = date('Y');
		       			$inc = 3;	
						$res=executeRequete("SELECT idProduit, SUM(quantite) AS totalq FROM lignecommande LEFT JOIN commande ON commande.id=lignecommande.idCommande WHERE MONTH(commande.date) = '$mois' AND YEAR(commande.date) = '$annee' GROUP BY lignecommande.idProduit ORDER BY totalq DESC LIMIT 6");
						while($valeur=$res->fetch_assoc()) 
						{
							$res2=executeRequete("SELECT * FROM produits WHERE id=".$valeur['idProduit']);
							$valeur2=$res2->fetch_assoc();
						    $image = (!empty($valeur2['image'])) ? 'images/'.$valeur2['image'] : 'images/noimage.jpg';
						    $inc = ($inc == 3) ? 1 : $inc + 1;
	       					if($inc == 1) echo "<div class='row'>";//debut d'un ligne
	       					echo "
	       						<div class='col-sm-4'>
	       							<div class='box box-solid'>
		       							<div class='box-body prod-body'>
		       								<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       								<h5><a href='produit.php?produit=".$valeur2['id']."'>".$valeur2['nom']."</a></h5>
		       							</div>
		       							<div class='box-footer'>
		       								<b>&#36; ".number_format($valeur2['prixUnitaire'], 2)."</b>
		       							</div>
	       							</div>
	       						</div>
	       					";
	       					if($inc == 3) echo "</div>";//fin d'une ligne
						}
						if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";//inc=1 donc on a deux colomnes vides plus fin ligne
						if($inc == 2) echo "<div class='col-sm-4'></div></div>";//inc=1 donc on a deux colomnes vides plus fin ligne
		       		?> 
		            <h2>Top Ventes du cette semaine</h2>
		       		<?php
		       			$semaine = date('W');
						$annee = date('Y');
		       			$inc = 3;	
						$res=executeRequete("SELECT idProduit, SUM(quantite) AS totalq FROM lignecommande LEFT JOIN commande ON commande.id=lignecommande.idCommande WHERE WEEK(commande.date) = '$semaine' AND YEAR(commande.date) = '$annee' GROUP BY lignecommande.idProduit ORDER BY totalq DESC LIMIT 6");
						while($valeur=$res->fetch_assoc()) 
						{
							$res2=executeRequete("SELECT * FROM produits WHERE id=".$valeur['idProduit']);
							$valeur2=$res2->fetch_assoc();
						    $image = (!empty($valeur2['image'])) ? 'images/'.$valeur2['image'] : 'images/noimage.jpg';
						    $inc = ($inc == 3) ? 1 : $inc + 1;
	       					if($inc == 1) echo "<div class='row'>";//debut d'un ligne
	       					echo "
	       						<div class='col-sm-4'>
	       							<div class='box box-solid'>
		       							<div class='box-body prod-body'>
		       								<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       								<h5><a href='produit.php?produit=".$valeur2['id']."'>".$valeur2['nom']."</a></h5>
		       							</div>
		       							<div class='box-footer'>
		       								<b>&#36; ".number_format($valeur2['prixUnitaire'], 2)."</b>
		       							</div>
	       							</div>
	       						</div>
	       					";
	       					if($inc == 3) echo "</div>";//fin d'une ligne
						}
						if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";//inc=1 donc on a deux colomnes vides plus fin ligne
						if($inc == 2) echo "<div class='col-sm-4'></div></div>";//inc=1 donc on a deux colomnes vides plus fin ligne
		       		?> 
	        	</div>				
	        	<div class="col-sm-3">
	        		
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  
</div>
<footer id="footer1">
      <div class="contenu-footer" style="padding-bottom: 0px;">

        <div class="bloc footer-services">
            <h5>Nos Services</h5>
            <ul class="liste-services">
              
                
                <li><a href="#">E-commerce</a></li>
                <li><a href="includes/qui somme nous.html">qui somme nous</a></li>
                <li><a href="includes/aide.php">aide</a></li>
                <li><a href="includes/contacter nous.html">contacter nous</a></li>
            </ul>
        </div>

        <div class="bloc footer-contact">
            <h5>Restons en contact</h5>
            <p>0556088073</p>
            <p>walidcrb100@gmail.com</p>
            
            <p>ain naadja cite 1306</p>
            <p>hocine737718@gmail.com</p>
            <p>dar el bieda</p>
        </div>

        <div class="bloc footer-horaires">
            <h3>Les horaires que vous puissiez nous contacter</h3>
            <ul class="liste-horaires">
                <li>✔️ Lun 8h-19h</li>
                <li>✔️ Mar 8h-19h</li>
                <li>✔️ Mer 8h-19h</li>
                <li>✔️ Jeu 8h-19h</li>
                <li>✔️ Ven 8h-19h</li>
                <li>❌ Sam fermé</li>
                <li>❌ Dim fermé</li>
            </ul>
        </div>

        <div class="bloc footer-medias">
            <h3>Nos réseaux
                <br>
                <br>
            </h3>
            <ul class="liste-media">
                <li><a href="#">
                  
                  Facebook/monsite</a></li>
                <li><a href="#">
                
                  Instagram/stuff</a></li>
                <li><a href="#">
                 
                  Twitter/lorem</a></li>
                
                <li><a href="#">
                 
                  Youtube/channel</a></li>
            </ul>
        </div>

     </div>

    </footer>

<?php include 'includes/scripts.php'; ?>
</body>
</html>