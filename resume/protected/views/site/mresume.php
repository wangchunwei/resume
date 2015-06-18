<body>
<style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .container{
        width: 100%;
        height: 100%;
        position: absolute;
    }
    section{
        
        position: relative;
        top:-40px;

    }
    section img{
        margin-left: 50%;
        opacity: 0.2;
    }
</style>
<div class="container" id="container-block1">
<img src="http://y1.ifengimg.com/a/2015_22/f19b41f43482035_size90_w800_h535.jpg">
<section class="gotonext"><img src="http://h5.5imini.cn/didi/image/arrow.gif"></section>
</div>
<div class="container" id="container-block2">
<img src="http://y0.ifengimg.com/a/2015_22/ab7a1fbd85c4538_size61_w800_h533.jpg">
<section class="gotonext"><img src="http://h5.5imini.cn/didi/image/arrow.gif"></section>
</div>

<div class="container" id="container-block3">
<img src="http://y1.ifengimg.com/a/2015_22/2f2dceb937f019d_size58_w533_h800.jpg">

<section class="gotonext"><img src="http://h5.5imini.cn/didi/image/arrow.gif"></section>
</div>

<div class="container" id="container-block4">
<img src="http://y2.ifengimg.com/a/2015_22/d07fc094c250adb_size46_w800_h533.jpg">

<section class="gotonext"><img src="http://h5.5imini.cn/didi/image/arrow.gif"></section>
</div>

<div class="container" id="container-block5">
<img src="http://y1.ifengimg.com/a/2015_22/5a2c7b5b3d6ada3_size47_w533_h800.jpg">

<section class="gotonext"><img src="http://h5.5imini.cn/didi/image/arrow.gif"></section>
</div>

 <script src="http://y0.ifengimg.com/base/jQuery/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
    var _wHeight =400;// document.documentElement.clientHeight;
    var _gWidth = 300;//document.documentElement.clientWidth;
    alert(_gWidth+"|"+_wHeight);
    
    window.onload = function () {
    var lens = jQuery(".container").length;
    jQuery("body").css({
        'width':_gWidth+'px',
        'height': _wHeight + 'px'
    });
    var index = 1;
    for(var i=index;i<lens;i++){
        jQuery(".container")[i].style.display="none";   
    }
}
var index = 0;
var start_X,start_Y;
function _start(event){
    event.preventDefault();
    jQuery("section img")[index].style.opacity=1;
    var touch = event.touches[0];
    start_Y = touch.pageY;
    start_X = touch.pageX;
}
function _move(event){
    event.preventDefault();
    var touch = event.touches[0];
    var move_Y = touch.pageY;
    var move_X = touch.pageX;
    var go_line = move_X-start_X;

    if(go_line<10 &&index<4){
        jQuery(".container")[index].style.top="-"+move_Y+"px";
        jQuery(".container")[index+1].style.display="block";
        jQuery(".container")[index+1].style.top="-"+move_Y+"px";
        alert("go_line<10||<4"+go_line);
    }else if(go_line>10&&index<4){
        alert("go_line<10||<4"+go_line);
        alert("index11："+index);
        jQuery(".container")[index].style.display="none";
        index++;
        alert("inde:22："+index);
        jQuery(".container")[index].style.display="block";
    } else if(go_line<10 &&index==4){
        alert("go_line<10||=4"+go_line);
        jQuery(".container")[index].style.top="-"+move_Y+"px";
        jQuery(".container")[0].style.display="block";
        jQuery(".container")[0].style.top="-"+move_Y+"px";      
    }else {
        alert("go_line--"+go_line);
        jQuery(".container")[index].style.display="none";
        index = 0;
        jQuery(".container")[index].style.display="block";  
    }
}
function _end(event){
    event.preventDefault();
    jQuery("section img")[index].style.opacity=0.2;
}
if(typeof window.addEventListener != "undefined"){
    jQuery("section img")[index].addEventListener("touchstart click",_start,false);

    jQuery("section img")[index].addEventListener("touchmove click",_move,false);
    jQuery("section img")[index].addEventListener("touchend click",_end,false);

}

</script>









</body>

