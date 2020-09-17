<?php
//SOUMISSION DU FORM DE CONNEXION
if(isset($_POST['submit_connexion'])) {
    //On récup les données du formulaire en POST
	$mail=$_POST['user_mail'];
    $mot_de_passe=$_POST['user_pass'];
    
    
    //On vérifie que les champs ne sont pas vides 
	if ($mail != "" && $mot_de_passe != ""){
		
		//Connexion automatique de l'utilisateur. Le troisième paramètre est le permalien de la page où on veut le rediriger après connexion (notre page_account a l'ID 69)		
		auto_login($mail,$mot_de_passe,get_permalink(69)); //qui existe déjà dans submit_inscription.php
	}
	exit(); 
}


?>