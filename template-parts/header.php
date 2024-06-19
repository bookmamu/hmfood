<?php

/**
 * This file contains the header of the website
 * Header ideally includes logo and navigation
 * @since 1.0.0
 * @author Niraj Gohel
 */
global $content, $routes;
echo '<header>';
echo '<div class="container">';
echo '<nav class="navbar navbar-expand-md navbar-light">';
if (isset($content->header->logo)) {
  echo '<a class="navbar-brand" href="' . APPLICATION_URL . '">';
  if (strpos($content->header->logo->url, '.svg') !== false) {
    include_once($content->header->logo->url);
  } else {
    echo '<img src="' . $content->header->logo->url . '" alt="' . $content->header->logo->alt . '" class="img-fluid">';
  }
  echo '</a>';
}
echo '<button type="button" class="navbar-toggler hamburger hamburger--emphatic link" data-toggle="collapse" data-target="#headnavigationbar" aria-controls="headnavigationbar" aria-expanded="false" aria-label="Toggle navigation" >';
echo '<span class="hamburger-box"><span class="hamburger-inner"></span></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="headnavigationbar">';
echo '<ul class="navbar-nav align-items-center ml-auto">';
foreach ($content->header->navigation as $link_obj) {
  $nav_item_classes = array('nav-item');
  $nav_link_classes = array('nav-link');
  $match_link=str_replace('.','',$link_obj->link);
  $match_url=str_replace(APPLICATION_SUBDIR,'',$_SERVER['REQUEST_URI']);
  if ($match_link === $match_url || $match_link === APPLICATION_URL.APPLICATION_SUBDIR . $match_url|| $match_link === APPLICATION_SUBDIR . $match_url) {
    $nav_item_classes[] = "active";
  }
  if ($link_obj->type == "button") {
    $nav_link_classes = array("btn btn-primary");
  }
  echo '<li class="' . implode(' ', $nav_item_classes) . '">';
  echo '<a class="' . implode(' ', $nav_link_classes) . '" href="' . $link_obj->link . '">' . $link_obj->text . '</a>';
  echo '</li>';
}
echo '</ul>';
echo '</div>';
echo '</nav>';
echo '</div>';
echo '</header>';
