<?php





class wptext2ad_option {





    public function index($args = NULL) {


        if (isset($_POST["wptextOptionUpdate"])) {


            update_option("wptext2ad_hotlink_color", $_POST["wptext2ad_hotlink_color"]);


            if ($_POST["wptext2ad_hotlink_size"] != "")


                update_option("wptext2ad_hotlink_size", $_POST["wptext2ad_hotlink_size"]);





            if ($_POST["wptext2ad_hotlink_font"] != "")


                update_option("wptext2ad_hotlink_font", $_POST["wptext2ad_hotlink_font"]);





            if ($_POST["wptext2ad_hotlink_style"] != "")


                update_option("wptext2ad_hotlink_style", $_POST["wptext2ad_hotlink_style"]);


        }


        ?>


        <script type="text/javascript">


            wptext2adjq(document).ready(function(){





                wptext2adjq("#textfont option").each(function () {


                    if(wptext2adjq(this).val()=="<?php echo get_option("wptext2ad_hotlink_font"); ?>")


                    wptext2adjq(this).attr("selected","selected");


                });








            })


        </script>





        <div id="poststuff" >








            <div class="keywordformat" id="keywordformat">


                <h1>Keyword Format</h1><hr/>


                <br/>


                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff;padding-top: 0px;"  >





                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Font Style</h2>





                    <div class="inside" >


                        <form action="" method="post">


                            <div class="exBox">


                                <label class="text">Color</label>


                                <input type="text" class="color inputfield" style="border:1px solid #000;" value="<?php echo get_option("wptext2ad_hotlink_color"); ?>" name="wptext2ad_hotlink_color" id="listname" />


                            </div>


                            <div class="exBox">


                                <label class="text">Size</label>


                                <input type="text" class="inputfield" style="border:1px solid;" value="<?php echo get_option("wptext2ad_hotlink_size"); ?>" name="wptext2ad_hotlink_size" id="listname" />


                            </div>


                            <div class="exBox" >


                                <label class="text"> Font Family</label>


                                <select id="textfont" class="inputfield" style="line-height:34px;height: 40px;padding-top: 8px;padding-bottom: 8px;" name="wptext2ad_hotlink_font"  onfocus="this.style.border = '1px solid #000'">


                                    <option value="0">Select Font</option>


                                    <option value="Arial, Helvetica, sans-serif">Arial</option>


                                    <option value="'Arial Black', Gadget, sans-serif">Arial Black</option>


                                    <option value="'Bookman Old Style', serif">Bookman Old Style</option>


                                    <option value="'Comic Sans MS', cursive">Comic Sans MS</option>


                                    <option value="Courier, monospace">Courier</option>


                                    <option value="'Courier New', Courier, monospace">Courier New</option>


                                    <option value="Garamond, serif">Garamond</option>


                                    <option value="Georgia, serif">Georgia</option>


                                    <option value="Impact, Charcoal, sans-serif">Impact</option>


                                    <option value="'Lucida Console', Monaco, monospace">Lucida Console</option>


                                    <option value="Courier, monospace">Courier, monospace</option>


                                    <option value="''Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida Sans Unicode</option>


                                    <option value="'MS Sans Serif', Geneva, sans-serif">MS Sans Serif</option>


                                    <option value="'Times New Roman', Times, serif">Times New Roman</option>


                                    <option value="Verdana, Geneva, sans-serif">Verdana</option>


                                </select>


                            </div>








                            <div style="    width: 380px; padding: 5px; padding-top: 10px; min-height: 15px; clear:both">


                                <label class="text" style="    padding-right: 10px; padding-top: 5px;display: block;float: left;">Format</label>





                                <div style="    float: right;width: 250px;padding-top: 10px">


                                    <input  type="radio" <?php if (get_option("wptext2ad_hotlink_style") == "normal")


            echo 'checked=""' ?>  value="normal" name="wptext2ad_hotlink_style" /> <label class="text">Normal</label>


                                    <input value="italic"  <?php if (get_option("wptext2ad_hotlink_style") == "italic")


                                    echo 'checked=""' ?>  name="wptext2ad_hotlink_style" type="radio" /> <label class="text">Italic</label>


                                    <input value="bold"  <?php if (get_option("wptext2ad_hotlink_style") == "bold")


                                   echo 'checked=""' ?>  name="wptext2ad_hotlink_style" type="radio" /><label class="text"> Bold</label>


                                </div>  </div>       


                            <input type="submit" class="keywordupdate" style="border:1px solid #000;margin-left: 6px;margin-top: 20px;  margin-bottom: 15px;" name="wptextOptionUpdate" value="Update Style" />


                        </form>





                    </div>





                </div>


            </div>





        </div>





        <!--        </div>-->


        <?php


    }





}


?>