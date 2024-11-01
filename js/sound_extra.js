
soundManager.url = "/wp-content/plugins/wp-text2ad-lite/library/soundmanager/swf/"; // directory where SM2 .SWFs live                  
                                                                                                                                           
function stopVideo(playerid){
    //                player.stopVideo();
                                                                                                                                                                                                
    var div = document.getElementById(playerid);
    if(div.getElementsByTagName("iframe")[0]!= undefined){
        var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
                                                                                                                                                                                  
        func =  "stopVideo";
        iframe.postMessage('{"event":"command","func":"' + func + '","args":""}','*');
    }
                                                                                                                                        
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("click", true, true, window,
        0, 0, 0, 0, 0, false, false, false, false, 0, null);
    var cb = document.getElementById(playerid); 
    cb.dispatchEvent(evt);
                                                                                                                                 
}
                                                                                                                        
window.onload=function(){
                                                                                                            
    //            if(div.getElementsByTagName("iframe")[0]!= undefined)
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
        var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
        //               alert(ieversion);
        if (ieversion<8){
            for(var i=0;i<20;i++){
                var div = document.getElementById("tip_up"+i);
                if(div!=null){
                    if(div.getElementsByTagName("iframe")[0]!= undefined) {
                        alert("To Use Our Website as Intended you will need to Upgrade your Internet Explorer Browser to Version 8 or above.  Thanks")
                    }
                                                                                                                       
                }
            //                        alert(div)
            }
        }
                                                                                                                     
    }
}