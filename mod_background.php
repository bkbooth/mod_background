<?php
/*
 * Rotating Background module
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$images_loc = "images".DS."backgrounds".DS.$params->get("image_folder").DS;
$images_folder = JURI::root().$images_loc;
$images_dir = JPATH_SITE.DS.$images_loc;
$images = modBackgroundHelper::getImages($images_dir);

$random_order = $params->get("random_order", 1);
if ($random_order) {
	shuffle($images);
} else {
	sort($images);
}

require(JModuleHelper::getLayoutPath('mod_background'));

?>