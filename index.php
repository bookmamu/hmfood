<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./inc/router.php');
include('./config.php');
include('./globals.php');
include('./inc/core.php');

$routes = array(
    'HOME'      => '/',
    'CONTACT'   => '/contact',
    'BE_A_CHEF' => '/be-a-chef',
    'NUTRITION' => '/nutrition-information'
);

//load styles
enque_style(APPLICATION_URL . STYLE_URI . 'bootstrap.min.css');
enque_style(APPLICATION_URL . STYLE_URI . 'fontawesome.min.css');
enque_style(APPLICATION_URL . STYLE_URI . 'swiper-bundle.min.css');
enque_style(APPLICATION_URL . STYLE_URI . 'venobox.min.css');
enque_style(APPLICATION_URL . STYLE_URI . 'hmfoodwala.css');
enque_style("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");


//load script
enque_script(APPLICATION_URL . SCRIPT_URI . 'jquery-3.5.1.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'popper.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'bootstrap.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'swiper-bundle.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'venobox.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'isotope.pkgd.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'gsap.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'ScrollMagic.min.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'animation.gsap.min.js');
enque_script('https://www.google.com/recaptcha/api.js');
enque_script(APPLICATION_URL . SCRIPT_URI . 'hmfoodwala.js');

//set defaults
set_favicon(APPLICATION_URL . IMAGES_URI . 'favicon.png');
set_title('HMFoodwala - Home Made Food Service');

Route::add($routes['HOME'], function () {
    add_class_to_body('home');
    render_page(function () {
        get_template_part('header');
        get_template('home');
        get_template_part('ratings');
        get_template_part('footer');
    });
});


Route::add($routes['CONTACT'], function () {
    add_class_to_body('contact');
    add_class_to_body('inner-page');
    render_page(function () {
        get_template_part('header');
        get_template('contact');
        get_template_part('ratings');
        get_template_part('footer');
    });
});

Route::add($routes['CONTACT'], function () {
    global $routes;
    if (isset($_POST)) {
        $recaptcha = $_POST['g-recaptcha-response'];
        $res = reCaptcha($recaptcha);
        if(!$res['success']){
            $_SESSION['contact_form_message'] = array('type' => 'error', 'text' => 'Captcha is Required');
        }
        else{
            $subject = "New Submission for Contact Form - HMFoodwala";
    
            $message = "<p>Hello Admin,</p>";
            $message .= "<br>";
            $message .= "<p>There is a new submission for contact form on HMFoodwala.</p>";
            $message .= "<p>Please find the details below</p>";
    
            $message .= '<table>';
            $message .= '<tr>';
            $message .= '<th>Key</th>';
            $message .= '<th>Value</th>';
            $message .= '</tr>';
    
            foreach ($_POST as $key => $value) {
                if($key!='g-recaptcha-response'){
                    $message .= '<tr>';
                    $message .= '<td>' . $key . '</td>';
                    $message .= '<td>' . $value . '</td>';
                    $message .= '</tr>';
                }
            }
            $message .= '</table>';
    
            $header = "From:admin@hmfoodwala.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
    
            $retval = mail(ADMIN_EMAIL, $subject, $message, $header);
    
            if ($retval == true) {
                $_SESSION['contact_form_message'] = array('type' => 'success', 'text' => 'Form submitted successfully.');
            } else {
                $_SESSION['contact_form_message'] = array('type' => 'error', 'text' => 'There was an error submitting the form.');
            }
        }
    }
    header('Location:' . APPLICATION_URL . $routes['CONTACT']);
}, 'post');

Route::add($routes['BE_A_CHEF'], function () {
    add_class_to_body('be-a-chef');
    add_class_to_body('inner-page');
    render_page(function () {
        get_template_part('header');
        get_template('be-a-chef');
        get_template_part('ratings');
        get_template_part('footer');
    });
});

Route::add($routes['BE_A_CHEF'], function () {
    global $routes;
    if (isset($_POST)) {
       
            $subject = "New Submission for Be A Chef Form - HMFoodwala";
    
            $message = "<p>Hello Admin,</p>";
            $message .= "<br>";
            $message .= "<p>There is a new submission for Be A Chef form on HMFoodwala.</p>";
            $message .= "<p>Please find the details below</p>";
    
            $message .= '<table>';
            $message .= '<tr>';
            $message .= '<th>Key</th>';
            $message .= '<th>Value</th>';
            $message .= '</tr>';
    
            foreach ($_POST as $key => $value) {
                if($key!='g-recaptcha-response'){
                	$message .= '<tr>';
	                $message .= '<td>' . $key . '</td>';
	                $message .= '<td>' . $value . '</td>';
	                $message .= '</tr>';
	        }
            }
            $message .= '</table>';
    
            $header = "From:admin@hmfoodwala.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
    
            $retval = mail(ADMIN_EMAIL, $subject, $message, $header);
    
            if ($retval == true) {
                
                $autorespond_subject="Thanks for showing interest in HMFoodwala";
                ob_start();
                include("./templates/autorespond-be-a-chef.php");
		$autorespond_message= ob_get_clean();        
               	$response=mail($_POST['email'], $autorespond_subject, $autorespond_message, $header);
               	if($response){
               		$_SESSION['be_a_chef_form_message'] = array('type' => 'success', 'text' => 'Form submitted successfully, Kindly check your email');
               	}
               	else{
               		$_SESSION['be_a_chef_form_message'] = array('type' => 'success', 'text' => 'Form submitted successfully.');	
               	}
            } else {
                $_SESSION['be_a_chef_form_message'] = array('type' => 'error', 'text' => 'There was an error submitting the form.');
            }
    }
    header('Location:' . APPLICATION_URL . $routes['BE_A_CHEF']);
}, 'post');

Route::add($routes['NUTRITION'], function () {
    add_class_to_body('nutrition-information');
    add_class_to_body('inner-page');
    render_page(function () {
        get_template_part('header');
        get_template('nutrition-information');
        get_template_part('ratings');
        get_template_part('footer');
    });
});


Route::pathNotFound(function () {
    add_class_to_body('page-404');
    render_page(function () {
    });
});


Route::run(APPLICATION_SUBDIR);

echo '</html>';
