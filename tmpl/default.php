<?php
/*
 * Rotating Background module - default layout
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// No direct access.
defined('_JEXEC') or die;

?>

<script type="text/javascript">

//Animation variables 
var fadeSpeed = <?php echo $params->get("transition_time"); ?>;
var holdTime = <?php echo $params->get("image_time"); ?>;
var imagelocation = "<?php echo $images_folder; ?>";

// Create an array of images that you'd like to use 
var images = [
<?php foreach ($images as $image) {
	echo '"'.$image.'", '; 
} ?>
];
preload(imagelocation, images);

<?php if ($random_order) : ?>
var index = Math.floor(Math.random()*images.length);
<?php else : ?>
var index = 0;
<?php endif; ?>

// Call backstretch for the first time, 
$j.backstretch(imagelocation+images[index], {speed: fadeSpeed});

// Set an interval that increments the index and sets the new image 
setInterval(function() {
	index = (index >= images.length - 1) ? 0 : index + 1;
	$j.backstretch(imagelocation+images[index]);
}, holdTime);

</script>
