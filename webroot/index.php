<?php 
/**
 * This is a jackdaw pagecontroller.
 *
 */
// Include the essential config-file which also creates the $jackdaw variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Jackdaw container.
$jackdaw['title'] = "Välkommen";
 
$jackdaw['main'] = <<<EOD

<h2>Jackdaw</h2>
<p>
This is a page to show you how Jackdaw works!
</p>


EOD;

 
 
include(JACKDAW_THEME_PATH);