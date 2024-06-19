<?php
/**
 * This file contains the rating section
 * @since 1.0.0
 * @author Niraj Gohel
 */
global $content;
if (isset($content->ratings)) {
    echo '<section class="ratings">';
    echo '<div class="container">';
    if (isset($content->ratings->title)) {
        echo '<h2 class="sr-only">';
        echo $content->ratings->title;
        echo '</h2>';
    }
    echo '<div class="row justify-content-center">';
    if (isset($content->ratings->playstore)) {
        echo '<div class="col-md-6 col-12 mb-4 mb-md-0">';
        echo '<div class="d-flex flex-column align-items-center">';
        echo '<div class="d-flex align-items-center">';
        if (isset($content->ratings->playstore->star)) {
            echo '<span class="rating-text">';
            echo  $content->ratings->playstore->star;
            echo '</span>';
        }
        echo '<div class="ml-4">';
        if (isset($content->ratings->playstore->star)) {
            echo '<div class="rating-stars">';
            for ($i = 0; $i < (int)$content->ratings->playstore->star; $i++) {
                echo '<span class="fas fa-star"></span>';
            }
            if($content->ratings->playstore->star > (int)$content->ratings->playstore->star){
               echo '<span class="fas fa-star-half-alt"></span>';
           }
           echo '</div>';
       }
       if (isset($content->ratings->playstore->text)) {
        echo '<span class="rating-platform">';
        echo $content->ratings->playstore->text;
        echo '</span>';
    }
    echo '</div>';
    echo '</div>';
    if (isset($content->ratings->playstore->button)) {
        if (
            isset($content->ratings->playstore->button->url) &&
            isset($content->ratings->playstore->button->text)
        ) {
            echo '<a href="' . $content->ratings->playstore->button->url . '" class="btn btn-primary">';
            if (isset($content->ratings->playstore->button->icon)) {
                if (strpos($content->ratings->playstore->button->icon, '.svg') !== false) {
                    include($content->ratings->playstore->button->icon);
                } else {
                    echo '<img src="' . $content->ratings->playstore->button->icon . '" class="img-fluid">';
                }
            }
            echo  '<span class="ml-2">' . $content->ratings->playstore->button->text . '</span>';
            echo '</a>';
        }
    }
    echo '</div>';
    echo '</div>';
}
if (isset($content->ratings->appstore)) {
    echo '<div class="col-md-6 col-12 mb-4 mb-md-0">';
    echo '<div class="d-flex flex-column align-items-center">';
    echo '<div class="d-flex align-items-center">';
    if (isset($content->ratings->appstore->star)) {
        echo '<span class="rating-text">';
        echo  $content->ratings->appstore->star;
        echo '</span>';
    }
    echo '<div class="ml-4">';
    if (isset($content->ratings->appstore->star)) {
        echo '<div class="rating-stars">';
        for ($i = 0; $i < (int)$content->ratings->appstore->star; $i++) {
            echo '<span class="fas fa-star"></span>';
        }
        if($content->ratings->playstore->star > (int)$content->ratings->playstore->star){
           echo '<span class="fas fa-star-half-alt"></span>';
       }
       echo '</div>';
   }
   if (isset($content->ratings->appstore->text)) {
    echo '<span class="rating-platform">';
    echo $content->ratings->appstore->text;
    echo '</span>';
}
echo '</div>';
echo '</div>';
if (isset($content->ratings->appstore->button)) {
    if (
        isset($content->ratings->appstore->button->url) &&
        isset($content->ratings->appstore->button->text)
    ) {
        echo '<a href="' . $content->ratings->appstore->button->url . '" class="btn btn-primary">';
        if (isset($content->ratings->appstore->button->icon)) {
            if (strpos($content->ratings->appstore->button->icon, '.svg') !== false) {
                include($content->ratings->appstore->button->icon);
            } else {
                echo '<img src="' . $content->ratings->appstore->button->icon . '" class="img-fluid">';
            }
        }
        echo  '<span class="ml-2">' . $content->ratings->appstore->button->text . '</span>';
        echo '</a>';
    }
}
echo '</div>';
echo '</div>';
}
    echo '</div>'; //row
    if (isset($content->ratings->testimonials)) {
        echo '<div class="row">';
        echo '<div class="col-12 offset-lg-1 col-lg-10">';
        echo '<div class="rating-slider swiper-container py-5 mt-5">';
        echo '<div class="swiper-wrapper">';
        foreach ($content->ratings->testimonials as $testimonial) {
            echo '<div class="swiper-slide">';
            if (isset($testimonial->text) && isset($testimonial->author)) {
                echo '<div class="rating-slide-blk text-center">';
                echo '<p>';
                echo $testimonial->text;
                echo '</p>';
                echo '<h3>';
                echo $testimonial->author;
                echo '</h3>';
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="swiper-pagination"></div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</section>';
}
