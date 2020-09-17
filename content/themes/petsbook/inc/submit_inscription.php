<?php
//SOUMISSION DU FORM D'INSCRIPTION
if(isset($_POST['submit_inscription'])) {
    //On récup les données du formulaire en POST
	$nom=$_POST['user__lastname'];
	$prenom=$_POST['user__name'];
	$mail=$_POST['user__email'];
    $mot_de_passe=$_POST['user__password'];
    
    if(isset($_POST['user__cgu'])) { //géré avec ACF
        $accept_cgu = 1; // 1 qui équivaut à true dans ACF
    } else {
        $accept_cgu = 0; // 0 qui équivaut à false dans ACF
    }
    

    // ici, PAS géré avec ACF :  je rajoute la mêem condition du dessus pour vérifier que la case a été cochée, par contre il faudra ajouter la connexion à la table custom avec wpdb
    if(isset($_POST['user__newsletter'])) {
        $accept_newsletter = true;
        // On accroche le custom hook ici (càd seulement si la checkbox user_newsletter est cochée)
        do_action('newsletter_hook_install_newdata');
    } else {
        $accept_newsletter = false;
    }

    // On nettoie le mail pour éviter les charactères "illégaux" (ex : (), /, *, etc ...)
    //https://www.w3schools.com/php/filter_validate_email.asp
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

    //On vérifie que les champs ne sont pas vides et que le mai  n'existe pas déjà
	if ($mail != "" && $mot_de_passe != "" && $prenom != "" && $nom != "" &&   email_exists($mail) == false && is_email($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)){
		$user_id = wp_create_user($mail , $mot_de_passe, $mail); //On créé l'utilisateur

        //On ajoute les données de l'utilisateur
		$user_data = array(
			'ID' => $user_id,
			'first_name' => sanitize_text_field($prenom), //https://developer.wordpress.org/reference/functions/sanitize_text_field/
			'last_name' => sanitize_text_field($nom),
			'role' => 'author' //  le user est pas admin, il est juste auteur (il met ses photos , etc...) et dans ACF on ajoute un groupe de champs pour les boutons newsletter et acceptation des règles, égal à Author
		);
        wp_update_user($user_data); //on update avec les data du dessus
        
		update_field('acceptation_des_regles_dutilisation', $accept_cgu, 'user_'. $user_id);

		//Connexion automatique de l'utilisateur. Le troisième paramètre et le permalien de la page où on veut le rediriger après connexion (notre page_account a l'ID 69)		
		auto_login($mail,$mot_de_passe,get_permalink(69));
    } 
    else 
    {
        wp_redirect(home_url()); 
        exit;
    }
	exit(); //lui, je l'ai enlevé et ça marchait plus. Alors je le remets (c'est comme pour wp_redirect en dessous en  fait, faut mettre le exit)
}

//FONCTION D'AUTOLOGIN UTILISEE APRES L'INSCRIPTION
function auto_login($user,$pass,$redirect) {
    if (!is_user_logged_in()) {
        $infos_user = array();
        $infos_user['user_login'] = $user;
        $infos_user['user_password'] = $pass;
        $user = wp_signon( $infos_user, false );
        if ( is_wp_error($user) ){
            echo $user->get_error_message();
        }else{
           
            wp_redirect($redirect);
            exit;
        }
    }
}
?>