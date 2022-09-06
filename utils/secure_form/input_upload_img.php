<?php
if (!empty($_FILES['url_img']) && $_FILES["url_img"]["error"] == 0) {
    // nom des variables
    $files_name = $_FILES['url_img']['name'];
    $files_size = $_FILES['url_img']['size'];
    $files_tmp = $_FILES['url_img']['tmp_name'];
    $files_type = $_FILES['url_img']['type'];

    $size_max = 2000000; //2mo
    if ($files_size <= $size_max) {
        // 3 vérifier l'extension du fichier
        $file_info = pathinfo($files_name);
        $extension = $file_info['extension'];
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        if (in_array($extension, $allowed_extensions)) {
            $new_img_name = uniqid('IMG_', true) . "." . $extension;
            $img_upload_path = 'upload_img/' . $new_img_name;
            move_uploaded_file($files_tmp, $img_upload_path);
        } else {
            $error['url_img'] = "<span class=text-red-500>Type de fichier incorrect</span>";
        }
    } else {
        $error['url_img'] = "<span class='text-danger'>Le fichier est trop gros</span>";
    }
}
