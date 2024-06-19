<?php
    define('STYLE_URI','/assets/css/');
    define('SCRIPT_URI','/assets/js/');
    define('IMAGES_URI','/assets/images/');
    $favicon='';
    $title='';
    $body_classes=array();
    $enqued_scripts_header=array();
    $enqued_scripts_footer=array();
    $enqued_styles=array();

    $content_file = file_get_contents('data.json');
    $content = json_decode($content_file);
?>