<?php

// ----------------------   wptext2ad shortcode -------------------------------




add_action("wp_head", "wptext2adshowcontent");
add_action("wp_footer", "wptext2adStyle");
//add_action("wp_head","wptext2ad_chk_the_flash");
add_filter("the_content", "wptext2AD_globalkeyword");
add_action('init', 'add_jquery');

$count = 1;

$mp3_ad_list = array();

add_action("admin_head", "wptext2ad_admin_head");

// global keyword fetching 

function wptext2ad_admin_head() {
    echo '<script type="text/javascript">
        function SelectFullKeyword(id)
        {
            document.getElementById(id).focus();
            document.getElementById(id).select();
        }
    </script>';
}

function wptext2AD_globalkeyword($content) {
    global $wpdb;
    $adlist_table = $wpdb->prefix . "wptext2ad_adlist";

    $result = $wpdb->get_results("select *from $adlist_table where keyword!=''");
    // echo "<pre>";
    // print_r($result);
    //  die;

    $temp_content = $content;
    if ($result) {
        foreach ($result as $row) {

            $keyword = $row->keyword;
            $temp_content = preg_replace_callback("/ $keyword /", "wptext2ad_popup_keyword", $temp_content);
        }
        return $temp_content;
    }
    return $temp_content;
}

// global keyword 
// keyword replacing 
function wptext2ad_popup_keyword($matches) {
    global $post;
    global $count;
    global $wpdb;
    global $mp3_ad_list;
    $temp = $count;
    $count++;
    $adlist_table = $wpdb->prefix . "wptext2ad_adlist";


    $keyword = trim($matches[0]);

    $result = $wpdb->get_row("select *from $adlist_table where keyword='$keyword'");



//    $script = "<script type=\"text/javascript\">
//                        wptext2adjq(document).ready(function(){
//                        wptext2adjq('#bubbleup$temp').bubbletip(wptext2adjq('#tip_up$temp'));
//                             
//                       }); 
//              </script>";


    $script = getScript($temp);

    $audioscript = "
        <script type='text/javascript'>

       soundManager.debugMode = false;


            soundManager.onready(function(){


                soundManager.createSound({
                    id: 'text2adSound$temp',
                    url: '$result->url '
                });
            });
  
  


        </script>        

";


    if ($result->type == 1)
        return $audioscript . "<a onmouseover=\"soundManager.play('text2adSound$temp');\" onmouseout=\"soundManager.stop('text2adSound$temp');\"  class='wptext2adLink' href='$url_str'>$keyword</a>";
    else

    if ($result->height > 0) {
        return "<a id='bubbleup$temp' val='' class='wptext2adLink' href='$url_str'>$keyword</a>
            <div id='tip_up$temp' style='display:none;' onmouseout='stopVideo(\"tip_up$temp\")'>
                <div style='color:#" . get_option("wplocaloplus_popup_color") . ";height:" . $result->height . "px;width:" . $result->width . "px;' href='#'>" . htmlspecialchars_decode(stripcslashes($result->content)) . " </div> 
            </div>$script
    ";
    } else {
        return "<a id='bubbleup$temp' val='' class='wptext2adLink' href='$url_str'>$keyword</a>
            <div id='tip_up$temp' style='display:none;' onmouseout='stopVideo(\"tip_up$temp\")'>
            " . htmlspecialchars_decode(stripcslashes($result->content)) . "  
            </div>$script
    ";
    }
}

// wp head function 

function wptext2ad_chk_the_flash() {
    if (is_single() || is_page()) {
        echo '  <div id="altContent">
                                    		<p>Please You need to install the missing plugin</p>
                                    		<p><a href="http://www.adobe.com/go/getflashplayer"><img 
                                    			src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 
                                    			alt="Get Adobe Flash player" /></a></p>
                                               
                </div>';
    }
}

// wptext2ad footer 

function wptext2adStyle() {

    global $mp3_ad_list;

    $style_str = "";
//    if (get_option("wptext2ad_hotlink_style") == "underline")
//        $style_str = "border-bottom: 3px double !important;";
//    else if (get_option("wptext2ad_hotlink_style") == "bold")
//        $style_str = "font-weight: bold !important;";
//    else
//        $style_str = "font-style: " . get_option("wptext2ad_hotlink_style") . " !important;";

    $style_underline = "";
    $style_bold = "";
    $style_italic = "";

    if (get_option("wptext2ad_hotlink_style_underline") == "underline")
        $style_underline = "border-bottom: 3px double !important;";

    if (get_option("wptext2ad_hotlink_style_bold") == "bold")
        $style_bold = "font-weight: bold !important;";

    if (get_option("wptext2ad_hotlink_style_italic") == "italic")
        $style_italic = "font-style: italic !important;";

    $fontsize = get_option('wptext2ad_hotlink_size');

//    var_dump(strpos($fontsize, "px"));

    if (!strpos($fontsize, "px"))
        $fontsize.="px";

    $style = "<style>
                 .wptext2adLink{
                  
                    font-family: " . get_option('wptext2ad_hotlink_font') . " !important;
                    font-size: " . $fontsize . " !important;
                    color: #" . get_option('wptext2ad_hotlink_color') . " !important;
                    text-decoration: none !important;
                    $style_underline
            $style_bold
            $style_italic
                 }
              </style>
              <!--[if IE]>
            	<link href='" . WPTEXT2AD_PLUGIN_URL . "/wp-text2ad-lite/library/bubbletip/js/bubbletip/bubbletip-IE.css' rel='stylesheet' type='text/css' />
            <![endif]-->";
    echo $style;

    // load the mp3 for playing 

    if (is_single() || is_page()) {

        global $post;
        global $wpdb;
        $adlist_table = $wpdb->prefix . "wptext2ad_adlist";

        $qr_string = array();
        for ($i = 1; $i <= 5; $i++) {
            $val2 = get_post_meta($post->ID, "textadlist" . $i, true);
            if ($val2)
                $qr_string [] = $val2;
        }

        // marge the new global mp3 

        $total_mp3 = array_unique($mp3_ad_list);
        if ($total_mp3) {
            foreach ($total_mp3 as $row) {
                $qr_string [] = $row;
            }
        }

        $qr_string = array_unique($qr_string);
        $qr_string = implode(",", $qr_string); // rtrim($qr_string,",");
        //print_r($qr_string);

        $sql = "select * from $adlist_table where id in($qr_string) and type=1";
        //echo $sql;
        $result = $wpdb->get_results($sql);

        if ($result) {
            $mp3 = "";
            $count = 1;
            foreach ($result as $row) {
                $mp3 .="m$count:'" . $row->url . "',";
                $count++;
            }
            $mp3 = rtrim($mp3, ",");
            //echo $mp3.">>>mp3";

            if ($mp3) {
                $addtional_script = ' var flashvars = {  ' . $mp3 . '	};
                            		
                                    var params = {
                            			menu: "false",
                            			scale: "noScale",
                            			allowFullscreen: "true",
                            			allowScriptAccess: "always",
                            			bgcolor: "",
                            			wmode: "direct",
                                                play: "false"
                            		};
                            		
                                    var attributes = {
                            			id:"Playaudio"
                            		};
                            		swfobject.embedSWF("' . WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/audio/Playaudio.swf", "altContent", "0", "0", "10.0.0", "' . WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/audio/expressInstall.swf", flashvars, params, attributes);
                ';
                echo "<script type=\"text/javascript\">$addtional_script </script>";
            }

//            if ($mp3 && (is_single() || is_page())) {
//                echo '  <div id="altContent">
//                                                		<p>Please You need to install the missing plugin</p>
//                                                		<p><a href="http://www.adobe.com/go/getflashplayer"><img 
//                                                			src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 
//                                                			alt="Get Adobe Flash player" /></a></p>
//                                                           
//                            </div>';
//            }
        }
    }
}

//  short code 


function wptext2adshowcontent() {

//    add_jquery();

    add_shortcode("textAd1", "wptext2ad_update_shortcode1");



    if (is_single() || is_page()) {

        add_shortcode("text2ad1", "wptext2ad_show_content_result1");
    } else {

        add_shortcode("text2ad1", "wptext2ad_show_content_result1_2");
    }
}

function wptext2ad_update_shortcode1() {
    $post_id = get_post(get_the_ID());
    $updated_content = str_replace("textAd1", "text2ad1", $post_id->post_content);
    $my_post = array();
    $my_post['ID'] = get_the_ID();
    $my_post['post_content'] = $updated_content;

    wp_update_post($my_post);
//    do_shortcode($my_post['post_content'] );
//wptext2ad_show_content_result1();
//    header('Location: ' . $_SERVER['REQUEST_URI']);
}

function add_jquery() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery_conflict', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/jquery_conflict.js');
    wp_enqueue_script('jscolor', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/jscolor/jscolor.js', array(), NULL, false);
    wp_enqueue_script('wptext2adscript', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/script.js');
    wp_enqueue_script('bubbletip', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/bubbletip/js/jQuery.bubbletip-1.0.6.js');
    wp_enqueue_script('wptext2ad_swfobject', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/audio/js/swfobject.js');
    wp_enqueue_script('jquery-actual', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/jquery.actual.min.js');
    wp_enqueue_script('soundmanager2', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/library/soundmanager/script/soundmanager2-nodebug-jsmin.js');
    wp_enqueue_script('sound_extra', WPTEXT2AD_PLUGIN_URL . '/wp-text2ad-lite/js/sound_extra.js');
}

function wptext2ad_show_content_result1_2() { //echo "1st keyword";die;
    global $post;
    $keyword = get_post_meta($post->ID, "keyword1", true);
    return $keyword;
}

// add_shortcode("textAd1" , "wptext2ad_show_content_result1");
//---------------------------------
//      shortcode :  [textAd1]   
//---------------------------------


function wptext2ad_show_content_result1() { //echo "1st keyword";die;
    global $post;
    global $wpdb;
    global $count;

    $temp = $count;
    $count++;

    $keyword = get_post_meta($post->ID, "keyword1", true);
    $textadlist = get_post_meta($post->ID, "textadlist1", true);

    $url = get_post_meta($post->ID, "url1", true);

//    if (!is_page()) {
//        $keyword = get_post_meta(950, "keyword1", true);
//        $textadlist = get_post_meta(950, "textadlist1", true);
//
//        $url = get_post_meta(950, "url1", true);
//    }


    $url_str = "javascript:void();";
    if ($url)
        $url_str = $url;

    $adlist_table = $wpdb->prefix . "wptext2ad_adlist";

    $result = $wpdb->get_row("select *from $adlist_table where id=$textadlist");
    $addtional_script = "";



    $script = getScript($temp);

    $audioscript = "
        <script type='text/javascript'>

       soundManager.debugMode = false;
soundManager.url = '".WPTEXT2AD_PLUGIN_URL."/wp-text2ad-lite/library/soundmanager/swf/soundmanager2.swf';

            soundManager.onready(function(){

//alert('test');
                soundManager.createSound({
                    id: 'text2adSound$temp',
                    url: '$result->url'
                });
            });
  
  


        </script>        

";

//var_dump($result->type);
    if ($result->type == 1) {

        return $audioscript . "<a onmouseover=\"soundManager.play('text2adSound$temp');\" onmouseout=\"soundManager.stop('text2adSound$temp');\"  class='wptext2adLink' href='$url_str'>$keyword</a>";
    } else

    if ($result->height > 0) {
        return "<a id='bubbleup$temp' val='' class='wptext2adLink' href='$url_str'>$keyword</a>
            <div id='tip_up$temp' style='display:none;' onmouseout='stopVideo(\"tip_up$temp\")'>
                <div style='color:#" . get_option("wplocaloplus_popup_color") . ";height:" . $result->height . "px;width:" . $result->width . "px;' href='#'>" . htmlspecialchars_decode(stripcslashes($result->content)) . " </div> 
            </div>$script
    ";
    } else {
//          echo "test1";
        return "<a id='bubbleup$temp' val='' class='wptext2adLink' href='$url_str'>$keyword</a>
            <div id='tip_up$temp' style='display:none;' onmouseout='stopVideo(\"tip_up$temp\")'>
            " . htmlspecialchars_decode(stripcslashes($result->content)) . "  
            </div>$script
    ";
    }
}

function getScript($keywordId) {




    $script = '<script type="text/javascript">
  function methodToFixLayout' . $keywordId . '() {
        wptext2adjq(document).ready(function(){
        
            var scrollTop     = wptext2adjq(window).scrollTop(),
            elementOffset = wptext2adjq("#bubbleup' . $keywordId . '").offset().top,
            distance      = (elementOffset - scrollTop);
            
            var bubbleheight=wptext2adjq("#tip_up' . $keywordId . '").actual("height");
    
            var direction="";
            
            if(distance<bubbleheight+70){
                direction="down";
            }else{
                direction="up";
            }
         
       wptext2adjq("#bubbleup' . $keywordId . '").removeBubbletip(wptext2adjq("#tip_up' . $keywordId . '"));
            wptext2adjq("#bubbleup' . $keywordId . '").bubbletip(
        
            wptext2adjq("#tip_up' . $keywordId . '"),
            { deltaDirection: direction });
   
        }); 
    
    }
  wptext2adjq(window).bind("resize load scroll", methodToFixLayout' . $keywordId . ');
           
              </script>';


    return $script;
}
?>