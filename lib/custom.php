<?php
/**
 * Custom functions
 */


/**
* Bootstrap Carousel
**/
function krank_carousel($slide_type, $id, $controls, $captions) {
	global $krank; // Global variable for custom options
	
	$i = 0; // Loop counter
	
	foreach($krank[$slide_type] as $slides):
		
		if ($i === 0 ): $active = ' active'; else: $active = ''; endif; // .active class for first slide
		
		if ($captions != false):
			$caption =
			 	'<div class="carousel-caption">
			 		<span class="carousel-title">'.$slides['slide_title'].'</span>
			 		<p class="carousel-description">'.$slides['slide_description'].'</p>
			 	</div>';
		endif;
		
		$items .= // Carousel Slides
			'<div class="item'.$active.'">
				<img src="'.$slides['slide_image_url'].'" alt="'.$slides['slide_title'].'" class="slide-img" height="'.$slides['slide_image_height'].'" width="'.$slides['slide_image_width'].'" />'.
				$caption.
			'</div>';
		
		$indicators .= // Carousel indicators
			'<li data-target="#'.$id.'" data-slide-to="'.$i.'" class="'.$active.'"></li>';
	
	$i ++; // counter
	endforeach;
	
	if ($controls != false):
		$control =
	        '<a class="left carousel-control" href="#'.$id.'" data-slide="prev">
		        <span class="glyphicon glyphicon-chevron-left"></span>
	        </a>
	        <a class="right carousel-control" href="#'.$id.'" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
	        </a>';
	endif;
	
	$output = // Putting it all together
		'<div id="'.$id.'" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">'.
				$indicators.
			'</ol>
			<div class="carousel-inner">'.
				$items.
			'</div>'.
			$control.
		 '</div><!--/#'.$id.'-->';
		 
		echo $output;
}