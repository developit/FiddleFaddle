<!DOCTYPE html>
<html>
<head>
<title>FiddleFaddle!</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="sidebar.css" type="text/css"/>
<script src="scripts/flexie/flexie.js"></script>
<script src="scripts/util.js"></script>
<script src="scripts/sidebar.js"></script>
<script src="scripts/ace-builds/src/ace.js"></script>
<script src="scripts/ace-builds/src/mode-html.js"></script>
<script src="scripts/ace-builds/src/mode-css.js"></script>
<script src="scripts/ace-builds/src/mode-javascript.js"></script>
</head>
<body data-flex data-flex-direction="vertical">
	<form target="output" action="generate.php" method="post" id="goForIt">
		<input type="hidden" name="HTML" id="HTML"/>
		<input type="hidden" name="CSS" id="CSS"/>
		<input type="hidden" name="JS" id="JS"/>
		<input type="hidden" name="scriptMethod" id="scriptMethod"/>
		<input type="hidden" name="docType" id="docType"/>
	</form>
	<div class="toolbar">
		<button>Play!</button>
	</div>
	<div class="panes" data-flex-weight="1" data-flex data-flex-direction="horizontal">
			<ul class="sidebar">
<li><a href="#">Frameworks</a>
<div>
    <select id="scriptMethodSelect">
        <option value="1" select>head</option>
        <option value="2">body</option>
    </select>
    <select id="doctypeSelect">
        <option value="0" select>HTML 5</option>
        <option value="1">HTML 4.01 Strict</option>
        <option value="2">HTML 4.01 Transitional</option>
        <option value="3">HTML 4.01 Frameset</option>
        <option value="4">XHTML 1.0 Strict</option>
        <option value="5">XHTML 1.0 Transitional</option>
        <option value="6">XHTML 1.0 Frameset</option>
        <option value="7">XHTML 1.1</option>
    </select>
</div></li>
<li><a href="#">Resource</a></li>
</ul>
	<div data-flex-weight="1" data-flex data-flex-direction="horizontal" style="height: 100%; float: left;">
<div data-flex-weight="1" style="height:100%;float: left;" data-flex data-flex-direction="vertical" >
	<div data-flex-weight="1" class="pane">
		<div id="HTMLEditor">&lt;!-- HTML --&gt;</div>
	</div>
	<div class="thingy">
	</div>
	<div data-flex-weight="1" class="pane">
		<div id="JavascriptEditor">//Javascript</div>
	</div>
</div>
<div class="thing"></div>
<div data-flex-weight="1" style="height:100%;float: left;" data-flex data-flex-direction="vertical">
	<div data-flex-weight="1" class="pane">
		<div id="CSSEditor">/* CSS */</div>
	</div>
	<div class="thingy">
	</div>
	<div data-flex-weight="1" class="pane">
		<div id="result">
			<iframe id="output"></iframe>
		</div>
	</div>
</div>
</div>
</div>
<script>

var previousElement = function(el){
	var e = el;
	while((e = e.previousSibling) && e.nodeType!=1);
	return e;
}
var nextElement = function(el){
	var e = el;
	while((e = e.nextSibling) && e.nodeType!=1);
	return e;
}
offsetTop = function(el){
	var top = el.offsetTop;
	var e = el;
	if(e.offsetParent)
	while(e = e.offsetParent){
		top+=e.offsetTop;
	}
	return top;
}
offsetLeft = function(el){
	var top = el.offsetLeft;
	var e = el;
	if(e.offsetParent)
	while(e = e.offsetParent){
		top+=e.offsetLeft;
	}
	return top;
}
var activeElement = null;
document.addEventListener("mousedown", function(e){
	activeElement = e.target;
});
document.addEventListener("mouseup", function(e){
	activeElement = null;
});
document.addEventListener("mousemove", function(e){
	if(!activeElement) return;
	if(hasClass(activeElement, "thing")){
		var p = previousElement(activeElement);
		var n = nextElement(activeElement);
		p.setAttribute("data-flex-weight", e.clientX-offsetLeft(activeElement.parentNode));
		n.setAttribute("data-flex-weight", activeElement.parentNode.clientWidth - e.clientX+offsetLeft(activeElement.parentNode));
		resize2();
	}
	if(hasClass(activeElement, "thingy")){
		var p = previousElement(activeElement);
		var n = nextElement(activeElement);
		p.setAttribute("data-flex-weight", e.clientY-offsetTop(activeElement.parentNode));
		n.setAttribute("data-flex-weight", activeElement.parentNode.clientHeight - e.clientY + offsetTop(activeElement.parentNode));
		resize2();
	}
}, false);
HTMLMode = require("ace/mode/html").Mode;
JSMode = require("ace/mode/javascript").Mode;
CSSMode = require("ace/mode/css").Mode;
var HTMLEditor = ace.edit("HTMLEditor");
HTMLEditor.getSession().setMode(new HTMLMode());
var JSEditor = ace.edit("JavascriptEditor");
JSEditor.getSession().setMode(new JSMode());
var CSSEditor = ace.edit("CSSEditor");
CSSEditor.getSession().setMode(new CSSMode());

function resize2(){
	resize();
	HTMLEditor.resize();
	JSEditor.resize();
	CSSEditor.resize();	
}

document.querySelector("button").addEventListener("click", function(){
	
	document.querySelector("#HTML").value = btoa(HTMLEditor.getValue());
	document.querySelector("#CSS").value = btoa(CSSEditor.getValue());
	document.querySelector("#JS").value = btoa(JSEditor.getValue());
	document.querySelector("#scriptMethod").value = document.querySelector("#scriptMethodSelect").value;
	document.querySelector("#docType").value = document.querySelector("#doctypeSelect").value;
	document.querySelector("#goForIt").submit();
}, false);
</script>
</body>
</html>
