<?php
/*
Plugin Name: petsbook newsletter plugin
Description: Mise en place de la newsletter petsbook
Author: team petsbook
Version: 1.0
*/

if (!defined('WPINC')) {
    die;
}

class Newsletter 
{
    public function __construct()
    {
        add_action( 'newsletter_hook_install_newdata', [$this,'newsletter_install_newdata'] );
        add_action( 'newsletter_hook_footer_newdata', [$this,'newsletter_footer_insert_newdata'] );
        add_action( 'init', [$this, 'newsletter_footer']);
    }

    /*----------------------CREATE TABLE--------------------------*/
    public function newsletter_install()
    {
        global $wpdb;
        //global $newsletter_db_version;

        //$newsletter_db_version = '1.0';
        $table_name = $wpdb->prefix . "newsletters"; // = wp_newsletters
        $charset_collate = $wpdb->get_charset_collate();
        //$installed_ver = get_option( "newsletter_db_version" );
    
        // if ( $installed_ver != $newsletter_db_version ) 
        // {
            $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
                `newsletters_id` bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
                `newsletters_name` tinytext NOT NULL, 
                `newsletters_email` varchar(100) NOT NULL,
                `user_id` bigint(20) UNSIGNED
            ) $charset_collate;";
        
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            //update_option( "newsletter_db_version", $newsletter_db_version );
        // } 
    }

    /*-------------------------ADD FOREIGN KEY------------------------------*/
    public function newsletter_foreignKey()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "newsletters";
    
        $sql = "ALTER TABLE `$table_name` ADD COLUMN FOREIGN KEY (`user_id`)
                ALTER TABLE `$table_name` ADD COLUMN REFERENCES wp_users(ID);";
                
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    /*--------------------------ADD INDEX-----------------------------*/
    public function newsletter_index()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "newsletters";
    
        $sql = "ALTER TABLE `$table_name` CREATE INDEX(`user_id`);";
                
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    /*--------------------------HOOKS-----------------------------*/
    public function newsletter_hook_install_newdata() 
    {      
        // Vide parce qu'on s'en sert juste pour accrocher une fonction à un moment donné
    }    

    /*-------------------------------------------------------*/
    public function newsletter_hook_footer_newdata()
    {
        // Vide parce qu'on s'en sert juste pour accrocher une fonction à un moment donné
    }

    /*--------------------ADD NEW DATAS for inscription's form---------------------*/
    // Function pour ajouter les nouvelles données
    public function newsletter_install_newdata()
    {
        global $wpdb;

        $mail=$_POST['user__email'];

        if ($mail != "" && email_exists($mail) == false && is_email($mail)) {
            $table_name = $wpdb->prefix . 'newsletters';
    
            $newdata = array(
                'newsletters_email'=>$mail,
            );

            // On insère les données dans la DB
            $wpdb->insert(
                $table_name,
                $newdata
            );
        }
    }
    
    /*--------------------------GET FOOTER DATAS-----------------------------*/
    // Function qui recupere le mail par le footer 
    public function newsletter_footer()
    {     
        if(isset($_POST['submit_newsletter'])) {
            
            //On récup les données du formulaire d'newsletter en POST
            $footer_mail_notClean=$_POST['footer_field']; 

            // On nettoie le mail pour éviter les charactères "illégaux" (ex : (), /, *, etc ...)
            //https://www.w3schools.com/php/filter_validate_email.asp
            $footer_mail = filter_var($footer_mail_notClean, FILTER_SANITIZE_EMAIL);

            // Si le mail n'est pas vide, qu'il n'existe pas, et qu'il est 'valide' on exécute la fonction accrochée au hook 'newsletter_hook_footer_newdata'
            // La fonction accrochée au hook est : "newsletter_footer_insert_newdata", elle insère les données dans la table custom
            if ($footer_mail != "" && email_exists($footer_mail) == false && filter_var($footer_mail, FILTER_VALIDATE_EMAIL)) {

                do_action('newsletter_hook_footer_newdata');
            }      
        }
    } 

    /*-------------------------ADD NEW DATAS for footer's form------------------------------*/
    public function newsletter_footer_insert_newdata()
    {
        global $wpdb;

        $footer_mail_notClean=$_POST['footer_field']; 
        $footer_mail = filter_var($footer_mail_notClean, FILTER_SANITIZE_EMAIL);

        $table_name = $wpdb->prefix . 'newsletters';

        // verifying if the email existes in our BD with SQL demand
        $request = $wpdb->query("SELECT `newsletters_email` FROM `$table_name` WHERE newsletters_email='". $footer_mail ."'");

        // Si un mail existe déjà, redirige vers la home | Sinon insère les données dans la custom table
        if ($request != 0) {
            wp_redirect(home_url());
            exit;
        } 
        else 
        {
            // On vérifie que l'input du footer ne soit pas vide
            // S'il n'est pas vide on insère les données
            if ($footer_mail != "" && is_email($footer_mail)) 
            {
                $newdata = array(
                    'newsletters_email'=>$footer_mail,
                );

                $wpdb->insert(
                    $table_name,
                    $newdata
                );
            }
        } 
    }
    /*-------------------------------------------------------*/
    /*public function newsletter_install_data() 
    {
        global $wpdb;
        
        if(isset($_POST['submit_inscription'])) {
            //On récup les données du formulaire d'inscription en POST
            $mail=$_POST['user__email'];

            if(isset($_POST['user__newsletter'])) {
                $accept_newsletter = true;
            } else {
                $accept_newsletter = false;
            }

            if ($mail != "" && email_exists($mail) == false && $_POST['user__newsletter'] == true) {
                $table_name = $wpdb->prefix . 'newsletters';

                $insert_mail = "INSERT INTO $table_name (newsletters_email)
                                SELECT * FROM $table_name
                                WHERE NOT EXISTS (SELECT * FROM $table_name WHERE newsletters_email = $mail);";
        
                // $datum = $wpdb->get_results("SELECT * FROM $table_name WHERE newsletters_email = '".$welcome_name."'");
                // print_r($datum);
        
                // if($wpdb->num_rows > 0) {
                //     //Display duplicate entry error message and exit
                //     echo 'nope';
                //     //return or exit
                // }
        
                $newdata = array(
                    'newsletters_email'=>$insert_mail,
                );
                //inserting a record to the database
                $wpdb->insert(
                    $table_name,
                    $newdata
                );
            }
        }

        // $table_name = $wpdb->prefix . 'newsletters';

        // $welcome_name = 'Mr. Dziendobry';
        // $welcome_text = 'Congratulations, you just completed the Leveliloupie!';

        // $datum = $wpdb->get_results("SELECT * FROM $table_name WHERE newsletters_email = '".$welcome_name."'");
        // print_r($datum);

        // if($wpdb->num_rows > 0) {
        //     //Display duplicate entry error message and exit
        //     echo 'nope';
        //     //return or exit
        // }

        // $newdata = array(
        //     'newsletters_email'=>$welcome_name,
        //     'newsletters_name'=>$welcome_text,
        // );
        // //inserting a record to the database
        // $wpdb->insert(
        //     $table_name,
        //     $newdata
        // );
    }*/

    /*-------------------------------------------------------*/
    public function newsletter_update_db_check() {
        global $newsletter_db_version;
        if ( get_site_option( 'newsletter_db_version' ) != $newsletter_db_version ) {
            $this->newsletter_install();
            //$this->newsletter_install_data();
        }
    }
    
    /*-------------------------------------------------------*/
    public function newsletters_activate()
    {
        // à l'activation du plugin on exécute :
        $this->newsletter_install();
        $this->newsletter_hook_install_newdata();
        $this->newsletter_hook_footer_newdata();
        $this->newsletter_foreignKey();
        $this->newsletter_index();
        $this->newsletter_update_db_check();
        $this->newsletter_footer();
    }

    public function newsletters_deactivate()
    {
        // à la désactivation du plugin
        flush_rewrite_rules();
    } 
}

$newsletters = new Newsletter(); 
register_activation_hook(__FILE__, [$newsletters, 'newsletters_activate']);
register_deactivation_hook(__FILE__, [$newsletters, 'newsletters_deactivate']);
