<?php
//https://www.kvcodes.com/2013/12/create-front-end-multiple-file-upload-wordpress/
// là j'ai recopié un truc sur le lien ci-dessus (merci Fabio pour le terme programmatically qui m'a aidé à trouver ce truc), donc j'ai juste copié collé le tout en remplaçant par image-timeline (un bon gros copier coller de feignasse)
if (isset($_POST['submit_photos_timeline'])) {
    if ( $_FILES ) { 
		$files = $_FILES["image-timeline"];  
		foreach ($files['name'] as $key => $value) { 			
            if ($files['name'][$key]) { 
                $file = array( 
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key], 
                    'tmp_name' => $files['tmp_name'][$key], 
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ); 
                $_FILES = array ("image-timeline" => $file); 
                foreach ($_FILES as $file => $array) {				
                    $newupload = kv_handle_attachment($file,$_GET['pet']); 
                }
            } 
        } 
    } 
    wp_redirect(get_permalink(76). '?pet=' . $_GET['pet']);
    exit;
      
}

function kv_handle_attachment($file_handler,$post_id,$set_thu=false) {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, $post_id );

    //update ACF
    //ici par contre ce code est ajouté pour mettre à jour ACF pour ajouter une section à la timeline à l'ajout d'une photo.
    // le if c'est si il y a déjà une section il fait add_row , et sinon il update.
    if (have_rows('une_section', $_GET['pet'])) {
        $nouvelle_photo = array(
            'photo' => $attach_id
        );
        add_row('une_section', $nouvelle_photo, $_GET['pet']);
    } else {
        $nouvelle_photo = array(
            array(
            'photo' => $attach_id
            )
        );
        update_field('une_section', $nouvelle_photo, $_GET['pet']);
    }
    
}
?>