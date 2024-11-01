<?php





class wptext2ad_adlist {


    public function index() {

        $this->condition();
        global $wpdb;
        $per_page = get_option("wptext2adlist_perpage");

        $textadlist_table = $wpdb->prefix . "wptext2ad_adlist";

        $sql = "SELECT  *from $textadlist_table ";
        $total_sql = $sql;

        $pagenum = isset($_GET["pagenum"]) ? absint($_GET["pagenum"]) : 0;

        if (empty($pagenum))
            $pagenum = 1;
        if (!isset($per_page) || $per_page < 0)
            $per_page = 10;
        $num_pages = ceil(WpText2Ad_get_numof_records_bysql($sql) / $per_page);
        $app_pagin = paginate_links(array(
            "base" => add_query_arg("pagenum", "%#%"),
            "format" => "",
            "prev_text" => __("&laquo;"),
            "next_text" => __("&raquo;"),
            "total" => $num_pages,
            "current" => $pagenum

                ));

        if (isset($_REQUEST["orderby"])) {
            $sql .= " ORDER BY " . $_REQUEST["criteria"] . " " . $_REQUEST["order"];
            $option_selected[$_REQUEST["criteria"]] = " selected=\"selected\"";
            $option_selected[$_REQUEST["order"]] = " selected=\"selected\"";
        } else {
            $sql .= " ORDER BY id ";
            $option_selected["id"] = " selected=\"selected\"";
            $option_selected["ASC"] = " selected=\"selected\"";
        }
        if ($pagenum > 0)
            $sql .= " LIMIT " . (($pagenum - 1) * $per_page) . ", " . $per_page;
        $wpdb->show_errors = true;
        $comment_list = $wpdb->get_results($sql);
        if (isset($_GET["pagenum"]))
            $pagenum_url = "&amp;pagenum=" . $_GET["pagenum"];
        else
            $pagenum_url = "";
        foreach ($comment_list as $row) {
            if ($alternate)
                $alternate = "";
            else
                $alternate = " class=\"alternate\"";
            if ($row->type == 1)
                $api = "Audio";
            if ($row->type == 2)
                $api = "Video";
            if ($row->type == 3)
                $api = "HTML";
            $date = new DateTime($row->date);
            $time = $date->format("M d, Y H:i");





            $elem_list .= "<tr{$alternate}>";


            $elem_list .= "<th scope=\"row\" class=\"check-column\"><input type=\"checkbox\" name=\"bulkcheck[]\" value=\"" . $row->id . "\" /></th>";


            $elem_list .= "<td>" . $row->id . "</td>";


            $elem_list .= "<td>" . $row->name . "</td>";


            $elem_list .= "<td>" . $row->keyword . "</td>";


            $elem_list .= "<td>" . $time . "</td>";


            $elem_list .= "<td>" . $api . "</td>";


            $elem_list .= '<td style="text-align:center"><a href="' . $_SERVER['PHP_SELF'] . "?page=wptext2ad_adlist&amp;action=edit&amp;id=" . $row->id . '" class="delete">Edit</a></td>';


            $elem_list .= '<td style="text-align:center"><a href="' . $_SERVER['PHP_SELF'] . "?page=wptext2ad_adlist&amp;action=delete&amp;id=" . $row->id . '" onclick="return confirm(\'Are you sure you want to delete this List ?\');" class="delete">Delete</a></td>';


            $elem_list .= "</tr>";


        }


        ?>














        <?php $this->addWpText2AdListBox(); ?>





        <div id="keywordlist" >





            <h1>Media List</h1>


            <hr/>








            <?php if ($elem_list): ?>


                <div>


                    <p><h3>Currently, you have <?php echo WpText2Ad_get_numof_records_bysql($total_sql); ?> listings</h3></p></div>





                


            <div style="margin-left: 0px;padding-left: 0px;">


                            <form id="record_form" method="post" action="/home/wp-admin/admin.php?page=wptext2ad_adlist">


                                <div class="alignleft actions" id="toptab" style="margin-left: 0px;padding-left: 0px;">


                           


                                <p style="padding-right:15px;">


                                    <select  class="criteria inputfield" style="margin-left: 0px;line-height:34px;margin-top:0px;height: 40px;padding-top: 8px;padding-bottom: 8px;"  name="criteria" onfocus="this.style.border = '1px solid #000'">


                                        <option value="id">ID</option>


                                        <option value="name">Name</option>


                                        <option value="keyword">Keyword</option>


                                        <option value="date">Date</option>


                                        <option value="type">Type</option>


                                    </select>


                                </p> 


                                <p style="margin-top:7px;padding-right:15px;">


                                    <select class="order inputfield" style="line-height:34px;height: 40px;padding-top: 8px;padding-bottom: 8px;" name="order" onfocus="this.style.border = '1px solid #000'">


                                        <option value="ASC" selected="selected">ASC</option>


                                        <option value="DESC">DESC</option>


                                    </select>


                                </p>


								<p> 


                                    <input type="submit" name="orderby" value="List Order" class="gobutton" style="border: 1px solid #000;" />


                                </p>


								


                                <p class="text" style="margin-top: 25px;margin-left:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Listings Per Page:     </p>


                                   <p style="margin-top: 0px;">    <input class="pagenumfield" type="text" value="20" name="wptext2adlist_perpage" style="border: 1px solid #000;margin-left: 10px;text-align: center;margin-top:12px;" />


                                    <input type="submit" name="wptext2adlist_perpage_submit" value="Change" class="deletebutton" style="border: 1px solid #000;margin-left: 10px;margin-top:1px;" />


                                </p>


								


                            </div>


                                                        <div style="clear:both;"><!----></div>


                       


                    <div id="medialisttable" style="position: relative;float: left;margin-right: 50px;">


            <!--                        <table class="widefat postbox" style="border: 1px solid #000; background: #fff; background-color: #fff;" >-->


                        <table style="margin: 0px;padding: 0px;">


                            <thead ><tr style="border-bottom: 1px solid #000;">


                                    <th class="check-column"><input type="checkbox" onclick="record_form_checkAll(document.getElementById('record_form'));" /></th>





                                    <th>ID</th>


                                    <th>Name</th>


                                    <th>Keyword</th>


                                    <th>Date</th>


                                    <th>Type</th>


                                    <th colspan="2" style="text-align:center">Action</th>





                                </tr></thead>





                            <tbody id="the-list"  style="border: 1px solid #000; background: #fff; background-color: #fff;"><?php echo $elem_list; ?></tbody>


                        </table>


                    </div>


                    <div class="tablenav" style="display: inline-block;position: relative;margin-bottom: 20px;">


                        <div class="alignleft actions" style="margin-top: 5px;">


                            <input type="submit" name="bulkaction" value="Delete" onclick="return confirm('Are you sure you want to delete these  listings  ?');" class="deletebutton" style="border: 1px solid #000;" />


                        </div>


                        <?php if ($app_pagin): ?>


                            <div class="tablenav-pages">


                                <span class="displaying-num">


                                    Displaying 


                                    <?php echo ( $pagenum - 1 ) * $per_page + 1; ?> - 


                                    <?php echo min($pagenum * $per_page, WpText2Ad_get_numof_records_bysql($total_sql)); ?> of 


                                    <?php echo WpText2Ad_get_numof_records_bysql($total_sql); ?>


                                    <?php echo $app_pagin; ?>


                                </span>


                            </div>


                        <?php endif; ?>


                        <div style="clear:both;"><!----></div>


                    </div>





                </form>


            </div>


            <?php else: ?>


                <div style="display: inline-block;margin-top: 50px;">


                    <span>There are No Records in the Database at this time</span>


                </div>


            <?php endif; ?>





        </div>





        <!--        </div>-->





        <?php


    }





    /**


     *   show the add box of TextAd list


     */


    public function addWpText2AdListBox($id=0) {


        global $wpdb;


        $textadlist_table = $wpdb->prefix . "wptext2ad_adlist";





        $lable = "ADD";


        if ($id) {


            $lable = "Edit";


            $sql = "Select *from $textadlist_table where id=$id";


            $list_result = $wpdb->get_row($sql);


            ?>





            <script type="text/javascript">


                wptext2adjq(document).ready(function(){


                    wptext2adjq("#textadtype option").each(function(){


                        if(wptext2adjq(this).val()==<?php echo $list_result->type; ?>)


                        wptext2adjq(this).attr("selected","selected")


                    })


                                                                                                                                


                    if(wptext2adjq("#textadtype").val()!=""){


                        wptext2adjq(".cityBox").slideUp(); 


                                                                                                                                     


                        if(wptext2adjq("#textadtype").val()==1){


                            wptext2adjq("#audio").slideDown();


                                                                                                                                        	


                                                                                                                                            


                            // play the audio 


                                                                                                                                            


                            var flashvars = {


                                m1:"<?php echo $list_result->url; ?>"


                            };


                                                                                                                                    		


                            var params = {


                                menu: "false",


                                scale: "noScale",


                                allowFullscreen: "true",


                                allowScriptAccess: "always",


                                bgcolor: "",


                                wmode: "direct"


                            };


                                                                                                                                    		


                            var attributes = {


                                id:"Playaudio"


                            };


                            swfobject.embedSWF("<?php echo WPTEXT2AD_PLUGIN_URL; ?>/wp-text2ad-lite/library/audio/Playaudio.swf", "altContent", "0", "0", "10.0.0", "<?php echo WPTEXT2AD_PLUGIN_URL; ?>/wp-text2ad-lite/library/audio/expressInstall.swf", flashvars, params, attributes);


                                                                                                                                    		


                        }  


                        if(wptext2adjq("#textadtype").val()==2)


                            wptext2adjq("#video").slideDown();  


                        if(wptext2adjq("#textadtype").val()==3)


                            wptext2adjq("#html").slideDown();  


                    }


                                                                                                                                


                    wptext2adjq("#startAudio").click(function(){


                        thisMovie("Playaudio").playSound("<?php echo $list_result->url; ?>");


                    })


                                                                                                                                


                    wptext2adjq("#stopAudio").click(function(){


                        thisMovie("Playaudio").stopSound();


                    })


                });


            </script>


            <?php


        }


        ?>





        <!--        <div class="wrap" style="padding-top: 15px;">-->





        <div id="addkeylist" class="metabox-holder has-right-sidebar">


            <h1>Media Setup</h1>


            <hr/>


            <br/>


            <div class="postbox " style="border: 1px solid #000; background: #fff; background-color: #fff;" > 











                <h2  style="padding-left: 14px;padding-bottom: 10px;border-bottom: 1px solid #000; border-color: #000; background: #fff;margin-top: 0px;padding-top: 10px;" >Create Media Type</h2>


                <div class="inside" style="padding: 0px 10px 0 10px">


                    <form id="addTextAdlist"  method="post"  enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>?page=wptext2ad_adlist">





                        <div class="exBox">


                            <label class="text">AD Name</label><input type="text" class="inputfield" style="border:1px solid;" value="<?php echo $list_result->name; ?>" name="listname" id="listname" />


                        </div>


                        <div class="exBox">


                            <label class="text">Keyword Phrase</label>


                            <input type="text" class="inputfield" style="border:1px solid;" name="keyword" value="<?php echo $list_result->keyword; ?>" />


                        </div>


                        <div class="exBox">


                            <label class="text">AD Type</label>


                            <select class="inputfield" style="line-height: 34px;height: 40px;padding-top: 8px;padding-bottom: 8px;"  name="textadtype" id="textadtype" onfocus="this.style.border = '1px solid #000'">


                                <option value="">Select Type</option>


                                <option  value="1">Audio</option>


                                <option value="2">Video</option>


                                <option value="3">HTML</option>


                            </select>


                        </div>








                        <div id="audio" class="cityBox">


                            <div class="exBox">


                                <label class="text">Upload Audio</label> 


                               <div id="fileupload">





                                    <div id="filename">Click To Upload MP3...</div>





                                    <input type="file" name="audioupload"  id="audioupload" accept="audio/*" onchange="document.getElementById('filename').innerHTML=this.value;"/>





                                </div>


                                <!--<input type="file" class="file" style="border:1px solid;" value="<?php echo $list_result->city_what ?>" name="audioupload" id="audioupload" />-->


                               


                                <p class="smallwarning">MP3 Audio Format Only</p>


                                <p  class="smallwarning">Maximum 500 KB</p> 





                            </div>


                            <?php if ($list_result->url) { ?>


                                <div class="exBox">


                                    <label class="text">Existing Audio</label>





                                    <a id="startAudio" href="javascript:void(0)"><img src="<?php echo WPTEXT2AD_PLUGIN_URL; ?>/wp-text2ad-lite/images/start.png" /></a> 


                                    <a  href="javascript:void(0)" id="stopAudio"><img src="<?php echo WPTEXT2AD_PLUGIN_URL; ?>/wp-text2ad-lite/images/stop.png" /></a>








                                </div>


                                <input type="hidden" value="<?php echo $list_result->content; ?>" name="preAudio" id="preAudio" />


                                <div id="altContent">


                                    <h1>Play_audio</h1>


                                    <p>Alternative content</p>


                                    <p><a href="http://www.adobe.com/go/getflashplayer"><img 


                                                src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 


                                                alt="Get Adobe Flash player" /></a></p>


                                    <a href="javascript:void()" onclick="callExternalInterface()" >click me </a>


                                </div>


                            <?php } ?>


                        </div>





                        <div id="video" class="cityBox">


                            <div class="exBox">


                                <label class="text">Width</label>  <input type="text" class="inputfield" style="border:1px solid;"  name="width2" <?php


                 //   if ($list_result->width)


                        echo "value='" . $list_result->width . "'"; 


                    // else   echo 'value="400"';


                            ?>  /> 


                            </div>


                            <div class="exBox">


                                <label class="text">Height</label>  <input type="text" class="inputfield" style="border:1px solid;"  name="height2"  <?php


                                                                //  if ($list_result->height)


                                                                      echo "value='" . $list_result->height . "'"; 


                                                                   // else  echo 'value="300"';


                            ?>  />  


                            </div>





                            <div class="exBox2">


                                <label class="text">Content</label>


                                <?php


                                $content = "";


                                if ($list_result->content)


                                    $content = htmlspecialchars_decode(stripcslashes($list_result->content));


                                the_editor("$content", "content", "", false);


                                ?> 


                            </div>








                        </div>





                        <div id="html" class="cityBox">


                            <div class="exBox">


                                <label  class="text">Width</label>  <input type="text" class="inputfield" style="border:1px solid;"  name="width" <?php


                      //  if ($list_result->width)


                            echo "value='" . $list_result->width . "'"; 


                       //  else   echo 'value="400"';


                                ?>  /> 


                            </div>


                            <div class="exBox">


                                <label  class="text">Height</label>  <input type="text" class="inputfield" style="border:1px solid;"  name="height"  <?php


                                                                 //  if ($list_result->height)


                                                                       echo "value='" . $list_result->height . "'";


                                                                    // else   echo 'value="300"';


                                ?>  />  


                            </div>


                            <div class="exBox2" >


                                <label  class="text">Content</label>


                                <?php


                                $content = "";


                                if ($list_result->content)


                                    $content = htmlspecialchars_decode(stripcslashes($list_result->content));


                                the_editor("$content", "htmlcontent", "", false);


                                ?> 


                            </div>





                        </div>


                        <div style="clear: both;"></div>


                        <?php if ($id != "") { ?>


                            <p><input type="submit" name="wptext2ad_update" value="Create AD" class="submitbutton" style="border:1px solid #000;width: 150px;margin-left: 5px;"  /></p>


                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 


                        <?php } else { ?>


                            <p><input type="submit" name="wptext2ad_add" value="Create" class="submitbutton" style="border:1px solid #000;  margin-left: 5px;"   /></p> 


                        <?php } ?>  


                        <div id="previewResult" style="position: relative;" >


                        </div>





                    </form>


                </div>


            </div>














        </div>    





        <!--        </div>-->





        <?php


    }





    /**


     *   condition check of the scheduling module 


     */


    public function condition() {


        //print_r($_POST);die;


        if (isset($_POST["wptext2ad_add"]))


            $this->add();





        if (isset($_POST["wptext2ad_update"]))


            $this->update();








        if (isset($_POST["wptext2adlist_perpage_submit"])) {





            if ($_POST["wptext2adlist_perpage"] != "") {


                update_option("wptext2adlist_perpage", $_POST["wptext2adlist_perpage"]);


            }


        }


        // delete bulk comments 





        if ($_REQUEST["bulkaction"] == __("Delete")) {


            global $wpdb;


            $textadlist_table = $wpdb->prefix . "wptext2ad_adlist";








            if ($_REQUEST["bulkcheck"]) {





                $sql = "DELETE from $textadlist_table WHERE  id IN (" . implode(", ", $_REQUEST["bulkcheck"]) . ")";





                if (FALSE === $wpdb->query($sql))


                    echo '<div class="updated fade" id="message"><h2>There was an error in the MySQL query</h2></div>';


                else


                    echo '<div class="updated fade" id="message"><h2>The MP3 Upload Max for an Audio file is 500KB</h2></div>';


            }


        }


    }





    public function edit() {


        ?>





        <?php


        $this->addWpText2AdListBox($_GET["id"]);


        ?>





        <?php


    }





    /**


     * 


     *   --------------------


     *   add  TextAd list


     *   --------------------


     *  


     */


    public function add() {


        global $wpdb;


        $adlist_table = $wpdb->prefix . "wptext2ad_adlist";





        $textadtype = htmlspecialchars(trim($_POST["textadtype"]));


        $name = htmlspecialchars(trim($_POST["listname"]));


        $keyword = htmlspecialchars(trim($_POST["keyword"]));





        if ($textadtype == 1) {





            $name = htmlspecialchars(trim($_POST["listname"]));





            /* if($_FILES['audioupload']['type']=="audio/mp3"){ */


            if (($_FILES["audioupload"]["size"] / 1024) <= 500) {


                $upload_overrides = array("test_form" => false);


                $uploaded_file = wp_handle_upload($_FILES["audioupload"], $upload_overrides);





                if ($uploaded_file["url"]) {








                    $url = $uploaded_file["url"];


                    $content = $uploaded_file["file"];





                    $result = $wpdb->insert($adlist_table, array("type" => $textadtype, "name" => $name, "url" => $url, "content" => $content, "keyword" => $keyword), array("%d", "%s", "%s", "%s", "%s"));


                }


                else


                    $msg = '<div class="updated fade" id="message"><h2>Error: File was Not Uploaded </h2></div>';


            }


            else


                $msg = '<div class="updated fade" id="message"><h2>The MP3 Upload Max for an Audio file is 500KB</h2></div>';





            /* }


              else


              $msg= '<div class="updated fade" id="message"><p>Plesae Upload mp3 format only </p></div>';


             */


        }


        if ($textadtype == 2) {





            $height = htmlspecialchars(trim($_POST["height2"]));


            $width = htmlspecialchars(trim($_POST["width2"]));





            $content = htmlspecialchars(trim($_POST["content"]));





            $result = $wpdb->insert($adlist_table, array("type" => $textadtype, "name" => $name, "height" => $height, "width" => $width, "content" => $content, "keyword" => $keyword), array("%d", "%s", "%s", "%s", "%s", "%s"));


        }


        if ($textadtype == 3) {





            $height = htmlspecialchars(trim($_POST["height"]));


            $width = htmlspecialchars(trim($_POST["width"]));








            $content = htmlspecialchars(trim($_POST["htmlcontent"]));





            $result = $wpdb->insert($adlist_table, array("type" => $textadtype, "name" => $name, "content" => $content, "height" => $height, "width" => $width, "keyword" => $keyword), array("%d", "%s", "%s", "%s", "%s", "%s"));


        }








        if ($msg == "") {





            if (FALSE === $result)


                $msg = '<div class="updated fade" id="message"><h2>There was an error in the MySQL query</h2></div>';


            else


                $msg = '<div class="updated fade" id="message"><h2>The Text2Ad List was Successfully Added</h2></div>';


        }


        echo $msg;


    }





    /**


     *


     * update TextAd list 


     *  


     * 


     */


    public function update() {








        global $wpdb;


        $adlist_table = $wpdb->prefix . "wptext2ad_adlist";





        $textadtype = htmlspecialchars(trim($_POST["textadtype"]));


        $name = htmlspecialchars(trim($_POST["listname"]));


        $id = htmlspecialchars(trim($_POST["id"]));


        $keyword = htmlspecialchars(trim($_POST["keyword"]));








        if ($textadtype == 1) {


            $preAudio = stripcslashes($_POST["preAudio"]);











            if ($_FILES["audioupload"]["size"] != 0) {


                /* if($_FILES['audioupload']['type']=="audio/mp3"){ */


                if (($_FILES["audioupload"]["size"] / 1024) <= 500) {








                    $upload_overrides = array("test_form" => false);


                    $uploaded_file = wp_handle_upload($_FILES["audioupload"], $upload_overrides);








                    if ($uploaded_file["url"]) {








                        $url = $uploaded_file["url"];


                        $content = $uploaded_file["file"];








                        $result = $wpdb->update($adlist_table, array("type" => $textadtype, "name" => $name, "content" => $content, "url" => $url, "keyword" => $keyword), array("id" => $id), array("%d", "%s", "%s", "%s", "%s"), array("%d"));





                        if (file_exists($preAudio))


                            unlink($preAudio);


                    }


                    else


                        $msg = '<div class="updated fade" id="message"><h2>Error: File was Not Uploaded</h2></div>';


                }


                else


                    $msg = '<div class="updated fade" id="message"><h2>The MP3 Upload Max for an Audio file is 500KB</h2></div>';





                /* }


                  else


                  $msg= '<div class="updated fade" id="message"><p>Plesae Upload mp3 format only </p></div>';


                 */


            }else {


                $result = $wpdb->update($adlist_table, array("type" => $textadtype, "name" => $name, "keyword" => $keyword), array("id" => $id), array("%d", "%s", "%s"), array("%d"));


            }


        }


        if ($textadtype == 2) {





            $height = htmlspecialchars(trim($_POST["height2"]));


            $width = htmlspecialchars(trim($_POST["width2"]));





            $content = htmlspecialchars(trim($_POST["content"]));








            $result = $wpdb->update($adlist_table, array("type" => $textadtype, "name" => $name, "height" => $height, "width" => $width, "content" => $content, "keyword" => $keyword), array("id" => $id), array("%d", "%s", "%s", "%s", "%s", "%s"), array("%d"));


        }


        if ($textadtype == 3) {





            $height = htmlspecialchars(trim($_POST["height"]));


            $width = htmlspecialchars(trim($_POST["width"]));








            $content = htmlspecialchars(trim($_POST["htmlcontent"]));





            $result = $wpdb->update($adlist_table, array("type" => $textadtype, "name" => $name, "content" => $content, "height" => $height, "width" => $width, "keyword" => $keyword), array("id" => $id), array("%d", "%s", "%s", "%s", "%s", "%s"), array("%d"));


        }








        if ($msg == "") {





            if (FALSE === $result)


                $msg = '<div class="updated fade" id="message"><h2>There was an error in the MySQL query</h2></div>';


            else


                $msg = '<div class="updated fade" id="message"><h2>The Text2Ad List was Successfully Updated</h2></div>';


        }


        echo $msg;


    }





    /**


     *   delete the schedule list 


     */


    public function delete() {


        global $wpdb;


        $textadlist_table = $wpdb->prefix . "wptext2ad_adlist";





        $id = $_GET["id"];


        if ($id) {





            $sql = "DELETE from $textadlist_table WHERE id = " . $id;





            if (FALSE === $wpdb->query($sql))


                echo '<div class="updated fade" id="message"><h2>There was an error in the MySQL query</h2></div>';


            else


                echo '<div class="updated fade" id="message"><h2>The Text2Ad List was Successfully Deleted</h2></div>';


        }





        $this->index();


    }





}


?>