<?php
global $content;
/**
 * Banner
 */

if (isset($content->be_a_chef->title)) {
    echo '<section class="inner-page-banner">';
    echo '<div class="container">';
    echo '<h1>';
    echo $content->be_a_chef->title;
    echo '</h1>';
    echo '</div>';
    echo '</section>';
}

/**
 * Benefits Section
 */
if (isset($content->be_a_chef->benefits_section)) {
    echo '<section class="be-a-chef-benefits">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-7 col-xl-8 order-lg-1 order-2">';
    if (isset($content->be_a_chef->benefits_section->title)) {
        echo '<h2 class="text-md-center text-lg-left">';
        if (isset($content->be_a_chef->benefits_section->title->black)) {
            echo $content->be_a_chef->benefits_section->title->black;
        }
        if (isset($content->be_a_chef->benefits_section->title->orange)) {
            echo '<span class="text-orange"> ';
            echo $content->be_a_chef->benefits_section->title->orange;
            echo '</span>';
        }
        echo '</h2>';
    }
    if (isset($content->be_a_chef->benefits_section->benefits)) {
        $count = 0;
        foreach ($content->be_a_chef->benefits_section->benefits as $benefit) {
            echo '<div class="row benefits-row align-items-center">';
            $image_order = "order-1";
            $text_order = "order-2";
            if ($count % 2 == 1) {
                $image_order = "order-md-2 order-lg-1 order-xl-2";
                $text_order = "order-md-1 order-lg-2 order-xl-1";
            }
            echo '<div class="col-md-6 col-lg-12 col-xl-6 ' . $image_order . '">';
            if (isset($benefit->image->url) && isset($benefit->image->alt)) {
                echo '<img src="' . $benefit->image->url . '" alt="' . $benefit->image->alt . '" class="img-fluid">';
            }
            echo '</div>';
            echo '<div class="col-md-6 col-lg-12 col-xl-6 ' . $text_order . '">';
            if (isset($benefit->icon->url) && isset($benefit->icon->alt)) {
                echo '<span class="benefit-icon">';
                echo '<img src="' . $benefit->icon->url . '" alt="' . $benefit->icon->alt . '" class="img-fluid">';
                echo '</span>';
            }
            if (isset($benefit->title)) {
                echo '<h3>';
                echo $benefit->title;
                echo '</h3>';
            }
            if (isset($benefit->points)) {
                echo '<ul>';
                foreach ($benefit->points as $point) {
                    echo '<li>';
                    echo $point;
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</div>';
            echo '</div>';
            $count++;
        }
    }
    echo '</div>'; //col
    echo '<div class="col-lg-5 col-xl-4 pos-tracker order-lg-2 order-1">';
    //Contact Form
    if (isset($content->be_a_chef->contact_form)) {
        echo '<div class="contact-form-wrapper">';
        if (isset($content->be_a_chef->contact_form->title)) {
            echo '<h3>';
            echo $content->be_a_chef->contact_form->title;
            echo '</h3>';
        }
        if (isset($content->be_a_chef->contact_form->fields)) {
            echo '<form method="POST">';
            echo '<div class="row">';
            echo '<div class="col-12">';
            if (isset($_SESSION['be_a_chef_form_message'])) {
                $add_class = "";
                if ($_SESSION['be_a_chef_form_message']['type'] == 'error') {
                    $add_class = "text-danger";
                } else if ($_SESSION['be_a_chef_form_message']['type'] == 'success') {
                    $add_class = "text-success";
                }
                echo '<div class="' . $add_class . ' mb-2">';
                echo $_SESSION['be_a_chef_form_message']['text'];
                echo '</div>';
                unset($_SESSION['be_a_chef_form_message']);
            }
            echo '</div>';
            foreach ($content->be_a_chef->contact_form->fields as $field) {
                if (isset($field->id)) {
                    $type = isset($field->type) ? $field->type : "text";
                    $required = (bool) isset($field->required) ? $field->required : false;
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
            if (isset($content->be_a_chef->contact_form->button_label)) {
                $submit_label = $content->be_a_chef->contact_form->button_label;
            }
            echo '<div class="col-12 text-center">';
            echo '<div class="g-recaptcha d-flex align-items-center justify-content-center" data-sitekey="' . CAPTCHA_SITEKEY . '"></div>';
            echo '<button class="btn btn-primary mt-3">' . $submit_label . '</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}



/**
 * Why HMFoodwala
 */
if (isset($content->be_a_chef->why_hmfoodwala)) {
    echo '<section class="why-hmfoodwala mb-5">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-lg-10 offset-lg-1">';
    if (isset($content->be_a_chef->why_hmfoodwala->title)) {
        echo '<h2>';
        if (isset($content->be_a_chef->why_hmfoodwala->title->black)) {
            echo $content->be_a_chef->why_hmfoodwala->title->black;
        }
        if (isset($content->be_a_chef->why_hmfoodwala->title->orange)) {
            echo '<span class="text-orange"> ';
            echo $content->be_a_chef->why_hmfoodwala->title->orange;
            echo '</span>';
        }
        echo '</h2>';
    }
    if (isset($content->be_a_chef->why_hmfoodwala->description)) {
        foreach ($content->be_a_chef->why_hmfoodwala->description as $description) {
            echo '<p>';
            echo $description;
            echo '</p>';
        }
    }
    echo '</div>'; //col
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}


/**
 * Why HMFoodwala
 */
if (isset($content->be_a_chef->chef_app)) {
    echo '<section class="chef-app pt-5">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 text-center">';
    if (isset($content->be_a_chef->chef_app->button->text)) {
        echo '<h2 class="sr-only">';
        echo $content->be_a_chef->chef_app->button->text;
        echo '</h2>';
    }
    if (isset($content->be_a_chef->chef_app->stats)) {
        echo '<div class="stats-container">';
        foreach ($content->be_a_chef->chef_app->stats as $stat) {
            echo '<div class="stats-wrap">';
            if (isset($stat->number)) {
                echo '<div class="stats-number">';
                echo $stat->number;
                echo '</div>';
            }
            if (isset($stat->title)) {
                echo '<div class="stats-title">';
                echo $stat->title;
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }
    if (isset($content->be_a_chef->chef_app->button) && isset($content->be_a_chef->chef_app->button->url)) {
        echo '<a class="btn btn-lg btn-primary mt-5" href="' . $content->be_a_chef->chef_app->button->url . '">';
        if (isset($content->be_a_chef->chef_app->button->icon)) {
            if (strpos($content->be_a_chef->chef_app->button->icon, '.svg') !== false) {
                include($content->be_a_chef->chef_app->button->icon);
            } else {
                echo '<img src="' . $content->be_a_chef->chef_app->button->icon . '" class="img-fluid">';
            }
        }
        if (isset($content->be_a_chef->chef_app->button->text)) {
            echo  '<span class="ml-2">' . $content->be_a_chef->chef_app->button->text . '</span>';
        }
        echo '</a>';
    }
    echo '</div>'; //col
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}
