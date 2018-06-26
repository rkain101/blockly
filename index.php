<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blockly</title>
	<script src="vendor/blockly_compressed.js"></script>
	<script src="vendor/blocks_compressed.js"></script>
	<script type="text/javascript" src="vendor/javascript_compressed.js"></script>
	<script src="vendor/msg/js/en.js"></script>
	<script type="text/javascript" src="vendor/js-interpreter/acorn_interpreter.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Passion+One|Prosto+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
	<div class="top-matter">
		<h1>Welcome to Blockly!</h1>
		<p>Drag and drop blocks from the left into the white workspace. Blocks can be connected together by matching the shapes of the jigsaw edges; if something will snap into place, it will be highlighted in yellow.</p>
		<p>Click / Tap on <span class="button-label">Execute</span> to run the code that you generated. <span class="button-label">Clear</span> will clear the output window.</p>
	</div>
	<div id="blocklyArea"></div>
	<div id="js-output">
		<pre class="code"></pre>
		<a class="run-js" href="#">Execute</a><a class="clear-console" href="#">Clear</a>
		<pre class="console"></pre>
	</div>
	<!-- End of HTML. JS-Driven Blockly elements start here -->
	<div id="blocklyDiv" style="position: absolute;"></div>

	<xml id="toolbox" style="display: none;">
		<block type="controls_if"></block>
		<block type="logic_compare"></block>
		<block type="controls_repeat_ext"></block>
		<block type="math_number">
			<field name="NUM">123</field>
		</block>
		<block type="math_arithmetic"></block>
		<block type="text"></block>
		<block type="text_print"></block>
	</xml>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>
