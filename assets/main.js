$("#blocklyArea").css("height", "calc(100vh - " + $(".top-matter").css("height"));


var blocklyArea = document.getElementById('blocklyArea');
var blocklyDiv = document.getElementById('blocklyDiv');

//--------------------Imported
/* TODO: Change toolbox XML ID if necessary. Can export toolbox XML from Workspace Factory. */
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

/* TODO: Change workspace blocks XML ID if necessary. Can export workspace blocks XML from Workspace Factory. */
var workspaceBlocks = document.getElementById("workspaceBlocks"); 

/* Load blocks to workspace. */
Blockly.Xml.domToWorkspace(workspaceBlocks, workspace);
//--------------------End Import

/*var workspace = Blockly.inject(blocklyDiv,
		{media: 'vendor/media/',
		 toolbox: document.getElementById('toolbox')});*/
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

workspace.addChangeListener(function () {
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	$("#js-output .code").text(code);
});

$(".run-js").on("click", function() {
	// Generate JavaScript code and run it.
	window.LoopTrap = 1000;
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