<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Բառախաղ</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <style>
.ref {
    font-size:2em;
    color: white;
    opacity: .3;
    text-decoration: none;
}
.toast {
    position: fixed;
    display:block;
    width: 10%;
    left: calc(50% - 5em);
    animation: toast-fade-in 1s 2 alternate;
    background-color: black;
    border-radius: 2em;
    color: white;
    text-align: center;
    padding: 1em;
    opacity: 0;
    font-family: "Bainsley";
    font-size: "3em";
}
@keyframes toast-fade-in {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}
@font-face {
    src: url("resources/NorTar.otf") format("opentype");
    font-family: "NorTar";
}
@font-face {
    src: url("resources/NorTarBody.otf") format("opentype");
    font-family: "NorTarBody";
}
@font-face {
    src: url("resources/Arti.otf") format("opentype");
    font-family: "Arti";
}
@font-face {
    src: url("resources/BERD.otf") format("opentype");
    font-family: "BERD";
}
@font-face {
    src: url("resources/Arian_Grqi_U.ttf") format("truetype");
    font-family: "Arian";
}
@font-face {
    src: url("resources/Bainsley.ttf") format("truetype");
    font-family: "Bainsley";
}
h3 button {
    font-family: "NorTar";
}
:host {
    height: var(--keyboard-height);
}
#keyboard {
    margin: 0;
    user-select: none;
}
.row {
    display: flex;
    width: 100%;
    margin: 0 auto .3em;
    /* https://stackoverflow.com/questions/46167604/ios-html-disable-double-tap-to-zoom */
    touch-action: manipulation;
}
.row:nth-child(1) {
    width: 55%;
}
.row:nth-child(2) {
    width: 85%;
}
.row:nth-child(3) {
    width: 80%;
}
.row:nth-child(4) {
    width: 75%;
}
button {
    font-size: 1.7rem;
    border: 0;
    margin: 0 .1em 0 0;
    border-radius: .1em;
    cursor: pointer;
    user-select: none;
    font-family: "Bainsley";
    text-transform: uppercase;
    color:#585859;
    background-color: #D4D6DA;
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    -webkit-tap-highlight-color: rgba(0,0,0,0.3);
}
button:focus {
    outline: none;
}
button.fade {
    transition: background-color 0.1s ease, color 0.1s ease;
}
button:last-of-type {
    margin: 0;
}
.half {
    flex: 0.5;
}
.one {
    flex: 1;
}
.one-and-a-half {
    flex: 1.5;
}
.two {
    flex: 2;
}
*[data-state='unknown'] {
    background-color: white;
    color: gray;
}
*[data-state='correct'] {
    background-color: #82AA67;
    color: white;
}
*[data-state='present'] {
    /*background-color: #C2B45A;*/
    background-color: #D88122;
    color: white;
}
*[data-state='absent'] {
    background-color: #797C7E;
    color: white;
}
*[data-state='errored'] {
    background-color: red;
}
*[data-state='completed'] {
    background-color: green;
}
*[data-state='open'] {
    background-color: #3629CC;
}
button[data-state='absent'] {
    opacity: .3;
}
button:disabled {
    opacity: .3;
}
button:enabled {
    opacity: 1;
}
body {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #3629CC;
    /*background-color: #FFD000;*/
    margin-right: auto;
    margin-left: auto;
    height: 100vh;
    width: 100vw;
}
.editor-container {
    width: 100%;
/*    bottom: 0; */
/*    position:absolute; */
/*    text-align: center; */
    margin-right: auto;
    margin-left: auto;
}
input {
    width: 50%;
}
.letter-box {
    display: inline-block;
    height: 1.5em;
    width: 1.5em;
    font-size: 2.3em;
    border-radius: .25em;
    font-family: "Bainsley"; 
    margin-left: .1em;
    margin-right: .1em;
}
ul {
    list-style-type: none;
    padding: 0;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
}
li {
    height: 4em;
    margin-bottom: .2em;
}
.overlay-element {
    font-size: 5em;
    font-family: "NorTarBody";
    color:#FFEFA6;
    position: absolute;
    top: -1.1em;
    right: .1em;
    opacity: .3;
}
#game-id{
    padding: .1em;
    right: 0;
    font-family: "Bainsley";
    top:0;
    opacity: .1;
    text-decoration: none;
}
#title {
    font-family: NorTar;
    margin: 0;
    font-size: 4em;
    /*color: #FF4041;*/
    color: white;
    letter-spacing: .4em;
    text-align:center;
}
#warning {
    color:#fff!important;
    background-color:#f44336!important;
    font-size:1.5em;
    color: white;
    text-align: center;
    padding: .25em;
    font-family: "Bainsley";
    margin: 0;
}
#suggestion {
    padding: .15em;
    left: 0;
    font-family: "Bainsley";
}
#game-id:hover #suggestion:hover[data-state='on'] {
    opacity: .6;
}
*[data-state='off']{
    opacity: 0;
}
*[data-state='on']{
    opacty: 1;
}
.top {
    height:65%;
    margin-right: auto;
    margin-left: auto;
}
.bottom{
    padding-top: 2rem;
    height:15%;
}
    </style>
  </head>
  <body>
    <div class="top">
        <p id="suggestion" data-state="off" class="overlay-element">↧և</p>
      <?php
        header('Content-Type: text/html; charset=utf-8');
        header("Access-Control-Allow-Origin: http://areg.xyz/");
        header("Access-Control-Allow-Origin: http://aregxyz-dev.us-west-1.elasticbeanstalk.com/");
        $dtags = '<a id="game-id" class="overlay-element" target="_blank" href="';
        
        if (!isset($_SERVER["QUERY_STRING"]) || empty($_SERVER["QUERY_STRING"]))
            $dans = rand(1, 3762);   
        else
            $dans = $_SERVER["QUERY_STRING"]; 

        $url = "http://";
        $url.=$_SERVER["HTTP_HOST"];
        $url.=$_SERVER["HTTP_URL"];
        $url.='/?';
        $url = 'http://areg.xyz/parig/?';
        $url.=$dans;
        
        $dtags.=$url;
        $dtags.='">';
        $dtags.='↥Էջ';
        $dtags.='</a>';
        
        $dtags.='<div id="answer" data-state="off">';
        $dtags.=$dans;
        $dtags.='</div>';
        echo $dtags;
        ?>
        <script type="text/javascript" src="js/init.js"></script>
        <h2 id="title">ԲԱՌԱԽԱՂ</h2>
        <ul>
            <li id="attempt-1">
                <div id="w1c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w1c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w1c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w1c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w1c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info1" class="ref" target="_blank" data-state="off" href="www.google.com"><i>&#128279</i></a>
            </li>
            <li id="attempt-2">
                <div id="w2c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w2c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w2c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w2c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w2c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info2" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
            <li id="attempt-3">
                <div id="w3c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w3c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w3c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w3c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w3c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info3" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
            <li id="attempt-4">
                <div id="w4c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w4c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w4c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w4c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w4c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info4" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
            <li id="attempt-5">
                <div id="w5c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w5c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w5c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w5c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w5c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info5" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
            <li id="attempt-6">
                <div id="w6c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w6c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w6c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w6c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w6c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info6" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
            <li id="attempt-7">
                <div id="w7c1" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w7c2" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w7c3" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w7c4" data-state="unknown" class="letter-box">&nbsp;</div>
                <div id="w7c5" data-state="unknown" class="letter-box">&nbsp;</div>
                <a id="info7" class="ref" target="_blank" data-state="off"><i>&#128279</i></a>
            </li>
        </ul>
    </div>
    <div class="bottom">
        <div id="keyboard" class="editor-container">
            <div class="row">
                <button data-key="enter">∴</button>
                <button data-key="ձ">ձ</button>
                <button data-key="յ">յ</button>
                <button data-key="օ">օ</button>
                <button data-key="ռ">ռ</button>
                <button data-key="ժ">ժ</button>
                <button data-key="delete">↫</button>
            </div>
            <div class="row">
                <button data-key="խ">խ</button>
                <button data-key="վ">վ</button>
                <button data-key="է">է</button>
                <button data-key="ր">ր</button>
                <button data-key="դ">դ</button>
                <button data-key="ե">ե</button>
                <button data-key="ը">ը</button>
                <button data-key="ի">ի</button>
                <button data-key="ո">ո</button>
                <button data-key="բ">բ</button>
                <button data-key="չ">չ</button>
                <button data-key="ջ">ջ</button>
            </div>
            <div class="row">
                <button data-key="ա">ա</button>
                <button data-key="ս">ս</button>
                <button data-key="տ">տ</button>
                <button data-key="ֆ">ֆ</button>
                <button data-key="կ">կ</button>
                <button data-key="հ">հ</button>
                <button data-key="ճ">ճ</button>
                <button data-key="ք">ք</button>
                <button data-key="լ">լ</button>
                <button data-key="թ">թ</button>
                <button data-key="փ">փ</button>
            </div>
            <div class="row">
                <button data-key="զ">զ</button>
                <button data-key="ց">ց</button>
                <button data-key="գ">գ</button>
                <button data-key="ւ">ւ</button>
                <button data-key="պ">պ</button>
                <button data-key="ն">ն</button>
                <button data-key="մ">մ</button>
                <button data-key="շ">շ</button>
                <button data-key="ղ">ղ</button>
                <button data-key="ծ">ծ</button> 
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/space.js"></script>
    <script type='text/javscript'>window.density=.451;</script>
    </body>
  </html>
