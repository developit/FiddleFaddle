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
	var which = hasClass(activeElement, "hResize")?2:hasClass(activeElement, "vResize")?1:0;
	if(which != 0){
		document.querySelector(".iframeShiv").style.display="block";
	}
});
document.addEventListener("mouseup", function(e){
	if(activeElement){
		var which = hasClass(activeElement, "hResize")?2:hasClass(activeElement, "vResize")?1:0;
		if(which != 0){
			document.querySelector(".iframeShiv").style.display="none";
		}
	}
	activeElement = null;
});
document.addEventListener("mousemove", function(e){
	if(!activeElement) return;
	var which = hasClass(activeElement, "hResize")?2:hasClass(activeElement, "vResize")?1:0;
	console.log(which);
	if(which == 2){
		var p = previousElement(activeElement);
		var n = nextElement(activeElement);
		var pW = e.clientX-offsetLeft(activeElement.parentNode);
		var nW = activeElement.parentNode.clientWidth - e.clientX+offsetLeft(activeElement.parentNode);
		if(!(pW < 200 || nW < 200)){
			p.setAttribute("data-flex-weight", pW);
			n.setAttribute("data-flex-weight", nW);
		}
		resize2();
	}
	if(which == 1){
		var p = previousElement(activeElement);
		var n = nextElement(activeElement);
		var pH = e.clientY-offsetTop(activeElement.parentNode);
		var nH = activeElement.parentNode.clientHeight - e.clientY + offsetTop(activeElement.parentNode);
		if(!(pH < 100 || nH < 100)){
			p.setAttribute("data-flex-weight", pH);
			n.setAttribute("data-flex-weight", nH);
		}
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

document.querySelector(".play").addEventListener("click", function(){
	
	document.querySelector("#HTML").value = btoa(HTMLEditor.getValue());
	document.querySelector("#CSS").value = btoa(CSSEditor.getValue());
	document.querySelector("#JS").value = btoa(JSEditor.getValue());
	document.querySelector("#scriptMethod").value = document.querySelector("#scriptMethodSelect").value;
	document.querySelector("#docType").value = document.querySelector("#doctypeSelect").value;
	document.querySelector("#goForIt").submit();
}, false);
