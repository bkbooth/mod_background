<?php
/*
 * Rotating Background module - helper
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// no direct access
defined('_JEXEC') or die;

class modBackgroundHelper {
	
	function getImages ($images_dir) {
		$images_list = array();
		if ($handle = opendir($images_dir)) {
			while (false !== ($file = readdir($handle))) {
				if (getimagesize($images_dir.$file)) {
					array_push($images_list, $file);
				}
			}
			closedir($handle);
		}
		return $images_list;
	} // function getImages
	
} // class modBackgroundHelper

?>