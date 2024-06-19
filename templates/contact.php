<?php
global $content;
/**
 * Banner
 */
if (isset($content->contact_us->title)) {
    echo '<section class="inner-page-banner">';
    echo '<div class="container">';
    echo '<h1>';
    echo $content->contact_us->title;
    echo '</h1>';
    echo '</div>';
    echo '</section>';
}
/**
 * Stay Connected Section
 */
if (isset($content->contact_us->stay_connected)) {
    echo '<section class="stay-connected">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-lg-8 offset-lg-2">';
    if (isset($content->contact_us->stay_connected->title)) {
        echo '<h2>';
        if (isset($content->contact_us->stay_connected->title->black)) {
            echo $content->contact_us->stay_connected->title->black;
        }
        if (isset($content->contact_us->stay_connected->title->orange)) {
            echo '<span class="text-orange"> ';
            echo $content->contact_us->stay_connected->title->orange;
            echo '</span>';
        }
        echo '</h2>';
    }
    if (isset($content->contact_us->stay_connected->description)) {
        foreach ($content->contact_us->stay_connected->description as $description) {
            echo '<p>';
            echo $description;
            echo '</p>';
        }
    }
    echo '</div>'; //column
    echo '</div>'; //row
    echo '</div>';
    echo '</section>';
}
/**
 * CTA Email
 */
if (isset($content->contact_us->email)) {
    echo '<section class="email_cta">';
    echo '<div class="container">';
    if ($content->contact_us->email->text) {
        echo '<h3>';
        if ($content->contact_us->email->url) {
            echo '<a href="' . $content->contact_us->email->url . '">';
        }
        if ($content->contact_us->email->icon) {
            echo '<span class="icon-wrap">';
            echo '<span class="' . $content->contact_us->email->icon . '"></span>';
            echo '</span>';
        }
        echo $content->contact_us->email->text;
        if ($content->contact_us->email->url) {
            echo '</a>';
        }
        echo '</h3>';
    }
    echo '</div>';
    echo '</section>';
}
/**
 * Contact Form
 */
if (isset($content->contact_us->contact_form)) {
    echo '<section class="contact-form">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">';
    echo '<div class="contact-form-wrap">';
    if (isset($content->contact_us->contact_form->title)) {
        echo '<h3>';
        echo $content->contact_us->contact_form->title;
        echo '</h3>';
    }
    if (isset($content->contact_us->contact_form->fields)) {
        echo '<form method="POST" id="recaptcha-form">';
        echo '<div class="row">';
        echo '<div class="col-12">';
        if (isset($_SESSION['contact_form_message'])) {
            $add_class = "";
            if ($_SESSION['contact_form_message']['type'] == 'error') {
                $add_class = "text-danger";
            } else if ($_SESSION['contact_form_message']['type'] == 'success') {
                $add_class = "text-success";
            }
            echo '<div class="' . $add_class . ' mb-2">';
            echo $_SESSION['contact_form_message']['text'];
            echo '</div>';
            unset($_SESSION['contact_form_message']);
        }
        echo '</div>';
        foreach ($content->contact_us->contact_form->fields as $field) {
            if (isset($field->id)) {
                $type = isset($field->type) ? $field->type : "text";
                $required = isset($field->required) ? $field->required : false;
                $placeholder = isset($field->placeholder) ? $field->placeholder : null;
                if ($required) {
                    $placeholder = $placeholder . ' (Required)';
                } else {
                    $placeholder = $placeholder . ' (Optional)';
                }
                $wrapper_col = isset($field->wrapper_col) ? $field->wrapper_col : "col-12";
                echo '<div class="' . $wrapper_col . '">';
                if ($type == "textarea") {
                    echo '<div class="form-group">';
                    echo '<label for="' . $field->id . '" class="sr-only">';
                    echo  $placeholder !== null ? $placeholder : $field->id;
                    echo '</label>';
                    echo '<textarea ';
                    echo 'class="form-control"';
                    echo 'id="' . $field->id . '" ';
                    echo 'name="' . $field->id . '" ';
                    echo 'placeholder="' . $placeholder . '" ';
                    if ($required) {
                        echo 'required="' . $required . '" ';
                    }
                    echo '></textarea>';
                    echo '</div>';
                } else {
                    echo '<div class="form-group">';
                    echo '<label for="' . $field->id . '" class="sr-only">';
                    echo  $placeholder !== null ? $placeholder : $field->id;
                    echo '</label>';
                    echo '<input ';
                    echo 'class="form-control"';
                    echo 'type="' . $type . '" ';
                    echo 'id="' . $field->id . '" ';
                    echo 'name="' . $field->id . '" ';
                    echo 'placeholder="' . $placeholder . '" ';
                    if ($required) {
                        echo 'required="' . $required . '" ';
                    }
                    if (isset($field->pattern)) {
                        echo 'pattern="' . $field->pattern . '" ';
                    }
                    echo '>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
        $submit_label = "Submit";
        if (isset($content->contact_us->contact_form->button_label)) {
            $submit_label = $content->contact_us->contact_form->button_label;
        }
        echo '<div class="col-12 text-center">';
        echo '<div class="g-recaptcha d-flex align-items-center justify-content-center" data-sitekey="' . CAPTCHA_SITEKEY . '"></div>';
        echo '<button class="btn btn-primary mt-3">' . $submit_label . '</button>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    }
    echo '</div>'; //wrap
    echo '</div>'; //col
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}

/**
 * Download CTA
 */

// if (isset($content->contact_us->download_cta)) {
//     echo '<section class="download-cta">';
//     echo '<div class="container">';
//     if (isset($content->contact_us->download_cta->title)) {
//         echo '<h2 class="mb-4 text-white">';
//         echo $content->contact_us->download_cta->title;
//         echo '</h2>';
//     }
//     if (isset($content->contact_us->download_cta->actions)) {
//         foreach ($content->contact_us->download_cta->actions as $action) {
//             if (isset($action->link) && isset($action->icon) && isset($action->text)) {
//                 echo '<a class="btn btn-light m-2" href="' . $action->link . '" ><img src="' . $action->icon . '" alt="store-icon" class="img-fluid"/>' . $action->text . '</a>';
//             }
//         }
//     }
//     echo '</div>';
//     echo '</section>';
// }
