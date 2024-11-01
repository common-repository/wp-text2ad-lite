<?php

/* ----------------------------------------------------------------------------------------------------



  I N S T A L L A T I O N     F U N C T I O N  (  D A T A B A S E  )



  ---------------------------------------------------------------------------------------------------- */

register_activation_hook(WPTEXT2AD_MY_PLUGIN_DIR . "/wptext2ad.php", 'WpText2Ad_plugin_install');

function WpText2Ad_plugin_install() {

    global $wpdb;

    if (!defined('DB_CHARSET') || !($db_charset = DB_CHARSET))
        $db_charset = 'utf8';
    $db_charset = "CHARACTER SET " . $db_charset;

    if (defined('DB_COLLATE') && $db_collate = DB_COLLATE)
        $db_collate = "COLLATE " . $db_collate;

    $table_name = $wpdb->prefix . "wptext2ad_adlist";

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

        $sql = "CREATE TABLE " . $table_name . " (
            id          bigint(11) NOT NULL AUTO_INCREMENT,
            name       varchar(555) NOT NULL,
            content       TEXT,
            date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
            type       tinyint,
            width int,
            height int,
            url       varchar(555) NOT NULL,
            keyword       varchar(555) NOT NULL,
            PRIMARY KEY   (id)
            ) {$db_charset} {$db_collate};";

        $results = $wpdb->query($sql);
    }

  
    add_option("wptext2adlist_perpage", 20);
    add_option("wptext2ad_hotlink_color", "362C34");
    add_option("wptext2ad_hotlink_size", "12");
    add_option("wptext2ad_hotlink_font", "'Times New Roman', Times, serif");
    add_option("wptext2ad_hotlink_style", "normal");
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ---------------------------------    add script and style   ----------------------------------------------------
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action("init", "init_WpText2Ad_power");

function init_WpText2Ad_power() {
    wp_enqueue_style('wpTextbubbletipcss', WPTEXT2AD_PLUGIN_URL . "/wp-text2ad-lite/library/bubbletip/js/bubbletip/bubbletip.css");
    wp_enqueue_style('wpTextbubbletipcss');

    wp_enqueue_style("wpTextstyle", WPTEXT2AD_PLUGIN_URL . "/wp-text2ad-lite/style/wptext2ad_style.css");
    wp_enqueue_style("wpTextstyle");
}


?>