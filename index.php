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
<script src="scripts/script.js"></script>
</body>
</html>
