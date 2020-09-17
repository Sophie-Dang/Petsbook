<?php

function submit_book_animal() {
    if (isset($_POST['submit_book_animal'])) {
        // Je récup les données du formulaire en POST
        $prenom=$_POST['book__edit__name'];
        $race=$_POST['book__edit__race'];
        $age=$_POST['book__edit__age'];
        $sexe=$_POST['book_edit_sexe'];
        $poids=$_POST['book__edit__poids'];
        $identification=$_POST['book_edit_identification'];
        $castre=$_POST['book_edit_castre'];
        $couleur=$_POST['book_edit_color'];
        $signes=$_POST['book_edit_signes'];
        $antecedents=$_POST['book_edit_antecedents'];
        $medocs=$_POST['book_edit_medocs'];
        $parasitaires=$_POST['book_edit_last_traitement'];
        $vaccin=$_POST['book_edit_last_vaccin'];
        $veto=$_POST['book_edit_info_veto'];
        $rdv=$_POST['book_edit_rdv'];
        $id=$_POST['submit_book_animal'];



        if ($prenom != "") {
            wp_update_post(array(
                'ID' => $id,
                'post_title'=> $prenom,
            ));
            //là j'update les champs de ACF 
            update_field('race', $race, $id);
            update_field('age', $age, $id);
            update_field('sexe', $sexe, $id);
            update_field('poids', $poids, $id);
            update_field('identification', $identification, $id);
            update_field('castre', $castre, $id);
            update_field('couleur_de_la_robe', $couleur, $id);
            update_field('signes_particuliers', $signes, $id);
            update_field('antecedents_medicaux', $antecedents, $id);
            update_field('prise_de_medicaments', $medocs, $id);
            update_field('dernier_traitement_anti-parasitaire', $parasitaires, $id);
            update_field('dernier_vaccin', $vaccin, $id);
            update_field('coordonnees_du_veterinaire', $veto, $id);
            update_field('prochain_rendez_vous_veterinaire', $rdv, $id);

        
           
             wp_redirect(get_permalink(72) . '?pet='. $id);
             exit;
        }
    }
} 

add_action('init', 'submit_book_animal', 20);
?>

