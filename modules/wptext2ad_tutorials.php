<?php
/*

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class wptext2ad_tutorials {

    public function index() {

   
        ?>
        <style>
            .flplayer{

                /*        width: 640px;height:360px;*/
                /*        background-image: url(<?php echo site_url(); ?>/wp-content/plugins/wptext2ad/images/flowplayer2.png);*/
            }
        </style>


        <div id="tutorial" class="tutorial">
            <h1>Tutorials</h1><hr/>
            <br/>
            <div class="videotuts" >
                <h2 style="border:1px solid; padding: 15px;">How To Setup the Audio AD</h2>
                <div class="videobox flplayer" >
                    <a  href="http://d2kjcumy5z1f82.cloudfront.net/video/tut3.m4v"   id="apostvideo1"></a>
                </div>
                <div class="videoside">
                    <hr style="margin-bottom: 10px;"/>

                    <h3 >Learn How To Setup<br/> an MP3 Audio AD for your Page or Post</h3>
                    <hr style="padding-tp: 10px;"/>
                </div>
            </div>
            <div class="videotuts" >
                <h2 style="border:1px solid; padding: 15px;">How To Setup the Video AD</h2>
                <div class="videobox flplayer" style="">
                    <a  href="http://d2kjcumy5z1f82.cloudfront.net/video/tut4.m4v"   id="apostvideo2"></a>
                </div>
                <div class="videoside" style="">
                    <hr/>
                    <h3>Learn How To Setup<br/> a YouTube Video AD for your Page or Post</h3>
                    <hr/>
                </div>
            </div>
            <div class="videotuts" >
                <h2 style="border:1px solid; padding: 15px;">How To Setup an Image AD</h2>

                <div class="videobox flplayer" style="">
        <!--                    <img style="z-index: -10;display: inherit;" src="<?php echo site_url(); ?>/wp-content/plugins/wptext2ad/images/flowplayer.png"/>-->
                    <a  href="http://d2kjcumy5z1f82.cloudfront.net/video/tut5.m4v"  id="apostvideo3"></a>
                </div>
                <div class="videoside" style="">
                    <hr/>
                    <h3>Learn How To Setup<br/> an Image AD for your Page or Post</h3>
                    <hr/>
                </div>
            </div>
            <div class="videotuts" >
                <h2 style="border:1px solid; padding: 15px;">How To Setup a Mixed Media AD</h2>
                <div class="videobox flplayer" style="">
                    <a  href="http://d2kjcumy5z1f82.cloudfront.net/video/tut6.m4v"  id="apostvideo4"></a>
                </div>
                <div class="videoside" style="">
                    <hr/>
                    <h3>Learn How To Setup<br/> a Video, Image and Text AD for your Page or Post</h3>
                    <hr/>
                </div>
            </div>

        </div>
    
        <?php
    }

}
?>