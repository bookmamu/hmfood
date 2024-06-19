<?php global $content; ?>
$(function () {
  var controller = new ScrollMagic.Controller();
  var timeline = new TimelineMax();
  var wipeAnimation = new TimelineMax()
    <?php
        $totalSlides=count($content->home->how_it_works->slides);
        $add=100/$totalSlides;
        for($i=1;$i<$totalSlides;$i++){
            echo '.to("#slideContainer", 0.3, { x: "-'.$add*$i.'%" })';
        }
        echo ';';
    ?>
    var wipeAnimation1 = new TimelineMax()
    <?php 
    for($i=1;$i<$totalSlides;$i++){
        echo '.to("#slideContainer1", 0.3, { x: "-'.$add*$i.'%" })';
    }
    echo ';';
    ?>
    timeline.add(wipeAnimation).add(wipeAnimation1, 0);
    new ScrollMagic.Scene({
        triggerElement: "#pinContainer",
        triggerHook: "onLeave",
        duration: "100%",
    })
    .setPin("#pinContainer")
    .setTween(timeline)
    .addTo(controller);
});
