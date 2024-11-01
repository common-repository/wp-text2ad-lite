<?php

function wpText2AD_replace_text_wps($text) {
    $replace = array(
        // 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
        '<code>' => '',
        '</code>' => ''
    );
    $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
}

add_filter("the_content", "wpText2AD_replace_text_wps");


/*  function list for wp-plugin */
if (!function_exists("WpText2Ad_get_numof_records_bysql")):

    function WpText2Ad_get_numof_records_bysql($sql) {
        global $wpdb;
        $resultset = $wpdb->get_results($sql);
        return count($resultset);
    }

endif;

if (!function_exists("WpText2Ad_get_numof_records")):

    function WpText2Ad_get_numof_records($tbl_name="", $condition="") {
        global $wpdb;

        if ($tbl_name == "")
            return -1;

        $sql = "SELECT * FROM " . $wpdb->prefix . $tbl_name;
        if ($condition != "")
            $sql .= " WHERE " . $condition;

        $resultset = $wpdb->get_results($sql);
        return count($resultset);
    }

endif;

// get the TextADlist 

function getTextAdList($id, $selected) {

    global $wpdb;

    $wptext2adlist_table = $wpdb->prefix . "wptext2ad_adlist";
    $textAdList = "";

    $sql = "SELECT * FROM $wptext2adlist_table ";

    $textad_list = $wpdb->get_results($sql);

    if ($textad_list) {
        $textAdList .= "<p><strong>Text2Ad Media Type</strong></p>";
        $textAdList .= "<p><select  name='textadlist$id' id='textadlist$id' style='width:235px'>";
        $textAdList .= "<option value='' >Select Your TextAd</option>";
        foreach ($textad_list as $row) {

            if ($selected == $row->id)
                $textAdList .= "<option value='" . $row->id . "' selected >" . $row->name . "</option>";
            else
                $textAdList .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
        $textAdList .= "</select></p>";
    }
    return $textAdList;
}

?>