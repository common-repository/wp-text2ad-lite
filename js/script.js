var t=1;
var total_keybox=5;
//var wptext2adjq = jQuery.noConflict();



      
      
wptext2adjq(function() {
	
    // select the TextAd  types 
    
    wptext2adjq("#textadtype").change(function(){
        if(wptext2adjq(this).val()!=""){
            wptext2adjq(".cityBox").slideUp();  
            if(wptext2adjq(this).val()==1)
                wptext2adjq("#audio").slideDown();  
            if(wptext2adjq(this).val()==2)
                wptext2adjq("#video").slideDown();  
            if(wptext2adjq(this).val()==3)
                wptext2adjq("#html").slideDown();  
                  
                  
            
        }
        else
            wptext2adjq(".cityBox").slideUp(); 
    })
    
    
    // submit the TextAd  list 
        
    wptext2adjq("#addTextAdlist").submit(function(){
        if(wptext2adjq("#listname").val()==""){
            alert("Please Enter TextAd Name");
            return false; 
        }
            
        if(wptext2adjq("#textadtype").val()==""){
            alert("Please Enter TextAd Type");
            return false; 
        }
            
        else if(wptext2adjq("#textadtype").val()==1 && wptext2adjq("#preAudio").val()==""){
            if(wptext2adjq("#audioupload").val()==""){
                alert("Please Upload Audio First");
                return false; 
                    
            } 
        }
                        
        return true;
    });
        
    // meta box key word add
        
        
    wptext2adjq(".handlediv").click(function(){
        wptext2adjq(this).next().next().slideToggle();
    }) ;
        
    wptext2adjq(".wptext2adLink").parent().css("display","inline");
    // jQuery(".wptext2adLink").parent().parent().css("display","inline");
        
    var content= "<div class='TextContentBox'>"+wptext2adjq("article").html()+"</div>";
      
    wptext2adjq("#comments").before(content);
       
    wptext2adjq("article").remove(); 
    // on mouse hover play songs 
    
//    wptext2adjq(".wptext2adLink").mouseenter(function(){
//        function play(){
//            if(wptext2adjq(this).attr("val").length!=0) {
//                thisMovie("Playaudio").stopSound();
//                thisMovie("Playaudio").playSound(wptext2adjq(this).attr("val"));
//            
//            }
//        }
//    });
//    wptext2adjq(".wptext2adLink").mouseout(function(){
//        if(wptext2adjq(this).attr("val").length!=0) {
//      
//            setTimeout(function(){
//                thisMovie("Playaudio").stopSound();
//            }, 500);
//            thisMovie("Playaudio").stopSound();
//        }
//     
//    });   
});


function chkNumiric($value){
    var cell_ptrn=/^\+?\d+$/;
    var cell_str= $value;
    if(cell_str!=""){
        if(cell_str.match(cell_ptrn)==null) 
            return 0;
        else
            return 1;
    }
}


function emailCheck(email){
    var mail_ptrn=/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/;
    var mail_str= email;
    if(mail_str.match(mail_ptrn)==null)
        return 0;
    else 
        return 1;
      
}

function thisMovie(movieName){
                
    if (navigator.appName.indexOf("Microsoft") != -1) {
        return window[movieName]
    }
    else{
        return document[movieName]
    }
}

//function playaudio(va){
////    alert(wptext2adjq(va).attr("val"));
//    if(wptext2adjq(va).attr("val").length!=0) {
//        thisMovie("Playaudio").stopSound();
//        thisMovie("Playaudio").playSound(wptext2adjq(va).attr("val"));
//            
//    }
//}
//    
//function pauseaudio(va){
//    if(wptext2adjq(va).attr("val").length!=0) {
//      
//        thisMovie("Playaudio").stopSound();
//    }
//}