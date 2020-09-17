<?php

function submit_timeline_edit() {
    if (isset($_POST['submit_timeline_edit'])) {
        // Je récup les données du formulaire en POST
        $date=$_POST['timeline_edit_date'];
        $description=$_POST['timeline-edit__item__text'];
        $id=$_POST['submit_timeline_edit'];
        $row =$_POST['count_row'];

        if($date != '' || $description != ''){
            
            update_sub_field( array('une_section', $row, 'date'), $date, $id );
            update_sub_field( array('une_section', $row, 'texte'), $description, $id);
        }
    
           
             wp_redirect(get_permalink(76) . '?pet='. $id);
             exit;
        
    } 
} 

add_action('init', 'submit_timeline_edit', 20);
?>