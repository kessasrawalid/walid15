<?php
	include 'includes/init.php';
	session_start();
	if(visiteurEstConnecteEtEstAdmin()){
		header('location: admin/home.php');
	}

	if(visiteurEstConnecte()){
        $res=executeRequete("SELECT * FROM utilisateur WHERE id=\'".$_SESSION['idUtilisateur']."\'");
		$user=$res->fetch_assoc();	
	}
?>