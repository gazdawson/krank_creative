<?php
/**
	Custom options config for Krank Theme
**/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'redux-framework-demo').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();


if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		WP_Filesystem();
	}  		
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
}

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = true;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'krank';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
    'link' => 'https://twitter.com/KrankCreative',
    'title' => 'Follow me on Twitter', 
    'img' => REDUX_URL . 'assets/img/social/Twitter.png'
);
$args['share_icons']['linked_in'] = array(
    'link' => 'http://uk.linkedin.com/pub/gareth-dawson/19/593/627',
    'title' => 'Find me on LinkedIn', 
    'img' => REDUX_URL . 'assets/img/social/LinkedIn.png'
);

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

// Set a custom menu icon.
$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Krank Options', 'redux-framework-demo');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Krank Options', 'redux-framework-demo');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'krank_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'redux-opts-1',
    'title' => __('Theme Information 1', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);
$args['help_tabs'][] = array(
    'id' => 'redux-opts-2',
    'title' => __('Theme Information 2', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);

// Set the help sidebar for the options page.                                        
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = __('<p>This is where you can customise every aspect of your Krank Wordpress theme.</p>', 'redux-framework-demo');
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
}

// Add content after the form.
$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');

// Set footer/credit line.
//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'redux-framework-demo');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = REDUX_DIR . '../sample/patterns/';
$sample_patterns_url  = REDUX_URL . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;

//KRANK OPTIONS BELOW///////////////////////////////////////////////////////KRANK OPTIONS BELOW// 

	$sections[] = array(
		'title' => __('Company Info', 'redux-framework-demo'),
		'header' => __('Please fill in your business details below', 'redux-framework-demo'),
		'desc' => __('', 'redux-framework-demo'),
		'icon_class' => 'icon-large',
	    'icon' => 'home',
	    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(
			
			array(
				'id'=>'name',
				'type' => 'text',
				'title' => __('Company Name', 'redux-framework-demo'), 
				'subtitle' => __('Type your business name as you would like it to appear on the website', 'redux-framework-demo'),
				),
			array(
				'id'=>'street',
				'type' => 'text',
				'title' => __('Street Address', 'redux-framework-demo'), 
				),
			array(
				'id'=>'town',
				'type' => 'text',
				'title' => __('Town / City', 'redux-framework-demo'), 
				),
			array(
				'id'=>'region',
				'type' => 'text',
				'title' => __('Region / County', 'redux-framework-demo'), 
				),
			array(
				'id'=>'postcode',
				'type' => 'text',
				'title' => __('Post Code / Zip', 'redux-framework-demo'), 
				),
			array(
				'id'=>'tel',
				'type' => 'text',
				'title' => __('Telephone', 'redux-framework-demo'),
				'subtitle' => __('Use correct country code for international', 'redux-framework-demo'),
				),
			array(
				'id'=>'fax',
				'type' => 'text',
				'title' => __('Fax No', 'redux-framework-demo'),
				'subtitle' => __('Use correct country code for international', 'redux-framework-demo'), 
				),
			array(
				'id'=>'mob',
				'type' => 'text',
				'title' => __('Mobile', 'redux-framework-demo'),
				'subtitle' => __('Use correct country code for international', 'redux-framework-demo'), 
				),
			array(
				'id'=>'email',
				'type' => 'text',
				'title' => __('Contact Email', 'redux-framework-demo'),
				'subtitle' => __('Leave blank if you do not wish to display an email address', 'redux-framework-demo'),
				'validate' => 'email',
				'msg' => 'Please use a real email address',
				'default' => 'test@test.com'
				),
			array(
				'id'=>'reg',
				'type' => 'text',
				'title' => __('Company Reg Number (CRN)', 'redux-framework-demo'),
				),
			array(
				'id'=>'vat',
				'type' => 'text',
				'title' => __('VAT Reg Number', 'redux-framework-demo'),
				),
			array(
				'id'=>'open-hours',
				'type' => 'multi_text',
				'title' => __('Opening Hours', 'redux-framework-demo'),
				'subtitle' => __('', 'redux-framework-demo'),
				'desc' => __('Click "Add More" button to add days and times', 'redux-framework-demo')
				),
				//////

			array(
				'id'=>'media',
				'type' => 'media', 
				'url'=> true,
				'title' => __('Media w/ URL', 'redux-framework-demo'),
				'compiler' => 'true',
				'desc'=> __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
				'subtitle' => __('Upload any media using the Wordpress native uploader', 'redux-framework-demo'),
				),

			array(
				'id'=>'media-nourl',
				'type' => 'media', 
				'title' => __('Media w/o URL', 'redux-framework-demo'),
				'desc'=> __('This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'redux-framework-demo'),
				'subtitle' => __('Upload any media using the Wordpress native uploader', 'redux-framework-demo'),
				),	
			array(
				'id'=>'media-nopreview',
				'type' => 'media', 
				'preview'=> false,
				'title' => __('Media No Preview', 'redux-framework-demo'),
				'desc'=> __('This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'redux-framework-demo'),
				'subtitle' => __('Upload any media using the Wordpress native uploader', 'redux-framework-demo'),
				),			
	        array(
	            'id' => 'gallery',
	            'type' => 'gallery',
	            'title' => __('Add/Edit Gallery', 'so-panels'),
	            'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the Wordpress native uploader', 'so-panels'),
	            'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
	            ),
			array(
				'id'=>'slider1',
				'type' => 'slider', 
				'title' => __('JQuery UI Slider Example 1', 'redux-framework-demo'),
				'desc'=> __('JQuery UI slider description. Min: 1, max: 500, step: 3, default value: 45', 'redux-framework-demo'),
				"default" 		=> "45",
				"min" 		=> "1",
				"step"		=> "3",
				"max" 		=> "500",
				),	

			array(
				'id'=>'slider2',
				'type' => 'slider', 
				'title' => __('JQuery UI Slider Example 2 w/ Steps (5)', 'redux-framework-demo'),
				'desc'=> __('JQuery UI slider description. Min: 0, max: 300, step: 5, default value: 75', 'redux-framework-demo'),
				"default" 		=> "75",
				"min" 		=> "0",
				"step"		=> "5",
				"max" 		=> "300",
				),	
			array(
				'id'=>'spinner1',
				'type' => 'spinner', 
				'title' => __('JQuery UI Spinner Example 1', 'redux-framework-demo'),
				'desc'=> __('JQuery UI spinner description. Min:20, max: 100, step:20, default value: 40', 'redux-framework-demo'),
				"default" 	=> "40",
				"min" 		=> "20",
				"step"		=> "20",
				"max" 		=> "100",
				),
			array(
				'id'=>'switch-on',
				'type' => 'switch', 
				'title' => __('Switch On', 'redux-framework-demo'),
				'subtitle'=> __('Look, it\'s on!', 'redux-framework-demo'),
				"default" 		=> 1,
				),	

			array(
				'id'=>'switch-off',
				'type' => 'switch', 
				'title' => __('Switch Off', 'redux-framework-demo'),
				'subtitle'=> __('Look, it\'s on!', 'redux-framework-demo'),
				"default" 		=> 0,
				),	

			array(
				'id'=>'switch-custom',
				'type' => 'switch', 
				'title' => __('Switch - Custom Titles', 'redux-framework-demo'),
				'subtitle'=> __('Look, it\'s on! Also hidden child elements!', 'redux-framework-demo'),
				"default" 		=> 0,
				'on' => 'Enabled',
				'off' => 'Disabled',
				),	

			array(
				'id'=>'switch-fold',
				'type' => 'switch', 
				'required' => array('switch-custom','=','1'),						
				'title' => __('Switch - With Hidden Items (NESTED!)', 'redux-framework-demo'),
				'subtitle'=> __('Also called a "fold" parent.', 'redux-framework-demo'),
				'desc' => __('Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'redux-framework-demo'),
				'default' => 0,
				),	
			array(
				'id'=>'patterns',
				'type' => 'image_select', 
				'tiles' => true,
				'required' => array('switch-fold','equals','0'),	
				'title' => __('Images Option (with pattern=>true)', 'redux-framework-demo'),
				'subtitle'=> __('Select a background pattern.', 'redux-framework-demo'),
				'default' 		=> 0,
				'options' => $sample_patterns
				,
				),			
	        array(
	            "id" => "homepage_blocks",
	            "type" => "sorter",
	            "title" => "Homepage Layout Manager",
	            "desc" => "Organize how you want the layout to appear on the homepage",
	            "compiler"=>'true',
	            'required' => array('switch-fold','equals','0'),	
	            'options' => array(
	                "enabled" => array(
	                    "placebo" => "placebo", //REQUIRED!
	                    "highlights" => "Highlights",
	                    "slider" => "Slider",
	                    "staticpage" => "Static Page",
	                    "services" => "Services"
	                ),
	                "disabled" => array(
	                    "placebo" => "placebo", //REQUIRED!
	                )
	            ),
	        ),
			array(
				'id'=>'slides',
				'type' => 'slides',
				'title' => __('Slides Options', 'redux-framework-demo'),
				'subtitle'=> __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
				'desc' => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo')
			),
			array(
				'id'=>'presets',
				'type' => 'image_select', 
				'presets' => true,
				'title' => __('Preset', 'redux-framework-demo'),
				'subtitle'=> __('This allows you to set a json string or array to override multiple preferences in your theme.', 'redux-framework-demo'),
				'default' 		=> 0,
				'desc'=> __('This allows you to set a json string or array to override multiple preferences in your theme.', 'redux-framework-demo'),
				'options' => array(
								'1' => array('alt' => 'Preset 1', 'img' => REDUX_URL.'../sample/presets/preset1.png', 'presets'=>array('switch-on'=>1,'switch-off'=>1, 'switch-custom'=>1)),
								'2' => array('alt' => 'Preset 2', 'img' => REDUX_URL.'../sample/presets/preset2.png', 'presets'=>'{"slider1":"1", "slider2":"0", "switch-on":"0"}'),
									),
				),					
			array(
				'id'=>'typography6',
				'type' => 'typography', 
				'title' => __('Typography', 'redux-framework-demo'),
				//'compiler'=>true, // Use if you want to hook in your own CSS compiler
				'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'=>true, // Select a backup non-google font in addition to a google font
				//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
				//'subsets'=>false, // Only appears if google is true and subsets not set to false
				//'font-size'=>false,
				//'line-height'=>false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				//'color'=>false,
				//'preview'=>false, // Disable the previewer
				'output' => array('h2.site-description'), // An array of CSS selectors to apply this font style to dynamically
				'units'=>'px', // Defaults to px
				'subtitle'=> __('Typography option with each property can be called individually.', 'redux-framework-demo'),
				'default'=> array(
					'color'=>"#333", 
					'font-style'=>'700', 
					'font-family'=>'Courier, monospace', 
					'font-size'=>'33px', 
					'line-height'=>'40'),
				),	
			),
		);

//Krank Design

$sections[] = array(
	'title' => __('Krank Design', 'redux-framework-demo'),
	'header' => __('Page design and basic layout options', 'redux-framework-demo'),
	'desc' => __('', 'redux-framework-demo'),
	'icon_class' => 'icon-large',
    'icon' => 'pencil',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(
		array(
			'id'=>'logo',
			'type' => 'media', 
			'url'=> true,
			'title' => __('Company Logo', 'redux-framework-demo'),
			'compiler' => 'true',
			'desc'=> __('', 'redux-framework-demo'),
			'subtitle' => __('', 'redux-framework-demo'),
			),
		array(
			'id'=>'main_class',
			'type' => 'select',
			'title' => __('Main content width', 'redux-framework-demo'), 
			'subtitle' => __('Krank themes are designed on a 12 column grid system. Select how many columns you wish the main content to occupy.', 'redux-framework-demo'),
			'desc' => __('Main and Sidebar column widths must add up to 12', 'redux-framework-demo'),
			'options' => array('col-sm-6' => '6 Columns','col-sm-7' => '7 Columns','col-sm-8' => '8 Columns','col-sm-9' => '9 Columns','col-sm-10' => '10 Columns','col-sm-11' => '11 Columns','col-sm-12' => '12 Columns'),//Must provide key => value pairs for select options
			'default' => 'col-sm-8'
			),
		array(
			'id'=>'sidebar_class',
			'type' => 'select',
			'title' => __('Sidebar width', 'redux-framework-demo'), 
			'subtitle' => __('Krank themes are designed on a 12 column grid system. Select how many columns you wish the sidebar to occupy.', 'redux-framework-demo'),
			'desc' => __('Main and Sidebar column widths must add up to 12', 'redux-framework-demo'),
			'options' => array('col-sm-1' => '1 Columns','col-sm-2' => '2 Columns','col-sm-3' => '3 Columns','col-sm-4' => '4 Columns','col-sm-5' => '5 Columns','col-sm-6' => '6 Columns'),//Must provide key => value pairs for select options
			'default' => 'col-sm-4'
			),
		),
	);

//Krank Carousels

$sections[] = array(
	'title' => __('Carousels', 'redux-framework-demo'),
	'header' => __('Carousel slides and options', 'redux-framework-demo'),
	'desc' => __('', 'redux-framework-demo'),
	'icon_class' => 'icon-large',
    'icon' => 'picture',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(

		array(
			'id'=>'home_slides',
			'type' => 'slides',
			'title' => __('Homepage carousel slides', 'redux-framework-demo'),
			'subtitle'=> __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
			'desc' => __('', 'redux-framework-demo')
			),
		array(
			'id'=>'home_slides_switch',
			'type' => 'switch', 
			'title' => __('Homepage carousel On / Off switch', 'redux-framework-demo'),
			'subtitle'=> __('', 'redux-framework-demo'),
			"default" 		=> 1,
			),
		array(
			'id'=>'carousel_speed',
			'type' => 'spinner', 
			'title' => __('Select the carousel ratation speed in seconds', 'redux-framework-demo'),
			'desc'=> __('This will be set for all carousels', 'redux-framework-demo'),
			"default" 	=> "3",
			"min" 		=> "1",
			"step"		=> "1",
			"max" 		=> "10",
			),
		),
	);
	
$sections[] = array(
	'type' => 'divide',
);
// Integration
$sections[] = array(
	'icon' => 'cogs',
	'icon_class' => 'icon-large',
    'title' => __('System Integration', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'ga_code',
			'type' => 'text',
			'title' => __('Google Anlytics ID', 'redux-framework-demo'),
			'subtitle' => __('Please enter your Google Analytics Tracking ID code, should look something like "UA-XXXXX-Y"', 'redux-framework-demo'),
			'desc' => __('Get tracking today with Goggle Analytics http://www.google.com/analytics/', 'redux-framework-demo'),
			'class' => 'small-text'
			),
		array(
			'id'=>'location',
			'type' => 'text',
			'title' => __('Google Maps Location', 'redux-framework-demo'),
			'subtitle' => __('Longitude and latitude coordinates.', 'redux-framework-demo'),
			'description' => __('Find the desired location on google maps. right click on pin, and click on Whats Here? Then copy the location that apears in the search bar. should look something like ( 54.321029, -2.742947 )', 'redux-framework-demo')
			),
		array(
			'id'=>'contact_7',
			'type' => 'text',
			'title' => __('Contact Form 7 ID', 'redux-framework-demo'),
			'subtitle' => __('Inter the Contact Form ID number you wish to display in the contact popup.', 'redux-framework-demo'),
			'desc' => __('it will look something like ID="19"', 'redux-framework-demo')
			),
	)
);

$sections[] = array(
	'type' => 'divide',
);


$sections[] = array(
	'icon' => 'website',
	'icon_class' => 'icon-large',
	'title' => __('Styling Options', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'stylesheet',
			'type' => 'select',
			'title' => __('Theme Stylesheet', 'redux-framework-demo'), 
			'subtitle' => __('Select your themes alternative color scheme.', 'redux-framework-demo'),
			'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
			'default' => 'default.css',
			),
		array(
			'id'=>'color-background',
			'type' => 'color',
			'title' => __('Body Background Color', 'redux-framework-demo'), 
			'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
			'default' => '#FFFFFF',
			'validate' => 'color',
			),
		array(
			'id'=>'color-footer',
			'type' => 'color',
			'title' => __('Footer Background Color', 'redux-framework-demo'), 
			'subtitle' => __('Pick a background color for the footer (default: #dd9933).', 'redux-framework-demo'),
			'default' => '#dd9933',
			'validate' => 'color',
			),
		array(
			'id'=>'color-header',
			'type' => 'color_gradient',
			'title' => __('Header Gradient Color Option', 'redux-framework-demo'),
			'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'default' => array('from' => '#1e73be', 'to' => '#00897e')
			),
		array(
			'id'=>'link-color',
			'type' => 'link_color',
			'title' => __('Links Color Option', 'redux-framework-demo'),
			'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'default' => array(
				'show_regular' => true,
				'show_hover' => true,
				'show_active' => true
			)
		),
		array(
			'id'=>'header-border',
			'type' => 'border',
			'title' => __('Header Border Option', 'redux-framework-demo'),
			'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
			'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'default' => array('color' => '#1e73be', 'style' => 'solid', 'width'=>'3')
			),	
		array(
			'id'=>'spacing',
			'type' => 'spacing',
			'output' => array('.site-header'), // An array of CSS selectors to apply this font style to
			'mode'=>'margin', // absolute, padding, margin, defaults to padding
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			'title' => __('Padding/Margin Option', 'redux-framework-demo'),
			'subtitle' => __('Allow your users to choose the spacing or margin they want.', 'redux-framework-demo'),
			'desc' => __('You can enable or diable any piece of this field. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
			'default' => array('top' => 5, 'bottom' => 6, 'left'=>2, 'right'=>4)
			),	
		array(
			'id'=>'dimensions',
			'type' => 'dimensions',
			//'units' => 'em', // You can specify a unit value. Possible: px, em, %
			//'units_extended' => 'true', // Allow users to select any type of unit
			'title' => __('Dimensions (Width/Height) Option', 'redux-framework-demo'),
			'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'redux-framework-demo'),
			'desc' => __('You can enable or diable any piece of this field. Width, Height, or Units.', 'redux-framework-demo'),
			'default' => array('width' => 200, 'height'=>'100', )
			),												
		array(
			'id'=>'body-font2',
			'type' => 'typography',
			'title' => __('Body Font', 'redux-framework-demo'),
			'subtitle' => __('Specify the body font properties.', 'redux-framework-demo'),
			'google'=>true,
			'default' => array(
				'color'=>'#dd9933',
				'font-size'=>'30px',
				'font-family'=>'Arial, Helvetica, sans-serif',
				'font-weight'=>'Normal',
				),
			),					
		array(
			'id'=>'custom-css',
			'type' => 'textarea',
			'title' => __('Custom CSS', 'redux-framework-demo'), 
			'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'redux-framework-demo'),
			'desc' => __('This field is even CSS validated!', 'redux-framework-demo'),
			'validate' => 'css',
			),
	)
);
	
$sections[] = array(
	'icon' => 'bullhorn',
	'icon_class' => 'icon-large',
	'title' => __('Field Validation', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'2',
			'type' => 'text',
			'title' => __('Text Option - Email Validated', 'redux-framework-demo'),
			'subtitle' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'email',
			'msg' => 'custom error message',
			'default' => 'test@test.com'
			),				
		array(
			'id'=>'multi_text',
			'type' => 'multi_text',
			'title' => __('Multi Text Option', 'redux-framework-demo'),
			'subtitle' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
			),
		array(
			'id'=>'3',
			'type' => 'text',
			'title' => __('Text Option - URL Validated', 'redux-framework-demo'),
			'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'url',
			'default' => 'http://reduxframework.com'
			),
		array(
			'id'=>'4',
			'type' => 'text',
			'title' => __('Text Option - Numeric Validated', 'redux-framework-demo'),
			'subtitle' => __('This must be numeric.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'numeric',
			'default' => '0',
			'class' => 'small-text'
			),
		array(
			'id'=>'comma_numeric',
			'type' => 'text',
			'title' => __('Text Option - Comma Numeric Validated', 'redux-framework-demo'),
			'subtitle' => __('This must be a comma seperated string of numerical values.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'comma_numeric',
			'default' => '0',
			'class' => 'small-text'
			),
		array(
			'id'=>'no_special_chars',
			'type' => 'text',
			'title' => __('Text Option - No Special Chars Validated', 'redux-framework-demo'),
			'subtitle' => __('This must be a alpha numeric only.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'no_special_chars',
			'default' => '0'
			),
		array(
			'id'=>'str_replace',
			'type' => 'text',
			'title' => __('Text Option - Str Replace Validated', 'redux-framework-demo'),
			'subtitle' => __('You decide.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'str_replace',
			'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
			'default' => '0'
			),
		array(
			'id'=>'preg_replace',
			'type' => 'text',
			'title' => __('Text Option - Preg Replace Validated', 'redux-framework-demo'),
			'subtitle' => __('You decide.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'preg_replace',
			'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
			'default' => '0'
			),
		array(
			'id'=>'custom_validate',
			'type' => 'text',
			'title' => __('Text Option - Custom Callback Validated', 'redux-framework-demo'),
			'subtitle' => __('You decide.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate_callback' => 'validate_callback_function',
			'default' => '0'
			),
		array(
			'id'=>'5',
			'type' => 'textarea',
			'title' => __('Textarea Option - No HTML Validated', 'redux-framework-demo'), 
			'subtitle' => __('All HTML will be stripped', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'no_html',
			'default' => 'No HTML is allowed in here.'
			),
		array(
			'id'=>'6',
			'type' => 'textarea',
			'title' => __('Textarea Option - HTML Validated', 'redux-framework-demo'), 
			'subtitle' => __('HTML Allowed (wp_kses)', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
			'default' => 'HTML is allowed in here.'
			),
		array(
			'id'=>'7',
			'type' => 'textarea',
			'title' => __('Textarea Option - HTML Validated Custom', 'redux-framework-demo'), 
			'subtitle' => __('Custom HTML Allowed (wp_kses)', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'html_custom',
			'default' => '<p>Some HTML is allowed in here.</p>',
			'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
			),
		array(
			'id'=>'8',
			'type' => 'textarea',
			'title' => __('Textarea Option - JS Validated', 'redux-framework-demo'), 
			'subtitle' => __('JS will be escaped', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'validate' => 'js'
			),

		)
	);
$sections[] = array(
	'icon' => 'check',
	'icon_class' => 'icon-large',
	'title' => __('Radio/Checkbox Fields', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'10',
			'type' => 'checkbox',
			'title' => __('Checkbox Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'default' => '1'// 1 = on | 0 = off
			),
		array(
			'id'=>'11',
			'type' => 'checkbox',
			'title' => __('Multi Checkbox Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for multi checkbox options
			'default' => array('1' => '1', '2' => '0', '3' => '0')//See how std has changed? you also dont need to specify opts that are 0.
			),
		array(
			'id'=>'checkbox-data',
			'type' => 'checkbox',
			'title' => __('Multi Checkbox Option (with menu data)', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'data' => "menu"
			),					
		array(
			'id'=>'12',
			'type' => 'radio',
			'title' => __('Radio Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'radio-data',
			'type' => 'radio',
			'title' => __('Multi Checkbox Option (with menu data)', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'data' => "menu"
			),					
		array(
			'id'=>'13',
			'type' => 'image_select',
			'title' => __('Images Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array(
							'1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
							'2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
							'3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
							'4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
								),//Must provide key => value(array:title|img) pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'image_select',
			'type' => 'image_select',
			'title' => __('Images Option for Layout', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This uses some of the built in images, you can use them for layout options.', 'redux-framework-demo'),
			'options' => array(
							'1' => array('alt' => '1 Column', 'img' => REDUX_URL.'assets/img/1col.png'),
							'2' => array('alt' => '2 Column Left', 'img' => REDUX_URL.'assets/img/2cl.png'),
							'3' => array('alt' => '2 Column Right', 'img' => REDUX_URL.'assets/img/2cr.png'),
							'4' => array('alt' => '3 Column Middle', 'img' => REDUX_URL.'assets/img/3cm.png'),
							'5' => array('alt' => '3 Column Left', 'img' => REDUX_URL.'assets/img/3cl.png'),
							'6' => array('alt' => '3 Column Right', 'img' => REDUX_URL.'assets/img/3cr.png')
								),//Must provide key => value(array:title|img) pairs for radio options
			'default' => '2'
			),
		array(
            'id' => 'text_sortable',
	        'type' => 'sortable',
    	    'title' => __('Sortable Text Option', 'redux-framework-demo'),
        	'sub_desc' => __('Define and reorder these however you want.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            'options' => array(
	            'si1' => 'Item 1',
    	        'si2' => 'Item 2',
        	    'si3' => 'Item 3',
    	    	)
        	),	
		array(
            'id' => 'check_sortable',
	        'type' => 'sortable',
	        'mode' => 'checkbox', // checkbox or text
    	    'title' => __('Sortable Text Option', 'redux-framework-demo'),
        	'sub_desc' => __('Define and reorder these however you want.', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            'options' => array(
	            'si1' => 'Item 1',
    	        'si2' => 'Item 2',
        	    'si3' => 'Item 3',
    	    	)
        	),	        																						
		)
	);
$sections[] = array(
	'icon' => 'list-alt',
	'icon_class' => 'icon-large',
	'title' => __('Select Fields', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
	'fields' => array(
		array(
			'id'=>'select',
			'type' => 'select',
			'title' => __('Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for select options
			'default' => '2'
			),
		array(
			'id'=>'15',
			'type' => 'select',
			'multi' => true,
			'title' => __('Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'required' => array('select','equals',array('1','3')),	
			'default' => array('2','3')
			),
		array(
			'id'=>'multi-info',
			'type' => 'info',
			'desc' => __('You can easily add a variety of data from wordpress.', 'redux-framework-demo'),
			),
		array(
			'id'=>'select-categories',
			'type' => 'select',
			'data' => 'categories',
			'title' => __('Categories Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'select-categories-multi',
			'type' => 'select',
			'data' => 'categories',
			'multi' => true,
			'title' => __('Categories Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'select-pages',
			'type' => 'select',
			'data' => 'pages',
			'title' => __('Pages Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'pages-multi_select',
			'type' => 'select',
			'data' => 'pages',
			'multi' => true,
			'title' => __('Pages Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),	
		array(
			'id'=>'select-tags',
			'type' => 'select',
			'data' => 'tags',
			'title' => __('Tags Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'tags-multi_select',
			'type' => 'select',
			'data' => 'tags',
			'multi' => true,
			'title' => __('Tags Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),	
		array(
			'id'=>'select-menus',
			'type' => 'select',
			'data' => 'menus',
			'title' => __('Menus Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'menus-multi_select',
			'type' => 'select',
			'data' => 'menu',
			'multi' => true,
			'title' => __('Menus Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),	
		array(
			'id'=>'select-post-type',
			'type' => 'select',
			'data' => 'post_type',
			'title' => __('Post Type Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'post-type-multi_select',
			'type' => 'select',
			'data' => 'post_type',
			'multi' => true,
			'title' => __('Post Type Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),	
		array(
			'id'=>'select-posts',
			'type' => 'select',
			'data' => 'post',
			'title' => __('Posts Select Option2', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'select-posts-multi',
			'type' => 'select',
			'data' => 'post',
			'multi' => true,
			'title' => __('Posts Multi Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			),
		array(
			'id'=>'select-elusive',
			'type' => 'select',
			'data' => 'elusive-icons',
			'title' => __('Elusive Icons Select Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('Here\'s a list of all the elusive icons by name and icon.', 'redux-framework-demo'),
			),			
		)
	);
		
	$sections[] = array(
		'icon' => 'bullhorn',
		'icon_class' => 'icon-large',
		'title' => __('Field Validation', 'redux-framework-demo'),
		'desc' => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'redux-framework-demo'),
		'fields' => array(
			array(
				'id'=>'2',
				'type' => 'text',
				'title' => __('Text Option - Email Validated', 'redux-framework-demo'),
				'subtitle' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'email',
				'msg' => 'custom error message',
				'default' => 'test@test.com'
				),				
			array(
				'id'=>'multi_text',
				'type' => 'multi_text',
				'title' => __('Multi Text Option', 'redux-framework-demo'),
				'subtitle' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
				),
			array(
				'id'=>'3',
				'type' => 'text',
				'title' => __('Text Option - URL Validated', 'redux-framework-demo'),
				'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'url',
				'default' => 'http://no-half-pixels.com'
				),
			array(
				'id'=>'4',
				'type' => 'text',
				'title' => __('Text Option - Numeric Validated', 'redux-framework-demo'),
				'subtitle' => __('This must be numeric.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'numeric',
				'default' => '0',
				'class' => 'small-text'
				),
			array(
				'id'=>'comma_numeric',
				'type' => 'text',
				'title' => __('Text Option - Comma Numeric Validated', 'redux-framework-demo'),
				'subtitle' => __('This must be a comma seperated string of numerical values.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'comma_numeric',
				'default' => '0',
				'class' => 'small-text'
				),
			array(
				'id'=>'no_special_chars',
				'type' => 'text',
				'title' => __('Text Option - No Special Chars Validated', 'redux-framework-demo'),
				'subtitle' => __('This must be a alpha numeric only.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'no_special_chars',
				'default' => '0'
				),
			array(
				'id'=>'str_replace',
				'type' => 'text',
				'title' => __('Text Option - Str Replace Validated', 'redux-framework-demo'),
				'subtitle' => __('You decide.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'str_replace',
				'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
				'default' => '0'
				),
			array(
				'id'=>'preg_replace',
				'type' => 'text',
				'title' => __('Text Option - Preg Replace Validated', 'redux-framework-demo'),
				'subtitle' => __('You decide.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'preg_replace',
				'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
				'default' => '0'
				),
			array(
				'id'=>'custom_validate',
				'type' => 'text',
				'title' => __('Text Option - Custom Callback Validated', 'redux-framework-demo'),
				'subtitle' => __('You decide.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate_callback' => 'validate_callback_function',
				'default' => '0'
				),
			array(
				'id'=>'5',
				'type' => 'textarea',
				'title' => __('Textarea Option - No HTML Validated', 'redux-framework-demo'), 
				'subtitle' => __('All HTML will be stripped', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'no_html',
				'default' => 'No HTML is allowed in here.'
				),
			array(
				'id'=>'6',
				'type' => 'textarea',
				'title' => __('Textarea Option - HTML Validated', 'redux-framework-demo'), 
				'subtitle' => __('HTML Allowed (wp_kses)', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
				'default' => 'HTML is allowed in here.'
				),
			array(
				'id'=>'7',
				'type' => 'textarea',
				'title' => __('Textarea Option - HTML Validated Custom', 'redux-framework-demo'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'html_custom',
				'default' => '<p>Some HTML is allowed in here.</p>',
				'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
				),
			array(
				'id'=>'8',
				'type' => 'textarea',
				'title' => __('Textarea Option - JS Validated', 'redux-framework-demo'), 
				'subtitle' => __('JS will be escaped', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'validate' => 'js'
				),

			)
		);
	$sections[] = array(
		'icon' => 'check',
		'icon_class' => 'icon-large',
		'title' => __('Radio/Checkbox Fields', 'redux-framework-demo'),
		'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
		'fields' => array(
			array(
				'id'=>'10',
				'type' => 'checkbox',
				'title' => __('Checkbox Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'default' => '1'// 1 = on | 0 = off
				),
			array(
				'id'=>'11',
				'type' => 'checkbox',
				'title' => __('Multi Checkbox Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for multi checkbox options
				'default' => array('1' => '1', '2' => '0', '3' => '0')//See how std has changed? you also dont need to specify opts that are 0.
				),
			array(
				'id'=>'checkbox-data',
				'type' => 'checkbox',
				'title' => __('Multi Checkbox Option (with menu data)', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'data' => "menu"
				),					
			array(
				'id'=>'12',
				'type' => 'radio',
				'title' => __('Radio Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1', '2' => 'Opt 2', '3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'default' => '2'
				),
			array(
				'id'=>'radio-data',
				'type' => 'radio',
				'title' => __('Multi Checkbox Option (with menu data)', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'data' => "menu"
				),					
			array(
				'id'=>'13',
				'type' => 'image_select',
				'title' => __('Images Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array(
								'1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
								'2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
								'3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
								'4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
									),//Must provide key => value(array:title|img) pairs for radio options
				'default' => '2'
				),
			array(
				'id'=>'image_select',
				'type' => 'image_select',
				'title' => __('Images Option for Layout', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This uses some of the built in images, you can use them for layout options.', 'redux-framework-demo'),
				'options' => array(
								'1' => array('alt' => '1 Column', 'img' => REDUX_URL.'assets/img/1col.png'),
								'2' => array('alt' => '2 Column Left', 'img' => REDUX_URL.'assets/img/2cl.png'),
								'3' => array('alt' => '2 Column Right', 'img' => REDUX_URL.'assets/img/2cr.png'),
								'4' => array('alt' => '3 Column Middle', 'img' => REDUX_URL.'assets/img/3cm.png'),
								'5' => array('alt' => '3 Column Left', 'img' => REDUX_URL.'assets/img/3cl.png'),
								'6' => array('alt' => '3 Column Right', 'img' => REDUX_URL.'assets/img/3cr.png')
									),//Must provide key => value(array:title|img) pairs for radio options
				'default' => '2'
				),
			array(
	            'id' => 'text_sortable',
    	        'type' => 'sortable',
        	    'title' => __('Sortable Text Option', 'redux-framework-demo'),
            	'sub_desc' => __('Define and reorder these however you want.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
	            'options' => array(
    	            'si1' => 'Item 1',
        	        'si2' => 'Item 2',
            	    'si3' => 'Item 3',
        	    	)
	        	),	
			array(
	            'id' => 'check_sortable',
    	        'type' => 'sortable',
    	        'mode' => 'checkbox', // checkbox or text
        	    'title' => __('Sortable Text Option', 'redux-framework-demo'),
            	'sub_desc' => __('Define and reorder these however you want.', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
	            'options' => array(
    	            'si1' => 'Item 1',
        	        'si2' => 'Item 2',
            	    'si3' => 'Item 3',
        	    	)
	        	),	        																						
			)
		);
	$sections[] = array(
		'icon' => 'list-alt',
		'icon_class' => 'icon-large',
		'title' => __('Select Fields', 'redux-framework-demo'),
		'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
		'fields' => array(
			array(
				'id'=>'select',
				'type' => 'select',
				'title' => __('Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for select options
				'default' => '2'
				),
			array(
				'id'=>'15',
				'type' => 'select',
				'multi' => true,
				'title' => __('Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'required' => array('select','equals',array('1','3')),	
				'default' => array('2','3')
				),
			array(
				'id'=>'multi-info',
				'type' => 'info',
				'desc' => __('You can easily add a variety of data from wordpress.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-categories',
				'type' => 'select',
				'data' => 'categories',
				'title' => __('Categories Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-categories-multi',
				'type' => 'select',
				'data' => 'categories',
				'multi' => true,
				'title' => __('Categories Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-pages',
				'type' => 'select',
				'data' => 'pages',
				'title' => __('Pages Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'pages-multi_select',
				'type' => 'select',
				'data' => 'pages',
				'multi' => true,
				'title' => __('Pages Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),	
			array(
				'id'=>'select-tags',
				'type' => 'select',
				'data' => 'tags',
				'title' => __('Tags Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'tags-multi_select',
				'type' => 'select',
				'data' => 'tags',
				'multi' => true,
				'title' => __('Tags Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),	
			array(
				'id'=>'select-menus',
				'type' => 'select',
				'data' => 'menus',
				'title' => __('Menus Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'menus-multi_select',
				'type' => 'select',
				'data' => 'menu',
				'multi' => true,
				'title' => __('Menus Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),	
			array(
				'id'=>'select-post-type',
				'type' => 'select',
				'data' => 'post_type',
				'title' => __('Post Type Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'post-type-multi_select',
				'type' => 'select',
				'data' => 'post_type',
				'multi' => true,
				'title' => __('Post Type Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),	
			array(
				'id'=>'select-posts',
				'type' => 'select',
				'data' => 'post',
				'title' => __('Posts Select Option2', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-posts-multi',
				'type' => 'select',
				'data' => 'post',
				'multi' => true,
				'title' => __('Posts Multi Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-elusive',
				'type' => 'select',
				'data' => 'elusive-icons',
				'title' => __('Elusive Icons Select Option', 'redux-framework-demo'), 
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('Here\'s a list of all the elusive icons by name and icon.', 'redux-framework-demo'),
				),
			array(
				'id'=>'select-custom-placeholder',
				'type' => 'select',
				'title' => __('Custom Placeholder', 'redux-framework-demo'),
				'placeholder' => 'I am a custom placeholder',
				'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
				'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			),
			array(
				'id'=>'select-custom-select2',
				'type' => 'select',
				'title' => __('Custom Select2', 'redux-framework-demo'),
				'placeholder' => 'A minimal select',
				'subtitle' => __('No search box / no empty value', 'redux-framework-demo'),
				'desc' => __('An example of custom select2 params.', 'redux-framework-demo'),
				'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
				'select2' => array( // here you can provide params for the select2 jquery call
					'minimumResultsForSearch' => -1, // this way the search box will be disabled
					'allowClear' => false // don't allow a empty select
				)
			)
		)
		);

	
$tabs = array();

if (function_exists('wp_get_theme')){
$theme_data = wp_get_theme();
$theme_uri = $theme_data->get('ThemeURI');
$description = $theme_data->get('Description');
$author = $theme_data->get('Author');
$version = $theme_data->get('Version');
$tags = $theme_data->get('Tags');
}else{
$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
$theme_uri = $theme_data['URI'];
$description = $theme_data['Description'];
$author = $theme_data['Author'];
$version = $theme_data['Version'];
$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'redux-framework-demo').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'redux-framework-demo').$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'redux-framework-demo').$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'redux-framework-demo').implode(', ', $tags).'</p>';
$theme_info .= '</div>';

if(file_exists(dirname(__FILE__).'/README.md')){
$tabs['theme_docs'] = array(
			'icon' => REDUX_URL.'assets/img/glyphicons/glyphicons_071_book.png',
			'title' => __('Documentation', 'redux-framework-demo'),
			'content' => file_get_contents(dirname(__FILE__).'/README.md')
			);
}//if




// You can append a new section at any time.
$sections[] = array(
	'icon' => 'eye-open',
	'icon_class' => 'icon-large',
	'title' => __('Additional Fields', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
	'fields' => array(

		array(
			'id'=>'17',
			'type' => 'date',
			'title' => __('Date Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
			),
		array(
			'id'=>'21',
			'type' => 'divide'
			),					
		array(
			'id'=>'18',
			'type' => 'button_set',
			'title' => __('Button Set Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'23',
			'type' => 'info',
            'required' => array('18','equals',array('1','2')),	
			'desc' => __('This is the info field, if you want to break sections up.', 'redux-framework-demo')
        ),
        array(
            'id'=>'info_warning',
            'type'=>'info',
            'style'=>'warning',
            'header'=> __( 'This is a header.', 'redux-framework-demo' ),
            'desc' => __( 'This is an info field with the warning style applied and a header.', 'redux-framework-demo')
        ),
        array(
            'id'=>'info_success',
            'type'=>'info',
            'style'=>'success',
            'icon'=>'info-sign',
            'header'=> __( 'This is a header.', 'redux-framework-demo' ),
            'desc' => __( 'This is an info field with the success style applied, a header and an icon.', 'redux-framework-demo')
        ),
		array(
			'id'=>'raw_info',
			'type' => 'info',
			'required' => array('18','equals',array('1','2')),
			'raw_html'=>true,
			'desc' => $sampleHTML,
			),							
		array(
			'id'=>"custom_callback",
			//'type' => 'nothing',//doesnt need to be called for callback fields
			'title' => __('Custom Field Callback', 'redux-framework-demo'), 
			'subtitle' => __('This is a completely unique field type', 'redux-framework-demo'),
			'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'redux-framework-demo'),
			'callback' => 'my_custom_field'
			),
		
		array(
			'id'=>"group",
			'type' => 'group',//doesnt need to be called for callback fields
			'title' => __('Group', 'redux-framework-demo'), 
			'subtitle' => __('Group any items together.', 'redux-framework-demo'),
			'desc' => __('No limit as to what you can group. Just don\'t try to group a group.', 'redux-framework-demo'),
			'groupname' => __('Group', 'redux-framework-demo'), // Group name
			'subfields' => 
				array(
					array(
						'id'=>'switch-fold',
						'type' => 'switch', 
						'title' => __('testing fold with Group', 'redux-framework-demo'),
						'subtitle'=> __('Look, it\'s on!', 'redux-framework-demo'),
						"default" 		=> 1,
						),	
					array(
                        'id'=>'text-group',
                        'type' => 'text',
                        'title' => __('Text', 'redux-framework-demo'), 
                        'subtitle' => __('Here you put your subtitle', 'redux-framework-demo'),
                        'required' => array('switch-fold', '=' , '1'),
						),
					array(
						'id'=>'select-group',
						'type' => 'select',
						'title' => __('Testing select', 'redux-framework-demo'), 
						'subtitle' => __('Select your themes alternative color scheme.', 'redux-framework-demo'),
						'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
						'default' => 'default.css',
						),
					),
			),			
			
		)

	);    

$tabs['item_info'] = array(
	'icon' => 'info-sign',
	'icon_class' => 'icon-large',
    'title' => __('Theme Information', 'redux-framework-demo'),
    'content' => $item_info
);

if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
    $tabs['docs'] = array(
		'icon' => 'book',
		'icon_class' => 'icon-large',
        'title' => __('Documentation', 'redux-framework-demo'),
        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
    );
}

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config


/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', 'redux-framework-demo'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux-opts-sections-redux-sample', 'add_another_section');


/**

	Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-redux-sample-file', 'change_framework_args');





/** 

	Custom function for the callback referenced above

 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/**
 
	Custom function for the callback validation referenced above

**/
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
function testCompiler() {
	//echo "Compiler hook!";
}
add_action('redux-compiler-redux-sample-file', 'testCompiler');



/**

	Use this function to hide the activation notice telling users about a sample panel.

**/
function removeReduxAdminNotice() {
	delete_option('REDUX_FRAMEWORK_PLUGIN_ACTIVATED_NOTICES');
}
add_action('redux_framework_plugin_admin_notice', 'removeReduxAdminNotice');
