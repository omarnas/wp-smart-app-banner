<?php
/**
* Plugin Name: Add Smart App Banners
* Plugin URI: http://omarnas.com/smart-app-banner
* Description: Add a Smart App Banner to your website to increase app installs
* Version: 1.0
* Author: Omar Abu Safieh
* Author URI: http://omarnas.com/
* License: GPL12
*/



function setup_theme_plugin_menus() {
     add_options_page(
        'Smart App Banners',
         'Smart App Banners',
          'manage_options', 
        'Smart-App-Banners',
         'sab_page_settings'); 
}

function sab_script(){
	wp_enqueue_script( 'myjs', plugins_url( '/smart-app-banner.js', __FILE__ ),false);
	//echo " <!-- inside sab script-->";
	//wp_register_script('add-smart-app-banner', WP_PLUGIN_URL.'/smart-app-banner.js');
	
}

function themeslug_enqueue_style(){
	wp_enqueue_style( 'core', plugins_url( '/smart-app-banner.css', __FILE__ ), false ); 
	//wp_enqueue_style( 'core', 'smart-app-banner.css', false ); 
}

// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_plugin_menus");

function sab_page_settings() {
//require("themesoptions.php"); 
//echo " i am gere";
require("sab-options.php");
}

$sabarray['appleid'] = get_option('sab_appleid');
$sabarray['playid'] = get_option('sab_playid');
$sabarray['msid'] = get_option('sab_msid');
$sabarray['msname'] = get_option('sab_msname');
$sabarray['dayshidden'] = get_option('sab_dayshidden');
$sabarray['daysreminder'] = get_option('sab_daysreminder');
$sabarray['title'] = get_option('sab_title');
$sabarray['author'] = get_option('sab_author');
$sabarray['button'] = get_option('sab_button');
$sabarray['iosprice'] = get_option('sab_iosprice');
$sabarray['playprice'] = get_option('sab_playprice');
$sabarray['msprice'] = get_option('sab_msprice');
$sabarray['image'] = get_option('sab_image');

if($sabarray['msprice']==''){
	$sabarray['msprice']='Free';
}
if($sabarray['playprice']==''){
	$sabarray['playprice']='Free';
}
if($sabarray['iosprice']==''){
	$sabarray['iosprice']='Free';
}
if($sabarray['dayshidden']==''){
	$sabarray['dayshidden']=15;
}
if($sabarray['daysreminder']==''){
	$sabarray['daysreminder']=20;
}
if($sabarray['button']==''){
	$sabarray['button']='View';
}
function addgsp(){
	global $sabarray; 
    echo '<!-- start Smart App banners -->'."\t\n";
	if($sabarray['appleid']){
	echo '<meta name="apple-itunes-app" content="app-id='.$sabarray['appleid'].'">'."\t\n";
	}
	if($sabarray['playid']){
	echo '<meta name="google-play-app" content="app-id='.$sabarray['playid'].'">'."\t\n";
	}
	if($sabarray['msid']){
	echo '<meta name="msApplication-ID" content="App" />
    <meta name="msApplication-PackageFamilyName" content="'.$sabarray['msid'].'" />'."\t\n";
	}
	if($sabarray['image']){
	echo '<link rel="apple-touch-icon" href="'.$sabarray['image'].'">'."\t\n";
	echo '<link rel="android-touch-icon" href="'.$sabarray['image'].'" />'."\t\n";
	}
 echo '<!-- end of Smart App banners -->'."\t\n";
	
      }

function footerscript(){
	global $sabarray; 
	echo "<script type=\"text/javascript\">
      new SmartBanner({
          daysHidden: ".$sabarray['dayshidden'].",   
          daysReminder: ".$sabarray['daysreminder'].",
          appStoreLanguage: 'us', 
          title: '".$sabarray['title']."',
          author: '".$sabarray['author']."',
          button: '".$sabarray['button']."',
          store: {
              ios: 'On the App Store',
              android: 'In Google Play',
              windows: 'In Windows store'
          },
          price: {
              ios: '".$sabarray['iosprice']."',
              android: '".$sabarray['playprice']."',
              windows: '".$sabarray['msprice']."'
          }
          // , force: 'ios' // Uncomment for platform emulation
      });
    </script>";
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'sab_script' ); 
add_action('wp_head','addgsp');
add_action('wp_footer','footerscript');