<?php

/**
 * This file holds the main functions to run the application.
 * @since 1.0.0
 * @author Niraj Gohel
 */


/**
 * This function sets the favicon of the webpage
 * can be set global or page specific depending on the requirement
 * @param url URL of the favicon
 * @author Niraj Gohel
 * @since 1.0.0
 */
function set_favicon($url)
{
    global $favicon;
    $favicon = $url;
}

/**
 * This function sets the title of the webpage
 * can be set global or page specific depending on the requirement
 * @param new_title New Title provided as string
 * @author Niraj Gohel
 * @since 1.0.0
 */
function set_title($new_title)
{
    global $title;
    $title = $new_title;
}

/**
 * This function is used to add class to the body tag
 * @param class String containing class name
 * @author Niraj Gohel
 * @since 1.0.0
 */
function add_class_to_body($class)
{
    global $body_classes;
    $body_classes[] = $class;
}

/**
 * This function register a script into the webpage
 * can be set global or page specific depending on the requirement
 * @param url URL of the script(JS) file
 * @param in_header If true, the script will be added into header otherwise it will be added before closing body tag
 * @author Niraj Gohel
 * @since 1.0.0
 */
function enque_script($url, $in_header = false)
{
    global $enqued_scripts_header, $enqued_scripts_footer;
    if ($in_header) {
        $enqued_scripts_header[] = $url;
    } else {
        $enqued_scripts_footer[] = $url;
    }
}

/**
 * This function register a style into the webpage
 * can be set global or page specific depending on the requirement
 * @param url URL of the style
 * @author Niraj Gohel
 * @since 1.0.0
 */
function enque_style($url)
{
    global $enqued_styles;
    $enqued_styles[] = $url;
}

/**
 * This function generates the head of the HTML
 * @author Niraj Gohel
 * @since 1.0.0
 */
function head()
{
    global $title, $favicon, $enqued_scripts_header, $enqued_styles, $body_classes, $content;
    echo '<head>';
    echo '<meta charset="utf-8" />';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
    echo '<title>' . $title . '</title>';
    echo '<link rel="shortcut icon" href="' . $favicon . '" />';
    foreach ($enqued_styles as $style_url) {
        echo '<link rel="stylesheet" href="' . $style_url . '"/>';
    }
    foreach ($enqued_scripts_header as $script_url) {
        echo '<script src="' . $script_url . '"></script>';
    }
    if (isset($content->home->how_it_works->slides)) {
        echo '<style>';
        echo '#slideContainer,#slideContainer1 {';
        echo 'width: ' . count($content->home->how_it_works->slides) * 100 . '%;';
        echo '}';
        echo '.panel {';
        echo 'width: ' . (100 / count($content->home->how_it_works->slides)) . '%;';
        echo '}';
        echo '</style>';
    }
    echo '</head>';
    echo '<body class="' . implode(" ", $body_classes) . '">';
}

/**
 * This function generates the tail(footer/end) of the HTML page
 * @author Niraj Gohel
 * @since  1.0.0
 */
function tail()
{
    global $enqued_scripts_footer, $content;
    // print_r($enqued_scripts_footer);
    foreach ($enqued_scripts_footer as $script_url) {
        echo '<script src="' . $script_url . '"></script>';
    }
    if (isset($content->home->how_it_works->slides)) {
        echo '<script>';
        ob_start();
        include_once('./assets/js/phoneslider.js');
        $slider_script = ob_get_clean();
        echo $slider_script;
        echo '</script>';
    }
    echo '</body>';
}

/**
 * Wrapper function to render the page between the head and tail of a webpage
 * @param template function to render the page between head and tail
 * @author Niraj Gohel
 * @since 1.0.0
 */
function render_page($template)
{
    head();
    $template();
    tail();
}

/**
 * This function includes a template part file into the page
 * @param template_name Template name same as file name inside the template parts folder
 * @author Niraj Gohel
 * @since 1.0.0
 */
function get_template_part($template_name)
{
    include_once('./template-parts/' . $template_name . '.php');
}

/**
 * This function includes a template file into the page
 * @param template_name Template name same as file name inside the template folder
 * @author Niraj Gohel
 * @since 1.0.0
 */
function get_template($template_name)
{
    include_once('./templates/' . $template_name . '.php');
}

function reCaptcha($recaptcha)
{
    $ip = $_SERVER['REMOTE_ADDR'];

    $postvars = array("secret" => CAPTCHA_SECRET, "response" => $recaptcha, "remoteip" => $ip);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);

    return json_decode($data, true);
}
