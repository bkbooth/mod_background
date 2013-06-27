<?php
/*
 * Rotating Background module - default layout
 * (C) 2012 Benjamin Booth
 */

// No direct access.
defined('_JEXEC') or die;

?>

<script type="text/javascript">

// Add the Google hosted jQuery if not already present
var docHead = document.getElementsByTagName("head")[0];
if (typeof jQuery === 'undefined') {
	newScript = document.createElement('script');
	newScript.type = 'text/javascript';
	newScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
	docHead.appendChild(newScript);
}
// Then add backstretch.js
newScript2 = document.createElement('script');
newScript2.type = 'text/javascript';
newScript2.src = '<?php echo JURI::root(); ?>modules/mod_background/js/jquery.backstretch.min.js';
docHead.appendChild(newScript2);

// Animation variables 
var fadeSpeed = <?php echo $params->get("transition_time"); ?>;
var holdTime = <?php echo $params->get("image_time"); ?>;
var imagelocation = "<?php echo $images_folder; ?>";

// Preload images
function preload(arrayOfImages) {
    $j(arrayOfImages).each(function(){
    	(new Image()).src = this;
    });
};

// Create an array of images that you'd like to use 
var images = [
<?php foreach ($images as $image) {
	echo 'imagelocation + "'.$image.'", '; 
} ?>
];
preload(images);

// Call backstretch
$j.backstretch(images, {duration: holdTime, fade: fadeSpeed});

</script>
