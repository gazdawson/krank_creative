<?php
///////////////////////////////////////// Woocommerce Catalogue /////////////////////////////////////////

/**
	Display 12 products per page.
**/
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

/**
	Remove Perenthasis from results count
**/
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_perenthasis' );

function woo_remove_category_products_perenthasis($fields) {
	$replace = array("(", ")");
	$fields = str_replace($replace,"",$fields);
  return $fields;
}

///////////////////////////////////////// Woocommerce Checkout /////////////////////////////////////////

/**
	Existing fields edit
**/

// Edit Checkout Feilds
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	
	unset($fields['billing']['billing_company']); // Remove Company Name
	unset($fields['order']['order_comments']); // Remove Order Comments
	
	return $fields;
}

/**
	Rider Level Custom Field
**/

// Rider Level Custom Drop Down.
add_action('woocommerce_after_order_notes', 'rider_level');

function rider_level( $checkout ) {
	
    woocommerce_form_field( 'rider_level', array(
        'type'          => 'select',
		'options'		=> array('Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Expert' => 'Expert'),
		'required'		=> true,
        'class'         => array('rider_level form-row-first'),
        'label'         => __('Rider Skill Level (Please Be Honest!) <a href="/important-rider-notes">click here for skill level definitions</a>'),
        ), $checkout->get_value( 'rider-level' ));
}

// Rider Level Process the checkout for required Feild
add_action('woocommerce_checkout_process', 'rider_level_process');

function rider_level_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['rider_level'])
         $woocommerce->add_error( __('Please choose your rider level.') );
}

// Rider Level update the order meta with field value

add_action('woocommerce_checkout_update_order_meta', 'rider_level_update_order_meta');

function rider_level_update_order_meta( $order_id ) {
    if ($_POST['rider_level']) update_post_meta( $order_id, 'Rider Level', esc_attr($_POST['rider_level']));
}

// Rider Level display field value on the order edition page

add_action( 'woocommerce_admin_order_data_after_billing_address', 'rider_level_display_admin_order_meta', 10, 1 );
 
function rider_level_display_admin_order_meta($order){
    echo '<p><strong>'.__('Rider Level').':</strong> ' . $order->order_custom_fields['Rider Level'][0] . '</p>';
}

/**
	Date of Birth Custom Field
**/

// Date of Birth Add the field to the checkout
add_action('woocommerce_after_order_notes', 'rider_dob_field');

function rider_dob_field( $checkout ) {

    woocommerce_form_field( 'rider_dob_field', array(
        'type'          => 'text',
        'class'         => array('rider-dob-field form-row-last'),
        'label'         => __('Date of Birth'),
        'placeholder'   => __('g.g. dd/mm/yyyy'),
		'required'		=> true,
        ), $checkout->get_value( 'rider_dob_field' ));
		
}

// Date of Birth Process the checkout
add_action('woocommerce_checkout_process', 'rider_dob_field_process');

function rider_dob_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['rider_dob_field'])
         $woocommerce->add_error( __('Please enter your date of birth.') );
}

// Date of Birth Update the order meta with field value
add_action('woocommerce_checkout_update_order_meta', 'rider_dob_field_update_order_meta');

function rider_dob_field_update_order_meta( $order_id ) {
    if ($_POST['rider_dob_field']) 
		update_post_meta( $order_id, 'Date of Birth', esc_attr($_POST['rider_dob_field']));
}

// Date of Birth Display field value on the order edition page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'rider_dob_field_display_admin_order_meta', 10, 1 );
 
function rider_dob_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Date of Birth').':</strong> ' . $order->order_custom_fields['Date of Birth'][0] . '</p>';
}

/**
	Emergency Contact Name Custom Field
**/

// Emergency Contact Name Add the field to the checkout
add_action('woocommerce_after_order_notes', 'emergency_name_field');

function emergency_name_field( $checkout ) {

    woocommerce_form_field( 'emergency_name_field', array(
        'type'          => 'text',
        'class'         => array('emergency-name-field form-row-first'),
        'label'         => __('Emergency Contact Name'),
        'placeholder'   => __('Contact Name'),
		'required'		=> true,
        ), $checkout->get_value( 'emergency_name_field' ));

}

// Emergency Contact Name Process the checkout
add_action('woocommerce_checkout_process', 'emergency_name_field_process');

function emergency_name_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['emergency_name_field'])
         $woocommerce->add_error( __('Please enter your emergency contact details.') );
}

// Emergency Contact Name Update the order meta with field value
add_action('woocommerce_checkout_update_order_meta', 'emergency_name_field_update_order_meta');

function emergency_name_field_update_order_meta( $order_id ) {
    if ($_POST['emergency_name_field']) 
		update_post_meta( $order_id, 'Emergency Contact Name', esc_attr($_POST['emergency_name_field']));
}

// Emergency Contact Name Display field value on the order edition page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'emergency_name_field_display_admin_order_meta', 10, 1 );
 
function emergency_name_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Emergency Contact Name').':</strong> ' . $order->order_custom_fields['Emergency Contact Name'][0] . '</p>';
}

/**
	Emergency Contact Number Custom Field
**/

// Emergency Contact Number Add the field to the checkout
add_action('woocommerce_after_order_notes', 'emergency_number_field');

function emergency_number_field( $checkout ) {

    woocommerce_form_field( 'emergency_number_field', array(
        'type'          => 'text',
        'class'         => array('emergency-number-field form-row-last'),
        'label'         => __('Emergency Contact Number'),
        'placeholder'   => __('Mobile Number'),
		'required'		=> true,
        ), $checkout->get_value( 'emergency_number_field' ));

}

// Emergency Contact Number Process the checkout
add_action('woocommerce_checkout_process', 'emergency_number_field_process');

function emergency_number_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['emergency_number_field'])
         $woocommerce->add_error( __('Please enter your emergency contact number.') );
}

// Emergency Contact Number Update the order meta with field value
add_action('woocommerce_checkout_update_order_meta', 'emergency_number_field_update_order_meta');

function emergency_number_field_update_order_meta( $order_id ) {
    if ($_POST['emergency_number_field']) 
		update_post_meta( $order_id, 'Emergency Contact Number', esc_attr($_POST['emergency_number_field']));
}

// Emergency Contact Number Display field value on the order edition page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'emergency_number_field_display_admin_order_meta', 10, 1 );
 
function emergency_number_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Emergency Contact Number').':</strong> ' . $order->order_custom_fields['Emergency Contact Number'][0] . '</p>';
}

/**
	Medical Info Custom Field
**/

// Rider Medical Info 
add_action('woocommerce_after_order_notes', 'med_info');

function med_info( $checkout ) {
	
    woocommerce_form_field( 'med_info', array(
        'type'          => 'textarea',
		'required'		=> false,
		'clear' 		=> true,
        'class'         => array('med-info form-row-wide-last'),
        'label'         => __('Medical Information'),
		'placeholder'   => 'please make us aware of any medical conditions that may effect your participation in the BIG DEMO WEEKEND.'
			
        ), $checkout->get_value( 'med_info' ));
}

// Medical Info update the order meta with field value

add_action('woocommerce_checkout_update_order_meta', 'med_info_update_order_meta');

function med_info_update_order_meta( $order_id ) {
    if ($_POST['med_info']) update_post_meta( $order_id, 'Medical Info', esc_attr($_POST['med_info']));
}

// Medical Info display field value on the order edition page

add_action( 'woocommerce_admin_order_data_after_billing_address', 'med_info_display_admin_order_meta', 10, 1 );
 
function med_info_display_admin_order_meta($order){
    echo '<p><strong>'.__('Medical Info').':</strong> ' . $order->order_custom_fields['Medical Info'][0] . '</p>';
}

/**
	Rider Terms & Conditions Custom Field
**/

// T's & C's Checkout agreement

add_action('woocommerce_after_order_notes', 'tnc_checkbox');

function tnc_checkbox( $checkout ) {
	global $krank; // Global variable for custom options
	
	echo
		'<h3 class="tnc-title">'.__('Terms &amp; Conditions').'</h3>'.
		'<div id="checkout-terms" class="form-row form-row-wide">'.
		'<div class="tnc-text">'.$krank['woo_tnc'].'</div>';

    woocommerce_form_field( 'tnc_checkbox', array(
        'type'          => 'checkbox',
        'class'         => array('input-checkbox'),
		'required'		=> true,
		'clear' 		=> true,
        'label'         => __(' I have read &amp; understood the BIG DEMO disclaimer &amp; accept I ride at my own risk.'),
        ), $checkout->get_value( 'tnc_checkbox' ));
		
	echo '</div>';
}

// T's & C's Process the checkout

add_action('woocommerce_checkout_process', 'tnc_checkbox_process');

function tnc_checkbox_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['tnc_checkbox'])
         $woocommerce->add_error( __('Please read and agree to our terms & conditions.') );
}


/**
	Export custom meta CSV (http://docs.woothemes.com/document/ordercustomer-csv-exporter/)
**/

add_filter( 'woocommerce_export_csv_extra_columns', 'sites_add_custom_meta', 10);

function sites_add_custom_meta() {
  $custom_meta_fields['columns'][] = 'Rider Level';
  $custom_meta_fields['data'][] = 'Rider Level';
  $custom_meta_fields['columns'][] = 'Date of Birth';
  $custom_meta_fields['data'][] = 'Date of Birth';
  $custom_meta_fields['columns'][] = 'Emergency Contact Name';
  $custom_meta_fields['data'][] = 'Emergency Contact Name';
  $custom_meta_fields['columns'][] = 'Emergency Contact Number';
  $custom_meta_fields['data'][] = 'Emergency Contact Number';
  $custom_meta_fields['columns'][] = 'Medical Info';
  $custom_meta_fields['data'][] = 'Medical Info';
  
  return $custom_meta_fields;
}

?>