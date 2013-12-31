<?php
/**
 * Krank Custom Shortcodes
 */
global $krank;

//[address title="title"]
function krank_address( $atts ) {
	global $krank;
	
   extract(shortcode_atts(array(
       'title' => '',
   ), $atts));
   
   $address = 
   	'<address class="address vcard" itemtype="http://schema.org/LocalBusiness" itemscope="">
   		<div class="title">'.$title.'</div>
   		<a class="org" href="'.site_url().'"><span itemprop="name">'.$krank['name'].'</span></a>
   		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	   		<span class="street-address" itemprop="streetAddress">'.$krank['street'].'</span>
	   		<span class="locality" itemprop="addressLocality">'.$krank['town'].'</span>
	   		<span class="region" itemprop="addressRegion">'.$krank['region'].'</span>
	   		<span class="postal-code" itemprop="postalCode">'.$krank['postcode'].'</span>
		</span>
   	</address><!--/.address-->';
	
	return $address;
}
add_shortcode('address', 'krank_address');

//[contact title="title"]
function krank_contact( $atts ) {
	global $krank;
	
   extract(shortcode_atts(array(
       'title' => '',
   ), $atts));
   
	if($krank['mob'] != ""):
	   $mob = '<abbr title="Mobile">M: </abbr><a class="mob" itemprop="telephone" href="tel:'.$krank['mob'].'" title="Call ' .$krank['name'].' Today">'.$krank['mob'].'</a>';
	endif;

	$contact =
	'<ul class="contact-info" itemtype="http://schema.org/LocalBusiness" itemscope="">
		<div class="title">'.$title.'</div>
		<li><abbr title="Landline">T: </abbr><a class="tel" itemprop="telephone" href="tel:'.$krank['tel'].'" title="Call '. $krank['name'].' Today">'.$krank['tel'].'</a></li>'.
		'<li>'.$mob.'</li>'.
		'<li><abbr title="Website">W: </abbr><a class="url" itemprop="url" href="'.site_url().'">'.site_url().'</a></li>
		<li><abbr title="Email">E: </abbr><a class="email" href="'.$krank['email'].'" title="Get In Contact With '.$krank['name'].' Today"><meta itemprop="email" content="'.$krank['email'].'">'.$krank['email'].'</a></li>
	</ul><!--/.contact-info-->';

	return $contact;
}
add_shortcode('contact', 'krank_contact');

//[open-hours title="title"]
function krank_opening( $atts ) {
	global $krank;

	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
   
	foreach($krank['open-hours'] as $open):
		$opening .=
		   '<li>'.$open.'</li>';
	endforeach;
	
	return
		'<ul class="opening-hours">
			<div class="title">'.$title.'</div>'.
			$opening
		.'</ul><!--/.opening-hours-->';
}
add_shortcode('open-hours', 'krank_opening');

//[section title="title"]
function krank_section( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$output = 
		'<section class="section">
			<h3 class="section-title">'.$title.'</h3>'.
			do_shortcode( $content ).
		'</section>';
	
	return $output;
}
add_shortcode('section', 'krank_section');

//[lead]
function krank_lead( $atts, $content = null ) {
	$output = 
		'<p class="lead">'.
			do_shortcode( $content ).
		'</p>';
	
	return $output;
}
add_shortcode('lead', 'krank_lead');

//[column md="6"]
function krank_column( $atts, $content = null ) {
  extract(shortcode_atts(array(
    "lg" => false,
    "md" => false,
    "sm" => false,
    "xs" => false,
    "offset_lg" => false,
    "offset_md" => false,
    "offset_sm" => false,
    "offset_xs" => false,
    "pull_lg" => false,
    "pull_md" => false,
    "pull_sm" => false,
    "pull_xs" => false,
    "push_lg" => false,
    "push_md" => false,
    "push_sm" => false,
    "push_xs" => false,
  ), $atts));
  $return  =  '<div class="';
  $return .= ($lg) ? 'col-lg-' . $lg . ' ' : '';
  $return .= ($md) ? 'col-md-' . $md . ' ' : '';
  $return .= ($sm) ? 'col-sm-' . $sm . ' ' : '';
  $return .= ($xs) ? 'col-xs-' . $xs . ' ' : '';
  $return .= ($offset_lg) ? 'col-lg-offset-' . $offset_lg . ' ' : '';
  $return .= ($offset_md) ? 'col-md-offset-' . $offset_md . ' ' : '';
  $return .= ($offset_sm) ? 'col-sm-offset-' . $offset_sm . ' ' : '';
  $return .= ($offset_xs) ? 'col-xs-offset-' . $offset_xs . ' ' : '';
  $return .= ($pull_lg) ? 'col-lg-pull-' . $pull_lg . ' ' : '';
  $return .= ($pull_md) ? 'col-md-pull-' . $pull_md . ' ' : '';
  $return .= ($pull_sm) ? 'col-sm-pull-' . $pull_sm . ' ' : '';
  $return .= ($pull_xs) ? 'col-xs-pull-' . $pull_xs . ' ' : '';
  $return .= ($push_lg) ? 'col-lg-push-' . $push_lg . ' ' : '';
  $return .= ($push_md) ? 'col-md-push-' . $push_md . ' ' : '';
  $return .= ($push_sm) ? 'col-sm-push-' . $push_sm . ' ' : '';
  $return .= ($push_xs) ? 'col-xs-push-' . $push_xs . ' ' : '';
  $return .= '">' . do_shortcode( $content ) . '</div>';

  return $return;
}
add_shortcode('column', 'krank_column');

//[element class=""]
function krank_element( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$output = 
		'<div class="'.$class.'">'.
			do_shortcode( $content ).
		'</div>';
	
	return $output;
}
add_shortcode('element', 'krank_element');

//[fa-icon icon=""]
function krank_icon( $atts ) {
	
	extract(shortcode_atts(array(
		'icon' => '',
	), $atts));
	
	$output = '<i class="fa fa-'.$icon.'"></i>';
	
	return $output;
}
add_shortcode('fa-icon', 'krank_icon');