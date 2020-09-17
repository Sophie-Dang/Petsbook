<?php

function delete_attachment() 
{

    if (isset($_POST['delete-attachment'])) {

        $img=$_POST['timeline-edit__item__img'];
        $id=$_POST['submit_timeline_edit'];
        $row =$_POST['count_row'];

        delete_row($img, $row);

        echo 'pas ok';
    }
}

add_action('init', 'delete_attachment', 21);