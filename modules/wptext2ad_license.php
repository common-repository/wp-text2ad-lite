<?php
/*

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class wptext2ad_license {

    public function index() {
        ?>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="license">

            <h1>Welcome and Thanks for Trying our WP Text2ad Plugin!</h1><hr/>

            <br/>

            <div style="width:auto;">

                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff; padding-top: 0px; float:left; width:445px; height:180px; margin-right:15px;"  >		

                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Help us Keep "Lite" FREE</h2>

                    <h3 style="padding:0px 15px;"><small><i>If you like this plugin and find it useful, help keep this "Lite" version free and actively developed by clicking the <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CHU3DU5WRZTVE" target="_blank"><strong>Donate</strong></a> button.</i></small></h3>

                    <div style="margin:20px 150px;" >
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="CHU3DU5WRZTVE">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" >
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>

                </div>

                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff; padding-top:0px; float:right; width:445px; height:180px; margin-right:0px;"  >		

                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Upgrade Now</h2>

                    <h3 style="padding:0px 15px;"><small><i>Find out what the Features our Advanced & PRO versions have <a href="http://wptext2ad.com/pricing" target="_blank">Click Here</a> to find out more...</i></small></h3>

                    <div>
                        <a class="buttonupdate" href="http://wptext2ad.com/pricing" target="_blank" >Upgrade</a>
                    </div>

                </div>

                <br style="clear: left;" />

            </div>

            <div style="width:auto;">

                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff;padding-top: 0px; float:left; width:445px; height:210px; margin-right:15px;"   >		

                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Send Us Feedback</h2>

                    <h3 style="padding:0px 15px;"><small><i>We are always looking for your Feedback, Suggestions, Social Interactions, Testimonials or to just let us know How you are using our plugin <a href="http://wptext2ad.com/contact-2/" target="_blank" >Click Here</a> to contact us by email...</p></i></small></h3>

                    <div>
                        <a  class="buttonfeedback" href="http://wptext2ad.com/contact-2/" target="_blank" ></a>
                    </div>

                </div>

                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff;padding-top: 0px; float:right; width:445px; height:210px; margin-right:0px;"  >		

                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Subscribe to our Newsletter</h2>

                    <h3 style="padding:0px 15px;"><small><i>We keep you in the loop with us and informed with trending topics we find for blogging, marketing and WordPress.<!-- <a href="http://wptext2ad.com/contact-2/" target="_blank" >Click Here</a> to Subscribe to our Newsletter...--></p></i></small></h3>

                    <!--
                    Do not modify the NAME value of any of the INPUT fields
                    the FORM action, or any of the hidden fields (eg. input type=hidden).
                    These are all required for this form to function correctly.
                    -->
                    <style type="text/css">

                        .myForm td, input, select, textarea, checkbox  {
                            font-family: tahoma;
                            font-size: 12px;

                        }

                        .required {
                            color: red;
                        }

                        .subscribe:hover {
                            background:#f96a0e;
                        }

                    </style>

                    <form method="post" action="http://affiliateoutpost.com/emailmarketer/form.php?form=13" id="frmSS13" onsubmit="return CheckForm13(this);">

                        <table border="0" cellpadding="2" class="myForm" style="margin:0 auto;">
                            <tr>
                                <td><span class="required">*</span>&nbsp;
                                    First Name:</td>
                                <td><input type="text" name="CustomFields[2]" id="CustomFields_2_13" value="" size='50' style="width:200px;"></td>
                            </tr><tr>
                                <td><span class="required">*</span>&nbsp;
                                    Your Email Address:</td>
                                <td><input type="text" name="email" value=""  style="width:200px;"/></td>
                            </tr><input type="hidden" name="format" value="h" />
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Subscribe"  class="subscribe" style="width:80px;" />
                                    <br/>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <script type="text/javascript">
                    // <![CDATA[

                    function CheckMultiple13(frm, name) {
                        for (var i=0; i < frm.length; i++)
                        {
                            fldObj = frm.elements[i];
                            fldId = fldObj.id;
                            if (fldId) {
                                var fieldnamecheck=fldObj.id.indexOf(name);
                                if (fieldnamecheck != -1) {
                                    if (fldObj.checked) {
                                        return true;
                                    }
                                }
                            }
                        }
                        return false;
                    }
                    function CheckForm13(f) {
                        var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
                        if (!email_re.test(f.email.value)) {
                            alert("Please enter your email address.");
                            f.email.focus();
                            return false;
                        }
        						
                        var fname = "CustomFields_2_13";
                        var fld = document.getElementById(fname);
                        if (fld.value == "") {
                            alert("Please enter a value for field First Name");
                            fld.focus();
                            return false;
                        }
        						
                        return true;
                    }
        						
                    // ]]>
                    </script>


                </div>

                <br style="clear: left;" />

            </div>



            <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff;padding-top: 0px;"  >	

                <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Keep Updated with Us</h2>

                <script type="text/javascript" charset="utf-8">
                window.twttr = (function (d,s,id) {
                    var t, js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
                    js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
                    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
                }(document, "script", "twitter-wjs"));
                </script>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

                <div style="">
                    <div id="trialsocial" class="trialsocial" >
                        <div class="trialsocial2">
                            <div style="fbbox" >
                                <div class="fb-like" data-href="http://facebook.com/wordpresstext2ad" 
                                     data-send="true" data-width="220" data-height="100" data-show-faces="false" data-stream="false" data-header="false">
                                </div></br>

                            </div>
                            <div class="twbox">
                                <p style="color:#3b599b; font-size:15px;">Click to Follow Us:</p>
                                <a href="https://twitter.com/WordpressTxt2Ad" class="twitter-follow-button" data-show-count="false" >Follow</a>
                                <p style="color:#3b599b; font-size:15px;">Click to Tweet your Peeps:</p>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://ow.ly/fvNum" data-text="Just got WP Text2ad, a DIY #WordPressPlugin for creating In-Text Multimedia Ads & Interactive Articles, Get yours -" data-count="none">Tweet</a>
                            </div>
                        </div>
                        <p style="margin-top:0px;color:#000; font-size:26px; text-shadow:0px 0px #000;">Interested in <strong>Software Updates</strong> and <strong>Our Giveaways?</strong></p>

                        <p style="color:#000; font-size:20px;"><strong>Click </strong><font color="#3b599b"><strong> "Like" </strong></font>for our Facebook Fanpage and also <strong> Click </strong><font color="#3b599b"><strong> "Follow" </strong></font>for our Twitter Page.

                        <p style="color:#000; font-size:20px; ">You will <font color="#3b599b"><strong>ALWAYS</strong></font> stay informed with our <font color="#3b599b"><strong>Updates</strong> & <strong>Special Offers!</strong></font>
                        </p>
                        <p style="color:#ccc; font-size:12px; "><i>Important - Please be aware there is no application support for the "Lite" version.  Application support will depend on the support Plan you purchase.</i></p>

                    </div>

                </div>

                <div class="clear"></div>

                <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
                <script>window.jQuery || document.write(\'<script src="js/vendor/jquery-1.8.2.min.js"><\/script>\')</script>
                <script src="js/plugins.js"></script>
                <script src="js/main.js"></script>

                <!-- Twitter Button Script -->

                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


                <!-- Google Analytics: change UA-XXXXX-X to be your site\'s ID. -->
                <script>
            var _gaq=[[\'_setAccount\',\'UA-26974875-1\'],[\'_trackPageview\']];
                    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                        g.src=(\'https:\'==location.protocol?\'//ssl\':\'//www\')+\'.google-analytics.com/ga.js\';
                        s.parentNode.insertBefore(g,s)}(document,\'script\'));
                </script>					




            </div>

            <div style="width:auto;">

                <div class="postbox" style="border: 1px solid #000; background: #fff; background-color: #fff; padding-top:0px; float:left; width:910px; height:auto; margin-right:0px;"  >		

                    <h2  style="border-bottom: 1px solid #000;padding:10px;margin-top: 0px;">&nbsp;Some of our Recommendations</h2>

                    <div style="float:left;margin-right:55px;margin-top:-18px;">
                        <h2 style="padding:0px 15px;"><small><i>Need GREAT WordPress Themes?</i></small></h2>
                        <ul style="margin-left:15px;">
                            <li>Squeeze Pages with <a href="http://ow.ly/fCGkR" target="_blank">OptimizePress</a></li>
                            <li>Site Launch Pages with <a href="http://ow.ly/fD1up" target="_blank">Launch Effect</a></li>
                            <li>Any Theme Design with <a href="http://ow.ly/fEdiB" target="_blank">Headway Themes</a></li>
                            <li>Website Themes with <a href="http://ow.ly/fD52a" target="_blank">Woo Themes</a></li>
                        </ul>
                    </div>
                    <div style="float:left;margin-right:55px;margin-top:-18px;">
                        <h2 style="padding:0px 15px;"><small><i>Need GREAT Website Hosting?</i></small></h2>
                        <ul style="margin-left:15px;">
                            <li>For HostGator <a href="http://ow.ly/fCDX7" target="_blank">Click Here</a> to find out more...</li>
                            <li>For BlueHost <a href="http://ow.ly/fCE4C" target="_blank">Click Here</a> to find out more...</li>
                            <li>For HostMonster <a href="http://ow.ly/fCE6L" target="_blank">Click Here</a> to find out more...</li>
                            <li>For iPower <a href="http://ow.ly/fCE0y" target="_blank">Click Here</a> to find out more...
                            </li>
                        </ul>
                    </div>
                    <div style="float:left;margin-top:-18px;">
                        <h2 style="padding:0px 15px;"><small><i>Need a Domain Name?</i></small></h2>
                        <ul style="margin-left:15px;">
                            <li>Cheap Domain Names at <a href="http://ow.ly/fD4bl" target="_blank">Namecheap</a></li>

                        </ul>
                    </div>



                </div>	

                <br style="clear: left;" />

            </div>

        </div>

        <?php
    }

}