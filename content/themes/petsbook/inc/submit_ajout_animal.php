<?php

function submit_ajout_animal() {
    if (isset($_POST['submit_ajout_animal'])) {
        // Je récup les données du formulaire en POST
        $prenom=$_POST['book__edit__name'];
        $description=$_POST['info_edit_description'];
        $aime=$_POST['info_edit_like'];
        $naime_pas=$_POST['info_edit_dislike'];
        $age=$_POST['info_edit_age'];
        $type=$_POST['pet-select'];
        $id=$_POST['id_edition_animal'];

        

        if ($prenom != "") {
            if ($id != "") {
                wp_update_post(array(
                    'ID' => $id,
                    'post_title'=> $prenom,
                    'post_content'=> $description
                ));
            }else {
                $id = wp_insert_post(array(
                    'post_title'=> $prenom,
                    'post_type'=>'animal',
                    'post_content'=> $description,
                    'post_status' => 'publish',
                 ));
            }
            //là j'update les champs de ACF aime, n'aime pas, et âge.
            update_field('aime', $aime, $id);
            update_field('naime_pas', $naime_pas, $id);
            update_field('age', $age, $id);

            // var_dump(wp_set_object_terms(275, 'Toto', 'animal-type'));
 
            wp_set_object_terms($id, $type, 'animal-type');

        


            //https://rudrastyh.com/wordpress/how-to-add-images-to-media-library-from-uploaded-files-programmatically.html
            $wordpress_upload_dir = wp_upload_dir();
            // $wordpress_upload_dir['path'] is the full server path to wp-content/uploads/2017/05, for multisite works good as well
            // $wordpress_upload_dir['url'] the absolute URL to the same folder, actually we do not need it, just to show the link to file
            $i = 1; // number of tries when the file with the same name is already exists
            
            if ($_FILES['ajout-image-animal']['name'] != "") {
                $profilepicture = $_FILES['ajout-image-animal'];
                $new_file_path = $wordpress_upload_dir['path'] . '/' . $profilepicture['name'];
                $new_file_mime = mime_content_type($profilepicture['tmp_name']);
            
        
                if (empty($profilepicture)) {
                    die('File is not selected.');
                }
        
                if ($profilepicture['error']) {
                    die($profilepicture['error']);
                }
        
                if ($profilepicture['size'] > wp_max_upload_size()) {
                    die('It is too large than expected.');
                }
        
                if (!in_array($new_file_mime, get_allowed_mime_types())) {
                    die('WordPress doesn\'t allow this type of uploads.');
                }
        
                while (file_exists($new_file_path)) {
                    $i++;
                    $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $profilepicture['name'];
                }
        
                // looks like everything is OK
                if (move_uploaded_file($profilepicture['tmp_name'], $new_file_path)) {
                    $upload_id = wp_insert_attachment(array(
                'guid'           => $new_file_path,
                'post_mime_type' => $new_file_mime,
                'post_title'     => preg_replace('/\.[^.]+$/', '', $profilepicture['name']),
                'post_content'   => '',
                'post_status'    => 'inherit'
                ), $new_file_path);
            
                    // wp_generate_attachment_metadata() won't work if you do not include this file
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
            
                    // Generate and save the attachment metas into the database
                    wp_update_attachment_metadata($upload_id, wp_generate_attachment_metadata($upload_id, $new_file_path));

                    set_post_thumbnail($id, $upload_id);
                }
            }
        
           
             wp_redirect(get_permalink(69) . '?pet='. $id);
             exit;
        }
    }
} 

add_action('init', 'submit_ajout_animal', 20);
?>


