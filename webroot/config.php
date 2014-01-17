<?php
/**
 * Config-file for jackdaw. Change settings here to affect installation.
 *
 */

/**
 * Define jackdaw paths.
 *
 */
define('JACKDAW_INSTALL_PATH', __DIR__ . '/..');
define('JACKDAW_THEME_PATH', JACKDAW_INSTALL_PATH . '/theme/render.php');

/**
 * Include bootstrapping functions.
 *
 */
include(JACKDAW_INSTALL_PATH . '/src/bootstrap.php');

/**
 * Start the session.
 *
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

/**
 * Create the jackdaw variable.
 *
 */
$jackdaw = array();


/**
 * Site wide settings.
 *
 */
$jackdaw['lang']         = 'sv';
$jackdaw['title_append'] = ' | Jackdaw';

$jackdaw['header'] = <<<EOD
<div class='sitetitle'>Jackdaw</div>
EOD;


$jackdaw['footer'] = <<<EOD
<footer>
<p class="copyright">Copyright ©  
</p>
<p class="links">
    <a href="http://validator.w3.org/check/referer">HTML5</a> / 
    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> / 
    <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
</p>
</footer>
EOD;




/**
 * The navbar
 *
 */
//$jackdaw['navbar'] = null; // To skip the navbar

$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null; 
if($acronym) { 
$jackdaw['navbar'] = array(
  'class' => 'nb-plain',
  'items' => array(
    'hem'         => array(
        'text'=>'Hem',
        'url'=>'index.php',
        'title' => 'Välkommen'
         ),

  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);
}
else {
 $jackdaw['navbar'] = array(
  'class' => 'nb-plain',
  'items' => array(
    'hem'         => array(
        'text'=>'Hem',
        'url'=>'index.php',
        'title' => 'Välkommen'
         ),

  
  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);
}

/**
 * Theme related settings.
 *
 */
//$jackdaw['stylesheet'] = 'css/style.css';
$jackdaw['stylesheets'] = array('css/style.css');
$jackdaw['favicon']    = 'img/favicon2.ico';

/**
 * Settings for JavaScript.
 *
 */
$jackdaw['modernizr']  = 'js/modernizr.js';
$jackdaw['jquery']     = null; // To disable jQuery
$jackdaw['jquery_src'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$jackdaw['javascript_include'] = array();
//$jackdaw['javascript_include'] = array('js/main.js'); // To add extra javascript files
