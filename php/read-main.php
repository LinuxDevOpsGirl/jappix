<?php

/*

Jappix - An open social platform
This is the main configuration reader

~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~

License: AGPL
Author: Valérian Saliou
Contact: http://project.jappix.com/contact
Last revision: 30/10/10

*/

// Define the default main configuration values
$main_conf = array();
$main_conf['name'] = 'Jappix';
$main_conf['desc'] = 'a free social network';
$main_conf['resource'] = 'Jappix';
$main_conf['lock'] = 'off';
$main_conf['anonymous'] = 'on';
$main_conf['https_storage'] = 'off';
$main_conf['encryption'] = 'on';
$main_conf['compression'] = 'on';
$main_conf['developer'] = 'off';

// Define a default values array
$main_default = $main_conf;

// Read the main configuration file
$main_data = readXML('conf', 'main');

// Read the main configuration file
if($main_data) {
	// Initialize the main configuration XML data
	$main_xml = new SimpleXMLElement($main_data);
	
	// Loop the main configuration elements
	foreach($main_xml->children() as $main_child) {
		$main_value = $main_child->getName();
		
		// Only push this to the array if it exists
		if(isset($main_conf[$main_value]) && $main_child)
			$main_conf[$main_value] = $main_child;
	}
}

// Finally, define the main configuration globals
define('SERVICE_NAME', $main_conf['name']);
define('SERVICE_DESC', $main_conf['desc']);
define('JAPPIX_RESOURCE', $main_conf['resource']);
define('LOCK_HOST', $main_conf['lock']);
define('ANONYMOUS', $main_conf['anonymous']);
define('HTTPS_STORAGE', $main_conf['https_storage']);
define('ENCRYPTION', $main_conf['encryption']);
define('COMPRESSION', $main_conf['compression']);
define('DEVELOPER', $main_conf['developer']);

?>