var blocklyArea = document.getElementById('blocklyArea');
var blocklyDiv = document.getElementById('blocklyDiv');
var workspace = Blockly.inject(blocklyDiv,
		{media: 'vendor/media/',
		 toolbox: document.getElementById('toolbox')});
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

$(".main-js").on("click", function() {
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	var myInterpreter = new Interpreter(code);
	myInterpreter.run();
	/*function nextStep() {
		if (myInterpreter.step()) {
			window.setTimeout(nextStep, 10);
		}
	}
	nextStep();*/
	return false;
});
$(".clear-console").on("click", function() {
	$("#js-output .console").text("");
});