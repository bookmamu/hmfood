<?php
global $content;

/**
 * Banner
 */
if (isset($content->nutrition_information->title)) {
    echo '<section class="inner-page-banner">';
    echo '<div class="container">';
    echo '<h1>';
    echo $content->nutrition_information->title;
    echo '</h1>';
    echo '</div>';
    echo '</section>';
}
/**
 * Information Section
 */
if (isset($content->nutrition_information->info_section)) {
    echo '<section class="nutrition-info-section">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-md-8 offset-md-2 text-center">';
    if (isset($content->nutrition_information->info_section->title)) {
        echo '<h2>';
        if (isset($content->nutrition_information->info_section->title->orange)) {
            echo '<span class="text-orange">';
            echo $content->nutrition_information->info_section->title->orange;
            echo '</span> ';
        }
        if (isset($content->nutrition_information->info_section->title->black)) {
            echo $content->nutrition_information->info_section->title->black;
        }
        echo '</h2>';
    }
    if (isset($content->nutrition_information->info_section->punchline)) {
        echo '<p class="punchline">';
        echo $content->nutrition_information->info_section->punchline;
        echo '</p>';
    }
    if (isset($content->nutrition_information->info_section->description)) {
        echo '<p>';
        echo $content->nutrition_information->info_section->description;
        echo '</p>';
    }
    echo '</div>'; //colum
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}

if (isset($content->nutrition_information->how_it_works)) {
    echo '<section class="how-it-works-and-benefits">';
    echo '<div class="container">';
    if (isset($content->nutrition_information->how_it_works->title)) {
        echo '<h2 class="text-center">';
        if (isset($content->nutrition_information->how_it_works->title->black)) {
            echo $content->nutrition_information->how_it_works->title->black;
        }
        if (isset($content->nutrition_information->how_it_works->title->orange)) {
            echo '<span class="text-orange"> ';
            echo $content->nutrition_information->how_it_works->title->orange;
            echo '</span>';
        }
        echo '</h2>';
    }
    if (isset($content->nutrition_information->how_it_works->benefits)) {
        echo '<div class="row">';
        foreach ($content->nutrition_information->how_it_works->benefits as $benefit) {
            $col_class = "col-12";
            if (isset($benefit->wrapper_col)) {
                $col_class = $benefit->wrapper_col;
            }
            echo '<div class="' . $col_class . ' text-center">';
            if (isset($benefit->image->url) && isset($benefit->image->alt)) {
                echo '<img src="' . $benefit->image->url . '" alt="' . $benefit->image->alt . '" class="img-fluid">';
            }
            if (isset($benefit->description)) {
                echo '<p class="mt-4 bg-white p-2">';
                echo $benefit->description;
                echo '</p>';
            }
            echo '</div>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</section>';
}
