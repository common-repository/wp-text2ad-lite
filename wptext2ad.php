<?php
/*
  Plugin Name: WP Text2ad Lite

  Plugin URI: http://wptext2ad.com

  Description: WP Text2Ad Plugin is an 'In Text' Advertising Plugin that changes keywords you select in your pages or posts, into audio or bubble Ad's that instantly activate when you hover. You can create dynamic, interactive multimedia Ad's using MP3 Audio, Video, Images and/or text using simple HTML. You have 100% control of your Ad content and design so the possibilities are almost endless.

  Version: 2.0.2

  Author: Avera CG Inc.

  Author URI: http://WPText2Ad.com

 */


/*
  Copyright (C) 2012  Daniel McNamara

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 */

/* ----------------------------------------------------------------------------------------------------



  D E C L E A R I N G     V A R I A B L E S



  ---------------------------------------------------------------------------------------------------- */







if (!defined("WPTEXT2AD_CONTENT_URL"))
    define("WPTEXT2AD_CONTENT_URL", get_option("siteurl") . "/wp-content");



if (!defined("WPTEXT2AD_CONTENT_DIR"))
    define("WPTEXT2AD_CONTENT_DIR", ABSPATH . "wp-content");



if (!defined("WPTEXT2AD_PLUGIN_URL"))
    define("WPTEXT2AD_PLUGIN_URL", WPTEXT2AD_CONTENT_URL . "/plugins");



if (!defined("WPTEXT2AD_PLUGIN_DIR"))
    define("WPTEXT2AD_PLUGIN_DIR", WPTEXT2AD_CONTENT_DIR . "/plugins");



if (!defined("WPTEXT2AD_MY_PLUGIN_DIR"))
    define("WPTEXT2AD_MY_PLUGIN_DIR", WPTEXT2AD_CONTENT_DIR . "/plugins/wp-text2ad-lite");





//admin user level



$WpText2Ad_plugin_access = 8;







//error_reporting(0);
//including files


include_once(dirname(__FILE__) . "/include/functions.php");



include_once(dirname(__FILE__) . "/include/router.php");



include_once(dirname(__FILE__) . "/include/install.php");



include_once(dirname(__FILE__) . "/include/meta-box.php");



include_once(dirname(__FILE__) . "/include/show-content.php");











ini_set("output_buffering", "on");







/* ----------------------------------------------------------------------------------------------------



  A D M I N     M E N U



  ---------------------------------------------------------------------------------------------------- */

function WpText2Ad_menu() {

    $mymenu = new WpText2Ad_option_list();
}

add_action("admin_menu", "WpText2Ad_menu");
add_action("admin_head", "WpText2Ad_jsAdd");

//add_action('wp_enqueue_scripts', 'my_scripts_method');

function my_scripts_method() {
    
}

//add_action('admin_footer', 'wptext2ad_footer');

function wptext2ad_footer() {
    
}

function WpText2Ad_jsAdd() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jscolor', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/jscolor/jscolor.js');

    wp_enqueue_script('wptext2adscript', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/script.js');
    wp_enqueue_script('bubbletip', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/bubbletip/js/jQuery.bubbletip-1.0.6.js');
    wp_enqueue_script('wptext2ad_swfobject', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/audio/js/swfobject.js');
    wp_enqueue_script('flowplayer', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/flowplayer/flowplayer-3.2.6.min.js');
    wp_enqueue_script('flowplayer_extra', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/flowplayer_scripts.js');
}

//register_activation_hook(__FILE__, 'activation_warning');



class WpText2Ad_option_list {

    public function __construct() {

        $request_handler = array($this, "request_handler");

        global $WpText2Ad_plugin_access;

//        add_action("admin_notices", array(&$this, "wptext2ad_warning"));
        add_menu_page(__("WP Text2Ad"), __("WP Text2Ad"), $WpText2Ad_plugin_access, "wptext2ad_license", $request_handler, WPTEXT2AD_PLUGIN_URL . "/wp-text2ad-lite/images/logo.png");
        add_submenu_page("wptext2ad_license", __("Keyword Format"), __("Keyword Format"), $WpText2Ad_plugin_access, "wptext2ad_option", $request_handler);
        add_submenu_page("wptext2ad_license", __("Media Setup"), __("Media Setup"), $WpText2Ad_plugin_access, "wptext2ad_adlist", $request_handler);
        add_submenu_page("wptext2ad_license", __("Tutorials"), __("Tutorials"), $WpText2Ad_plugin_access, "wptext2ad_tutorials", $request_handler);
    }

    /* The request handler function that declares the needed vars and calls



      the router */

    public function request_handler() {

        $controller = $_GET["page"];

        /* and the action variable for the method */

        $action = $_GET["action"];

        // we add a small check to see if the page requested is this
        //  controller

        if ($controller == get_class($this)) {

            // if it is, we can use the instance of this controller instead
            $controller = $this;
        }

        // now the params. All the other get variables



        $params = $_GET;

        // we can remove the page and action variables first

        unset($params["page"]);
        unset($params["action"]);




        // finally! let's set up data for the router



        $route = array($controller, $action, $params);

        // we are using the instance of this class as the default controller
        $default_controller = $this;

        // the default method - Kohana 2 style!
        $default_method = "index";

        if (is_string($route[0]) && file_exists(WPTEXT2AD_MY_PLUGIN_DIR . "/modules/" . $route[0] . ".php"))
            include_once("modules/" . $route[0] . ".php");

        wp_register_style('wptext2ad_admin-style', plugins_url('style/wptext2ad_admin.css', __FILE__));
        wp_enqueue_style('wptext2ad_admin-style');
        ?>




        <div id="pagewrap">

            <div id="menubar">

                <div id="bar">

                    <a href=""><img src="<?php echo site_url(); ?>/wp-content/plugins/wp-text2ad-lite/images/menubg.png" alt="bar" height="50px"/></a>
                </div>

                <div id="logo">		
                    <a href="http://wptext2ad.com"><img src="http://wptext2ad.com/images/logo.png" alt="logo"/></a>
                </div>

                <div id="menu">

                    <ul>
                        <li><a href="?page=wptext2ad_license">WP Text2ad</a></li>
                        <li><a href="?page=wptext2ad_option">Keyword Format</a></li>
                        <li><a href="?page=wptext2ad_adlist">Media Setup</a></li>
                        <li><a href="?page=wptext2ad_tutorials">Tutorials</a></li>
                    </ul>
                </div>

            </div>

            <?php
            $router = new WpText2Ad_Router($route, $default_controller, $default_method);
            ?></div>
            <?php
        }

        /* since this is the default controller,



          we should set up the default method here as well */

        public function index($args = NULL) {
            
        }

    }
    ?>