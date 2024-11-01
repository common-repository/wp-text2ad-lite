<?php

//////////////////////////////////////////////////////////////////////////////////////
/////////////////////      wpText2Ad custom meta box           /////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
include_once 'functions.php';
/* Define the custom box */
add_action("add_meta_boxes", "wptext2ad_metaboxlist");




/* Do something with the data entered */

/* Adds a box to the main column on the Post and Page edit screens */

function wptext2ad_metaboxlist() {
    add_meta_box("wptext2ad_sectionid", __("WP Text2Ad Widget", "wptext2ad_textdomain"), "wptext2ad_meta_box", "post", "side", "high");
    add_meta_box("wptext2ad_sectionid", __("WP Text2Ad Widget", "wptext2ad_textdomain"), "wptext2ad_meta_box", "page", "side", "high");
}

/* Prints the box content */

function wptext2ad_meta_box() {

    global $post;


    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="wptext2ad_noncename" id="wptext2ad_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';


    // Get the location data if its already been entered

    echo "<br/>";


    $val1 = get_post_meta($post->ID, "keyword1", true);
    $val2 = get_post_meta($post->ID, "textadlist1", true);
    $val3 = get_post_meta($post->ID, "url1", true);

    echo '<div class="postbox2 closed KeywordBox">
                <div title="Click to toggle"  class="handlediv"><br></div>
                <h3 class="hndle"><span>Keyword</span></h3>
                <div class="inside">
                    ' . getTextAdList(1, $val2) . '
                    <p><strong>Keyword</strong> </p> 
                    <p><input type="text"  name="keyword1" value="' . $val1 . '" /></p>
                    <p><strong>Url</strong> </p> 
                    <p><input type="text" style="width:200px;"  name="url1" value="' . $val3 . '" /></p>  
                    <p>Add this Shortcode Below in your Page or Post,Where you Want to Display This Keyword.</p>
                    <input id="text2ad1" onClick="SelectFullKeyword(\'text2ad1\');" style="border: 1px solid;" type="text" readonly value="[text2ad1]"/>
                </div>
          </div>';
}

function wptext2ad_meta_box_save($post_id, $post) {
    // echo "testbd";
    //global $post;
// var_dump("testbdr");
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!wp_verify_nonce($_POST["wptext2ad_noncename"], plugin_basename(__FILE__))) {
        return $post->ID;
    }



    // Is the user allowed to edit the post or page?
    if (!current_user_can("edit_post", $post->ID))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.

    $events_meta["textadlist1"] = $_POST["textadlist1"];

    // var_dump( $_POST["textadlist" . $i]);
    if ($_POST["textadlist1"]) {
        $events_meta["keyword1"] = $_POST["keyword1"];
        $events_meta["url1"] = $_POST["url1"];
    }


    // print_r($events_meta);die;
    // Add values of $events_meta as custom fields

    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if ($post->post_type == "revision")
            return; // Don't store custom data twice
        $value = implode(",", (array) $value); // If $value is an array, make it a CSV (unlikely)
        if (get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if (!$value)
            delete_post_meta($post->ID, $key); // Delete if blank
    }
}

add_action('save_post', 'wptext2ad_meta_box_save', 1, 2); // save the custom fields
?>