<?php
global $content;
if (isset($content->footer)) {
    echo '<footer>';
    echo '<div class="container">';
    echo '<div class="row logo-row">';
    echo '<div class="col-12 col-lg-6 text-center text-lg-left mb-3 mb-lg-0">';
    if (isset($content->footer->logo->url) && isset($content->footer->logo->alt)) {
        echo '<a href="' . APPLICATION_URL . '">';
        echo '<img src="' . $content->footer->logo->url . '" alt="' . $content->footer->logo->alt . '" class="img-fluid">';
        echo '</a>';
    }
    echo '</div>';
    echo '<div class="col-12 col-lg-6 text-center text-lg-right">';
    echo '<div class="d-block d-sm-flex align-items-center justify-content-center justify-content-lg-end">';
    if (isset($content->footer->actions)) {
        foreach ($content->footer->actions as $action) {
            if (isset($action->link) && isset($action->icon) && isset($action->text)) {
                echo '<a class="btn btn-dark ml-2 mb-3 mb-sm-0" href="' . $action->link . '" >';
                if (strpos($action->icon, '.svg') !== false) {
                    include($action->icon);
                } else {
                    echo '<img src="' . $action->icon . '" alt="store-icon" class="img-fluid"/>';
                }
                echo  '<span class="ml-2">' . $action->text . '</span>';
                echo '</a>';
            }
        }
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<hr/>';
    echo '<div class="row mt-4 mt-lg-5">';
    echo '<div class="col-md-6 col-lg-5 text-center text-lg-left mb-3 mb-lg-0">';
    if (isset($content->footer->contact)) {
        echo '<h2>';
        if (isset($content->footer->contact->icon)) {
            echo '<span class="' . $content->footer->contact->icon . '"></span>';
        }
        if (isset($content->footer->contact->title)) {
            echo $content->footer->contact->title;
        }
        echo '</h2>';
        if (isset($content->footer->contact->url)) {
            echo '<a href="' . $content->footer->contact->url . '">';
        }
        if (isset($content->footer->contact->text)) {
            echo $content->footer->contact->text;
        }
        if (isset($content->footer->contact->url)) {
            echo '</a>';
        }
    }
    echo '</div>';
    echo '<div class="col-md-6 col-lg-4 col-xl-5 text-center text-lg-left mb-3 mb-lg-0">';
    if (isset($content->footer->speak_with_us)) {
        echo '<h2>';
        if (isset($content->footer->speak_with_us->icon)) {
            echo '<span class="' . $content->footer->speak_with_us->icon . '"></span>';
        }
        if (isset($content->footer->speak_with_us->title)) {
            echo $content->footer->speak_with_us->title;
        }
        echo '</h2>';
        if (isset($content->footer->speak_with_us->url)) {
            echo '<a href="' . $content->footer->speak_with_us->url . '">';
        }
        if (isset($content->footer->speak_with_us->text)) {
            echo $content->footer->speak_with_us->text;
        }
        if (isset($content->footer->speak_with_us->url)) {
            echo '</a>';
        }
    }
    echo '</div>';
    echo '<div class="col-lg-3 col-xl-2 text-center text-lg-left mb-3 mb-lg-0">';
    if (isset($content->footer->social_media)) {
        echo '<h2>';
        if (isset($content->footer->social_media->icon)) {
            echo '<span class="' . $content->footer->social_media->icon . '"></span>';
        }
        if (isset($content->footer->social_media->title)) {
            echo $content->footer->social_media->title;
        }
        echo '</h2>';
        if (isset($content->footer->social_media->links)) {
            foreach ($content->footer->social_media->links as $link) {
                if (isset($link->url) && isset($link->icon)) {
                    echo '<a href="' . $link->url . '" class="social-media-link">';
                    echo '<span class="' . $link->icon . '"></span>';
                    echo '</a>';
                }
            }
        }
    }
    echo '</div>'; //column
    echo '</div>'; //row
    if (isset($content->footer->copyright)) {
        echo '<div class="d-flex align-items-center justify-content-center mt-4 mt-lg-5">';
        echo '<small>';
        echo $content->footer->copyright;
        echo '</small>';
        echo '</div>';
    }
    echo '</div>'; //container
    echo '</footer>';
}
