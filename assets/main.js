var blocklyArea = document.getElementById('blocklyArea');
var blocklyDiv = document.getElementById('blocklyDiv');
var workspace = Blockly.inject(blocklyDiv,
		{media: 'media/',
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


function myUpdateFunction(event) {
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	//document.getElementById('js-output').value = code;
	$("#js-output p").text(code);
}
workspace.addChangeListener(myUpdateFunction);

$(".main-js").on("click", function() {
	var code = Blockly.JavaScript.workspaceToCode(workspace);
	var myInterpreter = new Interpreter(code);
	myInterpreter.run();
	return false;
	/*function nextStep() {
		if (myInterpreter.step()) {
			window.setTimeout(nextStep, 10);
		}
	}
	nextStep();*/
});