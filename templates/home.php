<?php
/**
 * This file contains the template for homepage of the website
 * @since 1.0.0
 * @author Niraj Gohel
 */
global $content;
/**
 * Banner Section
 */
if (isset($content->home->banner)) {
    echo '<section class="banner">';
    echo '<div class="container">';
    if (isset($content->home->banner->subheader)) {
        echo '<div class="d-flex align-items-center justify-content-center">';
        echo '<h2 class="banner-subheader">';
        echo "<small>\"</small>";
        if (isset($content->home->banner->subheader->small)) {
            echo '<small>';
            echo $content->home->banner->subheader->small;
            echo '</small> ';
        }
        if (isset($content->home->banner->subheader->large)) {
            echo $content->home->banner->subheader->large;
        }
        echo "<small>\"</small>";
        echo '</h2>';
        echo '</div>';
    }
    echo '<div class="row align-items-center">';
    echo '<div class="col-12 col-lg-7 text-center text-lg-left order-2 order-lg-1">';
    if (isset($content->home->banner->header->orange) || isset($content->home->banner->header->black)) {
        echo '<h1 class="banner-header">';
        if (isset($content->home->banner->header->orange)) {
            echo '<span class="text-orange">';
            echo $content->home->banner->header->orange;
            echo '</span>';
        }
        if (isset($content->home->banner->header->black)) {
            echo ' ' . $content->home->banner->header->black;
        }
        echo '</h1>';
    }
    if (isset($content->home->banner->description)) {
        echo '<p class="mb-5 banner-description">';
        echo $content->home->banner->description;
        echo '</p>';
    }
    if (isset($content->home->banner->actions)) {
        foreach ($content->home->banner->actions as $action) {
            if (isset($action->link) && isset($action->icon) && isset($action->text)) {
                echo '<a class="btn btn-dark m-2" href="' . $action->link . '" >';
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
    echo '<div class="col-12 col-lg-5 text-center order-1 order-lg-2 ">';
    if (isset($content->home->banner->image)) {
        if (isset($content->home->banner->image->url) && isset($content->home->banner->image->alt)) {
            echo '<img src="' . $content->home->banner->image->url . '" alt="' . $content->home->banner->image->alt . '" class="banner-image">';
        }
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}
/**
 * Steps Section
 */
if (isset($content->home->steps)) {
    echo '<section class="steps">';
    if (isset($content->home->steps->title)) {
        echo '<h2 class="sr-only">';
        echo $content->home->steps->title;
        echo '</h2>';
    }
    echo '<div class="container-fluid container-lg">';
    if (isset($content->home->steps->image)) {
        if (isset($content->home->steps->image->url) && isset($content->home->steps->image->alt)) {
            echo '<img src="' . $content->home->steps->image->url . '" alt="' . $content->home->steps->image->alt . '" class="img-fluid">';
        }
    }
    echo '</div>';
    echo '</section>';
}
/**
 * Food of India Section
 */
if (isset($content->home->food_of_india)) {
    if (isset($content->home->food_of_india->background)) {
        echo '<section class="food-of-india" style="background-image:url(\'' . $content->home->food_of_india->background . '\')">';
    } else {
        echo '<section class="food-of-india">';
    }
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-md-10 offset-md-1">';
    if (isset($content->home->food_of_india->title->orange) || isset($content->home->food_of_india->title->black)) {
        echo '<h2 class="text-md-center text-lg-left">';
        if (isset($content->home->food_of_india->title->black)) {
            echo $content->home->food_of_india->title->black;
        }
        if (isset($content->home->food_of_india->title->orange)) {
            echo ' <span class="text-orange">';
            echo $content->home->food_of_india->title->orange;
            echo '</span>';
        }
        echo '</h2>';
    }
    if (isset($content->home->food_of_india->description)) {
        echo '<p class="text-md-center text-lg-left">';
        echo $content->home->food_of_india->description;
        echo '</p>';
    }
    echo '</div>';
    echo '</div>';
    if (isset($content->home->food_of_india->states)) {
        echo '<div class="grid">';
        foreach ($content->home->food_of_india->states as $state) {
            echo '<div class="grid-item">';
            echo '<div class="state-card">';
            if (isset($state->map)) {
                if (isset($state->map->url) && isset($state->map->alt)) {
                    echo '<img src="' . $state->map->url . '" alt="' . $state->map->alt . '" class="img-fluid mb-4">';
                }
            }
            echo '<div class="foodindia-thumbnail-blk">';
            echo '<div class="foodindia-small-thumbnail">';
            if (isset($state->map->url) && isset($state->map->alt)) {
                echo '<img src="' . $state->map->url . '" alt="' . $state->map->alt . '" class="img-fluid">';
            }
            if (isset($state->text)) {
                echo '<h3>';
                echo $state->text;
                echo '</h3>';
            }
            echo '</div>';
            echo "<img src=" . $state->image . " alt='dish' class='img-fluid foodindia-thumbnail'>";
            echo '</div>';
            if (isset($state->text)) {
                echo '<h3>';
                echo $state->text;
                echo '</h3>';
            }
            if (isset($state->slides)) {
                foreach ($state->slides as $slide) {
                    if (isset($slide)) {
                        echo "<a href=" . $slide . " data-gall=" . $state->text . " class='venobox foodindia-gallery'></a>";
                    }
                }
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</section>';
}
/**
 * How It Works Section
 */
if (isset($content->home->how_it_works)) {
    echo '<section class="how-it-works" id="pinContainer">';
    echo '<div class="how-it-works-blk">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 col-lg-7">';
    if (isset($content->home->how_it_works->title)) {
        echo '<h2>';
        echo $content->home->how_it_works->title;
        echo '</h2>';
    }
    echo '</div>'; //col
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col-12 col-lg-7 order-2 order-lg-1">';
    echo '<div class="d-flex flex-column h-100">';
    if (isset($content->home->how_it_works->slides)) {
        echo '<div class="mt-auto">';
        echo '<div class="how-it-text-slider">';
        echo '<div id="slideContainer1">';
        foreach ($content->home->how_it_works->slides as $slide) {
            echo '<div class="panel">';
            if (isset($slide->title)) {
                echo '<h3>';
                echo $slide->title;
                echo '</h3>';
            }
            if (isset($slide->description)) {
                echo '<p>';
                echo $slide->description;
                echo '</p>';
            }
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="col-12 col-lg-5 order-1 order-lg-2 mb-5 mb-lg-0">';
    if (isset($content->home->how_it_works->slides)) {
        echo '<div class="how-it-image-slider">';
        echo '<div class="how-it-image-slider-mockup">';
        echo '</div>';
        echo '<div id="slideContainer">';
        foreach ($content->home->how_it_works->slides as $slide) {
            echo '<div class="panel text-center">';
            echo '<div class="how-it-image-blk d-inline-block">';
            if (isset($slide->image->url) && isset($slide->image->alt)) {
                echo '<img src="' . $slide->image->url . '" alt="' . $slide->image->alt . '" class="img-fluid">';
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}
/**
 * Homemade Vs Restaurant
 */
if (isset($content->home->hm_vs_restaurant)) {
    echo '<section class="hm-vs-restaurant">';
    echo '<div class="container">';
    echo '<div class="row mb-4">';
    echo '<div class="col-12 col-md-10 offset-md-1 text-md-center">';
    if (isset($content->home->hm_vs_restaurant->title)) {
        echo '<h2 class="mb-3">';
        echo $content->home->hm_vs_restaurant->title;
        echo '</h2>';
    }
    if (isset($content->home->hm_vs_restaurant->points)) {
        echo '<ul class="list-unstyled diff-points">';
        foreach ($content->home->hm_vs_restaurant->points as $point) {
            echo '<li>';
            echo $point;
            echo '</li>';
        }
        echo '</ul>';
    }
    echo '</div>'; //column
    echo '</div>'; //row
    if (isset($content->home->hm_vs_restaurant->graphics)) {
        echo '<div class="row align-items-center">';
        echo '<div class="col-12 col-md-5">';
        if (isset($content->home->hm_vs_restaurant->graphics->homemade)) {
            if (isset($content->home->hm_vs_restaurant->graphics->homemade->image->url) && isset($content->home->hm_vs_restaurant->graphics->homemade->image->alt)) {
                echo '<img src="' . $content->home->hm_vs_restaurant->graphics->homemade->image->url . '" alt="' . $content->home->hm_vs_restaurant->graphics->homemade->image->alt . '" class="img-fluid">';
            }
            if (isset($content->home->hm_vs_restaurant->graphics->homemade->text)) {
                echo '<h3 class="mt-5 text-center font-italic font-weight-bold">';
                echo $content->home->hm_vs_restaurant->graphics->homemade->text;
                echo '</h3>';
            }
        }
        echo '</div>'; //col-md-5
        echo '<div class="col-12 col-md-2">';
        if (isset($content->home->hm_vs_restaurant->graphics->vs)) {
            if (isset($content->home->hm_vs_restaurant->graphics->vs->horizontal_image->url) && isset($content->home->hm_vs_restaurant->graphics->vs->horizontal_image->alt)) {
                echo '<img src="' . $content->home->hm_vs_restaurant->graphics->vs->horizontal_image->url . '" alt="' . $content->home->hm_vs_restaurant->graphics->vs->horizontal_image->alt . '" class="img-fluid d-md-none">';
            }
            if (isset($content->home->hm_vs_restaurant->graphics->vs->vertical_image->url) && isset($content->home->hm_vs_restaurant->graphics->vs->vertical_image->alt)) {
                echo '<img src="' . $content->home->hm_vs_restaurant->graphics->vs->vertical_image->url . '" alt="' . $content->home->hm_vs_restaurant->graphics->vs->vertical_image->alt . '" class="img-fluid d-none d-md-inline">';
            }
        }
        echo '</div>'; //col-md-2
        echo '<div class="col-12 col-md-5">';
        if (isset($content->home->hm_vs_restaurant->graphics->restaurant)) {
            if (isset($content->home->hm_vs_restaurant->graphics->restaurant->image->url) && isset($content->home->hm_vs_restaurant->graphics->restaurant->image->alt)) {
                echo '<img src="' . $content->home->hm_vs_restaurant->graphics->restaurant->image->url . '" alt="' . $content->home->hm_vs_restaurant->graphics->restaurant->image->alt . '" class="img-fluid">';
            }
            if (isset($content->home->hm_vs_restaurant->graphics->restaurant->text)) {
                echo '<h3 class="mt-5 text-center font-italic font-weight-bold">';
                echo $content->home->hm_vs_restaurant->graphics->restaurant->text;
                echo '</h3>';
            }
        }
        echo '</div>';
    }
    echo '</div>';
    echo '</section>';
}
/**
 * Subscriptions Section
 */
if (isset($content->home->subscriptions)) {
    echo '<section class="subscriptions">';
    echo '<div class="container">';
    echo '<div class="row align-items-center ">';
    echo '<div class="col-12 col-md-6">';
    if (isset($content->home->subscriptions->image->url) && isset($content->home->subscriptions->image->alt)) {
        echo '<img src="' . $content->home->subscriptions->image->url . '" alt="' . $content->home->subscriptions->image->alt . '" class="img-fluid">';
    }
    echo '</div>';
    echo '<div class="col-12 col-md-6 pl-md-5">';
    if (isset($content->home->subscriptions->title)) {
        echo '<h2 class="mt-5 mt-md-0 text-center text-md-left">';
        if (isset($content->home->subscriptions->title->orange)) {
            echo '<span class="text-orange"> ';
            echo $content->home->subscriptions->title->orange;
            echo '</span>';
        }
        if (isset($content->home->subscriptions->title->black)) {
            echo $content->home->subscriptions->title->black;
        }
        echo '</h2>';
    }
    if (isset($content->home->subscriptions->description)) {
        echo '<p class="text-center text-md-left">';
        echo $content->home->subscriptions->description;
        echo '</p>';
    }
    echo '</div>'; //column
    echo '</div>'; //row
    echo '</div>'; //container
    echo '</section>';
}
/**
 * Nutrition Information
 */
if (isset($content->home->nutrition_information)) {
    echo '<section class="nutrition_information">';
    echo '<div class="container">';
    echo '<div class="row align-items-center">';
    echo '<div class="col-12 col-md-6 order-2 order-md-1">';
    if (isset($content->home->nutrition_information->title)) {
        echo '<h2>';
        if (isset($content->home->nutrition_information->title->orange)) {
            echo '<span class="text-orange">';
            echo $content->home->nutrition_information->title->orange;
            echo '</span> ';
        }
        if (isset($content->home->nutrition_information->title->black)) {
            echo $content->home->nutrition_information->title->black;
        }
        echo '</h2>';
    }
    if (isset($content->home->nutrition_information->description)) {
        echo '<p>';
        echo $content->home->nutrition_information->description;
        echo '</p>';
    }
    if (isset($content->home->nutrition_information->action->text) && isset($content->home->nutrition_information->action->url)) {
        echo '<a class="btn btn-outline-primary mt-3" href="' . $content->home->nutrition_information->action->url . '" >' . $content->home->nutrition_information->action->text . '</a>';
    }
    echo '</div>';
    echo '<div class="col-12 col-md-6 order-1 order-md-2 mb-5 mb-md-0">';
    if (isset($content->home->nutrition_information->image->url) && isset($content->home->nutrition_information->image->alt)) {
        echo '<img src="' . $content->home->nutrition_information->image->url . '" alt="' . $content->home->nutrition_information->image->alt . '" class="img-fluid">';
    }
    echo '</div>';
    echo '</div>';
    echo '</section>';
}
