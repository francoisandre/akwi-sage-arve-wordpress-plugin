<?php
/*
 * Plugin Name: akwi-sage-arve-wordpress-plugin
 */

include_once(dirname(__DIR__)."/akwi-sage-arve-wordpress-plugin/textes/news/post_main.php");

add_action ( 'wp_dashboard_setup', 'akwi_sage_arve_dashboard_widgets' );
function akwi_sage_arve_dashboard_widgets() {
	wp_add_dashboard_widget ( 'akwi_sage_arve_dashboard_site_widget', 'Akwi site', 'akwi_sage_arve_dashboard_site_widget' );
}

function akwi_sage_arve_dashboard_site_widget() {
	echo '<a href="' . admin_url ( 'admin-post.php?action=build_akwi_sage_arve_site' ) . '">Créer site Arve</a>';
	echo '<br/>';
	echo '<a href="' . admin_url ( 'admin-post.php?action=add_akwi_sage_arve_news' ) . '">Ajouter les news</a>';
}

// Schéma d'Aménagement de Gestion
function akwi_sage_arve_setSlogan() {
	update_option ( 'blogdescription', 'Sch&eacute;ma d\'Am&eacute;nagement et de Gestion des Eaux du bassin de l\'Arve' );
}
function akwi_sage_arve_setTitle() {
	update_option ( 'blogname', 'SAGE Arve' );
}

function akwi_sage_arve_addLogo() {
	$custom_logo_id = get_theme_mod ( 'custom_logo' );
	$image = wp_get_attachment_image_src ( $custom_logo_id, 'full' );
	if (is_array ( $image )) {
		if (contains ( "default-logo", $image->url )) {
			akwi_commons_addLogo ( ABSPATH . 'wp-content/plugins/akwi-sage-arve-wordpress-plugin/images/logo.png' );
			wp_delete_attachment ( $custom_logo_id, true );
		}
	}
	else {
		akwi_commons_addLogo ( ABSPATH . 'wp-content/plugins/akwi-sage-arve-wordpress-plugin/images/logo.png' );
	}
}

function akwi_sage_arve_addFavicon() {
	akwi_commons_addFavicon( ABSPATH . 'wp-content/plugins/akwi-sage-arve-wordpress-plugin/images/favicon.png' );
}

function akwi_sage_arve_setColor() {
	set_theme_mod ( 'theme_aeris_main_color', 'custom' );
	set_theme_mod ( 'theme_aeris_color_code', '#2e687c' );
}
function contains($needle, $haystack) {
	return strpos ( $haystack, $needle ) !== false;
}
function akwi_sage_arve_setHeaderImage() {
	set_theme_mod( 'header_image',plugin_dir_url( __FILE__ ) . '/images/arve-header.jpg');
}

function akwi_sage_arve_addNews() {
	
	$args = array(
			'posts_per_page'   => 50,
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true
	);
	
	$posts = get_posts($args);
	foreach ($posts as $post) {
		wp_delete_post( $post->ID, true);
	}
	
	akwi_sage_arve_addNewsMain();
	wp_redirect ( admin_url ( 'index.php' ) );
	exit ();
}

function akwi_sage_arve_buildSite() {
	akwi_sage_arve_setSlogan ();
	akwi_sage_arve_setTitle ();
	akwi_sage_arve_addLogo ();
	akwi_sage_arve_addFavicon();
	akwi_sage_arve_setColor ();
	akwi_sage_arve_setHeaderImage ();
	akwi_commons_addWelcomePage();
	akwi_sage_arve_setWelcomePageContent();
	akwi_sage_arve_generateMenu();
	
	wp_redirect ( admin_url ( 'index.php' ) );
	exit ();
}


function akwi_sage_arve_setWelcomePageContent(){
	$content = file_get_contents(ABSPATH . 'wp-content/plugins/akwi-sage-arve-wordpress-plugin/textes/introduction.txt');
	$new_page_title = 'bienvenue';
	$new_page_template = 'template-home.php';
	$page_check = get_page_by_title($new_page_title);
		
	$edited_page = array(
		'ID'    => $page_check->ID,
		'post_content' => $content
	);
		wp_update_post($edited_page);
}

function akwi_sage_arve_generateMenu() {
	
	$locations = get_theme_mod( 'nav_menu_locations' );
	llog(implode("|",$locations));
	llog(($locations["0"]));
	llog(($locations["14"]));
	
	$menuname = 'primaire';
	$menulocation = 'Primary';
	// Does the menu exist already?
	$menu_exists = wp_get_nav_menu_object( $menuname );
	if( !$menu_exists){
		$menu_id = wp_create_nav_menu($menuname);
		// Set up default BuddyPress links and add them to the menu.
		wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Home'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url( '/' ),
				'menu-item-status' => 'publish'));
		
		$parent_item = wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  "La CLE",
				'menu-item-classes' => 'activity',
				'menu-item-url' => home_url( '/activity/' ),
				'menu-item-status' => 'publish'));
		
		wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Sub Item Page'),
				'menu-item-url' => home_url( '/sub-item-page/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_item)
				);
		
		wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  "Enquête publique",
				'menu-item-classes' => 'activity',
				'menu-item-url' => home_url( '/activity/' ),
				'menu-item-status' => 'publish'));
		
		wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  "Thématique",
				'menu-item-classes' => 'activity',
				'menu-item-url' => home_url( '/activity/' ),
				'menu-item-status' => 'publish'));
		
		if( !has_nav_menu( $menulocation) ){
			$locations = get_theme_mod('nav_menu_locations');
			$locations[$menulocation] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}
}



add_action ( 'admin_post_build_akwi_sage_arve_site', 'akwi_sage_arve_buildSite' );
add_action ( 'admin_post_add_akwi_sage_arve_news', 'akwi_sage_arve_addNews');


add_action('admin_menu', function() {
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" width="512" height="512" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M271 38.6c-.3-.4-.7-.7-.9-1l-.1-.1c-3.6-3.4-8.5-5.5-13.9-5.5-5.5 0-10.4 2.1-13.9 5.5l-.1.1c-.3.3-.6.6-.9 1-6.1 6.3-13.8 14.4-22.4 24.1-17.4 19.7-38.6 46-58.5 76.8-33.4 51.8-62.9 116.1-64.1 183.1 0 1.3-.1 2.7-.1 4 0 19.7 3.9 38.5 10.9 55.8 4.1 10 9.2 19.4 15.2 28.2C150.7 452.4 200 480 256 480c88.4 0 160-68.7 160-153.4 0-127.9-105.2-247.4-145-288zM256 424c-15.8 0-30.7-3.7-43.9-10.1 65.9-14.4 118.4-64.7 135.8-129.5 5.2 12.1 8.2 25.5 8.2 39.6-.1 55.2-44.9 100-100.1 100z" fill="#626262"/></svg>';
	add_menu_page( 'Configuration Sage Arve', 'Sage Arve', 'manage_options', 'akwi-sage-arve-wordpress-plugin-menu', 'akwi_sage_arve_wordpress_plugin_main_menu_page','data:image/svg+xml;base64,'. base64_encode($svg));
	add_submenu_page('akwi-sage-arve-wordpress-plugin-menu', 'Informations de contact', 'Contact', 'manage_options', 'akwi-sage-arve-wordpress-plugincontact', 'akwi_sage_arve_wordpress_plugin__contact_page' );
});

add_action( 'admin_init', function() {
		register_setting( 'akwi-sage-arve-wordpress-plugin-settings', 'contact_tel' );
		register_setting( 'akwi-sage-arve-wordpress-plugin-settings', 'contact_fax' );
});

function akwi_sage_arve_wordpress_plugin_main_menu_page() {
	?>
   <div class="wrap">
   <h2>Configuration SAGE Arve</h2>
   <p>Vous pouvez indiquer les paramètres relatifs au SAGE Arve grâce aux différents sous-menus.
   </p>
   </div>
<?php
}

function akwi_sage_arve_wordpress_plugin__contact_page()
{
	?>
   <div class="wrap">
     <form action="options.php" method="post">
       <?php
       settings_fields( 'akwi-sage-arve-wordpress-plugin-settings' );
       do_settings_sections( 'akwi-sage-arve-wordpress-plugin-settings' );
       ?>
       <h2>Informations de contact</h2>
       <?php displayConfirmation(); ?>
       <h3>Adresse postale</h3>

 		<table>
             
            <tr>
                <th>Adresse</th>
                <td><input type="text"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Numéro de téléphone au format 0x-xx-xx-xx-xx" name="contact_tel" value="<?php echo esc_attr( get_option('contact_tel') ); ?>" size="50" /></td>
            </tr>
            <tr>
                <th>Code postal</th>
                <td><input type="text"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Numéro de fax au format 0x-xx-xx-xx-xx" name="contact_fax" value="<?php echo esc_attr( get_option('contact_fax') ); ?>" size="50" /></td>
            </tr>
            
              <tr>
                <th>Ville</th>
                <td><input type="text"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Numéro de fax au format 0x-xx-xx-xx-xx" name="contact_fax" value="<?php echo esc_attr( get_option('contact_fax') ); ?>" size="50" /></td>
            </tr>
 
 
        </table>
       
       <h3>Téléphones</h3>
       <table>
             
            <tr>
                <th>Téléphone</th>
                <td><input type="text"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Numéro de téléphone au format 0x-xx-xx-xx-xx" name="contact_tel" value="<?php echo esc_attr( get_option('contact_tel') ); ?>" size="50" /></td>
            </tr>
            <tr>
                <th>Fax</th>
                <td><input type="text"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" placeholder="Numéro de fax au format 0x-xx-xx-xx-xx" name="contact_fax" value="<?php echo esc_attr( get_option('contact_fax') ); ?>" size="50" /></td>
            </tr>
 
        </table>
 
        <table>
             
            <tr>
                <td><?php submit_button(); ?></td>
            </tr>
 
        </table>
       
     </form>
   </div>
   
   
<?php
}

function displayConfirmation() {
	
if( isset($_GET['settings-updated']) ) { ?>
	
	<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
	<p><strong><?php _e('Settings saved.') ?></strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Ne pas tenir compte de ce message.</span></button></div>
	</div><?php
}
	
}
?>