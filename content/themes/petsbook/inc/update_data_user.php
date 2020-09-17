<?php

function update_data_user() {
    if (isset($_POST['update_data_user'])) {

        $current_user = wp_get_current_user(); 
        // Je récup les données du formulaire en POST
        $nom=$_POST['book__edit__lastname'];
        $prenom=$_POST['book__edit__firstname'];
        $email=$_POST['info_user_email'];
        $sexe=$_POST['sexe-select'];
        $age=$_POST['info_edit_age'];
        $adresse=$_POST['info_edit_address'];


        if ($prenom != "") {
            //https://rudrastyh.com/mailchimp-api/sync-user-first-name-and-email.html
            wp_update_user( array( 
				'ID' => $current_user->ID, 
				'first_name' => $prenom,
				'last_name' => $nom,
                'user_email' => $email,
                
			) );
            
            //là j'update les champs de ACF 
            update_field('sexe', $sexe, 'user_' . $current_user->ID);
            update_field('adresse', $adresse, 'user_' . $current_user->ID);
            update_field('age', $age, 'user_' . $current_user->ID);
            


        


            //https://rudrastyh.com/wordpress/how-to-add-images-to-media-library-from-uploaded-files-programmatically.html
            $wordpress_upload_dir = wp_upload_dir();
            // $wordpress_upload_dir['path'] is the full server path to wp-content/uploads/2017/05, for multisite works good as well
            // $wordpress_upload_dir['url'] the absolute URL to the same folder, actually we do not need it, just to show the link to file
            $i = 1; // number of tries when the file with the same name is already exists
            
            if ($_FILES['update_data_user']['name'] != "") {
                $profilepicture = $_FILES['update_data_user'];
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

                    update_field('photo_de_profil', $upload_id, 'user_' . $current_user->ID);
                }
            }
        
           

            wp_redirect(get_permalink(77));
            exit;

        }
    }
}

add_action('init', 'update_data_user', 20);
?>
