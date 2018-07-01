$("#blocklyArea").css("height", "calc(100vh - " + $(".top-matter").css("height"));


var blocklyArea = document.getElementById('blocklyArea');
var blocklyDiv = document.getElementById('blocklyDiv');

//--------------------Imported

var toolbox = document.getElementById("toolbox");

var options = { 
	toolbox : toolbox, 
	collapse : true, 
	comments : true, 
	disable : true, 
	maxBlocks : Infinity, 
	trashcan : true, 
	horizontalLayout : false, 
	toolboxPosition : 'start', 
	css : true, 
	media : 'vendor/media/', 
	rtl : false, 
	scrollbars : true, 
	sounds : true, 
	oneBasedIndex : true, 
	grid : {
		spacing : 20, 
		length : 1, 
		colour : '#888', 
		snap : true
	}, 
	zoom : {
		controls : true, 
		wheel : true, 
		startScale : 1, 
		maxScale : 3, 
		minScale : 1, 
		scaleSpeed : 1
	}
};

/* Inject your workspace */ 
var workspace = Blockly.inject(blocklyDiv, options);

/* Load Workspace Blocks from XML to workspace. Remove all code below if no blocks to load */

var workspaceBlocks = document.getElementById("workspaceBlocks"); 

/* Load blocks to workspace. */
Blockly.Xml.domToWorkspace(workspaceBlocks, workspace);

//--------------------End Import

var onresize = function(e) {
	// Compute the absolute coordinates and dimensions of blocklyArea.
	var element = blocklyArea;
	var x = 0;
	var y = 0;
	do {
		x += element.offsetLeft;
		y += element.offsetTop;
		element = element.offsetParent;
	} while (element);
	// Position blocklyDiv over blocklyArea.
	blocklyDiv.style.left = x + 'px';
	blocklyDiv.style.top = y + 'px';
	blocklyDiv.style.width = blocklyArea.offsetWidth + 'px';
	blocklyDiv.style.height = blocklyArea.offsetHeight + 'px';
};
window.addEventListener('resize', onresize, false);
onresize();
Blockly.svgResize(workspace);

//Storage
// An href with #key trigers an AJAX call to retrieve saved blocks.
/*if ('BlocklyStorage' in window && window.location.hash.length > 1) {
	BlocklyStorage.retrieveXml(window.location.hash.substring(1));
}


if ('BlocklyStorage' in window) {
	BlocklyStorage.HTTPREQUEST_ERROR = 'There was a problem with the request.\n';
	BlocklyStorage.LINK_ALERT = 'Share your blocks with this link:\n\n%1';
	BlocklyStorage.HASH_ERROR = 'Sorry, "%1" doesn\'t correspond with any saved Blockly file.';
	BlocklyStorage.XML_ERROR = 'Could not load your saved file.\n'+
		'Perhaps it was created with a different version of Blockly?';
} else {
	document.write('<p id="sorry">Sorry, cloud storage is not available.  This demo must be hosted on App Engine.</p>');
}*/


workspace.addChangeListener(function () {
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	$("#js-output .code").text(code);
});

Blockly.JavaScript['text_print'] = function(block) {
	var msg = Blockly.JavaScript.valueToCode(block, 'TEXT',
		Blockly.JavaScript.ORDER_NONE) || '\'\'';
	//return '$(\".console\").append((JSON.stringify(' + msg + ')) + "\\n");\n';
	return '$(\".console\").text((' + msg + ') + "\\n");\n';
};

$(".run-js").on("click", function() {
	$(".clear-console").trigger("click");
	// Generate JavaScript code and run it.
	window.LoopTrap = 10000;
	Blockly.JavaScript.INFINITE_LOOP_TRAP =
		'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
	try {
		eval(code);
	} catch (e) {
		alert(e);
	}
	return false;
});
$(".clear-console").on("click", function() {
	$("#js-output .console").text("");
});